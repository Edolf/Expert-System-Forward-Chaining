<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\core\Response;

use app\models\User;
use app\models\Menu;

use app\core\middleware\AuthMiddleware;

class MemberController extends Controller
{
  public function __construct()
  {
    $this->setMiddleware(new AuthMiddleware(
      ['index' => ['member', 'docter', 'admin']],
      ['listUser' => ['admin']],
      ['consultation' => ['member', 'docter', 'admin']],
      ['account' => ['member', 'docter', 'admin']]
    ));
  }

  public function index(Request $request, Response $response)
  {
    return $response->render('members/index', ['title' => 'Dashboard']);
  }

  public function listUser(Request $request, Response $response)
  {
    return $response->render('members/listuser', ['title' => 'List Users', 'members' => User::findAll()]);
  }

  public function consultation(Request $request, Response $response)
  {
    # code...
  }

  public function disease(Request $request, Response $response)
  {
    # code...
  }

  public function symptom(Request $request, Response $response)
  {
    # code...
  }

  public function knowledge(Request $request, Response $response)
  {
    # code...
  }

  public function rule(Request $request, Response $response)
  {
    # code...
  }

  public function account(Request $request, Response $response)
  {
    return $response->render('members/users/myaccount', ['title' => 'My Account']);
  }
}
