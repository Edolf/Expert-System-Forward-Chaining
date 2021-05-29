<?php

namespace app\core;

use app\core\Session\Token;

class View
{

  public static function renderView($view, array $params = [])
  {

    Token::setToken();
    $GLOBALS['csrfToken'] = Token::getCSRFToken();
    $GLOBALS['flash'] = Application::$app->flash;
    $GLOBALS['user'] = Application::$app->user;

    foreach ($GLOBALS as $key => $value) {
      $$key = $value;
    }

    foreach ($GLOBALS['locals'] as $key => $value) {
      $$key = $value;
    }

    foreach ($params as $key => $value) {
      $$key = $value;
    }

    ob_start();
    require VIEW_DIR . "/$view.php";
    return ob_get_clean();
  }
}
