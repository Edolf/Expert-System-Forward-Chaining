<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;

use app\models\User;

use app\core\Middleware\AuthMiddleware;

class UserController extends Controller
{
  public function __construct()
  {
    # code ..
  }

  public function account(Request $request, Response $response)
  {
    return $response->render('members/users/myaccount', ['title' => 'My Account']);
  }

  public function updateAccount(Request $request, Response $response)
  {
    self::validateBody('yourpassword')->isNotNull()->custom(function ($password) {
      if (!password_verify($password, Application::$app->user->password)) {
        return new \Error('Wrong Password');
      }
    });
    self::validateParam('targetUpdate')->isNotNull()->custom(function ($targetUpdate) {
      if (!in_array($targetUpdate, array_keys(User::attributes()))) {
        return new \Error('Hehehe Jangan Di Usik Yah Coding nya,,');
      }
    })->trim()->sanitize();
    self::validateQuery(array_keys($request->getQuery())[0])->isNotNull()->trim()->sanitize();

    if (!empty(self::validateResults())) {
      $response->setStatusCode($response::HTTP_BAD_REQUEST)->setContent(json_encode(['errors' => self::validateResults()]))->send();
    } else {
      User::update([
        $request->getParam('targetUpdate') => array_pop($request->getQuery())
      ], ['id' => Application::$app->user->id]);
      $response->redirect('/members/account');
    }
  }

  public function dropAccount(Request $request, Response $response)
  {
    self::validateBody('confirmation')->isNotNull()->custom(function ($confirmation) {
      $user = Application::$app->user;
      if ($user->password) {
        if (!password_verify($confirmation, $user->password)) {
          return new \Error('Inncorrect Password');
        }
      } else {
        if ($confirmation == 'delete me') {
          return new \Error('Inncorrect Value');
        }
      }
    })->trim();

    if (!empty(self::validateResults())) {
      $response->setStatusCode($response::HTTP_BAD_REQUEST)->setContent(json_encode(['errors' => self::validateResults()]))->send();
    } else {
      $request->logout();
      User::destroy(['id' => Application::$app->user->id]);
      $response->redirect('/');
    }
  }
}
