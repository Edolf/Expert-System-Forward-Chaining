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
  use ExpertSystemController;
  use DiseaseController;
  use SymptomController;
  use KnowledgeController;

  public function __construct(Request $request, Response $response)
  {
    $access = json_decode(SubMenu::findOne(['url' => $request->getUrl()])->other)->access ?? false;
    if ($access) {
      $this->setMiddleware(new AuthMiddleware(
        [AuthMiddleware::ALL_METHOD => $access],
      ));
    } else {
      $this->setMiddleware(new AuthMiddleware());
    }

    Application::$app->locals['expertsystems'] = ExpertSystem::class;
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
    if (ExpertSystem::findAll(['id' => $request->getParam('id')])) {
      return $response->render('members/consultations/index', ['title' => 'Tester Consultation', 'id' => $request->getParam('id')]);
    } else {
      throw new HttpException(400);
    }
  }

  public function results(Request $request, Response $response)
  {
    $sympTemp = Symptom::findAll(['id' => Symptom::IN(array_keys($request->getBody()))]);
    if (count($request->getBody()) != 0) {
      $knowledgebases = KnowledgeBase::findAll(['expertSystemId' => $request->getParam('id')]);
      $isSolving = false;
      while (!$isSolving) {
        $isNotFound = [];
        foreach ($knowledgebases as $key => $knowledgebase) {
          $isFound = [];
          foreach (explode(",", $knowledgebase['symptoms']) as $key => $symptomId) {
            if (in_array($symptomId, array_keys($request->getBody()))) {
              $isFound[] = true;
            }
          }
          if (count($isFound) == count(explode(",", $knowledgebase['symptoms']))) {
            $disease = Disease::findOne([Disease::AND([
              'id' => json_decode($knowledgebase['solvingId'], true)['diseaseId'],
              'expertSystemId' => $request->getParam('id')
            ])]);
            $symptom = Symptom::findOne([Symptom::AND([
              'id' => json_decode($knowledgebase['solvingId'], true)['symptomId'],
              'expertSystemId' => $request->getParam('id')
            ])]);
            if ($disease) {
              $isSolving = (array) $disease;
            } elseif ($symptom) {
              $symptom = (array) $symptom;
              $request->setBody($symptom['id'], 'on');
              unset($isNotFound);
              unset($knowledgebases[$key]);
            }
          } else {
            $isNotFound[] = true;
          }
          if (count($knowledgebases) <= count($isNotFound)) {
            $isSolving = [
              'id' => 0,
              'name' => 'Not Found',
              'desc' => 'We\'re Sorry, Your Disease Could Not be Found in Our System :(',
              'solution' => 'Please Contact your Doctor Immediately for Further Consultation',
            ];
          }
        }
      }
      return $response->render('members/consultations/result', [
        'results' => $isSolving,
        'sympTemps' => $sympTemp
      ]);
    } else {
      $isSolving = [
        'id' => 0,
        'name' => 'Not Found',
        'desc' => 'We\'re Sorry, Your Disease Could Not be Found in Our System :(',
        'solution' => 'Please Contact your Doctor Immediately for Further Consultation',
      ];
      return $response->render('members/consultations/result', [
        'results' => $isSolving,
        'sympTemps' => $sympTemp
      ]);
    }
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
