<?php

namespace app\core;

use app\core\Session\Token;

class Router
{
  private Request $request;
  private Response $response;
  private static array $routesMap = ['get' => '', 'post' => '', 'put' => '', 'delete' => ''];
  private static array $paramsMap = [];

  public function __construct(Request $request, Response $response)
  {
    $this->request = $request;
    $this->response = $response;
  }

  public function resolve()
  {
    switch (strtoupper($this->request->getQuery('_method'))) {
      case 'PUT':
        $this->request->setMethod(strtoupper($this->request->getQuery('_method')));
        break;
      case 'DELETE':
        $this->request->setMethod(strtoupper($this->request->getQuery('_method')));
        break;
    }
    $method = $this->request->getMethod();
    $url = $this->request->getUrl();
    if (!$url) {
      throw new HttpException($this->response::HTTP_NOT_FOUND);
    }
    $callback = $this->cekUrlIsExist($method, $url) ?? false;
    if (!$callback) {
      throw new HttpException($this->response::HTTP_NOT_FOUND);
    }
    if (!($method == 'get') && DEBUG != true) {
      $headerToken = $this->request->getHeader('CSRF-Token') ?? null;
      $queryToken = $this->request->getQuery('_csrf') ?? null;
      if (!Token::checkToken($headerToken ?? $queryToken)) {
        throw new HttpException($this->response::HTTP_UNAUTHORIZED, 'Invalid CSRF Token');
      }
    }
    if (is_string($callback)) {
      $callback = explode('@', $callback);
      $controller = 'app\controllers\\' . $callback[0];
      $controller = new $controller($this->request, $this->response);
      $controller->action = $callback[1];
      Application::$app->controller = $controller;
      foreach ($controller->getMiddlewares() as $middleware) {
        $middleware->execute();
      }
      $callback[0] = $controller;
    }
    return call_user_func($callback, $this->request, $this->response);
  }

  public function cekUrlIsExist(string $method, string $url)
  {
    // Cek Handling Error Apabila Url Seperti Berikut : http://localhost:8080/members/consultation/,,, akan menghilangkan '/' akhiran
    if (strlen($url) > 1 && substr($url, strlen($url) - 1) == '/') {
      $position = strpos($url, '/', strlen($url) - 1);
      $url = substr($url, 0, $position);
    }

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
        return false;
      } else {
        $paths = explode('/', $url); // Apabila Masih Belum Solving,,, Parameter akhir Pertama Akan Kita Simpan Ke Dalam $paramsMap akan di gunakan apabila di perlukan,,
        self::$paramsMap[count($paths) - 1] = $paths[count($paths) - 1]; // Setelah Kita Pecahkan Kita Dapat Akhiran yang di simpan ke dalam $paramsMap apabila nanti di perlukan untuk di gunakan
        unset($paths[count($paths) - 1]); // Hilangkan Parameter Terakhir dalam URL
        $newUrl = implode('/', $paths); // Buat Url Baru
        if (substr($newUrl, 0, 1) == '/') { // Cek Garis Miring Awalan
          return $this->cekUrlIsExist($method, $newUrl);
        } else {
          return $this->cekUrlIsExist($method, '/' . $newUrl);
        }
      }
      // Untuk Type Routers Application::method('/someurl/{someparam}/someurl/{someparam}', 'SomeController@method'); akan di lanjutkan apabila project ini terus di lanjutkan
    }
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
}
