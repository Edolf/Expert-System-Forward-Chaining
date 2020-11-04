<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\core\HttpException;

use app\models\Menu;

use app\core\middleware\AuthMiddleware;

class SidemenuController extends Controller
{
  public function __construct()
  {
    $this->setMiddleware(new AuthMiddleware(
      ['sidemenu' => ['admin']],
      ['addSidemenu' => ['admin']],
      ['updateSidemenu' => ['admin']],
      ['deleteSidemenu' => ['admin']],
      ['menu' => ['admin']]
    ));
  }

  public function sidemenu(Request $request, Response $response)
  {
    return $response->render('members/sidebars/menu/index', ['title' => 'Sidemenus', 'menus' => Menu::findAll()]);
  }

  public function addSidemenu(Request $request, Response $response)
  {
    self::validateBody('newMenu')->isNotNull()->isLength(['min' => 2, 'max' => 25])->isAlphaSpace()->trimBody()->sanitizeBody();
    if (!empty(self::validateResults())) {
      $request->setFlash('menu', 'alert-danger', self::validateResults());
      $response->redirect('/members/sidemenu');
    } else {
      if (Menu::create([
        'menu' => $request->getBody('newMenu'),
        'isActive' => $request->getBody('isActive') == 'on' ? 1 : 0,
        'other' => json_encode(
          ['access' => [
            $request->getBody('admin') == "on" ? "admin" : "",
            // $request->getBody('docter') == "on" ? "member" : "",
            $request->getBody('member') == "on" ? "member" : "",
          ]]
        )
      ])) {
        $request->setFlash('menu', 'alert-success', [['msg' => "{$request->getBody('newMenu')} Has Been Added"]]);
        $response->redirect('/members/sidemenu');
      } else {
        throw new HttpException(500);
      }
    }
  }

  public function updateSidemenu(Request $request, Response $response)
  {
    self::validateBody('menu')->isNotNull()->isLength(['min' => 2, 'max' => 25])->isAlphaSpace()->trimBody()->sanitizeBody();
    if (!empty(self::validateResults())) {
      $request->setFlash('menu', 'alert-danger', self::validateResults());
      $response->redirect('/');
    } else {
      if (Menu::update([
        'menu' => $request->getBody('menu'),
        'isActive' => $request->getBody('isActive') == 'on' ? 1 : 0,
        'other' => json_encode(
          ['access' => [
            $request->getBody('admin') == "on" ? "admin" : "",
            // $request->getBody('docter') == "on" ? "member" : "",
            $request->getBody('member') == "on" ? "member" : "",
          ]]
        )
      ], ['id' => $request->getQuery('id')])) {
        $request->setFlash('menu', 'alert-success', [['msg' => "{$request->getBody('menu')} Has Been Updated"]]);
        $response->redirect('/members/sidemenu');
      } else {
        throw new HttpException(500);
      }
    }
  }

  public function deleteSidemenu(Request $request, Response $response)
  {
    if (Menu::destroy(['id' => $request->getQuery('id')])) {
      $request->setFlash('menu', 'alert-success', [['msg' => "{$request->getQuery('title')} Has Been Deleted"]]);
      $response->redirect('/members/sidemenu');
    } else {
      throw new HttpException(404);
    }
  }

  public function menu(Request $request, Response $response)
  {
    return $response->render('members/sidebars/submenu/index', ['title' => 'Sidemenus', 'menus' => Menu::findAll()]);
  }
}
