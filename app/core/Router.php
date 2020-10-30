<?php

namespace app\core;

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
      $this->response->createError(404, 'Not Found');
    }
    if (!($method == 'get')) {
      if (!Token::checkToken($this->request->getHeader('CSRF-Token') ?? $this->request->getQuery('_csrf'))) {
        $this->response->createError(400, 'Invalid CSRF Token');
      }
    }
    if (is_string($callback)) {
      $callback = explode('@', $callback);
      $controller = 'app\controllers\\' . $callback[0];
      $controller = new $controller;
      $controller->action = $callback[1];
      Application::$app->controller = $controller;
      $middlewares = $controller->getMiddlewares();
      foreach ($middlewares as $middleware) {
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
