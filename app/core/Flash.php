<?php

namespace app\core;

use app\core\Session;

class Flash extends Session
{
  public const FLASH = 'flash';

  public function __construct()
  {
    $flashMessages = $_SESSION[self::FLASH] ?? [];
    foreach ($flashMessages as $key => &$flashMessage) {
      $flashMessage['remove'] = true;
    }
    $_SESSION[self::FLASH] = $flashMessages;
  }

  public function setFlash($key, $class, $message)
  {
    $_SESSION[self::FLASH][$key] = [
      'class' => $class,
      'message' => $message,
      'remove' => false
    ];
  }

  public function getFlash($key)
  {
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
