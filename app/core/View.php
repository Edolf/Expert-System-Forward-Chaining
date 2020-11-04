<?php

namespace app\core;

use app\core\Session\Flash;
use app\core\Session\Token;

class View
{
  public function renderView($view, array $params = [])
  {
    $csrfToken = new Token();
    $flash = Application::$app->flash;
    $user = Application::$app->user;

    foreach ($params as $key => $value) {
      $$key = $value;
    }
    ob_start();
    require VIEW_DIR . "/$view.php";
    return ob_get_clean();
  }
}
