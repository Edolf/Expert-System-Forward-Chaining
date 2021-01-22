<?php

namespace app\core;

use app\core\Session;
use helpers\ParseInputStream;

class Request
{
  private $_PARAM = [];

  public function __construct()
  {
    // Algoritma untuk fetch Javascript Modern dari Class Javascript From Data
    $input = file_get_contents('php://input');
    $metaBlock = preg_split("/--+/", $input); // Bagi input tadi dengan Memadukan Depan Belakang dan buang element terakhir
    foreach ($metaBlock as $key => $block) {
      if (preg_match('/name=\"([^\"]*)\"[\n|\r]+([^\n\r].*)?\r$/s', $block, $match)) { // Pecahkan Beka Raw Data Tadi Ambil Apapun yang Ada Di Depan "nama=" dan "]+(" dan di depan ini adalah valuenya
        if (preg_match('/^(.*)\[\]$/i', $match[1], $tmp)) {
          $this->setBody($tmp[1], (array_key_exists(2, $match) ? $match[2] : '')); // Store Content Ke $_POST
        } else {
          $this->setBody($match[1], (array_key_exists(2, $match) ? $match[2] : '')); // Store Content Ke $_POST
        }
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
    return $_SERVER['REQUEST_METHOD'];
  }

  public function setMethod($method)
  {
    $_SERVER['REQUEST_METHOD'] = strtoupper($method);
  }

  public function getUrl()
  {
    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $heee = strpos($url, PROJECT_DIR);
    if ($heee !== false) {
      $url = substr($url, strlen(PROJECT_DIR) + 1, strlen($url));
    }
    // Cek Handling Error Apabila Url Seperti Berikut : http://localhost:8080/members/consultation/,,, akan menghilangkan '/' akhiran
    // Metode di File ni manual Penjabaran array sebenanrya lebih mudah apabila menggunakan reGex,, tetapi sudah terbuat yahh biarlah,,,
    while (strlen($url) > 1 && substr($url, strlen($url) - 1) == '/') {
      $position = strpos($url, '/', strlen($url) - 1);
      $url = substr($url, 0, $position);
    }
    return $url;
    // Modern Params By Edo Sulaiman
  }

  public function setQuery($query, $new = '')
  {
    if (($_GET[$query] ?? false)) {
      if (!($_GET[$query] === $new || (is_array($_GET[$query]) ? ($_GET[$query][array_search($new, $_GET[$query])] === $new) : false))) {
        $_GET = array_merge_recursive($_POST, [$query => $new]);
      }
    } else {
      $_GET[$query] = $new;
    }
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
    if (($this->_PARAM[$param] ?? false)) {
      if (!($this->_PARAM[$param] === $new || (is_array($this->_PARAM[$param]) ? ($this->_PARAM[$param][array_search($new, $this->_PARAM[$param])] === $new) : false))) {
        $this->_PARAM = array_merge_recursive($_POST, [$param => $new]);
      }
    } else {
      $this->_PARAM[$param] = $new;
    }
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
      throw new HttpException(500);
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
    if (($_POST[$body] ?? false)) {
      if (!($_POST[$body] === $new || (is_array($_POST[$body]) ? ($_POST[$body][array_search($new, $_POST[$body])] === $new) : false))) {
        $_POST = array_merge_recursive($_POST, [$body => $new]);
      }
    } else {
      $_POST[$body] = $new;
    }
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
