<?php

namespace app\core\Session;

class Session
{

  public function __construct()
  {
    session_start();
  }

  public function setSession($key, $value)
  {
    $_SESSION[$key] = $value;
  }

  public function getSession($key)
  {
    return $_SESSION[$key] ?? false;
  }

  public function remove($key)
  {
    unset($_SESSION[$key]);
  }
}
