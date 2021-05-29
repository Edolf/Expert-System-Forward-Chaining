<?php

namespace app\controllers;

use app\core\Application;
use app\core\Middleware\AuthMiddleware;
use app\core\Controller;
use app\core\HttpException;
use app\core\Request;
use app\core\Response;
use helpers\ExpertSystemAlgorithm;

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

    $GLOBALS['locals']['expertsystems'] = ExpertSystem::class;
    $GLOBALS['locals']['diseases'] = Disease::class;
    $GLOBALS['locals']['symptoms'] = Symptom::class;
    $GLOBALS['locals']['knowledgebases'] = KnowledgeBase::class;
    $GLOBALS['locals']['rule'] = Rule::class;
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

  public function results(Request $request, Response $response)
  {
    $options = [];
    foreach ($request->getBody() as $key => $value) {
      if ($value === 'on') {
        $options[] = $key;
      }
    }
    $results = new ExpertSystemAlgorithm(
      $options,
      Disease::findAll(['expertSystemId' => $request->getParam('id')]),
      Symptom::findAll(['expertSystemId' => $request->getParam('id')]),
      KnowledgeBase::findAll(['expertSystemId' => $request->getParam('id')])
    );
    $results = $results->forwardChaining();
    if (!$results) {
      $results = [
        'id' => 0,
        'name' => 'Not Found',
        'desc' => 'We\'re Sorry, Your Disease Could Not be Found in Our System :(',
        'solution' => 'Please Contact your Doctor Immediately for Further Consultation',
      ];
    }
    return $response->render('consultations/result', [
      'results' => $results,
      'sympTemps' => Symptom::findAll(['id' => Symptom::IN($options)])
    ]);
  }
}
