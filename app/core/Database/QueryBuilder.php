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

  /**
   * <code>
   *     $qb = $conn->createQueryBuilder()
   *         ->select('u')
   *         ->from('users', 'u')
   *         ->where($qb->expr()->eq('u.id', 1));
   * </code>
   */
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
    if ($this->type === self::SELECT) {
      return $this->connection->executeQuery($this->getSQL(), $this->params, $this->paramTypes);
    }

    return $this->connection->executeUpdate($this->getSQL(), $this->params, $this->paramTypes);
  }

  /**
   * <code>
   *     $qb = $em->createQueryBuilder()
   *         ->select('u')
   *         ->from('User', 'u')
   *     echo $qb->getSQL(); // SELECT u FROM User u
   * </code>
   */
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

  /**
   * <code>
   *     $qb = $conn->createQueryBuilder()
   *         ->select('u')
   *         ->from('users', 'u')
   *         ->where('u.id = :user_id')
   *         ->setParameter(':user_id', 1);
   * </code>
   */
  public function setParameter($key, $value, $type = null)
  {
    if ($type !== null) {
      $this->paramTypes[$key] = $type;
    }

    $this->params[$key] = $value;

    return $this;
  }

  /**
   * <code>
   *     $qb = $conn->createQueryBuilder()
   *         ->select('u')
   *         ->from('users', 'u')
   *         ->where('u.id = :user_id1 OR u.id = :user_id2')
   *         ->setParameters(array(
   *             ':user_id1' => 1,
   *             ':user_id2' => 2
   *         ));
   * </code>
   */
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

  /**
   * <code>
   *     $qb = $conn->createQueryBuilder()
   *         ->select('u.id', 'p.id')
   *         ->from('users', 'u')
   *         ->leftJoin('u', 'phonenumbers', 'p', 'u.id = p.user_id');
   * </code>
   */
  public function select($select = null)
  {
    $this->type = self::SELECT;

    if (empty($select)) {
      return $this;
    }

    $selects = is_array($select) ? $select : func_get_args();

    return $this->add('select', $selects);
  }

  /**
   * <code>
   *     $qb = $conn->createQueryBuilder()
   *         ->select('u.id')
   *         ->distinct()
   *         ->from('users', 'u')
   * </code>
   */
  public function distinct(): self
  {
    $this->sqlParts['distinct'] = true;

    return $this;
  }

  /**
   * <code>
   *     $qb = $conn->createQueryBuilder()
   *         ->select('u.id')
   *         ->addSelect('p.id')
   *         ->from('users', 'u')
   *         ->leftJoin('u', 'phonenumbers', 'u.id = p.user_id');
   * </code>
   */
  public function addSelect($select = null)
  {
    $this->type = self::SELECT;

    if (empty($select)) {
      return $this;
    }

    $selects = is_array($select) ? $select : func_get_args();

    return $this->add('select', $selects, true);
  }

  /**
   * <code>
   *     $qb = $conn->createQueryBuilder()
   *         ->delete('users', 'u')
   *         ->where('u.id = :user_id')
   *         ->setParameter(':user_id', 1);
   * </code>
   */
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

  /**
   * <code>
   *     $qb = $conn->createQueryBuilder()
   *         ->update('counters', 'c')
   *         ->set('c.value', 'c.value + 1')
   *         ->where('c.id = ?');
   * </code>
   */
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

  /**
   * <code>
   *     $qb = $conn->createQueryBuilder()
   *         ->insert('users')
   *         ->values(
   *             array(
   *                 'name' => '?',
   *                 'password' => '?'
   *             )
   *         );
   * </code>
   */
  public function insert($insert = null)
  {
    $this->type = self::INSERT;

    if (!$insert) {
      return $this;
    }

    return $this->add('from', ['table' => $insert]);
  }

  /**
   * <code>
   *     $qb = $conn->createQueryBuilder()
   *         ->select('u.id')
   *         ->from('users', 'u')
   * </code>
   */
  public function from($from, $alias = null)
  {
    return $this->add('from', [
      'table' => $from,
      'alias' => $alias,
    ], true);
  }

  /**
   * <code>
   *     $qb = $conn->createQueryBuilder()
   *         ->select('u.name')
   *         ->from('users', 'u')
   *         ->join('u', 'phonenumbers', 'p', 'p.is_primary = 1');
   * </code>
   */
  public function join($fromAlias, $join, $alias, $condition = null)
  {
    return $this->innerJoin($fromAlias, $join, $alias, $condition);
  }

  /**
   * <code>
   *     $qb = $conn->createQueryBuilder()
   *         ->select('u.name')
   *         ->from('users', 'u')
   *         ->innerJoin('u', 'phonenumbers', 'p', 'p.is_primary = 1');
   * </code>
   */
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

  /**
   * <code>
   *     $qb = $conn->createQueryBuilder()
   *         ->select('u.name')
   *         ->from('users', 'u')
   *         ->leftJoin('u', 'phonenumbers', 'p', 'p.is_primary = 1');
   * </code>
   */
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

  /**
   * <code>
   *     $qb = $conn->createQueryBuilder()
   *         ->select('u.name')
   *         ->from('users', 'u')
   *         ->rightJoin('u', 'phonenumbers', 'p', 'p.is_primary = 1');
   * </code>
   */
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

  /**
   * <code>
   *     $qb = $conn->createQueryBuilder()
   *         ->update('counters', 'c')
   *         ->set('c.value', 'c.value + 1')
   *         ->where('c.id = ?');
   * </code>
   */
  public function set($key, $value)
  {
    return $this->add('set', $key . ' = ' . $value, true);
  }

  /**
   * <code>
   *     $qb = $conn->createQueryBuilder()
   *         ->select('c.value')
   *         ->from('counters', 'c')
   *         ->where('c.id = ?');
   *
   *     // You can optionally programatically build and/or expressions
   *     $qb = $conn->createQueryBuilder();
   *
   *     $or = $qb->expr()->orx();
   *     $or->add($qb->expr()->eq('c.id', 1));
   *     $or->add($qb->expr()->eq('c.id', 2));
   *
   *     $qb->update('counters', 'c')
   *         ->set('c.value', 'c.value + 1')
   *         ->where($or);
   * </code>
   */
  public function where($predicates)
  {
    if (!(func_num_args() === 1 && $predicates instanceof Expression)) {
      $predicates = new Expression(Expression::TYPE_AND, func_get_args(), $this->connection);
    }

    return $this->add('where', $predicates);
  }

  /**
   * <code>
   *     $qb = $conn->createQueryBuilder()
   *         ->select('u')
   *         ->from('users', 'u')
   *         ->where('u.username LIKE ?')
   *         ->andWhere('u.is_active = 1');
   * </code>
   */
  public function andWhere($where)
  {
    $args  = func_get_args();
    $where = $this->getQueryPart('where');

    if ($where instanceof Expression && $where->getType() === Expression::TYPE_AND) {
      $where->addMultiple($args);
    } else {
      array_unshift($args, $where);
      $where = new Expression(Expression::TYPE_AND, $args, $this->connection);
    }

    return $this->add('where', $where, true);
  }

  /**
   * <code>
   *     $qb = $em->createQueryBuilder()
   *         ->select('u.name')
   *         ->from('users', 'u')
   *         ->where('u.id = 1')
   *         ->orWhere('u.id = 2');
   * </code>
   */
  public function orWhere($where)
  {
    $args  = func_get_args();
    $where = $this->getQueryPart('where');

    if ($where instanceof Expression && $where->getType() === Expression::TYPE_OR) {
      $where->addMultiple($args);
    } else {
      array_unshift($args, $where);
      $where = new Expression(Expression::TYPE_OR, $args, $this->connection);
    }

    return $this->add('where', $where, true);
  }

  /**
   * <code>
   *     $qb = $conn->createQueryBuilder()
   *         ->select('u.name')
   *         ->from('users', 'u')
   *         ->groupBy('u.id');
   * </code>
   */
  public function groupBy($groupBy)
  {
    if (empty($groupBy)) {
      return $this;
    }

    $groupBy = is_array($groupBy) ? $groupBy : func_get_args();

    return $this->add('groupBy', $groupBy, false);
  }

  /**
   * <code>
   *     $qb = $conn->createQueryBuilder()
   *         ->select('u.name')
   *         ->from('users', 'u')
   *         ->groupBy('u.lastLogin')
   *         ->addGroupBy('u.createdAt');
   * </code>
   */
  public function addGroupBy($groupBy)
  {
    if (empty($groupBy)) {
      return $this;
    }

    $groupBy = is_array($groupBy) ? $groupBy : func_get_args();

    return $this->add('groupBy', $groupBy, true);
  }

  /**
   * <code>
   *     $qb = $conn->createQueryBuilder()
   *         ->insert('users')
   *         ->values(
   *             array(
   *                 'name' => '?'
   *             )
   *         )
   *         ->setValue('password', '?');
   * </code>
   */
  public function setValue($column, $value)
  {
    $this->sqlParts['values'][$column] = $value;

    return $this;
  }

  /**
   * <code>
   *     $qb = $conn->createQueryBuilder()
   *         ->insert('users')
   *         ->values(
   *             array(
   *                 'name' => '?',
   *                 'password' => '?'
   *             )
   *         );
   * </code>
   */
  public function values(array $values)
  {
    return $this->add('values', $values);
  }


  public function having($having)
  {
    if (!(func_num_args() === 1 && $having instanceof Expression)) {
      $having = new Expression(Expression::TYPE_AND, func_get_args(), $this->connection);
    }

    return $this->add('having', $having);
  }

  public function andHaving($having)
  {
    $args   = func_get_args();
    $having = $this->getQueryPart('having');

    if ($having instanceof Expression && $having->getType() === Expression::TYPE_AND) {
      $having->addMultiple($args);
    } else {
      array_unshift($args, $having);
      $having = new Expression(Expression::TYPE_AND, $args, $this->connection);
    }

    return $this->add('having', $having);
  }

  public function orHaving($having)
  {
    $args   = func_get_args();
    $having = $this->getQueryPart('having');

    if ($having instanceof Expression && $having->getType() === Expression::TYPE_OR) {
      $having->addMultiple($args);
    } else {
      array_unshift($args, $having);
      $having = new Expression(Expression::TYPE_OR, $args, $this->connection);
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

    // Loop through all FROM clauses
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

  /**
   * <code>
   * $value = 2;
   * $q->eq( 'id', $q->bindValue( $value ) );
   * $stmt = $q->executeQuery(); // executed with 'id = 2'
   * </code>
   */
  public function createNamedParameter($value, $type = self::STRING, $placeHolder = null)
  {
    if ($placeHolder === null) {
      $this->boundCounter++;
      $placeHolder = ':dcValue' . $this->boundCounter;
    }
    $this->setParameter(substr($placeHolder, 1), $value, $type);

    return $placeHolder;
  }

  /**
   * <code>
   *  $qb = $conn->createQueryBuilder();
   *  $qb->select('u.*')
   *     ->from('users', 'u')
   *     ->where('u.username = ' . $qb->createPositionalParameter('Foo', self::STRING))
   *     ->orWhere('u.username = ' . $qb->createPositionalParameter('Bar', self::STRING))
   * </code>
   */
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

  // public function __clone()
  // {
  //   foreach ($this->sqlParts as $part => $elements) {
  //     if (is_array($this->sqlParts[$part])) {
  //       foreach ($this->sqlParts[$part] as $idx => $element) {
  //         if (!is_object($element)) {
  //           continue;
  //         }

  //         $this->sqlParts[$part][$idx] = clone $element;
  //       }
  //     } elseif (is_object($elements)) {
  //       $this->sqlParts[$part] = clone $elements;
  //     }
  //   }

  //   foreach ($this->params as $name => $param) {
  //     if (!is_object($param)) {
  //       continue;
  //     }

  //     $this->params[$name] = clone $param;
  //   }
  // }

  public function getQueryResult()
  {
    $statement = Application::$app->connection->prepare($this->getSQL());
    $statement->execute();
    return $statement->fetchAll();
  }

  public static function unknownAlias($alias, $registeredAliases)
  {
    return "The given alias '" . $alias . "' is not part of " .
      'any FROM or JOIN clause table. The currently registered ' .
      'aliases are: ' . implode(', ', $registeredAliases);
  }

  public static function nonUniqueAlias($alias, $registeredAliases)
  {
    return "The given alias '" . $alias . "' is not unique " .
      'in FROM and JOIN clause table. The currently registered ' .
      'aliases are: ' . implode(', ', $registeredAliases);
  }
}
