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
    $statement = self::prepare(Application::$app->connection->createQueryBuilder()
      ->select('*')
      ->from(static::tableName()));
    $statement->execute();
    if ($callback) {
      return call_user_func($callback, $statement->fetchAll());
    }
    return $statement->fetchAll();
  }

  public static function findAll($options, $callback = '')
  {
    $key = array_keys($options)[0];
    $value = $options[$key];
    $statement = self::prepare(
      Application::$app->connection->createQueryBuilder()
        ->select('*')->from(static::tableName())->where(static::tableName() . "." . $key . " = '$value'")
    );
    $statement->execute();
    if ($callback) {
      return call_user_func($callback, $statement->fetchAll());
    }
    return $statement->fetchAll();
  }

  public static function findOne($options, $callback = '')
  {
    $key = array_keys($options)[0];
    $value = $options[$key];
    $statement = self::prepare(
      Application::$app->connection->createQueryBuilder()
        ->select('*')->from(static::tableName())->where(static::tableName() . "." . $key . " = '$value'")
    );
    $statement->execute();
    if ($callback) {
      return call_user_func($callback, $statement->fetchObject(static::class));
    }
    return $statement->fetchObject(static::class);
  }

  // // Update the model in the database.
  // public static function update(array $attributes = [], array $options = [])
  // {
  // }

  // // Save the model to the database.
  // public static function save(array $options = [])
  // {
  // }

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

  // $this->password = password_hash($this->password, PASSWORD_DEFAULT);
}
