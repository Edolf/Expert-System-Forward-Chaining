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

    $GLOBALS['locals']['title'] = 'Sidemenus';
    $GLOBALS['locals']['menus'] = Menu::findAll();
    $GLOBALS['locals']['submenus'] = SubMenu::findAll();
    $GLOBALS['locals']['collapsemenus'] = CollapseMenu::findAll();
  }

  public function sidemenu(Request $request, Response $response)
  {
    return $response->render('members/sidebars/menu/index');
  }

  public function addSidemenu(Request $request, Response $response)
  {
    self::validateBody('newMenu')->isNotNull()->isLength(['min' => 2, 'max' => 25])->isAlphaSpace()->trim()->sanitize();
    if (!empty(self::validateResults())) {
      $response->setStatusCode(400)->setContent(json_encode(['errors' => self::validateResults()]))->send();
    } else {
      if (Menu::create([
        'menu' => $request->getBody('newMenu'),
        'isActive' => $request->getBody('isActive') == 'on' ? 1 : 0,
        'other' => json_encode(
          ['access' => [
            ($request->getBody('role') === 'admin' || in_array("admin", $request->getBody('role'))) ? "admin" : "",
            ($request->getBody('role') === 'doctor' || in_array("doctor", $request->getBody('role'))) ? "doctor" : "",
            ($request->getBody('role') === 'member' || in_array("member", $request->getBody('role'))) ? "member" : "",
          ]]
        )
      ])) {
        $request->setFlash('menu', 'alert-info', [['msg' => "{$request->getBody('newMenu')} Has Been Added"]]);
        $response->redirect($GLOBALS['collUrlMap'][1]);
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
      $response->setStatusCode(400)->setContent(json_encode(['errors' => self::validateResults()]))->send();
    } else {
      if (Menu::update([
        'menu' => $request->getBody('menu'),
        'isActive' => $request->getBody('isActive') == 'on' ? 1 : 0,
        'other' => json_encode(
          ['access' => [
            ($request->getBody('role') === 'admin' || in_array("admin", $request->getBody('role'))) ? "admin" : "",
            ($request->getBody('role') === 'doctor' || in_array("doctor", $request->getBody('role'))) ? "doctor" : "",
            ($request->getBody('role') === 'member' || in_array("member", $request->getBody('role'))) ? "member" : "",
          ]]
        )
      ], ['id' => $request->getQuery('id')])) {
        $request->setFlash('menu', 'alert-info', [['msg' => "{$request->getBody('menu')} Has Been Updated"]]);
        $response->redirect($GLOBALS['collUrlMap'][1]);
      } else {
        throw new HttpException(500);
      }
    }
  }

  public function deleteSidemenu(Request $request, Response $response)
  {
    self::validateQuery('id')->isInt()->trim()->sanitize();

    if (!empty(self::validateResults())) {
      $request->setFlash('menu', 'Carolina_534', self::validateResults());
      $response->redirect($GLOBALS['collUrlMap'][1]);
    } else {
      if (Menu::destroy(['id' => $request->getQuery('id')])) {
        $request->setFlash('menu', 'alert-info', [['msg' => "{$request->getQuery('title')} Has Been Deleted"]]);
        $response->redirect($GLOBALS['collUrlMap'][1]);
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
      $response->setStatusCode(400)->setContent(json_encode(['errors' => self::validateResults()]))->send();
    } else {
      if (SubMenu::create([
        'menuId' => $request->getBody('menuId'),
        'title' => $request->getBody('title'),
        'url' => $request->getBody('url'),
        'icon' => $request->getBody('icon'),
        'isActive' => $request->getBody('isActive') == 'on' ? 1 : 0,
        'other' => json_encode(
          ['access' => [
            ($request->getBody('role') === 'admin' || in_array("admin", $request->getBody('role'))) ? "admin" : "",
            ($request->getBody('role') === 'doctor' || in_array("doctor", $request->getBody('role'))) ? "doctor" : "",
            ($request->getBody('role') === 'member' || in_array("member", $request->getBody('role'))) ? "member" : "",
          ]]
        )
      ])) {
        $request->setFlash('submenu', 'alert-info', [['msg' => "{$request->getBody('title')} Has Been Added"]]);
        $response->redirect($GLOBALS['collUrlMap'][2]);
      } else {
        throw new HttpException(500);
      }
    }
  }

  public function updateMenu(Request $request, Response $response)
  {
    self::validateBody('editMenuId')->isNotNull()->isInt()->trim()->sanitize();
    self::validateBody('editMenuIcon')->isNotNull()->isString()->trim()->sanitize();
    self::validateBody('editMenuTitle')->isNotNull()->isAlphaSpace()->isLength(['min' => 2, 'max' => 25])->trim()->sanitize();
    self::validateBody('editMenuUrl')->isNotNull()->trim()->sanitize('URL');

    if (!empty(self::validateResults())) {
      $response->setStatusCode(400)->setContent(json_encode(['errors' => self::validateResults()]))->send();
    } else {
      if (SubMenu::update([
        'menuId' => $request->getBody('editMenuId'),
        'title' => $request->getBody('editMenuTitle'),
        'url' => $request->getBody('editMenuUrl'),
        'icon' => $request->getBody('editMenuIcon'),
        'isActive' => $request->getBody('isActive') == 'on' ? 1 : 0,
        'other' => json_encode(
          ['access' => [
            ($request->getBody('editRole') === 'admin' || in_array("admin", $request->getBody('editRole'))) ? "admin" : "",
            ($request->getBody('editRole') === 'doctor' || in_array("doctor", $request->getBody('editRole'))) ? "doctor" : "",
            ($request->getBody('editRole') === 'member' || in_array("member", $request->getBody('editRole'))) ? "member" : "",
          ]]
        )
      ], ['id' => $request->getQuery('id')])) {
        $request->setFlash('submenu', 'alert-info', [['msg' => "{$request->getBody('editMenuTitle')} Has Been Updated"]]);
        $response->redirect($GLOBALS['collUrlMap'][2]);
      } else {
        throw new HttpException(500);
      }
    }
  }

  public function deleteMenu(Request $request, Response $response)
  {
    self::validateQuery('id')->isInt()->trim()->sanitize();

    if (!empty(self::validateResults())) {
      $request->setFlash('submenu', 'Carolina_534', self::validateResults());
      $response->redirect($GLOBALS['collUrlMap'][2]);
    } else {
      if (SubMenu::destroy(['id' => $request->getQuery('id')])) {
        $request->setFlash('submenu', 'alert-info', [['msg' => "{$request->getQuery('title')} Has Been Deleted"]]);
        $response->redirect($GLOBALS['collUrlMap'][2]);
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
      $response->setStatusCode(400)->setContent(json_encode(['errors' => self::validateResults()]))->send();
    } else {
      if (CollapseMenu::create([
        'subMenuId' => $request->getBody('subMenuId'),
        'title' => $request->getBody('title'),
        'url' => $request->getBody('url'),
        'isActive' => $request->getBody('isActive') == 'on' ? 1 : 0,
        'other' => json_encode(
          ['access' => [
            ($request->getBody('role') === 'admin' || in_array("admin", $request->getBody('role'))) ? "admin" : "",
            ($request->getBody('role') === 'doctor' || in_array("doctor", $request->getBody('role'))) ? "doctor" : "",
            ($request->getBody('role') === 'member' || in_array("member", $request->getBody('role'))) ? "member" : "",
          ]]
        )
      ])) {
        $request->setFlash('collapsemenu', 'alert-info', [['msg' => "{$request->getBody('title')} Has Been Added"]]);
        $response->redirect($GLOBALS['collUrlMap'][3]);
      } else {
        throw new HttpException(500);
      }
    }
  }

  public function updateSubmenu(Request $request, Response $response)
  {
    self::validateBody('editSubMenuId')->isNotNull()->isInt()->trim()->sanitize();
    self::validateBody('editSubMenuTitle')->isNotNull()->isAlphaSpace()->isLength(['min' => 2, 'max' => 25])->trim()->sanitize();
    self::validateBody('editSubMenuUrl')->isNotNull()->trim()->sanitize('URL');

    if (!empty(self::validateResults())) {
      $response->setStatusCode(400)->setContent(json_encode(['errors' => self::validateResults()]))->send();
    } else {
      if (CollapseMenu::update([
        'subMenuId' => $request->getBody('editSubMenuId'),
        'title' => $request->getBody('editSubMenuTitle'),
        'url' => $request->getBody('editSubMenuUrl'),
        'isActive' => $request->getBody('isActive') == 'on' ? 1 : 0,
        'other' => json_encode(
          ['access' => [
            ($request->getBody('editRole') === 'admin' || in_array("admin", $request->getBody('editRole'))) ? "admin" : "",
            ($request->getBody('editRole') === 'doctor' || in_array("doctor", $request->getBody('editRole'))) ? "doctor" : "",
            ($request->getBody('editRole') === 'member' || in_array("member", $request->getBody('editRole'))) ? "member" : "",
          ]]
        )
      ], ['id' => $request->getQuery('id')])) {
        $request->setFlash('collapsemenu', 'alert-info', [['msg' => "{$request->getBody('title')} Has Been Updated"]]);
        $response->redirect($GLOBALS['collUrlMap'][3]);
      } else {
        throw new HttpException(500);
      }
    }
  }

  public function deleteSubmenu(Request $request, Response $response)
  {
    self::validateQuery('id')->isInt()->trim()->sanitize();

    if (!empty(self::validateResults())) {
      $request->setFlash('collapsemenu', 'Carolina_534', self::validateResults());
      $response->redirect($GLOBALS['collUrlMap'][3]);
    } else {
      if (CollapseMenu::destroy(['id' => $request->getQuery('id')])) {
        $request->setFlash('collapsemenu', 'alert-info', [['msg' => "{$request->getQuery('title')} Has Been Deleted"]]);
        $response->redirect($GLOBALS['collUrlMap'][3]);
      } else {
        throw new HttpException(404);
      }
    }
  }
}
