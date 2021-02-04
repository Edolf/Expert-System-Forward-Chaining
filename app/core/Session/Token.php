<?php

namespace app\core\Session;

use app\core\Application;

class Token
{
  public const TOKEN = 'token';

  public static function setToken()
  {
    Application::$app->session->setSession(self::TOKEN, bin2hex(openssl_random_pseudo_bytes(32, $cstrong)), false);
  }

  public static function getCSRFToken()
  {
    $token = Application::$app->session->getSession(self::TOKEN);
    return $token[count($token) - 1];
  }

  public static function checkToken($userToken)
  {
    $allToken = Application::$app->session->getSession(self::TOKEN);
    foreach ($allToken as $token) {
      if ($token === $userToken) {
        unset($token);
        return true;
      }
    }
    return false;
  }
}
