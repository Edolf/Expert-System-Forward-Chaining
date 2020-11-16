<?php

namespace app\controllers;

use app\core\Application;
use app\core\Middleware\AuthMiddleware;
use app\core\Controller;
use app\core\HttpException;
use app\core\Request;
use app\core\Response;

use app\models\User;
use app\models\Disease;
use app\models\Symptom;
use app\models\KnowledgeBase;
use app\models\Rule;
use app\models\ExpertSystem;
use app\models\SubMenu;

class ConsultationController extends Controller
{
  public function __construct(Request $request, Response $response)
  {
    $this->setMiddleware(new AuthMiddleware());

    Application::$app->locals['expertsystems'] = ExpertSystem::class;
    Application::$app->locals['diseases'] = Disease::class;
    Application::$app->locals['symptoms'] = Symptom::class;
    Application::$app->locals['knowledgebases'] = KnowledgeBase::class;
    Application::$app->locals['rule'] = Rule::class;
  }

  public function selectConsul(Request $request, Response $response)
  {
    return $response->render('consultations/index', ['title' => 'Expert System | Forward Chanings']);
  }

  public function consultation(Request $request, Response $response)
  {
    $expertsystem = ExpertSystem::findOne(['id' => $request->getParam('id')]);
    if ($expertsystem) {
      return $response->render('consultations/consultation', ['title' => $expertsystem->problem, 'id' => $request->getParam('id')]);
    } else {
      throw new HttpException(400);
    }
  }

  public function result(Request $request, Response $response)
  {
    $options = [];
    foreach ($request->getBody() as $key => $value) {
      if ($value === 'on') {
        $options[] = $key;
      }
    }
    $sympTemp = Symptom::findAll(['id' => Symptom::IN($options)]);
    if (count($options) != 0) {
      $knowledgebases = KnowledgeBase::findAll(['expertSystemId' => $request->getParam('id')]);
      $isSolving = false;
      while (!$isSolving) {
        $isNotFound = [];
        foreach ($knowledgebases as $key => $knowledgebase) {
          if (count($knowledgebases) <= count($isNotFound)) {
            $isSolving = [
              'id' => 0,
              'name' => 'Not Found',
              'desc' => 'We\'re Sorry, Your Disease Could Not be Found in Our System :(',
              'solution' => 'Please Contact your Doctor Immediately for Further Consultation',
            ];
          }
          $isFound = [];
          foreach (explode(",", $knowledgebase['symptoms']) as $symptomId) {
            if (in_array($symptomId, $options)) {
              $isFound[] = true;
            }
          }
          if (count($isFound) == count(explode(",", $knowledgebase['symptoms']))) {
            if (array_key_exists('diseaseId', json_decode($knowledgebase['solvingId'], true))) {
              $isSolving = (array) Disease::findOne([Disease::AND([
                'id' => json_decode($knowledgebase['solvingId'], true)['diseaseId'],
                'expertSystemId' => $request->getParam('id')
              ])]);
            } elseif (array_key_exists('symptomId', json_decode($knowledgebase['solvingId'], true))) {
              $symptom = Symptom::findOne([Symptom::AND([
                'id' => json_decode($knowledgebase['solvingId'], true)['symptomId'],
                'expertSystemId' => $request->getParam('id')
              ])]);
              $symptom = (array) $symptom;
              $options[] = $symptom['id'];
              $isNotFound = [];
              unset($knowledgebases[$key]);
            }
          } else {
            $isNotFound[] = true;
          }
        }
      }
      return $response->render('consultations/result', [
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
      return $response->render('consultations/result', [
        'results' => $isSolving,
        'sympTemps' => $sympTemp
      ]);
    }
  }
}
