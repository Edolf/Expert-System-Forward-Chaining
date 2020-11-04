<?php

namespace app\models;

use app\core\Model;

class PasswordReset extends Model
{
  public static function tableName(): string
  {
    return 'PasswordResets';
  }

  public static function attributes(): array
  {
    return [
      'email' => ['type' => 'STRING'],
      'token' => ['type' => 'STRING']
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
    return [self::CREATED_AT];
  }
}
