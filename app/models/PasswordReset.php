<?php

namespace app\models;

use app\core\Authenticate;
use app\core\Model;

class PasswordReset extends Model
{
  public static function tableName(): string
  {
    return 'PasswordResets';
  }

  public static function attributes(): array
  {
    return ['email', 'token'];
  }

  public static function primaryKey(): string
  {
    return self::PRIMARY_KEY;
  }

  public static function timeStamp(): array
  {
    return [self::CREATED_AT];
  }
}
