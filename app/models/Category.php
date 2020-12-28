<?php

namespace app\models;

use app\core\Model;

class Category extends Model
{
  public static function tableName(): string
  {
    return 'categories';
  }

  public static function attributes(): array
  {
    return [
      'name' => ['type' => 'STRING'],
      'url' => ['type' => 'STRING']
    ];
  }

  public static function primaryKey(): array
  {
    return [
      self::PRIMARY_KEY => ['type' => 'INTEGER', 'autoIncrement' => true]
    ];
  }

  public static function timeStamp(): array
  {
    return [self::CREATED_AT, self::UPDATED_AT];
  }
}
