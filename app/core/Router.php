<?php

namespace app\core;

use app\core\Session\Token;

class Router
{
  private Request $request;
  private Response $response;
  private static array $routeMap = [];

  public function __construct(Request $request, Response $response)
  {
    $this->request = $request;
    $this->response = $response;
  }

  public function resolve()
  {
    $method = $this->request->getMethod();
    $url = $this->request->getUrl();
    $callback = self::$routeMap[$method][$url] ?? false;
    if (!$callback) {
      throw new HttpException($this->response::HTTP_NOT_FOUND);
    }
    if (!($method == 'get')) {
      if (!Token::checkToken($this->request->getHeader('CSRF-Token') ?? $this->request->getQuery('_csrf'))) {
        throw new HttpException($this->response::HTTP_UNAUTHORIZED, 'Invalid CSRF Token');
      }
    }
    if (is_string($callback)) {
      $callback = explode('@', $callback);
      $controller = 'app\controllers\\' . $callback[0];
      $controller = new $controller;
      $controller->action = $callback[1];
      Application::$app->controller = $controller;
      foreach ($controller->getMiddlewares() as $middleware) {
        $middleware->execute();
      }
      $callback[0] = $controller;
    }
    return call_user_func($callback, $this->request, $this->response);
  }

  public static function get(string $url, $callback)
  {
    self::$routeMap['get'][$url] = $callback;
  }

  public static function post(string $url, $callback)
  {
    self::$routeMap['post'][$url] = $callback;
  }

  public static function put(string $url, $callback)
  {
    self::$routeMap['put'][$url] = $callback;
  }

  public static function delete(string $url, $callback)
  {
    self::$routeMap['delete'][$url] = $callback;
  }
}
