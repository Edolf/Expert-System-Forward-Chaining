<?php

namespace app\controllers;

use app\core\Request;
use app\core\Response;

trait KnowledgeController
{
  public function knowledge(Request $request, Response $response)
  {
    return $response->render('members/knowledges/index');
  }
}
