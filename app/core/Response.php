<?php

namespace app\core;

class Response
{
  public function render($view, array $params = [])
  {
    return Application::$app->view->renderView($view, $params);
  }

  public function setStatusCode(int $code)
  {
    http_response_code($code);
    return $this;
  }

  public function redirect(String $to)
  {
    header("Location: $to");
  }

  public function createError($code, $message = '')
  {
    $this->setStatusCode($code);
    $this->render('error', [
      'error' => [
        'status' => $code,
        'message' => $message,
        'stack' => error_get_last()
      ]
    ]);
  }

  public function json($res)
  {
    echo json_encode($res);
    return $this;
  }

  public function end()
  {
    return exit;
  }
}
