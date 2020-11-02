<?php

namespace app\models;

use app\core\Authenticate;
use app\core\Model;

class User extends Model
{
  public static function tableName(): string
  {
    return 'Users';
  }

  public static function attributes(): array
  {
    return ['name', 'username', 'email', 'image', 'role', 'verifiedAt', 'password', 'rememberme', 'token', 'other'];
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
