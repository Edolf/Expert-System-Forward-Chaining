<?php

namespace app\core\Session;

use app\core\Application;
use app\core\HttpException;
use app\core\Cookie;

class Session
{

  public function __construct($set = '')
  {
    session_start($set);
  }

  public function setSession($key, $value)
  {
    $_SESSION[$key] = $value;
    return true;
  }

  public function getSession($key)
  {
    return $_SESSION[$key] ?? false;
  }

  public function remove($key)
  {
    unset($_SESSION[$key]);
  }

  public function cleanSession()
  {
    return session_destroy();
  }
}
