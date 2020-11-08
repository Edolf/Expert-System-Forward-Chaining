<?php

namespace app\controllers;

use app\core\Application;
use app\core\HttpException;
use app\core\Controller;
use app\core\Request;
use app\core\Response;

use app\models\User;
use app\models\Disease;
use app\models\Symptom;
use app\models\KnowledgeBase;
use app\models\Rule;
use app\models\ExpertSystem;
use app\models\SubMenu;

use app\core\middleware\AuthMiddleware;

class MemberController extends Controller
{

  use DiseaseController;
  use SymptomController;
  use KnowledgeController;

  public function __construct(Request $request, Response $response)
  {
    $access = json_decode(SubMenu::findOne(['url' => $request->getUrl()])->other)->access;
    if ($access) {
      $this->setMiddleware(new AuthMiddleware(
        [AuthMiddleware::ALL_METHOD => $access],
      ));
    } else {
      $this->setMiddleware(new AuthMiddleware());
    }

    Application::$app->locals['title'] = 'Disease';
    Application::$app->locals['ExpertSystems'] = ExpertSystem::findAll();
    Application::$app->locals['diseases'] = Disease::class;
    Application::$app->locals['symptoms'] = Symptom::class;
    Application::$app->locals['knowledgebases'] = KnowledgeBase::class;
    Application::$app->locals['rule'] = Rule::class;
  }

  public function index(Request $request, Response $response)
  {
    return $response->render('members/index', ['title' => 'Dashboard']);
  }

  public function listUser(Request $request, Response $response)
  {
    return $response->render('members/listuser', ['title' => 'List Users', 'members' => User::findAll()]);
  }

  public function selectConsul(Request $request, Response $response)
  {
    return $response->render('members/consultations/select', ['title' => 'Tester Consultation']);
  }

  public function consultation(Request $request, Response $response)
  {
    echo '<pre>';
    var_dump("hehehe");
    echo '</pre>';
    exit;
    // return $response->render('members/consultations/index');
  }

  public function results(Request $request, Response $response)
  {
    return $response->render('members/consultations/result');
  }

  public function rule(Request $request, Response $response)
  {
    return $response->render('members/rule');
  }

  public function account(Request $request, Response $response)
  {
    return $response->render('members/users/myaccount', ['title' => 'My Account']);
  }
}
