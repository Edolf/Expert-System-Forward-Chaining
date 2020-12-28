<?php

namespace app\models;

use app\core\Model;

class User extends Model
{
  public static function tableName(): string
  {
    return 'users';
  }

  public static function attributes(): array
  {
    return [
      'name' => ['type' => 'STRING'],
      'username' => ['type' => 'STRING'],
      'email' => ['type' => 'STRING'],
      'image' => ['type' => 'BLOB'],
      'role' => ['type' => 'STRING'],
      'verifiedAt' => ['type' => 'DATE'],
      'password' => ['type' => 'STRING'],
      'rememberme' => ['type' => 'STRING'],
      'token' => ['type' => 'STRING'],
      'other' => ['type' => 'JSON']
    ];
  }

  public static function primaryKey(): array
  {
    return [
      self::PRIMARY_KEY => ['type' => 'UUID']
    ];
  }

  public static function timeStamp(): array
  {
    return [self::CREATED_AT, self::UPDATED_AT];
  }
}
