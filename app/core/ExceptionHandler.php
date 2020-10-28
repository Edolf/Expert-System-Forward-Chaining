<?php

namespace app\core;

class ExceptionHandler extends \Exception
{
  protected $message = 'You don\'t have permission to access this page';
  protected $code = 403;
}
