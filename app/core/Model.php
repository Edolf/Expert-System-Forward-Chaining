<?php

namespace app\core;

abstract class Model
{
  const PRIMARY_KEY = 'id';
  const CREATED_AT = 'createdAt';
  const UPDATED_AT = 'updatedAt';

  abstract public static function tableName(): string;

  abstract public static function attributes(): array;

  abstract public static function primaryKey(): string;

  abstract public static function timeStamp(): array;

  public static function query()
  {
    return Application::$app->connection->createQueryBuilder();
  }

  public static function all($callback = '')
  {
    try {
      $statement = self::prepare(Application::$app->connection->createQueryBuilder()
        ->select('*')
        ->from(static::tableName()));
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

  public static function findAll($options, $callback = '')
  {
    try {
      $key = array_keys($options)[0];
      $value = $options[$key];
      $statement = self::prepare(
        Application::$app->connection->createQueryBuilder()
          ->select('*')->from(static::tableName())->where(static::tableName() . "." . $key . " = '$value'")
      );
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

  public static function findOne($options, $callback = '')
  {
    try {
      $key = array_keys($options)[0];
      $value = $options[$key];
      $statement = self::prepare(
        Application::$app->connection->createQueryBuilder()
          ->select('*')->from(static::tableName())->where(static::tableName() . "." . $key . " = '$value'")
      );
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

  // // Update the model in the database.
  // public static function update(array $attributes = [], array $options = [])
  // {
  // }

  public static function create(array $options, $callback = '')
  {
    try {
      $uuid = self::UUID(openssl_random_pseudo_bytes(16));
      $values[static::primaryKey()] = "'$uuid'";
      foreach (static::attributes() as $value) {
        $values[$value] = "'$options[$value]'";
      }
      foreach (static::timeStamp() as $time) {
        $now = date("Y-m-d H:i:s");
        $values[$time] = "'$now'";
      }

      $statement = self::prepare(
        Application::$app->connection->createQueryBuilder()
          ->insert(static::tableName())->values($values)
      );
      $statement->execute();
      if ($callback) {
        return call_user_func($callback, $statement->rowCount(), $error = '');
      }
      return $statement->rowCount();
    } catch (\Throwable $th) {
      if ($callback) {
        return call_user_func($callback, $statement->rowCount(), $error = $th);
      }
      return $statement->rowCount();
    }
  }

  // // Destroy the models for the given IDs.
  // public static function destroy($ids)
  // {
  // }

  // // Delete the model from the database.
  // public static function delete()
  // {
  // }

  private static function prepare($sql): \PDOStatement
  {
    return Application::$app->connection->prepare($sql);
  }

  public static function UUID($data)
  {
    assert(strlen($data) == 16);

    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10

    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
  }
}
