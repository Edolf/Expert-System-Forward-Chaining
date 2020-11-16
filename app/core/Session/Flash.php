<?php

namespace app\core\Session;

use app\core\Application;

class Flash
{
  const FLASH = 'flash';

  public function __construct()
  {
    $flashMessages = $_SESSION[self::FLASH] ?? [];
    foreach ($flashMessages as $key => &$flashMessage) {
      $flashMessage['remove'] = true;
    }
    // Application::$app->session->setSession(self::FLASH, $flashMessages);
    $_SESSION[self::FLASH] = $flashMessages;
  }

  public function setFlash($key, $class, $message)
  {
    // Application::$app->session->setSession(self::FLASH, [$key => [
    //   'class' => $class,
    //   'message' => $message,
    //   'remove' => false
    // ]]);
    $_SESSION[self::FLASH][$key] = [
      'class' => $class,
      'message' => $message,
      'remove' => false
    ];
  }

  public function getFlash($key)
  {
    // Application::$app->session->getSession([self::FLASH => $key]);
    return $_SESSION[self::FLASH][$key] ?? false;
  }

  public function __destruct()
  {
    $this->removeFlashMessages();
  }

  private function removeFlashMessages()
  {
    $flashMessages = $_SESSION[self::FLASH] ?? [];
    foreach ($flashMessages as $key => $flashMessage) {
      if ($flashMessage['remove']) {
        unset($flashMessages[$key]);
      }
    }
    $_SESSION[self::FLASH] = $flashMessages;
  }
}
