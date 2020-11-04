<?php

use app\core\Application;
use app\core\Request;
use app\core\Response;

use app\models\Navbar;
use app\models\Category;

Application::get('/', function (Request $request, Response $response) {
  return $response->render('index', [
    'navbars' => Navbar::findAll(['categoryId' => 4]),
    'categories' => Category::findAll()
  ]);
});

Application::post('/auth', 'AuthController@login');
Application::get('/auth/gplus', 'AuthController@goauth');
Application::post('/auth/out', 'AuthController@logout');
Application::post('/auth/join', 'AuthController@register');

Application::get('/members', 'MemberController@index');

Application::get('/members/account', 'MemberController@account');
Application::get('/members/list-user', 'MemberController@listUser');

Application::get('/members/sidemenu', 'SidemenuController@sidemenu');
Application::post('/members/sidemenu', 'SidemenuController@addSidemenu');
Application::put('/members/sidemenu', 'SidemenuController@updateSidemenu');
Application::delete('/members/sidemenu', 'SidemenuController@deleteSidemenu');

// Application::get('/members/sidemenu/menu', 'MemberController@sidemenu');
// Application::post('/members/sidemenu/menu', 'MemberController@addSidemenu');
// Application::put('/members/sidemenu/menu', 'MemberController@sidemenu');
// Application::delete('/members/sidemenu/menu', 'MemberController@sidemenu');
