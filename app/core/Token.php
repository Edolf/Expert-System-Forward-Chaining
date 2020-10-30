<?php

namespace app\core;

use app\core\Session;

class Token extends Session
{
  public const TOKEN = 'token';

  public function __construct()
  {
    self::set(self::TOKEN, md5(uniqid()));
    // self::set(self::TOKEN, openssl_random_pseudo_bytes(32));
  }

  public function getCSRFToken()
  {
    return $_SESSION[self::TOKEN] ?? false;
  }

  public static function checkToken($token)
  {
    if (self::get(self::TOKEN) === $token) {
      self::remove(self::TOKEN);
      return true;
    }
    return false;
  }
}
