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
    return ['name', 'url', 'categoryId'];
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
