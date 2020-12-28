<?php

namespace app\core\Session;

use app\core\HttpException;
use app\core\Cookie;

class Session
{

  public function __construct($set = '')
  {
    if (!session_start($set)) {
      throw new HttpException(500, 'Failed To Start The Session');
    }
    if ((!session_id()) || (!Cookie::getCookie('PHPSESSID'))) {
      throw new HttpException(500, 'Failed To Start The Session');
    }
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
