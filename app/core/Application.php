<?php

namespace app\core;

use app\core\Database\Connection;
use app\core\Session\Session;
use app\core\Session\Flash;

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
  public Authenticate $authenticate;
  public Validator $validator;
  public Flash $flash;
  public View $view;
  public ?User $user;

  public $locals = [];

  public function __construct()
  {
    $this->user = null;
    self::$app = $this;
    $this->connection = new Connection();
    $this->request = new Request();
    $this->response = new Response();
    self::$router = new Router($this->request, $this->response);
    $this->session = new Session();
    $this->authenticate = new Authenticate($this->session->getSession('user'));
    $this->validator = new Validator();
    $this->flash = new Flash();
    $this->view = new View();
  }

  public static function get(string $url, $callback)
  {
    self::$router::setUrlMethodAndParam('get', $url, $callback);
  }

  public static function post(string $url, $callback)
  {
    self::$router::setUrlMethodAndParam('post', $url, $callback);
  }

  public static function put(string $url, $callback)
  {
    self::$router::setUrlMethodAndParam('put', $url, $callback);
  }

  public static function delete(string $url, $callback)
  {
    self::$router::setUrlMethodAndParam('delete', $url, $callback);
  }

  public function run()
  {
    try {
      $this->response->setStatusCode($this->response::HTTP_OK)->setContent(self::$router->resolve())->send();
    } catch (\Throwable $err) {
      $stack = DEBUG == true ? $err->getTraceAsString() : '';
      $this->response->setStatusCode($err->getCode())->setContent($this->view->renderView('error', [
        'error' => [
          'status' => $err->getCode(),
          'message' => $err->getMessage(),
          'stack' => $stack
        ]
      ]))->send();
    }
  }
}
