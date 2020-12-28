<?php

namespace app\controllers;

use app\core\HttpException;
use app\core\Request;
use app\core\Response;

use app\models\Symptom;

trait SymptomController
{
  public function symptom(Request $request, Response $response)
  {
    return $response->render('members/symptoms/index', ['title' => 'Symptoms']);
  }

  public function addSymptom(Request $request, Response $response)
  {
    self::validateBody('symptomname')->isNotNull()->isString()->isLength(['max' => 100])->custom(function ($symptomname) {
      return Symptom::findOne(['name' => $symptomname], function ($symptom) {
        if ($symptom) {
          return new \Error('Symptom Name Alias Has Already Been Used');
        }
      });
    })->trim()->sanitize();
    self::validateBody('symptomdesc')->isNotNull()->isString()->isLength(['max' => 500])->trim()->sanitize();
    self::validateBody('question')->isNotNull()->isString()->isLength(['max' => 100])->trim()->sanitize();
    self::validateQuery('problemId')->isNotNull()->isInt()->trim()->sanitize();

    if (!empty(self::validateResults())) {
      return $response->setStatusCode(400)->setContent(json_encode(['errors' => self::validateResults()]))->send();
    } else {
      if (Symptom::create([
        'name' => $request->getBody('symptomname'),
        'desc' => $request->getBody('symptomdesc'),
        'question' => $request->getBody('question'),
        'expertSystemId' => $request->getQuery('problemId')
      ])) {
        $request->setFlash('symptom', '_1I2Cg', [['msg' => "{$request->getBody('symptomname')} Has Been Added"]]);
        $response->redirect('/members/symptom');
      } else {
        throw new HttpException(500);
      }
    }
  }

  public function updateSymptom(Request $request, Response $response)
  {
    self::validateBody('editsymptomname')->isNotNull()->isString()->isLength(['max' => 100])->custom(function ($editsymptomname, $request) {
      $symptom =  Symptom::findOne(['name' => $editsymptomname]);
      if ($symptom) {
        if ($symptom->name != $request->getQuery('name')) {
          return new \Error('Symptom Name Alias Has Already Been Used');
        }
      }
    })->trim()->sanitize();
    self::validateBody('editsymptomdesc')->isNotNull()->isString()->isLength(['max' => 500])->trim()->sanitize();
    self::validateBody('editquestion')->isNotNull()->isString()->isLength(['max' => 500])->trim()->sanitize();
    self::validateQuery('id')->isNotNull()->isInt()->trim()->sanitize();

    if (!empty(self::validateResults())) {
      return $response->setStatusCode(400)->setContent(json_encode(['errors' => self::validateResults()]))->send();
    } else {
      if (Symptom::update([
        'name' => $request->getBody('editsymptomname'),
        'desc' => $request->getBody('editsymptomdesc'),
        'question' => $request->getBody('editquestion'),
        'expertSystemId' => $request->getQuery('problemId')
      ], ['id' => $request->getQuery('id')])) {
        $request->setFlash('symptom', '_1I2Cg', [['msg' => "{$request->getQuery('name')} Has Been Updated"]]);
        $response->redirect('/members/symptom');
      } else {
        throw new HttpException(500);
      }
    }
  }

  public function deleteSymptom(Request $request, Response $response)
  {
    self::validateQuery('id')->isNotNull()->isInt()->trim()->sanitize();
    if (!empty(self::validateResults())) {
      $request->setFlash('symptom', '_1I2Cg', self::validateResults());
      $response->redirect('/members/symptom');
    } else {
      if (Symptom::destroy(['id' => $request->getQuery('id')])) {
        $request->setFlash('symptom', '_1I2Cg', [['msg' => "{$request->getQuery('name')} Has Been Deleted"]]);
        $response->redirect('/members/symptom');
      } else {
        throw new HttpException(500);
      }
    }
  }
}
