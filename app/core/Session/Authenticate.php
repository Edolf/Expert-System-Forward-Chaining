<?php

namespace app\core\Session;

use app\models\User;
use app\core\Application;
use app\core\HttpException;

class Authenticate extends Session
{
  public function __construct($userId)
  {
    if ($userId) {
      Application::$app->user = User::findOne([array_keys(User::primaryKey())[0] => $userId]);
    }
  }

  public function login(User $user)
  {
    try {
      Application::$app->user = $user;
      $id = $user->{array_keys($user::primaryKey())[0]};
      Application::$app->session->setSession('user', $id);
      return true;
    } catch (\Throwable $th) {
      throw new HttpException(500);
    }
  }

  public function logout()
  {
    try {
      Application::$app->user = null;
      Application::$app->session->remove('user');
    } catch (\Throwable $th) {
      throw new HttpException(500);
    }
  }
}
