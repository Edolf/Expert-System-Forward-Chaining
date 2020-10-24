<?php

use app\core\Application;

require_once dirname(__DIR__) . '/config/config.php';

function autoload($className)
{
  $classAry = explode('\\', $className);
  $class = array_pop($classAry);
  $subPath = strtolower(implode('/', $classAry));
  $path = dirname(__DIR__) . "/$subPath/$class.php";
  if (file_exists($path)) {
    require_once($path);
  }
}

spl_autoload_register('autoload');

$app = new Application();

$app->run();
