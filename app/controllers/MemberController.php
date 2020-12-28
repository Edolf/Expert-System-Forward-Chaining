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

use helpers\ExpertSystemAlgorithm;

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
          'results' => ['doctor'],
          'updateUser' => ['admin'],
          'dropUser' => ['admin']
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

  public function updateUser(Request $request, Response $response)
  {
    self::validateBody('editFullName')->isNotNull()->isLength(['min' => 2, 'max' => 30])->isAlphaSpace()->trim();
    self::validateBody('editUserName')->isNotNull()->isLength(['min' => 6, 'max' => 30])->isAlphaNumeric()->custom(function ($username, $request) {
      $user =  User::findOne(['username' => $username]);
      if ($user) {
        if ($user->username != $request->getBody('editUserName')) {
          return new \Error('Username Has Already Been Used by Other User');
        }
      }
    })->trim();

    if (!empty(self::validateResults())) {
      $response->setStatusCode(400)->setContent(json_encode(['errors' => self::validateResults()]))->send();
    } else {
      $roles = ['admin', 'doctor', 'member', 'unverified'];
      if (User::update([
        'name' => $request->getBody('editFullName'),
        'username' => $request->getBody('editUserName'),
        'role' => $roles[array_search($request->getBody('roleUser'), $roles)]
      ], ['id' => $request->getQuery('id')])) {
        $request->setFlash('list-user', 'alert-success', [['msg' => "{$request->getBody('editFullName')} Has Been Updated"]]);
        $response->redirect('/members/list-user');
      } else {
        throw new HttpException(500);
      }
    }
  }

  public function dropUser(Request $request, Response $response)
  {
    if (User::destroy(['id' => $request->getQuery('id')])) {
      $request->setFlash('list-user', 'alert-success', [['msg' => "User Has Been Deleted"]]);
      $response->redirect('/members/list-user');
    } else {
      throw new HttpException(404);
    }
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
    return $response->render('members/consultations/result', [
      'results' => $results,
      'sympTemps' => Symptom::findAll(['id' => Symptom::IN($options)])
    ]);
  }

  public function rule(Request $request, Response $response)
  {
    return $response->render('members/rules/rule', ['title' => 'Rules']);
  }
}
