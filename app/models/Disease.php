<?php

namespace app\models;

use app\core\Authenticate;
use app\core\Model;

class Disease extends Model
{
  public static function tableName(): string
  {
    return 'Diseases';
  }

  public static function attributes(): array
  {
    return ['name', 'desc', 'solution', 'expertSystemId'];
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
