<?php

namespace app\core\Validator;

use app\core\Application;

trait FileValidator
{
  protected $validating = [];
  protected $target;
  protected $param;
  protected $location;

  public function __construct($that)
  {
    $this->validating = $that->validating;
    $this->target = $that->target;
    $this->param = $that->param;
    $this->location = $that->location;
  }

  public function fileValidation(String $target)
  {
    if (array_key_exists($target, Application::$app->request->getFile())) {
      $this->target = Application::$app->request->getFile($target);
      $this->param = $target;
      $this->location = Validator::FILE;
    } else {
      $this->setError('Something Wrong', $this->param, $this->location);
    }
    return $this;
  }

  public function isExt(array $ext, String $errorMsg = '')
  {
    if (!(preg_match('/\./', $this->target['name']) && in_array(preg_replace('/^.*\./', '', $this->target['name']), $ext))) {
      $this->setError($errorMsg != null ? $errorMsg : "Incorrect File Extension", $this->param, $this->location);
    }
    return $this;
  }

  public function isType(array $type, String $errorMsg = '')
  {
    foreach (explode("/", $this->target['type']) as $targetType) {
      if (in_array($targetType, $type)) {
        return $this;
      }
    }
    $this->setError($errorMsg != null ? $errorMsg : "Incorrect File Type", $this->param, $this->location);
    return $this;
  }

  public function isLimit(array $options = [], String $errorMsg = '')
  {
    if (!(($options['min'] <= $this->target['size'] && $this->target['size'] <= $options['max']) && $this->target['size'] !== null)) {
      $this->setError($errorMsg != null ? $errorMsg : "Max Size {$options['max']} bytes", $this->param, $this->location);
    }
    return $this;
  }

  public function custom($callback)
  {
    try {
      $heiboy = call_user_func($callback, $this->target, $this->validating);
      if ($heiboy != null) {
        throw new \Error($heiboy->getMessage());
      }
    } catch (\Throwable $err) {
      $this->setError($err->getMessage(), $this->param, $this->location);
    }
    return $this;
  }

  public function setError($msg, $param, $location)
  {
    Application::$app->validator->setError($msg, $param, $location);
  }
}
