<?php

namespace app\controllers;

use app\core\HttpException;
use app\core\Request;
use app\core\Response;

use app\models\KnowledgeBase;

trait KnowledgeController
{
  public function knowledge(Request $request, Response $response)
  {
    return $response->render('members/knowledges/index', ['title' => 'Knowledge Bases']);
  }

  public function addKnowledge(Request $request, Response $response)
  {
    self::validateBody('solving')->isNotNull()->isString()->isLength(['max' => 50])->custom(function ($solving) {
      if (strpos($solving, 'disease-') !== false) {
        $id = (int) substr($solving, strpos($solving, 'disease-'));
        return KnowledgeBase::findOne(['solvingId' => json_encode(['diseaseId' => $id])], function ($data) {
          if ($data) {
            return new \Error('Solving Has Been Registered');
          }
        });
      } else {
        $id = (int) substr($solving, strpos($solving, 'symptom-'));
        return KnowledgeBase::findOne(['solvingId' => json_encode(['symptomId' => $id])], function ($data) {
          if ($data) {
            return new \Error('Solving Has Been Registered');
          }
        });
      }
    })->trim()->sanitize();
    self::validateBody('symptoms')->isArray();
    self::validateQuery('problemId')->isNotNull()->isInt()->trim()->sanitize();

    if (!empty(self::validateResults())) {
      $request->setFlash('knowledge', 'jP41K', self::validateResults());
      $response->redirect('/members/knowledge');
    } else {
      $typeSolving = strpos($request->getBody('solving'), 'disease-') !== false ? 'diseaseId' : 'symptomId';
      $id = (int) explode('-', $request->getBody('solving'))[1];
      if (KnowledgeBase::create([
        'solvingId' => json_encode([$typeSolving => $id]),
        'symptoms' => implode(',', $request->getBody('symptoms')),
        'expertSystemId' => $request->getQuery('problemId')
      ])) {
        $request->setFlash('knowledge', '_1SiFz', [['msg' => "The Knowledge Has Been Added"]]);
        $response->redirect('/members/knowledge');
      } else {
        throw new HttpException(500);
      }
    }
  }

  public function updateKnowledge(Request $request, Response $response)
  {
    self::validateBody('symptoms')->isArray();

    if (!empty(self::validateResults())) {
      $request->setFlash('knowledge', 'jP41K', self::validateResults());
      $response->redirect('/members/knowledge');
    } else {
      if (KnowledgeBase::update([
        'symptoms' => implode(',', $request->getBody('symptoms')),
      ], ['id' => $request->getQuery('id')])) {
        $request->setFlash('knowledge', '_1SiFz', [['msg' => "The Knowledge Has Been Updated"]]);
        $response->redirect('/members/knowledge');
      } else {
        throw new HttpException(500);
      }
    }
  }

  public function deleteKnowledge(Request $request, Response $response)
  {
    self::validateQuery('id')->isNotNull()->isInt()->trim()->sanitize();
    if (!empty(self::validateResults())) {
      $request->setFlash('knowledge', 'xf1sj', self::validateResults());
      $response->redirect('/members/knowledge');
    } else {
      if (KnowledgeBase::destroy(['id' => $request->getQuery('id')])) {
        $request->setFlash('knowledge', '_1SiFz', [['msg' => "The Knowledge Has Been Deleted"]]);
        $response->redirect('/members/knowledge');
      } else {
        throw new HttpException(500);
      }
    }
  }
}
