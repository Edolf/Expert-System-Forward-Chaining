<?php

namespace app\core;

use app\core\Model;

use app\models\User;

class Authenticate
{
  public function __construct($userId)
  {
    if ($userId) {
      Application::$app->user = User::findOne([User::primaryKey() => $userId]);
    }
  }

  public function login(User $user)
  {
    Application::$app->user = $user;
    $primaryKey = $user->primaryKey();
    $value = $user->{$primaryKey};
    Application::$app->session::setSession('user', $value);
    return true;
  }

  public function logout()
  {
    Application::$app->user = null;
    Application::$app->session::remove('user');
  }
}
