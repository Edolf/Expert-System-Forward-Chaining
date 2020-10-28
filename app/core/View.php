<?php

namespace app\core;

use app\core\Session;

class View
{
  public Session $session;

  public function __construct(Session $session)
  {
    $this->session = $session;
  }

  public function renderView($view, array $params = [])
  {
    $session = $this->session;
    foreach ($params as $key => $value) {
      $$key = $value;
    }
    include ROOT_DIR . "/resources/views/$view.php";
  }
}
