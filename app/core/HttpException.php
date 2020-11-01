<?php

namespace app\core;

class HttpException extends \RuntimeException
{
  private $statusCode;
  private $headers;
  protected $response;

  public function __construct(int $statusCode, string $message = null, \Throwable $previous = null, array $headers = [])
  {
    $this->statusCode = $statusCode;
    $this->headers = $headers;
    $this->response = Application::$app->response;

    parent::__construct($message == null ? Application::$app->response::$statusTexts[$statusCode] : $message, $this->statusCode, $previous);
  }

  public function getStatusCode()
  {
    return $this->statusCode;
  }

  public function getHeaders()
  {
    return $this->headers;
  }

  public function setHeaders(array $headers)
  {
    $this->headers = $headers;
  }

  public function getResponse()
  {
    return $this->response;
  }
}
