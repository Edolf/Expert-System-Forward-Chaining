<?php

namespace app\core\Database;

use PDO;
use app\core\Application;

class QueryBuilder
{
  public const SELECT = 0;
  public const DELETE = 1;
  public const UPDATE = 2;
  public const INSERT = 3;

  public const STATE_DIRTY = 0;
  public const STATE_CLEAN = 1;

  public const NULL = PDO::PARAM_NULL;
  public const INTEGER = PDO::PARAM_INT;
  public const STRING = PDO::PARAM_STR;
  public const LARGE_OBJECT = PDO::PARAM_LOB;
  public const BOOLEAN = PDO::PARAM_BOOL;
  public const BINARY = 16;

  private $connection;

  private const SQL_PARTS_DEFAULTS = [
    'select'   => [],
    'distinct' => false,
    'from'     => [],
    'join'     => [],
    'set'      => [],
    'where'    => null,
    'groupBy'  => [],
    'having'   => null,
    'orderBy'  => [],
    'values'   => [],
  ];

  private $sqlParts = self::SQL_PARTS_DEFAULTS;

  private $sql;

  private $params = [];

  private $paramTypes = [];

  private $type = self::SELECT;

  private $state = self::STATE_CLEAN;

  private $firstResult = null;

  private $maxResults = null;

  private $boundCounter = 0;

  public function __construct(Connection $connection)
  {
    $this->connection = $connection;
  }

  public function expr()
  {
    return $this->connection->getExpressionBuilder();
  }

  public function getType()
  {
    return $this->type;
  }

  public function getConnection()
  {
    return $this->connection;
  }

  public function getState()
  {
    return $this->state;
  }

  public function execute()
  {
    $statement = Application::$app->connection->prepare($this->getSQL());
    $statement->execute();
    return $statement->fetchAll();
  }

  public function getSQL()
  {
    if ($this->sql !== null && $this->state === self::STATE_CLEAN) {
      return $this->sql;
    }

    switch ($this->type) {
      case self::INSERT:
        $sql = $this->getSQLForInsert();
        break;
      case self::DELETE:
        $sql = $this->getSQLForDelete();
        break;

      case self::UPDATE:
        $sql = $this->getSQLForUpdate();
        break;

      case self::SELECT:
      default:
        $sql = $this->getSQLForSelect();
        break;
    }

    $this->state = self::STATE_CLEAN;
    $this->sql   = $sql;

    return $sql;
  }

  public function setParameter($key, $value, $type = null)
  {
    if ($type !== null) {
      $this->paramTypes[$key] = $type;
    }

    $this->params[$key] = $value;

    return $this;
  }

  public function setParameters(array $params, array $types = [])
  {
    $this->paramTypes = $types;
    $this->params     = $params;

    return $this;
  }

  public function getParameters()
  {
    return $this->params;
  }

  public function getParameter($key)
  {
    return $this->params[$key] ?? null;
  }

  public function getParameterTypes()
  {
    return $this->paramTypes;
  }

  public function getParameterType($key)
  {
    return $this->paramTypes[$key] ?? null;
  }

  public function setFirstResult($firstResult)
  {
    $this->state       = self::STATE_DIRTY;
    $this->firstResult = $firstResult;

    return $this;
  }

  public function getFirstResult()
  {
    return $this->firstResult;
  }

  public function setMaxResults($maxResults)
  {
    $this->state      = self::STATE_DIRTY;
    $this->maxResults = $maxResults;

    return $this;
  }

  public function getMaxResults()
  {
    return $this->maxResults;
  }

