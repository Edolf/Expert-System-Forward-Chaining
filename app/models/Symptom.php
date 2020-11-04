<?php

namespace app\models;

use app\core\Model;

class Symptom extends Model
{
  public static function tableName(): string
  {
    return 'Symptoms';
  }

  public static function attributes(): array
  {
    return [
      'name' => ['type' => 'STRING'],
      'desc' => ['type' => 'TEXT'],
      'question' => ['type' => 'STRING'],
      'expertSystemId' => ['type' => 'INTEGER']
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
