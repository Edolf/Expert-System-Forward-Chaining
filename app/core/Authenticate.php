<?php

namespace app\core;

use app\core\Model;

use app\models\User;

class Authenticate
{
  public function __construct($userId)
  {
    if ($userId) {
      Application::$app->user = User::findOne([array_keys(User::primaryKey())[0] => $userId]);
    }
  }

  public function login(User $user)
  {
    Application::$app->user = $user;
    $id = $user->{array_keys($user::primaryKey())[0]};
    Application::$app->session::setSession('user', $id);
    return true;
  }

  public function logout()
  {
    Application::$app->user = null;
    Application::$app->session::remove('user');
  }
}
