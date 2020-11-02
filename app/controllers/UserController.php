<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\core\Response;

use app\core\middleware\AuthMiddleware;

class UserController extends Controller
{
  public function __construct()
  {
    $this->setMiddleware(new AuthMiddleware(
      ['updateProfile' => ['member', 'docter', 'admin']],
    ));
  }

  public function updateNameProfile(Request $request, Response $response)
  {
    # code ..
  }
}
