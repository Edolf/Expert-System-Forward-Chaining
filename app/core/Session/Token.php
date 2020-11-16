<?php

namespace app\core\Session;

use app\core\Application;

class Token
{
  public const TOKEN = 'token';

  public function __construct()
  {
    Application::$app->session->setSession(self::TOKEN, bin2hex(openssl_random_pseudo_bytes(32, $cstrong)));
  }

  public function getCSRFToken()
  {
    return $_SESSION[self::TOKEN] ?? false;
  }

  public function checkToken($token)
  {
    if (Application::$app->session->getSession(self::TOKEN) === $token) {
      return true;
    }
    return false;
  }

  public function removeToken()
  {
    Application::$app->session->remove(self::TOKEN);
  }
}
