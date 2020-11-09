<?php

namespace app\core;

use app\core\Session\Token;

class Router
{
  private Request $request;
  private Response $response;
  private static array $routeMap = ['get' => '', 'post' => '', 'put' => '', 'delete' => ''];

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
    $callback = $this->cekUrlIsExist($method, $url);
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
    if (self::$routeMap[$method][$url] ?? false) {
      if (is_array(self::$routeMap[$method][$url])) {
        $paramValue = explode($url, $this->request->getUrl());
        foreach ($paramValue as $key => $value) {
          if (empty($value)) {
            unset($paramValue[$key]);
          }
        }
        $paramKey = array_keys(self::$routeMap[$method][$url])[0];
        $this->request->setParam($paramKey, $paramValue[1]);
        return self::$routeMap[$method][$url][$paramKey];
      } else {
        return self::$routeMap[$method][$url];
      }
    } elseif (substr($url, strlen($url)) == '/') {
      $position = strpos($url, '/', strlen($url) - 1);
      $url = substr($url, 0, $position);
      return $this->cekUrlIsExist($method, $url);
    } else {
      $paths = explode('/', $url);
      foreach ($paths as $key => $value) {
        if (empty($value)) {
          unset($paths[$key]);
        }
      }
      $newUrl = explode($paths[count($paths)], $url);
      foreach ($newUrl as $key => $value) {
        if (empty($value)) {
          unset($newUrl[$key]);
        }
      }
      return $this->cekUrlIsExist($method, $newUrl[0]);
    }
    // Modern Params By Edo Sulaiman Inspired by Laravel
  }

  public static function setUrlMethodAndParam(string $method, string $url, $callback)
  {
    // Pecahkan URL
    $temp0[] = $method;
    foreach (explode('{', $url) as $value) {
      foreach (explode('}', $value) as $v) {
        $temp0[] = $v;
      }
    }
    // Cek Array Yang Kosong
    foreach ($temp0 as $key => $value) {
      if (empty($value)) {
        unset($temp0[$key]);
      }
    }
    // Masukkan ke Nested / Multidimensi Array
    $temp2 = [];
    for ($i = count($temp0) - 1; $i >= 0; $i--) {
      if ($i == count($temp0) - 1) {
        // Gabungkan Nested / Multidimensi URL dan Callback
        $temp2[$temp0[$i]] = $callback;
      } else {
        $temp2 = [$temp0[$i] => $temp2];
      }
    };
    self::$routeMap = array_merge_recursive(self::$routeMap, $temp2);
    // Cek Array Yang Kosong
    foreach (self::$routeMap as $key => $value) {
      if (is_array($value)) {
        foreach ($value as $kunci => $url) {
          if (empty($url)) {
            unset(self::$routeMap[$key][$kunci]);
          }
        }
      }
    }
    // Modern Params By Edo Sulaiman Inspired by Laravel
  }
}
