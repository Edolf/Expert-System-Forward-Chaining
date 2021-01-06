<?php

use app\core\Application;
use app\core\Request;
use app\core\Response;

use app\models\Navbar;
use app\models\Category;
use app\models\CollapseMenu;
use app\models\SubMenu;

Application::all('/', function (Request $request, Response $response) {
  return $response->render('index', [
    'navbars' => Navbar::findAll(['categoryId' => 4]),
    'categories' => Category::findAll()
  ]);
});

// Application::get('/tester/animation', function (Request $request, Response $response) {
//   return $response->render('tester/anime');
// });

Application::get('/consultation', 'ConsultationController@selectConsul');
Application::get('/consultation/{id}', 'ConsultationController@consultation');
Application::post('/consultation/{id}', 'ConsultationController@results');

Application::post('/auth', 'AuthController@login');
Application::get('/auth/gplus', 'AuthController@goauth');
Application::post('/auth/out', 'AuthController@logout');
Application::post('/auth/join', 'AuthController@register');

$subUrlMap = [];

foreach (SubMenu::findAll() as $key => $value) {
  $subUrlMap[$value['id']] = $value['url'];
}

Application::get($subUrlMap[1], 'MemberController@index');

Application::post('/members/getproblem', 'MemberController@getProblem');
Application::put('/members/updateproblem', 'MemberController@updateProblem');
Application::delete('/members/dropproblem', 'MemberController@deleteProblem');

Application::get('/members/account', 'UserController@account');
Application::put('/members/account/upload', 'UserController@updateImageProfile');
Application::put('/members/account/password', 'UserController@updatePassword');
Application::put('/members/account/{targetUpdate}', 'UserController@updateAccount');
Application::delete('/members/account', 'UserController@dropAccount');

Application::get($subUrlMap[2], 'MemberController@selectConsul');
Application::get($subUrlMap[2] . '/{id}', 'MemberController@consultation');
Application::post($subUrlMap[2] . '/{id}', 'MemberController@results');

Application::get($subUrlMap[3], 'MemberController@listUser');
Application::put($subUrlMap[3], 'MemberController@updateUser');
Application::delete($subUrlMap[3], 'MemberController@dropUser');

Application::get($subUrlMap[8], 'MemberController@disease');
Application::post($subUrlMap[8], 'MemberController@addDisease');
Application::put($subUrlMap[8], 'MemberController@updateDisease');
Application::delete($subUrlMap[8], 'MemberController@deleteDisease');

Application::get($subUrlMap[9], 'MemberController@symptom');
Application::post($subUrlMap[9], 'MemberController@addSymptom');
Application::put($subUrlMap[9], 'MemberController@updateSymptom');
Application::delete($subUrlMap[9], 'MemberController@deleteSymptom');

Application::get($subUrlMap[10], 'MemberController@knowledge');
Application::post($subUrlMap[10], 'MemberController@addKnowledge');
Application::put($subUrlMap[10], 'MemberController@updateKnowledge');
Application::delete($subUrlMap[10], 'MemberController@deleteKnowledge');

Application::get($subUrlMap[11], 'MemberController@rule');

$collUrlMap = [];

foreach (CollapseMenu::findAll() as $key => $value) {
  $collUrlMap[$value['id']] = $value['url'];
}

Application::get($collUrlMap[1], 'SidemenuController@sidemenu');
Application::post($collUrlMap[1], 'SidemenuController@addSidemenu');
Application::put($collUrlMap[1], 'SidemenuController@updateSidemenu');
Application::delete($collUrlMap[1], 'SidemenuController@deleteSidemenu');

Application::get($collUrlMap[2], 'SidemenuController@menu');
Application::post($collUrlMap[2], 'SidemenuController@addMenu');
Application::put($collUrlMap[2], 'SidemenuController@updateMenu');
Application::delete($collUrlMap[2], 'SidemenuController@deleteMenu');

Application::get($collUrlMap[3], 'SidemenuController@submenu');
Application::post($collUrlMap[3], 'SidemenuController@addSubmenu');
Application::put($collUrlMap[3], 'SidemenuController@updateSubmenu');
Application::delete($collUrlMap[3], 'SidemenuController@deleteSubmenu');
