<?php

use app\core\Application;
use app\core\Request;
use app\core\Response;

use app\models\Navbar;
use app\models\Category;
use app\models\Content;

Application::all('/', function (Request $request, Response $response) {
  return $response->render('index', [
    'navbars' => Navbar::findAll(['categoryId' => 4]),
    'categories' => Category::findAll()
  ]);
});

Application::get('/tester/animation', function (Request $request, Response $response) {
  return $response->render('tester/anime');
});

Application::get('/consultation', 'ConsultationController@selectConsul');
Application::get('/consultation/{id}', 'ConsultationController@consultation');
Application::post('/consultation/{id}', 'ConsultationController@results');

Application::post('/auth', 'AuthController@login');
Application::get('/auth/gplus', 'AuthController@goauth');
Application::post('/auth/out', 'AuthController@logout');
Application::post('/auth/join', 'AuthController@register');

Application::get('/members', 'MemberController@index');

Application::post('/members/getproblem', 'MemberController@getProblem');
Application::put('/members/updateproblem', 'MemberController@updateProblem');
Application::delete('/members/dropproblem', 'MemberController@deleteProblem');

Application::get('/members/account', 'UserController@account');
Application::put('/members/account/upload', 'UserController@updateImageProfile');
Application::put('/members/account/password', 'UserController@updatePassword');
Application::put('/members/account/{targetUpdate}', 'UserController@updateAccount');
Application::delete('/members/account', 'UserController@dropAccount');

Application::get('/members/list-user', 'MemberController@listUser');
Application::put('/members/list-user', 'MemberController@updateUser');
Application::delete('/members/list-user', 'MemberController@dropUser');

Application::get('/members/sidemenu', 'SidemenuController@sidemenu');
Application::post('/members/sidemenu', 'SidemenuController@addSidemenu');
Application::put('/members/sidemenu', 'SidemenuController@updateSidemenu');
Application::delete('/members/sidemenu', 'SidemenuController@deleteSidemenu');

Application::get('/members/sidemenu/menu', 'SidemenuController@menu');
Application::post('/members/sidemenu/menu', 'SidemenuController@addMenu');
Application::put('/members/sidemenu/menu', 'SidemenuController@updateMenu');
Application::delete('/members/sidemenu/menu', 'SidemenuController@deleteMenu');

Application::get('/members/sidemenu/submenu', 'SidemenuController@submenu');
Application::post('/members/sidemenu/submenu', 'SidemenuController@addSubmenu');
Application::put('/members/sidemenu/submenu', 'SidemenuController@updateSubmenu');
Application::delete('/members/sidemenu/submenu', 'SidemenuController@deleteSubmenu');

Application::get('/members/disease', 'MemberController@disease');
Application::post('/members/disease', 'MemberController@addDisease');
Application::put('/members/disease', 'MemberController@updateDisease');
Application::delete('/members/disease', 'MemberController@deleteDisease');

Application::get('/members/symptom', 'MemberController@symptom');
Application::post('/members/symptom', 'MemberController@addSymptom');
Application::put('/members/symptom', 'MemberController@updateSymptom');
Application::delete('/members/symptom', 'MemberController@deleteSymptom');

Application::get('/members/knowledge', 'MemberController@knowledge');
Application::post('/members/knowledge', 'MemberController@addKnowledge');
Application::put('/members/knowledge', 'MemberController@updateKnowledge');
Application::delete('/members/knowledge', 'MemberController@deleteKnowledge');

Application::get('/members/rule', 'MemberController@rule');

Application::get('/members/consultation', 'MemberController@selectConsul');
Application::get('/members/consultation/{id}', 'MemberController@consultation');
Application::post('/members/consultation/{id}', 'MemberController@results');
