<?php

namespace app\controllers;

use app\core\HttpException;
use app\core\Request;
use app\core\Response;

use app\models\ExpertSystem;
use app\models\Disease;
use app\models\Symptom;
use app\models\KnowledgeBase;

trait ExpertSystemController
{
  public function getProblem(Request $request, Response $response)
  {
    self::validateBody('problemname')->isNotNull()->isLength(['min' => 3, 'max' => 25])->custom(function ($problemname) {
      return ExpertSystem::findOne(['problem' => $problemname], function ($problem) {
        if ($problem) {
          return new \Error('Problem Name Has Already Been Registered');
        }
      });
    })->trim()->sanitize();
    self::validateBody('problemdesc')->isNotNull()->isLength(['min' => 3, 'max' => 500])->trim()->sanitize();

    if (!empty(self::validateResults())) {
      $response->setStatusCode(400)->setContent(json_encode(['errors' => self::validateResults()]))->send();
    } else {
      if (ExpertSystem::create([
        'problem' => $request->getBody('problemname'),
        'desc' => $request->getBody('problemdesc')
      ])) {
        $request->setFlash('doctor', 'Ilona_537', [['msg' => "{$request->getBody('problemname')} Has Been Added"]]);
        $response->redirect('/members');
      } else {
        throw new HttpException(500);
      }
    }
  }

  public function updateProblem(Request $request, Response $response)
  {
    self::validateBody('editproblemname')->isNotNull()->isLength(['min' => 3, 'max' => 25])->custom(function ($editproblemname, $request) {
      $problem = ExpertSystem::findOne(['problem' => $editproblemname]);
      if ($problem) {
        if ($problem->problem != $request->getBody('editproblemname')) {
          return new \Error('Problem Name Has Already Been Registered');
        }
      }
    })->trim()->sanitize();
    self::validateBody('editproblemdesc')->isNotNull()->isLength(['min' => 3, 'max' => 500])->trim()->sanitize();

    if (!empty(self::validateResults())) {
      $response->setStatusCode(400)->setContent(json_encode(['errors' => self::validateResults()]))->send();
    } else {
      if (ExpertSystem::update([
        'problem' => $request->getBody('editproblemname'),
        'desc' => $request->getBody('editproblemdesc')
      ], ['id' => $request->getQuery('id')])) {
        $request->setFlash('doctor', 'Ilona_537', [['msg' => "{$request->getBody('editproblemname')} Has Been Updated"]]);
        $response->redirect('/members');
      } else {
        throw new HttpException(500);
      }
    }
  }

  public function deleteProblem(Request $request, Response $response)
  {
    $deleteExpertSystem = ExpertSystem::destroy(['id' => $request->getQuery('id')]);
    if ($deleteExpertSystem) {
      Disease::destroy(['expertSystemId' => $request->getQuery('id')]);
      Symptom::destroy(['expertSystemId' => $request->getQuery('id')]);
      KnowledgeBase::destroy(['expertSystemId' => $request->getQuery('id')]);
      $request->setFlash('doctor', 'Ilona_537', [['msg' => "The Problem Has Been Deleted"]]);
      $response->redirect('/members');
    } else {
      throw new HttpException(500);
    }
  }
}
