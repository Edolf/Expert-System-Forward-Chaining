<?php

namespace app\models;

use app\core\Model;

class Navbar extends Model
{
  public static function tableName(): string
  {
    return 'Navbars';
  }

  public static function attributes(): array
  {
    return [
      'name' => ['type' => 'STRING'],
      'url' => ['type' => 'STRING'],
      'categoryId' => ['type' => 'INTEGER']
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
