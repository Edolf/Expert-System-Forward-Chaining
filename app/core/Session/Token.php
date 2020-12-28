<?php

namespace app\core\Session;

use app\core\Application;

class Token
{
  public const TOKEN = 'token';

  public static function setToken()
  {
    Application::$app->session->setSession(self::TOKEN, bin2hex(openssl_random_pseudo_bytes(32, $cstrong)));
  }

  public static function getCSRFToken()
  {
    return Application::$app->session->getSession(self::TOKEN);
  }

  public static function checkToken($token)
  {
    if (Application::$app->session->getSession(self::TOKEN) === $token) {
      // self::removeToken();
      return true;
    }
    return false;
  }

  public static function removeToken()
  {
    Application::$app->session->remove(self::TOKEN);
  }
}
