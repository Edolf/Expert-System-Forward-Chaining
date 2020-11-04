<?php

namespace app\core;

use app\core\Session;

class Request
{

  public function login($user)
  {
    Application::$app->authenticate->login($user);
  }

  public function logout()
  {
    Application::$app->authenticate->logout();
  }

  public function setFlash($key, $class, $message)
  {
    Application::$app->flash->setFlash($key, $class, $message);
  }

  public function getMethod()
  {
    return strtolower($_SERVER['REQUEST_METHOD']);
  }

  public function setMethod($method)
  {
    $_SERVER['REQUEST_METHOD'] = strtoupper($method);
  }

  public function getUrl()
  {
    // var_dump(parse_url($_SERVER['REQUEST_URI']));
    $path = $_SERVER['REQUEST_URI'];
    $position = strpos($path, '?');
    if ($position !== false) {
      $path = substr($path, 0, $position);
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
      return $_GET[$query] ?? null;
    } else {
      return $_GET;
    }
  }

  public function setHeader($head, $new)
  {
    # code...
  }

  public function getHeader($head = '')
  {
    $data = [];
    foreach (getallheaders() as $key => $value) {
      $data[$key] = $value;
    }
    if ($head) {
      return $data[$head] ?? null;
    }
    return $data;
  }

  public function setBody($body, $new)
  {
    $_POST[$body] = $new;
  }

  public function getBody($body = '')
  {
    if ($body) {
      return $_POST[$body] ?? null;
    } else {
      return $_POST;
    }
  }

  public function isJson($string)
  {
    json_decode($string);
    return (json_last_error() == JSON_ERROR_NONE);
  }
}
