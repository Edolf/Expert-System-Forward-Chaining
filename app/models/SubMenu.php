<?php

namespace app\models;

use app\core\Model;

class SubMenu extends Model
{
  public static function tableName(): string
  {
    return 'SubMenus';
  }

  public static function attributes(): array
  {
    return ['menuId', 'title', 'url', 'icon', 'isActive', 'other'];
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
