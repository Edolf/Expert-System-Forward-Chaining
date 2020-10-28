<?php

namespace app\core\Database;

use Countable;
use function count;
use function implode;

class Expression implements Countable
{
    public const EQ  = '=';
    public const NEQ = '<>';
    public const LT  = '<';
    public const LTE = '<=';
    public const GT  = '>';
    public const GTE = '>=';

    public const TYPE_AND = 'AND';
    public const TYPE_OR = 'OR';
    private $type;
    private $parts = [];

    private $connection;

    public function __construct($type, array $parts = [], Connection $connection)
    {
        $this->type = $type;
        $this->connection = $connection;
        $this->addMultiple($parts);
    }

    public function addMultiple(array $parts = [])
    {
        foreach ($parts as $part) {
            $this->add($part);
        }

        return $this;
    }

    public function add($part)
    {
        if (empty($part)) {
            return $this;
        }

        if ($part instanceof self && count($part) === 0) {
            return $this;
        }

        $this->parts[] = $part;

        return $this;
    }

    public function count()
    {
        return count($this->parts);
    }

    public function __toString()
    {
        if ($this->count() === 1) {
            return (string) $this->parts[0];
        }

        return '(' . implode(') ' . $this->type . ' (', $this->parts) . ')';
    }

    public function getType()
    {
        return $this->type;
    }

    public function andX($x = null)
    {
        return new self(self::TYPE_AND, func_get_args());
    }

    public function orX($x = null)
    {
        return new self(self::TYPE_OR, func_get_args());
    }

    public function comparison($x, $operator, $y)
    {
        return $x . ' ' . $operator . ' ' . $y;
    }

    public function eq($x, $y)
    {
        return $this->comparison($x, self::EQ, $y);
    }

    public function neq($x, $y)
    {
        return $this->comparison($x, self::NEQ, $y);
    }

    public function lt($x, $y)
    {
        return $this->comparison($x, self::LT, $y);
    }

    public function lte($x, $y)
    {
        return $this->comparison($x, self::LTE, $y);
    }

    public function gt($x, $y)
    {
        return $this->comparison($x, self::GT, $y);
    }

    public function gte($x, $y)
    {
        return $this->comparison($x, self::GTE, $y);
    }

    public function isNull($x)
    {
        return $x . ' IS NULL';
    }

    public function isNotNull($x)
    {
        return $x . ' IS NOT NULL';
    }

    public function like($x, $y/*, ?string $escapeChar = null */)
    {
        return $this->comparison($x, 'LIKE', $y) .
            (func_num_args() >= 3 ? sprintf(' ESCAPE %s', func_get_arg(2)) : '');
    }

    public function notLike($x, $y/*, ?string $escapeChar = null */)
    {
        return $this->comparison($x, 'NOT LIKE', $y) .
            (func_num_args() >= 3 ? sprintf(' ESCAPE %s', func_get_arg(2)) : '');
    }

    public function in($x, $y)
    {
        return $this->comparison($x, 'IN', '(' . implode(', ', (array) $y) . ')');
    }

    public function notIn($x, $y)
    {
        return $this->comparison($x, 'NOT IN', '(' . implode(', ', (array) $y) . ')');
    }
}
