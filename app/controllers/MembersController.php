<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\core\Response;

use app\core\middlewares\AuthMiddleware;

class MembersController extends Controller
{
  public function __construct()
  {
    $this->registerMiddleware(new AuthMiddleware(['profile']));
  }

  public function index(Request $request, Response $response)
  {
    return $response->render('members/index', ['title' => 'Dashboard']);
  }
}
