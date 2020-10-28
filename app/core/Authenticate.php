<?php

namespace app\core;

use app\core\Model;

use app\models\User;

abstract class Authenticate extends Model
{
  abstract public static function tableName(): string;

  abstract public static function attributes(): array;

  abstract public static function primaryKey(): string;

  public function __construct($userId)
  {
    if ($userId) {
      Application::$app->user = User::findOne([User::primaryKey() => $userId]);
    }
  }

  public static function isGuest()
  {
    return !Application::$app->user;
  }

  public function login(User $user)
  {
    $this->user = $user;
    $primaryKey = $user->primaryKey();
    $value = $user->{$primaryKey};
    Application::$app->session->set('user', $value);
    return true;
  }

  public function logout()
  {
    $this->user = null;
    Application::$app->session->remove('user');
  }
}
