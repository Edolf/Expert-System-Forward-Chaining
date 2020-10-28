<?php

use app\core\Application;
use app\core\Request;
use app\core\Response;

use app\models\Navbar;
use app\models\Category;

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

$app->router::get('/', function (Request $request, Response $response) {
  $response->render('index', [
    'navbars' => Navbar::findAll(['categoryId' => 4]),
    'categories' => Category::all()
  ]);
});

$app->router::post('/auth', 'AuthController@login');
$app->router::post('/auth/join', 'AuthController@register');
$app->router::get('/members', 'MembersController@index');

$app->run();
