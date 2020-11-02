<?php

namespace app\models;

use app\core\Authenticate;
use app\core\Model;

class KnowledgeBase extends Model
{
  public static function tableName(): string
  {
    return 'KnowledgeBases';
  }

  public static function attributes(): array
  {
    return ['solvingId', 'symptoms', 'expertSystemId'];
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
