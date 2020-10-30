<?php

namespace app\core;

class Session
{

  public function __construct()
  {
    session_start();
  }

  public static function set($key, $value)
  {
    $_SESSION[$key] = $value;
  }

  public static function get($key)
  {
    return $_SESSION[$key] ?? false;
  }

  public static function remove($key)
  {
    unset($_SESSION[$key]);
  }
}
