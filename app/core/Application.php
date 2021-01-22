<?php

namespace app\core;

use app\core\Database\Connection;
use app\core\Session\Session;
use app\core\Session\Flash;
use app\core\Session\Token;
use app\core\Session\Authenticate;
use app\core\Validator\Validator;

use app\models\User;

class Application
{
  public static Application $app;
  public Session $session;
  public Request $request;
  public Response $response;
  public ?Controller $controller = null;
  public Connection $connection;
  public Authenticate $authenticate;
  public Validator $validator;
  public ?Flash $flash;
  public ?User $user = null;

  public $locals = [];

  private static array $routesMap = ['GET' => '', 'POST' => '', 'PUT' => '', 'DELETE' => ''];
  private static array $paramsMap = [];

  public function __construct()
  {
    self::$app = $this;
    $this->connection = new Connection();
    $this->request = new Request();
    $this->response = new Response();
    $this->session = new Session(['cookie_lifetime' => 86400, 'use_cookies' => 1]);
    $this->authenticate = new Authenticate($this->session->getSession('user'));
    $this->validator = new Validator($this->request);
    $this->flash = new Flash($this->session);
  }

  public function run()
  {
    try {
      $this->response->setContent($this->cekUrlAndMethod())->send();
    } catch (\Throwable $err) {
      $stack = DEBUG == true ? $err->getTraceAsString() : '';
      $this->response->setStatusCode($err->getCode())->setContent(View::renderView('error', [
        'title' => "Error | " . $err->getCode() . " | " . $err->getMessage(),
        'error' => [
          'status' => $err->getCode(),
          'message' => $err->getMessage(),
          'stack' => $stack
        ]
      ]))->send();
    }
  }

  public function resolve($method, $url)
  {
    $callback = $this->cekCallbackIsExist($method, $url) ?? false;
    if (!$callback) {
      throw new HttpException(404, 'Something Error Try Next Time');
    }
    if (is_string($callback)) {
      $callback = explode('@', $callback);
      $controller = 'app\controllers\\' . $callback[0];
      $controller = new $controller($this->request, $this->response);
      $controller->action = $callback[1];
      $this->controller = $controller;
      foreach ($controller->getMiddlewares() as $middleware) {
        $middleware->execute();
      }
      $callback[0] = $controller;
    }
    return call_user_func($callback, $this->request, $this->response);
  }

  public function cekUrlAndMethod()
  {
    $url = $this->request->getUrl();
    if (!$url) {
      throw new HttpException(404, 'URL 404 Not Found');
    }
    $method = $this->request->getMethod();
    if (strcmp("POST", $this->request->getMethod()) === 0) {
      $method = $this->request->getQuery('_method') ?? $method;
    }
    if (!$this->response->isRedirect($url) && DEBUG !== true) {
      if (!(strcmp("GET", $method) === 0)) {
        // Dan CSRF Token Sepeti Ini Juga Sangat Lemah akan saya perbaiki jika project ini terus di lanjutkan
        $headerToken = $this->request->getHeader('Csrf-Token') ?? $this->request->getHeader('CSRF-Token');
        $queryToken = $this->request->getQuery('_csrf') ?? null;
        if (!Token::checkToken($headerToken ?? $queryToken)) {
          throw new HttpException(401, 'Invalid CSRF Token');
        }
      }
    }
    return $this->resolve($method, $url);
  }

