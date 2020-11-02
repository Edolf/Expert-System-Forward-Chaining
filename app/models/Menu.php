<?php

namespace app\models;

use app\core\Model;

class Menu extends Model
{
  public static function tableName(): string
  {
    return 'Menu';
  }

  public static function attributes(): array
  {
    return ['menu', 'isActive', 'other'];
  }

  public static function primaryKey(): string
  {
    return self::PRIMARY_KEY;
  }

  public static function timeStamp(): array
  {
    return [self::CREATED_AT, self::UPDATED_AT];
  }
}
