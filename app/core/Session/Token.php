<?php

namespace app\core\Session;

use app\core\Session\Session;

class Token extends Session
{
  public const TOKEN = 'token';

  public function __construct()
  {
    self::setSession(self::TOKEN, md5(uniqid()));
    // self::setSession(self::TOKEN, openssl_random_pseudo_bytes(32));
  }

  public function getCSRFToken()
  {
    return $_SESSION[self::TOKEN] ?? false;
  }

  public static function checkToken($token)
  {
    if (self::getSession(self::TOKEN) === $token) {
      // self::remove(self::TOKEN);
      return true;
    }
    return false;
  }
}
