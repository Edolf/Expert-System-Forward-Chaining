<?php

namespace app\controllers;

use app\core\HttpException;
use app\core\Request;
use app\core\Response;

use app\models\Disease;

trait DiseaseController
{

  public function disease(Request $request, Response $response)
  {
    return $response->render('members/diseases/index', ['title' => 'Diseases']);
  }

  public function addDisease(Request $request, Response $response)
  {
    self::validateBody('diseasename')->isNotNull()->isString()->isLength(['max' => 50])->custom(function ($diseasename) {
      return Disease::findOne(['name' => $diseasename], function ($disease) {
        if ($disease) {
          return new \Error('Disease Name Alias Has Already Been Used');
        }
      });
    })->trim()->sanitize();
    self::validateBody('diseasedesc')->isNotNull()->isString()->isLength(['max' => 500])->trim()->sanitize();
    self::validateBody('diseasesolution')->isNotNull()->isString()->isLength(['max' => 500])->trim()->sanitize();
    self::validateQuery('problemId')->isNotNull()->isInt()->trim()->sanitize();

    if (!empty(self::validateResults())) {
      return $response->setStatusCode(400)->setContent(json_encode(['errors' => self::validateResults()]))->send();
    } else {
      if (Disease::create([
        'name' => $request->getBody('diseasename'),
        'desc' => $request->getBody('diseasedesc'),
        'solution' => $request->getBody('diseasesolution'),
        'expertSystemId' => $request->getQuery('problemId')
      ])) {
        $request->setFlash('disease', 'alert-success', [['msg' => "{$request->getBody('diseasename')} Has Been Added"]]);
        $response->redirect('/members/disease');
      } else {
        throw new HttpException(500);
      }
    }
  }

  public function updateDisease(Request $request, Response $response)
  {
    self::validateBody('editdiseasename')->isNotNull()->isString()->isLength(['max' => 50])->custom(function ($editdiseasename, $request) {
      $disease =  Disease::findOne(['name' => $editdiseasename]);
      if ($disease) {
        if ($disease->name != $request->getQuery('name')) {
          return new \Error('Disease Name Alias Has Already Been Used');
        }
      }
    })->trim()->sanitize();
    self::validateBody('editdiseasedesc')->isNotNull()->isString()->isLength(['max' => 500])->trim()->sanitize();
    self::validateBody('editdiseasesolution')->isNotNull()->isString()->isLength(['max' => 500])->trim()->sanitize();
    self::validateQuery('id')->isNotNull()->isInt()->trim()->sanitize();

    if (!empty(self::validateResults())) {
      return $response->setStatusCode(400)->setContent(json_encode(['errors' => self::validateResults()]))->send();
    } else {
      if (Disease::update([
        'name' => $request->getBody('editdiseasename'),
        'desc' => $request->getBody('editdiseasedesc'),
        'solution' => $request->getBody('editdiseasesolution'),
        'expertSystemId' => $request->getQuery('problemId')
      ], ['id' => $request->getQuery('id')])) {
        $request->setFlash('disease', 'alert-success', [['msg' => "{$request->getQuery('name')} Has Been Updated"]]);
        $response->redirect('/members/disease');
      } else {
        throw new HttpException(500);
      }
    }
  }

  public function deleteDisease(Request $request, Response $response)
  {
    self::validateQuery('id')->isNotNull()->isInt()->trim()->sanitize();
    if (!empty(self::validateResults())) {
      $request->setFlash('disease', 'alert-success', self::validateResults());
      $response->redirect('/members/disease');
    } else {
      if (Disease::destroy(['id' => $request->getQuery('id')])) {
        $request->setFlash('disease', 'alert-success', [['msg' => "{$request->getQuery('name')} Has Been Deleted"]]);
        $response->redirect('/members/disease');
      } else {
        throw new HttpException(500);
      }
    }
  }
}
