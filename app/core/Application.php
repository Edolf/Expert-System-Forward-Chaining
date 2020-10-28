<?php

namespace app\core;

use app\core\Database\Connection;

use app\models\User;

class Application
{
  public static Application $app;
  public Router $router;
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
    $this->router = new Router($this->request, $this->response);
    $this->session = new Session();
    $this->validator = new Validator();
    $this->authenticate = new Authenticate($this->session->get('user'));
    $this->view = new View($this->session);
  }

  public function run()
  {
    try {
      echo $this->router->resolve();
    } catch (\Exception $err) {
      // $this->response->setStatusCode(500)->json(['errors' => $err->getMessage()]);
      $this->response->createError(500, $err->getMessage());
    }
  }
}
