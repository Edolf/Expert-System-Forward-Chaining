<?php

namespace app\core\middlewares;

use app\core\Application;
use app\core\Authenticate;
use app\core\ExceptionHandler;

use app\models\User;

class AuthMiddleware
{
    protected array $actions = [];

    public function __construct($actions = [])
    {
        $this->actions = $actions;
    }

    public function execute()
    {
        if (Authenticate::isGuest()) {
            if (empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)) {
                throw new ExceptionHandler();
            }
        }
    }
}
