<?php

namespace app\controllers;

use app\core\Request;
use app\core\Response;

trait SymptomController
{
  public function symptom(Request $request, Response $response)
  {
    return $response->render('members/symptoms/index');
  }
}
