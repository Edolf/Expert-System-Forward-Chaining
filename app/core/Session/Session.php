<?php

namespace app\core\Session;

use app\core\HttpException;
use app\core\Cookie;

class Session
{

  public function __construct()
  {
    if (!session_id()) {
      if (!session_start([
        'cookie_lifetime' => 86400,
        'use_cookies' => 1
      ])) {
        throw new HttpException($this->response::HTTP_INTERNAL_SERVER_ERROR, 'Failed To Start The Session');
      }
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
}
