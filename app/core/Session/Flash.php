<?php

namespace app\core\Session;

use app\core\Application;

class Flash
{
  const FLASH = 'flash';

  public function __construct($session)
  {
    $flashMessages = $session->getSession(self::FLASH) ?? [];
    if (!empty($flashMessages)) {
      foreach ($flashMessages as $key => &$flashMessage) {
        $flashMessage['remove'] = true;
      }
    }
    Application::$app->session->setSession(self::FLASH, $flashMessages);
  }

  public function setFlash($key, $class, $message)
  {
    Application::$app->session->setSession(self::FLASH, [$key => [
      'class' => $class,
      'message' => $message,
      'remove' => false
    ]]);
  }

  public function getFlash($key)
  {
    return Application::$app->session->getSession(self::FLASH)[$key] ?? false;
  }

  private function removeFlash()
  {
    $flashMessages = Application::$app->session->getSession(self::FLASH) ?? [];
    if (!empty($flashMessages)) {
      foreach ($flashMessages as $key => &$flashMessage) {
        if ($flashMessage['remove']) {
          unset($flashMessages[$key]);
        }
      }
    }
    Application::$app->session->setSession(self::FLASH, $flashMessages);
  }

  public function __destruct()
  {
    $this->removeFlash();
  }
}