  public function add($sqlPartName, $sqlPart, $append = false)
  {
    $isArray    = is_array($sqlPart);
    $isMultiple = is_array($this->sqlParts[$sqlPartName]);

    if ($isMultiple && !$isArray) {
      $sqlPart = [$sqlPart];
    }

    $this->state = self::STATE_DIRTY;

    if ($append) {
      if ($sqlPartName === 'orderBy' || $sqlPartName === 'groupBy' || $sqlPartName === 'select' || $sqlPartName === 'set') {
        foreach ($sqlPart as $part) {
          $this->sqlParts[$sqlPartName][] = $part;
        }
      } elseif ($isArray && is_array($sqlPart[key($sqlPart)])) {
        $key                                  = key($sqlPart);
        $this->sqlParts[$sqlPartName][$key][] = $sqlPart[$key];
      } elseif ($isMultiple) {
        $this->sqlParts[$sqlPartName][] = $sqlPart;
      } else {
        $this->sqlParts[$sqlPartName] = $sqlPart;
      }

      return $this;
    }

    $this->sqlParts[$sqlPartName] = $sqlPart;

    return $this;
  }

  public function select($select = null)
  {
    $this->type = self::SELECT;

    if (empty($select)) {
      return $this;
    }

    $selects = is_array($select) ? $select : func_get_args();

    return $this->add('select', $selects);
  }

  public function distinct(): self
  {
    $this->sqlParts['distinct'] = true;

    return $this;
  }

  public function addSelect($select = null)
  {
    $this->type = self::SELECT;

    if (empty($select)) {
      return $this;
    }

    $selects = is_array($select) ? $select : func_get_args();

    return $this->add('select', $selects, true);
  }

  public function delete($delete = null, $alias = null)
  {
    $this->type = self::DELETE;

    if (!$delete) {
      return $this;
    }

    return $this->add('from', [
      'table' => $delete,
      'alias' => $alias,
    ]);
  }

  public function update($update = null, $alias = null)
  {
    $this->type = self::UPDATE;

    if (!$update) {
      return $this;
    }

    return $this->add('from', [
      'table' => $update,
      'alias' => $alias,
    ]);
  }

  public function insert($insert = null)
  {
    $this->type = self::INSERT;

    if (!$insert) {
      return $this;
    }

    return $this->add('from', ['table' => $insert]);
  }

  public function from($from, $alias = null)
  {
    return $this->add('from', [
      'table' => $from,
      'alias' => $alias,
    ], true);
  }

  public function join($fromAlias, $join, $alias, $condition = null)
  {
    return $this->innerJoin($fromAlias, $join, $alias, $condition);
  }

  public function innerJoin($fromAlias, $join, $alias, $condition = null)
  {
    return $this->add('join', [
      $fromAlias => [
        'joinType'      => 'inner',
        'joinTable'     => $join,
        'joinAlias'     => $alias,
        'joinCondition' => $condition,
      ],
    ], true);
  }

  public function leftJoin($fromAlias, $join, $alias, $condition = null)
  {
    return $this->add('join', [
      $fromAlias => [
        'joinType'      => 'left',
        'joinTable'     => $join,
        'joinAlias'     => $alias,
        'joinCondition' => $condition,
      ],
    ], true);
  }

  public function rightJoin($fromAlias, $join, $alias, $condition = null)
  {
    return $this->add('join', [
      $fromAlias => [
        'joinType'      => 'right',
        'joinTable'     => $join,
        'joinAlias'     => $alias,
        'joinCondition' => $condition,
      ],
    ], true);
  }

  public function set($key, $value)
  {
    return $this->add('set', $key . ' = ' . $value, true);
  }

  public function where($predicates)
  {
    if (!(func_num_args() === 1 && $predicates instanceof Composite)) {
      $predicates = new Composite(Composite::TYPE_AND, func_get_args());
    }

    return $this->add('where', $predicates);
  }

  public function andWhere($where)
  {
    $args  = func_get_args();
    $where = $this->getQueryPart('where');

    if ($where instanceof Composite && $where->getType() === Composite::TYPE_AND) {
      $where->addMultiple($args);
    } else {
      array_unshift($args, $where);
      $where = new Composite(Composite::TYPE_AND, $args);
    }

    return $this->add('where', $where, true);
  }