  public function cekCallbackIsExist(string $method, string $url)
  {
    // Metode di File ni manual Penjabaran array sebenanrya lebih mudah apabila menggunakan reGex,, tetapi sudah terbuat yahh biarlah,,,
    if (self::$routesMap[$method][$url] ?? false) {
      if (is_array(self::$routesMap[$method][$url])) { // Cek Apabila Ada Duplikat URL dan Pasti itu adalah Array
        if (!empty(self::$paramsMap)) { // Cek Apabila Param Kosong
          $iterator = count(explode("/", $url));
          foreach (self::$routesMap[$method][$url] as $key => $callback) {
            if (is_string($key)) { // Cek Di Dalam Router Map Apabila ada array_keys yang bukan bertype integer
              $this->request->setParam($key, self::$paramsMap[$iterator]);
              return $callback;
            }
          }
        } else {
          return self::$routesMap[$method][$url][0];
        }
      } else {
        return self::$routesMap[$method][$url]; // Kalau Tidak Langsung Return Alamat Callback
      }
    } else {
      if (strlen($url) <= 1) {
        return false; // 404 Not Found Berasal Dari Sini
      } else {
        $paths = explode('/', $url); // Apabila Masih Belum Solving,,, Parameter akhir Pertama Akan Kita Simpan Ke Dalam $paramsMap akan di gunakan apabila di perlukan,,
        self::$paramsMap[count($paths) - 1] = $paths[count($paths) - 1]; // Setelah Kita Pecahkan Kita Dapat Akhiran yang di simpan ke dalam $paramsMap apabila nanti di perlukan untuk di gunakan
        unset($paths[count($paths) - 1]); // Hilangkan Parameter Terakhir dalam URL
        $newUrl = implode('/', $paths); // Buat Url Baru
        if (substr($newUrl, 0, 1) == '/') { // Cek Garis Miring Awalan
          return $this->cekCallbackIsExist($method, $newUrl);
        } else {
          return $this->cekCallbackIsExist($method, '/' . $newUrl);
        }
      }
    }
    // Kerenya Url Seperti Ini kita Tidak Memerlukan yang namanya 404 Not Found,, kecuali (http://localhost:8080/////////////////////////////////////////)
    // Kekuranganya Karna Menggunakan Teknik Recursif akan memakan banyak memory apabila request yang di minta terlalu banyak
    // Teknik Recursif ini Juga Bisa Di Manipulasikan Menggunakan Loop,, Agar Tidak Terlalu Memakan Banyak Memory Sebenarnya,,
    // Ini pertama kalinya saya membuat URL seperti ini,, Jadi Meungkin Teknik Ini Masih Banyak Kekurangan,,
    // Untuk Type Routers Application::method('/someurl/{someparam}/someurl/{someparam}', 'SomeController@method'); akan di lanjutkan apabila project ini terus di lanjutkan

    // Modern Params By Edo Sulaiman
  }

  public static function setUrlMethodAndParam(string $method, string $url, $callback)
  {
    $temp0[] = $method; // Pecahkan URL
    foreach (explode('/{', $url) as $value) {
      foreach (explode('}', $value) as $v) {
        $temp0[] = $v;
      }
    }
    foreach ($temp0 as $key => $value) { // Cek Array Yang Kosong
      if (empty($value)) {
        unset($temp0[$key]);
      }
    }
    $temp2 = []; // Masukkan ke Nested / Multidimensi Array
    for ($i = count($temp0) - 1; $i >= 0; $i--) {
      if ($i == count($temp0) - 1) {
        $temp2[$temp0[$i]] = $callback; // Gabungkan Nested / Multidimensi URL dan Callback
      } else {
        $temp2 = [$temp0[$i] => $temp2];
      }
    };
    self::$routesMap = array_merge_recursive(self::$routesMap, $temp2);
    foreach (self::$routesMap as $key => $value) { // Cek Array Yang Kosong
      if (is_array($value)) {
        foreach ($value as $kunci => $url) {
          if (empty($url)) {
            unset(self::$routesMap[$key][$kunci]);
          }
        }
      }
    }
    // Modern Params By Edo Sulaiman
  }

  public static function all(string $url, $callback)
  {
    self::setUrlMethodAndParam('GET', $url, $callback);
    self::setUrlMethodAndParam('POST', $url, $callback);
    self::setUrlMethodAndParam('PUT', $url, $callback);
    self::setUrlMethodAndParam('DELETE', $url, $callback);
  }

  public static function get(string $url, $callback)
  {
    self::setUrlMethodAndParam('GET', $url, $callback);
  }

  public static function post(string $url, $callback)
  {
    self::setUrlMethodAndParam('POST', $url, $callback);
  }

  public static function put(string $url, $callback)
  {
    self::setUrlMethodAndParam('PUT', $url, $callback);
  }

  public static function delete(string $url, $callback)
  {
    self::setUrlMethodAndParam('DELETE', $url, $callback);
  }
}
