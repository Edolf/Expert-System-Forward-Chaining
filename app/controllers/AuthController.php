<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;

use app\models\User;

class AuthController extends Controller
{
  public function login(Request $request, Response $response)
  {
    static::validate($request->getBody('user'))->isNotNull()->isLength(['min' => 2, 'max' => 25])->trimBody();
    static::validate($request->getBody('password'))->isNotNull()->isLength(['min' => 6, 'max' => 30])->trimBody();

    if (!empty(static::validateResults())) {
      $response->setStatusCode($response::HTTP_BAD_REQUEST)->setContent(json_encode(['errors' => static::validateResults()]))->send();
    } else {
      $user = User::findOne(['email' => $request->getBody('user')]);
      if (!$user) {
        $response->setStatusCode($response::HTTP_NOT_FOUND)->setContent(json_encode(['errors' => [[
          "msg" => "User Not Found",
          "param" => "user"
        ]]]))->send();
      }
      if (!password_verify($request->getBody('password'), $user->password)) {
        $response->setStatusCode($response::HTTP_NOT_FOUND)->setContent(json_encode(['errors' => [[
          "msg" => "Inncorrect Password",
          "param" => "password"
        ]]]))->send();
      }
      $request->login($user);
      $response->redirect('/');
    }
  }

  public function goauth(Request $request, Response $response)
  {
    $response->setStatusCode($response::HTTP_TOO_EARLY)->setContent($response->render('error', [
      'error' => [
        'status' => $response::HTTP_TOO_EARLY,
        'message' => 'Coming Soon',
        'stack' => ''
      ]
    ]))->send();
  }

  public function register(Request $request, Response $response)
  {
    # code...
  }

  public function logout(Request $request, Response $response)
  {
    $request->logout();
    $response->redirect('/');
  }
}
