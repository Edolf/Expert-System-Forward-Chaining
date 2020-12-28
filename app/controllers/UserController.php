<?php

namespace app\controllers;

use app\core\Application;
use app\core\HttpException;
use app\core\Controller;
use app\core\Request;
use app\core\Response;

use app\models\User;

use app\core\Middleware\AuthMiddleware;

class UserController extends Controller
{
  public function __construct()
  {
    $this->setMiddleware(new AuthMiddleware());
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
    self::validateParam('targetUpdate')->isNotNull()->custom(function ($targetUpdate, $request) {
      if (!in_array($targetUpdate, array_keys(User::attributes()))) {
        return new \Error('Hehehe Jangan Di Usik Yah Coding nya,,');
      }
      if (in_array($targetUpdate, ['username', 'email'])) {
        $user = User::findOne([
          $targetUpdate => $request->getQuery(array_keys($request->getQuery())[0])
        ]);
        if ($user) {
          self::createError($request->getParam('targetUpdate') . ' Has Already Been Used by Other User', array_keys($request->getQuery())[0], 'body');
        }
      }
    })->trim()->sanitize();
    self::validateQuery(array_keys($request->getQuery())[0])->isNotNull()->trim()->sanitize();

    if (!empty(self::validateResults())) {
      $response->setStatusCode(400)->setContent(json_encode(['errors' => self::validateResults()]))->send();
    } else {
      if (User::update([$request->getParam('targetUpdate') => $request->getQuery(array_keys($request->getQuery())[0])], ['id' => Application::$app->user->id])) {
        $response->redirect('/members/account');
      } else {
        throw new HttpException(500);
      }
    }
  }

  public function updatePassword(Request $request, Response $response)
  {
    self::validateBody('oldpassword')->isNotNull()->custom(function ($oldpassword) {
      $user = Application::$app->user;
      if (!$user || !password_verify($oldpassword, $user->password)) {
        return new \Error('Wrong Password');
      }
    })->trim();
    self::validateBody('newpassword')->isNotNull()->equals($request->getBody('confirmpassword'), 'New Password Does Not Match')->trim();
    self::validateBody('confirmpassword')->isNotNull()->trim();

    if (!empty(self::validateResults())) {
      $response->setStatusCode(400)->setContent(json_encode(['errors' => self::validateResults()]))->send();
    } else {
      if (User::update(['password' => password_hash($request->getBody('newpassword'), PASSWORD_DEFAULT)], ['id' => Application::$app->user->id])) {
        $response->redirect('/members/account');
      } else {
        throw new HttpException(500);
      }
    }
  }

  public function updateImageProfile(Request $request, Response $response)
  {
    self::validateFile('userprofile')->isExt(['jpg', 'jpeg', 'png', 'bmp'])->isType(['image', 'jpg', 'jpeg', 'png', 'bmp'])->isLimit(['max' => 300000]);

    if (!empty(self::validateResults())) {
      $request->setFlash('upload', 'invalid', self::validateResults());
      $response->redirect('/members/account');
    } else {
      if (User::update(['image' => base64_encode(file_get_contents($request->getFile('userprofile')["tmp_name"]))], ['id' => Application::$app->user->id])) {
        $request->setFlash('upload', 'valid', [['msg' => "Looks Good"]]);
        $response->redirect('/members/account');
      } else {
        throw new HttpException(500);
      }
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
      $response->setStatusCode(400)->setContent(json_encode(['errors' => self::validateResults()]))->send();
    } else {
      $id = Application::$app->user->id;
      $request->logout();
      if (User::destroy(['id' => $id])) {
        $response->redirect('/');
      } else {
        throw new HttpException(500);
      }
    }
  }
}
