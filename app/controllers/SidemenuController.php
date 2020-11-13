<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\core\HttpException;

use app\models\Menu;
use app\models\SubMenu;
use app\models\CollapseMenu;

use app\core\Middleware\AuthMiddleware;

class SidemenuController extends Controller
{
  public function __construct(Request $request, Response $response)
  {
    $access = json_decode(CollapseMenu::findOne(['url' => $request->getUrl()])->other)->access;
    $this->setMiddleware(new AuthMiddleware(
      [AuthMiddleware::ALL_METHOD => $access],
    ));

    Application::$app->locals['title'] = 'Sidemenus';
    Application::$app->locals['menus'] = Menu::findAll();
    Application::$app->locals['submenus'] = SubMenu::findAll();
    Application::$app->locals['collapsemenus'] = CollapseMenu::findAll();
  }

  public function sidemenu(Request $request, Response $response)
  {
    return $response->render('members/sidebars/menu/index');
  }

  public function addSidemenu(Request $request, Response $response)
  {
    self::validateBody('newMenu')->isNotNull()->isLength(['min' => 2, 'max' => 25])->isAlphaSpace()->trim()->sanitize();
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
            // $request->getBody('doctor') == "on" ? "member" : "",
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
    self::validateQuery('id')->isInt()->trim()->sanitize();
    self::validateBody('menu')->isNotNull()->isLength(['min' => 2, 'max' => 25])->isAlphaSpace()->trim()->sanitize();

    if (!empty(self::validateResults())) {
      $request->setFlash('menu', 'alert-danger', self::validateResults());
      $response->redirect('/members/sidemenu');
    } else {
      if (Menu::update([
        'menu' => $request->getBody('menu'),
        'isActive' => $request->getBody('isActive') == 'on' ? 1 : 0,
        'other' => json_encode(
          ['access' => [
            $request->getBody('admin') == "on" ? "admin" : "",
            // $request->getBody('doctor') == "on" ? "member" : "",
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
    self::validateQuery('id')->isInt()->trim()->sanitize();

    if (!empty(self::validateResults())) {
      $request->setFlash('menu', 'alert-danger', self::validateResults());
      $response->redirect('/members/sidemenu');
    } else {
      if (Menu::destroy(['id' => $request->getQuery('id')])) {
        $request->setFlash('menu', 'alert-success', [['msg' => "{$request->getQuery('title')} Has Been Deleted"]]);
        $response->redirect('/members/sidemenu');
      } else {
        throw new HttpException(404);
      }
    }
  }

  public function menu(Request $request, Response $response)
  {
    return $response->render('members/sidebars/submenu/index');
  }

  public function addMenu(Request $request, Response $response)
  {
    self::validateBody('menuId')->isNotNull()->isInt()->trim()->sanitize();
    self::validateBody('icon')->isNotNull()->isString()->trim()->sanitize();
    self::validateBody('title')->isNotNull()->isAlphaSpace()->isLength(['min' => 2, 'max' => 25])->trim()->sanitize();
    self::validateBody('url')->isNotNull()->trim()->sanitize('URL');

    if (!empty(self::validateResults())) {
      $request->setFlash('submenu', 'alert-danger', self::validateResults());
      $response->redirect('/members/sidemenu/menu');
    } else {
      if (SubMenu::create([
        'menuId' => $request->getBody('menuId'),
        'title' => $request->getBody('title'),
        'url' => $request->getBody('url'),
        'icon' => $request->getBody('icon'),
        'isActive' => $request->getBody('isActive') == 'on' ? 1 : 0,
        'other' => json_encode(
          ['access' => [
            $request->getBody('admin') == "on" ? "admin" : "",
            // $request->getBody('doctor') == "on" ? "member" : "",
            $request->getBody('member') == "on" ? "member" : "",
          ]]
        )
      ])) {
        $request->setFlash('submenu', 'alert-success', [['msg' => "{$request->getBody('title')} Has Been Added"]]);
        $response->redirect('/members/sidemenu/menu');
      } else {
        throw new HttpException(500);
      }
    }
  }

  public function updateMenu(Request $request, Response $response)
  {
    self::validateBody('menuId')->isNotNull()->isInt()->trim()->sanitize();
    self::validateBody('icon')->isNotNull()->isString()->trim()->sanitize();
    self::validateBody('title')->isNotNull()->isAlphaSpace()->isLength(['min' => 2, 'max' => 25])->trim()->sanitize();
    self::validateBody('url')->isNotNull()->trim()->sanitize('URL');

    if (!empty(self::validateResults())) {
      $request->setFlash('submenu', 'alert-danger', self::validateResults());
      $response->redirect('/members/sidemenu/menu');
    } else {
      if (SubMenu::update([
        'menuId' => $request->getBody('menuId'),
        'title' => $request->getBody('title'),
        'url' => $request->getBody('url'),
        'icon' => $request->getBody('icon'),
        'isActive' => $request->getBody('isActive') == 'on' ? 1 : 0,
        'other' => json_encode(
          ['access' => [
            $request->getBody('admin') == "on" ? "admin" : "",
            // $request->getBody('doctor') == "on" ? "member" : "",
            $request->getBody('member') == "on" ? "member" : "",
          ]]
        )
      ], ['id' => $request->getQuery('id')])) {
        $request->setFlash('submenu', 'alert-success', [['msg' => "{$request->getBody('title')} Has Been Updated"]]);
        $response->redirect('/members/sidemenu/menu');
      } else {
        throw new HttpException(500);
      }
    }
  }

  public function deleteMenu(Request $request, Response $response)
  {
    self::validateQuery('id')->isInt()->trim()->sanitize();

    if (!empty(self::validateResults())) {
      $request->setFlash('submenu', 'alert-danger', self::validateResults());
      $response->redirect('/members/sidemenu/menu');
    } else {
      if (SubMenu::destroy(['id' => $request->getQuery('id')])) {
        $request->setFlash('submenu', 'alert-success', [['msg' => "{$request->getQuery('title')} Has Been Deleted"]]);
        $response->redirect('/members/sidemenu/menu');
      } else {
        throw new HttpException(404);
      }
    }
  }

  public function submenu(Request $request, Response $response)
  {
    return $response->render('members/sidebars/collapsemenu/index');
  }

  public function addSubmenu(Request $request, Response $response)
  {
    self::validateBody('subMenuId')->isNotNull()->isInt()->trim()->sanitize();
    self::validateBody('title')->isNotNull()->isAlphaSpace()->isLength(['min' => 2, 'max' => 25])->trim()->sanitize();
    self::validateBody('url')->isNotNull()->trim()->sanitize('URL');

    if (!empty(self::validateResults())) {
      $request->setFlash('collapsemenu', 'alert-danger', self::validateResults());
      $response->redirect('/members/sidemenu/submenu');
    } else {
      if (CollapseMenu::create([
        'subMenuId' => $request->getBody('subMenuId'),
        'title' => $request->getBody('title'),
        'url' => $request->getBody('url'),
        'isActive' => $request->getBody('isActive') == 'on' ? 1 : 0,
        'other' => json_encode(
          ['access' => [
            $request->getBody('admin') == "on" ? "admin" : "",
            // $request->getBody('doctor') == "on" ? "member" : "",
            $request->getBody('member') == "on" ? "member" : "",
          ]]
        )
      ])) {
        $request->setFlash('collapsemenu', 'alert-success', [['msg' => "{$request->getBody('title')} Has Been Added"]]);
        $response->redirect('/members/sidemenu/submenu');
      } else {
        throw new HttpException(500);
      }
    }
  }

  public function updateSubmenu(Request $request, Response $response)
  {
    self::validateBody('subMenuId')->isNotNull()->isInt()->trim()->sanitize();
    self::validateBody('title')->isNotNull()->isAlphaSpace()->isLength(['min' => 2, 'max' => 25])->trim()->sanitize();
    self::validateBody('url')->isNotNull()->trim()->sanitize('URL');

    if (!empty(self::validateResults())) {
      $request->setFlash('collapsemenu', 'alert-danger', self::validateResults());
      $response->redirect('/members/sidemenu/submenu');
    } else {
      if (CollapseMenu::update([
        'subMenuId' => $request->getBody('subMenuId'),
        'title' => $request->getBody('title'),
        'url' => $request->getBody('url'),
        'isActive' => $request->getBody('isActive') == 'on' ? 1 : 0,
        'other' => json_encode(
          ['access' => [
            $request->getBody('admin') == "on" ? "admin" : "",
            // $request->getBody('doctor') == "on" ? "member" : "",
            $request->getBody('member') == "on" ? "member" : "",
          ]]
        )
      ], ['id' => $request->getQuery('id')])) {
        $request->setFlash('collapsemenu', 'alert-success', [['msg' => "{$request->getBody('title')} Has Been Updated"]]);
        $response->redirect('/members/sidemenu/submenu');
      } else {
        throw new HttpException(500);
      }
    }
  }

  public function deleteSubmenu(Request $request, Response $response)
  {
    self::validateQuery('id')->isInt()->trim()->sanitize();

    if (!empty(self::validateResults())) {
      $request->setFlash('collapsemenu', 'alert-danger', self::validateResults());
      $response->redirect('/members/sidemenu/submenu');
    } else {
      if (CollapseMenu::destroy(['id' => $request->getQuery('id')])) {
        $request->setFlash('collapsemenu', 'alert-success', [['msg' => "{$request->getQuery('title')} Has Been Deleted"]]);
        $response->redirect('/members/sidemenu/submenu');
      } else {
        throw new HttpException(404);
      }
    }
  }
}
