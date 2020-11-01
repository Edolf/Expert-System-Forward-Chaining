<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\core\Response;

use app\core\middleware\AuthMiddleware;

class MembersController extends Controller
{
  public function __construct()
  {
    $this->setMiddleware(new AuthMiddleware(
      ['index' => ['member', 'docter', 'admin']],
      ['listUser' => ['admin']],
      ['consultation' => ['member', 'docter', 'admin']]
    ));
  }

  public function index(Request $request, Response $response)
  {
    return $response->render('members/index', ['title' => 'Dashboard']);
  }

  public function listUser(Request $request, Response $response)
  {
    # code...
  }

  public function consultation(Request $request, Response $response)
  {
    # code...
  }

  public function sidemenu(Request $request, Response $response)
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
    # code...
  }
}
