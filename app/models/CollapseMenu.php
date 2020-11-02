<?php

namespace app\models;

use app\core\Model;

class CollapseMenu extends Model
{
  public static function tableName(): string
  {
    return 'CollapseMenus';
  }

  public static function attributes(): array
  {
    return ['subMenuId', 'title', 'url', 'isActive', 'other'];
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
