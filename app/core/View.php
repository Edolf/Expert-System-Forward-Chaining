<?php

namespace app\core;

class View
{
  public function renderView($view, array $params = [])
  {
    $csrfToken = new Token();
    $flash = new Flash();
    $user = Application::$app->user;

    foreach ($params as $key => $value) {
      $$key = $value;
    }
    include ROOT_DIR . "/resources/views/$view.php";
  }
}
