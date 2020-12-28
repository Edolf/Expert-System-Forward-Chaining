<?php

namespace app\models;

use app\core\Model;

class KnowledgeBase extends Model
{
  public static function tableName(): string
  {
    return 'knowledgebases';
  }

  public static function attributes(): array
  {
    return [
      'solvingId' => ['type' => 'JSON'],
      'symptoms' => ['type' => 'STRING'],
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
