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
    return $response->render('members/diseases/index');
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

    if (!empty(self::validateResults())) {
      return $response->setStatusCode($response::HTTP_BAD_REQUEST)->setContent(json_encode(['errors' => self::validateResults()]))->send();
    } else {
      if (Disease::create([
        'name' => $request->getBody('diseasename'),
        'desc' => $request->getBody('diseasedesc'),
        'solution' => $request->getBody('diseasesolution'),
        'expertSystemId' => $request->getBody('expertsystemid')
      ])) {
        $request->setFlash('submenu', 'alert-success', [['msg' => "{$request->getBody('title')} Has Been Added"]]);
        $response->redirect('/members/sidemenu/menu');
      } else {
        throw new HttpException(500);
      }
    }
  }
}
