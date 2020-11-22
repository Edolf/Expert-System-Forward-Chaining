<?php

namespace app\core;

class Cookie
{
  public static function setCookie($name, $value, $expiry)
  {
    if (setcookie($name, $value, time() + $expiry, '/')) {
      return true;
    }
    return false;
  }

  public static function remove($name)
  {
    unset($_COOKIE[$name]);
  }

  public static function getCookie($name)
  {
    return $_COOKIE[$name] ?? false;
  }
}
