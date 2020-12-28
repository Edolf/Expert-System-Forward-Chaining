<?php

namespace app\models;

use app\core\Model;

class SubMenu extends Model
{
  public static function tableName(): string
  {
    return 'submenus';
  }

  public static function attributes(): array
  {
    return [
      'menuId' => ['type' => 'INTEGER'],
      'title' => ['type' => 'STRING'],
      'url' => ['type' => 'STRING'],
      'icon' => ['type' => 'STRING'],
      'isActive' => ['type' => 'BOOLEAN'],
      'other' => ['type' => 'JSON']
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
