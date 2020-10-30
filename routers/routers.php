<?php

use app\core\Application;
use app\core\Request;
use app\core\Response;

use app\models\Navbar;
use app\models\Category;

Application::get('/', function (Request $request, Response $response) {
  $navbars = Navbar::query()->select('*')->from('Navbars', 'n')->where('n.categoryId = 4')->getQueryResult();
  $response->render('index', [
    'navbars' => $navbars,
    'categories' => Category::all()
  ]);
});

Application::post('/auth', 'AuthController@login');
Application::post('/auth/out', 'AuthController@logout');
Application::post('/auth/join', 'AuthController@register');

Application::get('/members', 'MembersController@index');
