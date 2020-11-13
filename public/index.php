<?php

// phpinfo();
// exit;

require_once dirname(__DIR__) . '/config/config.php';

spl_autoload_register(function ($className) {
  $file = dirname(__DIR__) . DS . str_replace('\\', DS, $className) . '.php';
  if (file_exists($file) && is_readable($file)) {
    require_once $file;
  }
});

$app = new app\core\Application();

require_once dirname(__DIR__) . '/resources/routers/routers.php';

$app->run();
