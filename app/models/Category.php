<?php

namespace app\models;

use app\core\Model;

class Category extends Model
{
  public static function tableName(): string
  {
    return 'Categories';
  }

  public static function attributes(): array
  {
    return ['name', 'url'];
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
