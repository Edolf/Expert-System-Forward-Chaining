<?php

namespace app\core;

use app\core\Session\Token;

class View
{

  public function renderView($view, array $params = [])
  {
    foreach ($params as $key => $value) {
      Application::$app->locals[$key] = $value;
    }
    Application::$app->locals['csrfToken'] = new Token();
    Application::$app->locals['flash'] = Application::$app->flash;
    Application::$app->locals['user'] = Application::$app->user;

    foreach (Application::$app->locals as $key => $value) {
      $$key = $value;
    }

    ob_start();
    require VIEW_DIR . "/$view.php";
    return ob_get_clean();
  }
}
