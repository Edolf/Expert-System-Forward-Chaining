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

use app\core\Middleware\AuthMiddleware;

class MemberController extends Controller
{
  use ExpertSystemController;
  use DiseaseController;
  use SymptomController;
  use KnowledgeController;

  public function __construct(Request $request, Response $response)
  {
    // ini Adalah Daftar Rule Authentikasi Yang Sudah Terdaftar Di Database
    $access = json_decode(SubMenu::findOne(['url' => $request->getUrl()])->other)->access ?? false;
    if ($access) {
      $this->setMiddleware(new AuthMiddleware(
        [AuthMiddleware::ALL_METHOD => $access],
      ));
    } else {
      // Kalau Tidak Ketemu Di Database Bisa di Buat Authentikasi Manual untuk setiap Method Di Dalam Controller Ini Termasuk Trait-class nya
      // 'getProblem' => ['doctor'], : Maksudnya "getProblem" hanya boleh di akses user dengan role doctor
      // 'getProblem' => ['doctor', 'member'], : Dan ini "getProblem" hanya boleh di akses user dengan role doctor dan member,, yang berarti admin tidak boleh mengakses,,
      // Syarat Agar Authentikasi Berjalan Lancar User Harus Memiliki Tabel Role
      $this->setMiddleware(new AuthMiddleware(
        [
          'getProblem' => ['doctor'],
          'updateProblem' => ['doctor'],
          'deleteProblem' => ['doctor'],
          'selectConsul' => ['doctor'],
          'consultation' => ['doctor'],
          'results' => ['doctor']
        ]
      ));
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
    return $response->render('members/rule', ['title' => 'Rules']);
  }
}
