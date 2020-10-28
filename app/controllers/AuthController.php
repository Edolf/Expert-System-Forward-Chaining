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
      $response->setStatusCode(400)->json(['errors' => static::validateResults()]);
    } else {
      $user = User::findOne(['email' => $request->getBody('user')]);
      if (!$user) {
        $response->setStatusCode(404)->json(['errors' => [
          "msg" => "User Not Found",
          "param" => "user"
        ]])->end();
      }
      if (!password_verify($request->getBody('password'), $user->password)) {
        $response->setStatusCode(400)->json(['errors' => [
          "msg" => "Inncorrect Password",
          "param" => "password"
        ]])->end();
      }
      $request->login($user);
      $response->redirect('/');
    }
  }
  public function register(Request $request, Response $response)
  {
  }
}
