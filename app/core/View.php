<?php

namespace app\core;

use app\core\Session\Flash;
use app\core\Session\Token;

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