  public function orWhere($where)
  {
    $args  = func_get_args();
    $where = $this->getQueryPart('where');

    if ($where instanceof Composite && $where->getType() === Composite::TYPE_OR) {
      $where->addMultiple($args);
    } else {
      array_unshift($args, $where);
      $where = new Composite(Composite::TYPE_OR, $args);
    }

    return $this->add('where', $where, true);
  }

  public function groupBy($groupBy)
  {
    if (empty($groupBy)) {
      return $this;
    }

    $groupBy = is_array($groupBy) ? $groupBy : func_get_args();

    return $this->add('groupBy', $groupBy, false);
  }

  public function addGroupBy($groupBy)
  {
    if (empty($groupBy)) {
      return $this;
    }

    $groupBy = is_array($groupBy) ? $groupBy : func_get_args();

    return $this->add('groupBy', $groupBy, true);
  }

  public function setValue($column, $value)
  {
    $this->sqlParts['values'][$column] = $value;

    return $this;
  }

  public function values(array $values)
  {
    return $this->add('values', $values);
  }


  public function having($having)
  {
    if (!(func_num_args() === 1 && $having instanceof Composite)) {
      $having = new Composite(Composite::TYPE_AND, func_get_args());
    }

    return $this->add('having', $having);
  }

  public function andHaving($having)
  {
    $args   = func_get_args();
    $having = $this->getQueryPart('having');

    if ($having instanceof Composite && $having->getType() === Composite::TYPE_AND) {
      $having->addMultiple($args);
    } else {
      array_unshift($args, $having);
      $having = new Composite(Composite::TYPE_AND, $args);
    }

    return $this->add('having', $having);
  }

  public function orHaving($having)
  {
    $args   = func_get_args();
    $having = $this->getQueryPart('having');

    if ($having instanceof Composite && $having->getType() === Composite::TYPE_OR) {
      $having->addMultiple($args);
    } else {
      array_unshift($args, $having);
      $having = new Composite(Composite::TYPE_OR, $args, $this->connection);
    }

    return $this->add('having', $having);
  }

  public function orderBy($sort, $order = null)
  {
    return $this->add('orderBy', $sort . ' ' . (!$order ? 'ASC' : $order), false);
  }

  public function addOrderBy($sort, $order = null)
  {
    return $this->add('orderBy', $sort . ' ' . (!$order ? 'ASC' : $order), true);
  }

  public function getQueryPart($queryPartName)
  {
    return $this->sqlParts[$queryPartName];
  }

  public function getQueryParts()
  {
    return $this->sqlParts;
  }

  public function resetQueryParts($queryPartNames = null)
  {
    if ($queryPartNames === null) {
      $queryPartNames = array_keys($this->sqlParts);
    }

    foreach ($queryPartNames as $queryPartName) {
      $this->resetQueryPart($queryPartName);
    }

    return $this;
  }

  public function resetQueryPart($queryPartName)
  {
    $this->sqlParts[$queryPartName] = self::SQL_PARTS_DEFAULTS[$queryPartName];

    $this->state = self::STATE_DIRTY;

    return $this;
  }

  private function getSQLForSelect()
  {
    $query = 'SELECT ' . ($this->sqlParts['distinct'] ? 'DISTINCT ' : '') .
      implode(', ', $this->sqlParts['select']);

    $query .= ($this->sqlParts['from'] ? ' FROM ' . implode(', ', $this->getFromClauses()) : '')
      . ($this->sqlParts['where'] !== null ? ' WHERE ' . ((string) $this->sqlParts['where']) : '')
      . ($this->sqlParts['groupBy'] ? ' GROUP BY ' . implode(', ', $this->sqlParts['groupBy']) : '')
      . ($this->sqlParts['having'] !== null ? ' HAVING ' . ((string) $this->sqlParts['having']) : '')
      . ($this->sqlParts['orderBy'] ? ' ORDER BY ' . implode(', ', $this->sqlParts['orderBy']) : '');

    return $query;
  }

