<?php

namespace app\core;

use app\core\Session;

class Request
{
  public $_PARAM = [];

  public function __construct()
  {
    if ($this->getMethod() == 'put' || $this->getMethod() == 'delete') {
      if (empty($this->getBody())) {
        $contents = file("php://input");
        foreach ($contents as $key => $content) {
          // Bersihkan Content Tidak Diperlukan
          if (strpos($content, '------WebKitFormBoundary') !== false || ctype_space($content)) {
            unset($contents[$key]);
            continue;
          }
          // Ambil Content
          if (strpos($content, 'form-data; name="') !== false) {
            $position = strpos($content, 'form-data; name="');
            $contents[$key] = substr($content, $position + strlen('form-data; name="'), $position);
          }
          $contents[$key] = substr($contents[$key], 0, strlen($contents[$key]) - 2);
          // Bersihkan `""`
          if (strpos($contents[$key], '"', strlen($contents[$key]) - 3) !== false) {
            $contents[$key] = substr($contents[$key], 0, strpos($contents[$key], '"', strlen($contents[$key]) - 3));
          }
        }
        // Sort Array
        $sortArray = [];
        foreach ($contents as $key => $value) {
          $sortArray[] = $value;
        }
        // Store Content Ke $_POST
        for ($i = 0; $i < count($contents); $i++) {
          if ($i % 2 == 0) {
            $this->setBody($sortArray[$i], '');
          } else {
            $this->setBody($sortArray[$i - 1], $sortArray[$i]);
          }
        }
      }
    }
  }

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
    return parse_url($_SERVER['REQUEST_URI'])['path'];
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

  public function setParam($param, $new)
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

  public function setHeader($head, $value)
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
