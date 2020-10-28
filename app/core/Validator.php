<?php

namespace app\core;

class Validator
{
  private $validationResults = [];
  private $body;
  // private $query;
  private $target;

  public function __construct()
  {
    $this->body = Application::$app->request->getBody();
    // $this->query = Application::$app->request->getQuery();
  }

  public function validation(String $target)
  {
    $this->target = $target;
  }

  public function isNotNull(String $errorMsg = '')
  {
    if ($this->target == null) {
      $this->setError($errorMsg != null ? $errorMsg : 'This Field Cannot Be Empty', array_search($this->target, $this->body));
    }
    return $this;
  }

  public function isEmail(String $errorMsg = '')
  {
    if (!filter_var($this->target, FILTER_VALIDATE_EMAIL)) {
      $this->setError($errorMsg != null ? $errorMsg : 'Invalid Email Address', array_search($this->target, $this->body));
    }
    return $this;
  }

  public function isInt(String $errorMsg = '')
  {
    if (!filter_var($this->target, FILTER_VALIDATE_INT)) {
      $this->setError($errorMsg != null ? $errorMsg : 'Numeric Only', array_search($this->target, $this->body));
    }
    return $this;
  }

  public function isAlpha(String $errorMsg = '')
  {
    if (!ctype_alpha($this->target)) {
      $this->setError($errorMsg != null ? $errorMsg : 'Alphabet Only', array_search($this->target, $this->body));
    }
    return $this;
  }

  public function isAlphaNumeric(String $errorMsg = '')
  {
    if (!ctype_alnum($this->target)) {
      $this->setError($errorMsg != null ? $errorMsg : 'Alphabet and Numeric Only', array_search($this->target, $this->body));
    }
    return $this;
  }

  public function isLetterSingleSpace(String $errorMsg = '')
  {
    if (!filter_var($this->target, FILTER_VALIDATE_INT)) {
      $this->setError($errorMsg != null ? $errorMsg : 'Invalid Value', array_search($this->target, $this->body));
    }
    return $this;
  }

  public function isLength(array $options = [], String $errorMsg = '')
  {
    if (!($options['min'] <= strlen($this->target) && strlen($this->target) <= $options['max'])) {
      $this->setError($errorMsg != null ? $errorMsg : 'Invalid Value', array_search($this->target, $this->body));
    }
    return $this;
  }

  // public function sanitizeQuery()
  // {
  //   Application::$app->request->setQuery(array_search($this->target, $this->body), filter_var($this->target, FILTER_SANITIZE_SPECIAL_CHARS));
  //   return $this;
  // }

  public function sanitizeBody()
  {
    Application::$app->request->setBody(array_search($this->target, $this->body), filter_var($this->target, FILTER_SANITIZE_SPECIAL_CHARS));
    return $this;
  }

  // public function trimQuery($char = '')
  // {
  //   Application::$app->request->setQuery(array_search($this->target, $this->body), trim($this->target, $char));
  //   return $this;
  // }

  public function trimBody($char = '')
  {
    Application::$app->request->setBody(array_search($this->target, $this->body), trim($this->target, $char));
    return $this;
  }

  public function custom($callback)
  {
    try {
      call_user_func($callback, $this->target, $this->body);
    } catch (\Error $err) {
      $this->setError($err->getMessage(), array_search($this->target, $this->body));
    }
    return $this;
  }

  public function setError($msg, $param)
  {
    array_push($this->validationResults, [
      // "location" => $location,
      "msg" => "$msg",
      "param" => "$param"
    ]);
  }

  public function validateResults()
  {
    return $this->validationResults;
  }
}