  private function getFromClauses()
  {
    $fromClauses  = [];
    $knownAliases = [];

    foreach ($this->sqlParts['from'] as $from) {
      if ($from['alias'] === null) {
        $tableSql       = $from['table'];
        $tableReference = $from['table'];
      } else {
        $tableSql       = $from['table'] . ' ' . $from['alias'];
        $tableReference = $from['alias'];
      }

      $knownAliases[$tableReference] = true;

      $fromClauses[$tableReference] = $tableSql . $this->getSQLForJoins($tableReference, $knownAliases);
    }

    return $fromClauses;
  }

  private function getSQLForInsert()
  {
    return 'INSERT INTO ' . $this->sqlParts['from']['table'] .
      ' (' . implode(', ', array_keys($this->sqlParts['values'])) . ')' .
      ' VALUES(' . implode(', ', $this->sqlParts['values']) . ')';
  }

  private function getSQLForUpdate()
  {
    $table = $this->sqlParts['from']['table'] . ($this->sqlParts['from']['alias'] ? ' ' . $this->sqlParts['from']['alias'] : '');

    return 'UPDATE ' . $table
      . ' SET ' . implode(', ', $this->sqlParts['set'])
      . ($this->sqlParts['where'] !== null ? ' WHERE ' . ((string) $this->sqlParts['where']) : '');
  }

  private function getSQLForDelete()
  {
    $table = $this->sqlParts['from']['table'] . ($this->sqlParts['from']['alias'] ? ' ' . $this->sqlParts['from']['alias'] : '');

    return 'DELETE FROM ' . $table . ($this->sqlParts['where'] !== null ? ' WHERE ' . ((string) $this->sqlParts['where']) : '');
  }

  public function __toString()
  {
    return $this->getSQL();
  }

  public function createNamedParameter($value, $type = self::STRING, $placeHolder = null)
  {
    if ($placeHolder === null) {
      $this->boundCounter++;
      $placeHolder = ':dcValue' . $this->boundCounter;
    }
    $this->setParameter(substr($placeHolder, 1), $value, $type);

    return $placeHolder;
  }

  public function createPositionalParameter($value, $type = self::STRING)
  {
    $this->boundCounter++;
    $this->setParameter($this->boundCounter, $value, $type);

    return '?';
  }

  private function getSQLForJoins($fromAlias, array &$knownAliases)
  {
    $sql = '';

    if (isset($this->sqlParts['join'][$fromAlias])) {
      foreach ($this->sqlParts['join'][$fromAlias] as $join) {
        if (array_key_exists($join['joinAlias'], $knownAliases)) {
          throw self::nonUniqueAlias($join['joinAlias'], array_keys($knownAliases));
        }
        $sql .= ' ' . strtoupper($join['joinType'])
          . ' JOIN ' . $join['joinTable'] . ' ' . $join['joinAlias'];
        if ($join['joinCondition'] !== null) {
          $sql .= ' ON ' . $join['joinCondition'];
        }
        $knownAliases[$join['joinAlias']] = true;
      }

      foreach ($this->sqlParts['join'][$fromAlias] as $join) {
        $sql .= $this->getSQLForJoins($join['joinAlias'], $knownAliases);
      }
    }

    return $sql;
  }

  public function __clone()
  {
    foreach ($this->sqlParts as $part => $elements) {
      if (is_array($this->sqlParts[$part])) {
        foreach ($this->sqlParts[$part] as $idx => $element) {
          if (!is_object($element)) {
            continue;
          }

          $this->sqlParts[$part][$idx] = clone $element;
        }
      } elseif (is_object($elements)) {
        $this->sqlParts[$part] = clone $elements;
      }
    }

    foreach ($this->params as $name => $param) {
      if (!is_object($param)) {
        continue;
      }

      $this->params[$name] = clone $param;
    }
  }

  public static function unknownAlias($alias, $registeredAliases)
  {
    return "Given alias" . $alias . "not part of FROM or JOIN clause table. alias is:" . implode(',', $registeredAliases);
  }

  public static function nonUniqueAlias($alias, $registeredAliases)
  {
    return "Given alias" . $alias . "not unique in the FROM and JOIN clause tables. alias is:" . implode(',', $registeredAliases);
  }
}
