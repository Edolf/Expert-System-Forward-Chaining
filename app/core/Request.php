<?php

namespace app\core;

use app\core\Session;

class Request
{
  public function login($user)
  {
    Application::$app->authenticate->login($user);
  }

  public function logout($user)
  {
    Application::$app->authenticate->logout($user);
  }

  public function getMethod()
  {
    return strtolower($_SERVER['REQUEST_METHOD']);
  }

  public function getUrl()
  {
    $path = $_SERVER['REQUEST_URI'];
    $position = strpos($path, '?');
    if ($position !== false) {
    }
    return $path;
  }

  public function setQuery($query, $new)
  {
    $_GET[$query] = $new;
  }

  public function getQuery($query = '')
  {
    if ($query) {
      return $_GET[$query];
    } else {
      return $_GET;
    }
  }

  public function setBody($body, $new)
  {
    $_POST[$body] = $new;
  }

  public function getBody($body = '')
  {
    if ($body) {
      return $_POST[$body];
    } else {
      return $_POST;
    }
  }

  public function setFlash($key, $class, $message)
  {
    Session::setFlash($key, $class, $message);
  }

  public function getFlash($key)
  {
    return Session::getFlash($key);
  }

  public function isJson($string)
  {
    json_decode($string);
    return (json_last_error() == JSON_ERROR_NONE);
  }
}
