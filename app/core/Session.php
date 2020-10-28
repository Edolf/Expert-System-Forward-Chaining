<?php

namespace app\core;

class Session
{
  protected const FLASH = 'flash';

  public function __construct()
  {
    session_start();
    $flashMessages = $_SESSION[self::FLASH] ?? [];
    foreach ($flashMessages as $key => &$flashMessage) {
      $flashMessage['remove'] = true;
    }
    $_SESSION[self::FLASH] = $flashMessages;
  }

  public static function setFlash($key, $class, $message)
  {
    $_SESSION[self::FLASH][$key] = [
      'class' => $class,
      'message' => $message,
      'remove' => false
    ];
  }
  public static function getFlash($key)
  {
    return $_SESSION[self::FLASH][$key] ?? false;
  }

  public function set($key, $value)
  {
    $_SESSION[$key] = $value;
  }

  public function get($key)
  {
    return $_SESSION[$key] ?? false;
  }

  public function remove($key)
  {
    unset($_SESSION[$key]);
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
