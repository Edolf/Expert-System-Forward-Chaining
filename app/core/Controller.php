<?php

namespace app\core;

use app\core\Middleware\Middleware;

class Controller
{
  protected array $middlewares = [];
  public string $action = '';

  public static function validateBody($body)
  {
    return Application::$app->validator->bodyValidation($body);
  }

  public static function validateParam($param)
  {
    return Application::$app->validator->paramValidation($param);
  }

  public static function validateQuery($query)
  {
    return Application::$app->validator->queryValidation($query);
  }

  public static function validateFile($file)
  {
    return Application::$app->validator->fileValidation($file);
  }

  public static function createError($msg, $param, $location)
  {
    return Application::$app->validator->setError($msg, $param, $location);
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
