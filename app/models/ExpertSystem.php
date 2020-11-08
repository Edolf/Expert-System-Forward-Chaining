<?php

namespace app\models;

use app\core\Model;

class ExpertSystem extends Model
{
  public static function tableName(): string
  {
    return 'ExpertSystems';
  }

  public static function attributes(): array
  {
    return [
      'problem' => ['type' => 'STRING'],
      'desc' => ['type' => 'TEXT']
    ];
  }

  public static function primaryKey(): array
  {
    return [
      self::PRIMARY_KEY => ['type' => 'INTEGER', 'autoIncrement' => true]
    ];
  }

  public static function timeStamp(): array
  {
    return [self::CREATED_AT, self::UPDATED_AT];
  }
}
