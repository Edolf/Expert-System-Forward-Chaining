<?php

namespace app\models;

use app\core\Authenticate;
use app\core\Model;

class ExpertSystem extends Model
{
  public static function tableName(): string
  {
    return 'ExpertSystems';
  }

  public static function attributes(): array
  {
    return ['problem'];
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
