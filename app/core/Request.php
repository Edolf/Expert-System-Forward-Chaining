<?php

namespace app\core;

use app\core\Session;

class Request
{
  public $_PARAM = [];

  public function __construct()
  {
    // Algoritma untuk fetch Javascript Modern dari Class Javascript From Data
    $input = file_get_contents('php://input');
    $metaBlock = preg_split("/-+/", $input); // Bagi input tadi dengan Memadukan Depan Belakang dan buang element terakhir
    array_pop($metaBlock); // Buang Sampah Tak Guna,,
    foreach ($metaBlock as $key => $block) {
      if (empty($block)) {
        continue; // Kosong Yah Skip
      }
      preg_match('/name=\"([^\"]*)\"[\n|\r]+([^\n\r].*)?\r$/s', $block, $matches); // Pecahkan Beka Raw Data Tadi Ambil Apapun yang Ada Di Depan "nama=" dan "]+(" dan di depan ini adalah valuenya
      if (!empty($matches)) {
        $this->setBody($matches[1], $matches[2] ?? ''); // Store Content Ke $_POST
      }
    }
  }

  public function login($user)
  {
    return Application::$app->authenticate->login($user);
  }

  public function logout()
  {
    return Application::$app->authenticate->logout();
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
    return parse_url($_SERVER['REQUEST_URI'])['path'];
  }

  public function setQuery($query, $new = '')
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

  public function setParam($param, $new = '')
  {
    $this->_PARAM[$param] = $new;
  }

  public function getParam($param = '')
  {
    if ($param) {
      return $this->_PARAM[$param] ?? null;
    } else {
      return $this->_PARAM;
    }
  }

  public function setHeader($head, $value = '')
  {
    try {
      header_remove($head);
      Application::$app->response->setHeader($head, $value);
    } catch (\Throwable $th) {
      throw new HttpException($this->response::HTTP_INTERNAL_SERVER_ERROR);
    }
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

  public function setBody($body, $new = '')
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

  public function getFile($file = '')
  {
    if ($file) {
      return $_FILES[$file] ?? null;
    } else {
      return $_FILES;
    }
  }

  public function isJson($string)
  {
    json_decode($string);
    return (json_last_error() == JSON_ERROR_NONE);
  }
}
