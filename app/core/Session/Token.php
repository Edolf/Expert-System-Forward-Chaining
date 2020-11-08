<?php

namespace app\core\Session;

use app\core\Session\Session;

class Token extends Session
{
  public const TOKEN = 'token';

  public function __construct()
  {
    self::setSession(self::TOKEN, bin2hex(openssl_random_pseudo_bytes(32, $cstrong)));
  }

  public function getCSRFToken()
  {
    return $_SESSION[self::TOKEN] ?? false;
  }

  public static function checkToken($token)
  {
    if (self::getSession(self::TOKEN) === $token) {
      return true;
    }
    return false;
  }

  public function removeToken()
  {
    self::remove(self::TOKEN);
  }
}
