<?php

namespace app\core\Session;

class Session
{

  public function __construct()
  {
    session_start();
  }

  public static function setSession($key, $value)
  {
    $_SESSION[$key] = $value;
  }

  public static function getSession($key)
  {
    return $_SESSION[$key] ?? false;
  }

  public static function remove($key)
  {
    unset($_SESSION[$key]);
  }
}
