<?php

namespace app\core;

use app\core\Database\Connection;

use app\models\User;

class Application
{
  public static Application $app;
  public static Router $router;
  public Request $request;
  public Response $response;
  public ?Controller $controller = null;
  public Connection $connection;
  public Session $session;
  public Validator $validator;
  public Authenticate $authenticate;
  public View $view;

  public ?User $user;

  public function __construct()
  {
    $this->user = null;
    self::$app = $this;
    $this->connection = new Connection();
    $this->request = new Request();
    $this->response = new Response();
    self::$router = new Router($this->request, $this->response);
    $this->session = new Session();
    $this->authenticate = new Authenticate($this->session->get('user'));
    $this->validator = new Validator();
    $this->view = new View();
  }

  public static function get(string $url, $callback)
  {
    self::$router::get($url, $callback);
  }

  public static function post(string $url, $callback)
  {
    self::$router::post($url, $callback);
  }

  public static function put(string $url, $callback)
  {
    self::$router::put($url, $callback);
  }

  public static function delete(string $url, $callback)
  {
    self::$router::delete($url, $callback);
  }

  public function createError($code, $message = '')
  {
    $this->setStatusCode($code);
    $this->render('error', [
      'error' => [
        'status' => $code,
        'message' => $message,
        'stack' => error_get_last()
      ]
    ]);
  }

  public function run()
  {
    try {
      echo self::$router->resolve();
    } catch (\Exception $err) {
      // $this->response->setStatusCode(500)->json(['errors' => $err->getMessage()]);
      $this->response->createError(500, $err->getMessage());
    }
  }
}
