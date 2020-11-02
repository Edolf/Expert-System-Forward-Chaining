<?php

namespace app\core;

use app\core\middleware\Middleware;

class Controller
{
  protected array $middlewares = [];
  public string $action = '';

  public static function validateBody($body)
  {
    Application::$app->validator->bodyValidation($body);
    return Application::$app->validator;
  }

  public static function validateQuery($query)
  {
    Application::$app->validator->queryValidation($query);
    return Application::$app->validator;
  }

  public static function validateResults()
  {
    return Application::$app->validator->validateResults();
  }

  public function setMiddleware(Middleware $middleware)
  {
    $this->middlewares[] = $middleware;
  }

  public function getMiddlewares(): array
  {
    return $this->middlewares;
  }
}
