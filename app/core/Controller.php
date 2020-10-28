<?php

namespace app\core;

use app\core\middlewares\AuthMiddleware;

class Controller
{
  protected array $middlewares = [];
  public string $action = '';

  public static function validate($body)
  {
    Application::$app->validator->validation($body);
    return Application::$app->validator;
  }

  public static function validateResults()
  {
    return Application::$app->validator->validateResults();
  }

  public function registerMiddleware(AuthMiddleware $middleware)
  {
    $this->middlewares[] = $middleware;
  }

  public function getMiddlewares(): array
  {
    return $this->middlewares;
  }
}
