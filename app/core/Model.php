<?php

namespace app\core;

abstract class Model
{
  const PRIMARY_KEY = 'id';
  const CREATED_AT  = 'createdAt';
  const UPDATED_AT  = 'updatedAt';

  const OR   = 'OR_LOGIC';
  const AND  = 'AND_LOGIC';
  // const NOT  = 'NOT_LOGIC';
  // const LIKE = 'LIKE_LOGIC';
  // const IN   = 'IN_LOGIC';

  abstract public static function tableName(): string;

  abstract public static function attributes(): array;

  abstract public static function primaryKey(): array;

  abstract public static function timeStamp(): array;

  public static function query()
  {
    return Application::$app->connection->createQueryBuilder();
  }

  public static function findAll(array $where = [], $callback = '')
  {
    try {
      if (!empty($where)) {
        $statement = self::setQueryForWhereLogic(array_keys($where)[0], $where[array_keys($where)[0]], self::query()->select('*')->from(static::tableName()));
      } else {
        $statement = self::prepare(self::query()
          ->select('*')->from(static::tableName()));
      }
      $statement->execute();
      if ($callback) {
        return call_user_func($callback, $statement->fetchAll(), $error = '');
      }
      return $statement->fetchAll();
    } catch (\Throwable $th) {
      if ($callback) {
        return call_user_func($callback, $statement = '', $error = $th);
      }
      return $th;
    }
  }

  public static function findOne(array $where, $callback = '')
  {
    try {
      $statement = self::setQueryForWhereLogic(array_keys($where)[0], $where[array_keys($where)[0]], self::query()->select('*')->from(static::tableName()));
      $statement->execute();
      if ($callback) {
        return call_user_func($callback, $statement->fetchObject(static::class), $error = '');
      }
      return $statement->fetchObject(static::class);
    } catch (\Throwable $th) {
      if ($callback) {
        return call_user_func($callback, $statement = '', $error = $th);
      }
      return $th;
    }
  }

  public static function create(array $options, $callback = '')
  {
    try {
      $values = self::makeId($options[array_keys(static::primaryKey())[0]] ?? null) ?? [];
      foreach (static::attributes() as $key => $value) {
        $values[$key] = "'$options[$key]'";
      }
      foreach (static::timeStamp() as $time) {
        $values[$time] = "'" . date("Y-m-d H:i:s") . "'";
      }

      $statement = self::prepare(self::query()->insert(static::tableName())->values($values));
      $statement->execute();
      if ($callback) {
        return call_user_func($callback, $statement->rowCount(), $error = '');
      }
      return $statement->rowCount();
    } catch (\Throwable $th) {
      if ($callback) {
        return call_user_func($callback, $statement->rowCount(), $error = $th);
      }
      return $th;
    }
  }

  public static function update(array $attributes = [], array $where = [], $callback = '')
  {
    try {
      $values = [];
      foreach (static::attributes() as $key => $value) {
        $values[] = static::tableName() . ".$key = '$attributes[$key]'";
      }
      $values[] = static::tableName() . "." . static::timeStamp()[1] . " = '" . date("Y-m-d H:i:s") . "'";
      $statement = self::setQueryForWhereLogic(array_keys($where)[0], $where[array_keys($where)[0]], self::query()->update(static::tableName())->add('set', $values, true));
      $statement->execute();
      if ($callback) {
        return call_user_func($callback, $statement->rowCount(), $error = '');
      }
      return $statement->rowCount();
    } catch (\Throwable $th) {
      if ($callback) {
        return call_user_func($callback, $statement->rowCount(), $error = $th);
      }
      return $th;
    }
  }

  public static function destroy(array $where = [], $callback = '')
  {
    try {
      $key = array_keys($where)[0];
      $value = $where[$key];
      $statement = self::prepare(self::query()->delete(static::tableName())->where(static::tableName() . '.' . $key . " = '$value'"));
      $statement->execute();
      if ($callback) {
        return call_user_func($callback, $statement->rowCount(), $error = '');
      }
      return $statement->rowCount();
    } catch (\Throwable $th) {
      if ($callback) {
        return call_user_func($callback, $statement->rowCount(), $error = $th);
      }
      return $th;
    }
  }

  private static function prepare($sql): \PDOStatement
  {
    return Application::$app->connection->prepare($sql);
  }

  private static function setQueryForWhereLogic($key, $value, $beginQuery)
  {
    if ($key === self::OR || $key === self::AND) {
      $whereLogic = [];
      foreach ($value as $k => $val) {
        $whereLogic[] = static::tableName() . "." . $k . " = '$val'";
      }
      $logic = $key === self::AND ? 'AND' : $key === self::NOT;
      return self::prepare($beginQuery->where(implode(" $logic ", $whereLogic)));
      // } elseif ($key === self::NOT) {

    } else {
      return self::prepare($beginQuery->where(static::tableName() . "." . $key . " = '$value'"));
    }
  }

  private static function makeId($id)
  {
    switch (static::primaryKey()[array_keys(static::primaryKey())[0]]['type']) {
      case 'UUID':
        return [array_keys(static::primaryKey())[0] => "'" . self::UUID(openssl_random_pseudo_bytes(16)) . "'"];
        break;
      case 'INTEGER':
        if (!(static::primaryKey()[array_keys(static::primaryKey())[0]]['autoIncrement'])) {
          return [array_keys(static::primaryKey())[0] => "'$id'"];
        }
        break;
    }
  }

  private static function UUID($data)
  {
    assert(strlen($data) == 16);

    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10

    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
  }
}
