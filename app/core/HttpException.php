<?php

namespace app\core;

class HttpException extends \RuntimeException
{
  private $statusCode;
  private $headers;
  // protected $response;

  public function __construct(int $statusCode, string $message = null, \Throwable $previous = null, array $headers = [], ?int $code = 0)
  {
    $this->statusCode = $statusCode;
    $this->headers = $headers;

    parent::__construct($message, $code, $previous);

    // $this->response = $response;
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

  // public function getResponse()
  // {
  //     return $this->response;
  // }
}
