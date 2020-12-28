<?php

namespace app\core;

use app\core\Session\Token;
use app\core\Application;

class Response
{
  protected $content;
  protected $statusCode;
  protected $statusText;
  protected $headers = [];

  protected const UPPER = '_ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  protected const LOWER = '-abcdefghijklmnopqrstuvwxyz';

  public static $statusTexts = [
    100 => 'Continue',
    101 => 'Switching Protocols',
    102 => 'Processing',
    103 => 'Early Hints',
    200 => 'OK',
    201 => 'Created',
    202 => 'Accepted',
    203 => 'Non-Authoritative Information',
    204 => 'No Content',
    205 => 'Reset Content',
    206 => 'Partial Content',
    207 => 'Multi-Status',
    208 => 'Already Reported',
    226 => 'IM Used',
    300 => 'Multiple Choices',
    301 => 'Moved Permanently',
    302 => 'Found',
    303 => 'See Other',
    304 => 'Not Modified',
    305 => 'Use Proxy',
    307 => 'Temporary Redirect',
    308 => 'Permanent Redirect',
    400 => 'Bad Request',
    401 => 'Unauthorized',
    402 => 'Payment Required',
    403 => 'Forbidden',
    404 => 'Not Found',
    405 => 'Method Not Allowed',
    406 => 'Not Acceptable',
    407 => 'Proxy Authentication Required',
    408 => 'Request Timeout',
    409 => 'Conflict',
    410 => 'Gone',
    411 => 'Length Required',
    412 => 'Precondition Failed',
    413 => 'Payload Too Large',
    414 => 'URI Too Long',
    415 => 'Unsupported Media Type',
    416 => 'Range Not Satisfiable',
    417 => 'Expectation Failed',
    418 => 'I\'m a teapot',
    421 => 'Misdirected Request',
    422 => 'Unprocessable Entity',
    423 => 'Locked',
    424 => 'Failed Dependency',
    425 => 'Too Early',
    426 => 'Upgrade Required',
    428 => 'Precondition Required',
    429 => 'Too Many Requests',
    431 => 'Request Header Fields Too Large',
    451 => 'Unavailable For Legal Reasons',
    500 => 'Internal Server Error',
    501 => 'Not Implemented',
    502 => 'Bad Gateway',
    503 => 'Service Unavailable',
    504 => 'Gateway Timeout',
    505 => 'HTTP Version Not Supported',
    506 => 'Variant Also Negotiates',
    507 => 'Insufficient Storage',
    508 => 'Loop Detected',
    510 => 'Not Extended',
    511 => 'Network Authentication Required',
  ];

  public function __construct()
  {
    return $this;
  }

  public function sendHeaders()
  {
    if (headers_sent()) {
      return $this;
    }

    foreach ($this->headers as $key => $arrValue) {
      foreach ($arrValue as $value) {
        header("$key: $value", true, $this->statusCode);
      }
    }

    header(sprintf('HTTP/1.0 %s %s', $this->statusCode, $this->statusText), true, $this->statusCode);

    return $this;
  }

  public function sendContent()
  {
    echo $this->content;
    return $this;
  }

  public function setHeader(string $key, $values, bool $replace = true)
  {
    $key = strtr($key, self::UPPER, self::LOWER);

    if (is_array($values)) {
      $values = array_values($values);

      if (true === $replace || !isset($this->headers[$key])) {
        $this->headers[$key] = $values;
      } else {
        $this->headers[$key] = array_merge($this->headers[$key], $values);
      }
    } else {
      if (true === $replace || !isset($this->headers[$key])) {
        $this->headers[$key] = [$values];
      } else {
        $this->headers[$key][] = $values;
      }
    }
    return $this;
  }

  public function getHeader(string $key = null)
  {
    return (null !== $key ? $this->headers[strtr($key, self::UPPER, self::LOWER)] ?? [] : $this->headers);
  }

  public function setContent(?string $content)
  {
    $this->content = $content ?? '';
    return $this;
  }

  public function getContent()
  {
    return $this->content;
  }

  public function setStatusCode(int $code, $text = null): object
  {
    $this->statusCode = $code;
    // if ($this->isInvalid()) {
    //   throw new \InvalidArgumentException("The HTTP status code '$code' is not valid.");
    // }

    if (null === $text) {
      $this->statusText = isset(self::$statusTexts[$code]) ? self::$statusTexts[$code] : 'unknown status';

      return $this;
    }
    if (false === $text) {
      $this->statusText = '';

      return $this;
    }
    $this->statusText = $text;
    return $this;
  }

  public function getStatusCode(): int
  {
    return $this->statusCode;
  }

  public function isInvalid(): bool
  {
    return $this->statusCode < 100 || $this->statusCode >= 600;
  }

  public function isInformational(): bool
  {
    return $this->statusCode >= 100 && $this->statusCode < 200;
  }

  public function isSuccessful(): bool
  {
    return $this->statusCode >= 200 && $this->statusCode < 300;
  }

  public function isRedirection(): bool
  {
    return $this->statusCode >= 300 && $this->statusCode < 400;
  }

  public function isClientError(): bool
  {
    return $this->statusCode >= 400 && $this->statusCode < 500;
  }

  public function isServerError(): bool
  {
    return $this->statusCode >= 500 && $this->statusCode < 600;
  }

  public function isOk(): bool
  {
    return 200 === $this->statusCode;
  }

  public function isForbidden(): bool
  {
    return 403 === $this->statusCode;
  }

  public function isNotFound(): bool
  {
    return 404 === $this->statusCode;
  }

  public function isRedirect(string $location = null): bool
  {
    return in_array($this->statusCode, [201, 301, 302, 303, 307, 308]) && (null === $location ?: $location == $this->getHeader('Location'));
  }

  public function isEmpty(): bool
  {
    return in_array($this->statusCode, [204, 304]);
  }

  public function send()
  {
    $this->sendHeaders();
    $this->sendContent();

    if (!in_array(PHP_SAPI, ['cli', 'phpdbg'], true)) {
      static::closeOutputBuffers(0, true);
    }

    return $this->end();
  }

  public static function closeOutputBuffers(int $targetLevel, bool $flush): void
  {
    $status = ob_get_status(true);
    $level = count($status);
    $flags = PHP_OUTPUT_HANDLER_REMOVABLE | ($flush ? PHP_OUTPUT_HANDLER_FLUSHABLE : PHP_OUTPUT_HANDLER_CLEANABLE);

    while ($level-- > $targetLevel && ($s = $status[$level]) && (!isset($s['del']) ? !isset($s['flags']) || ($s['flags'] & $flags) === $flags : $s['del'])) {
      if ($flush) {
        ob_end_flush();
      } else {
        ob_end_clean();
      }
    }
  }

  public function end()
  {
    return exit;
  }

  public function render($view, array $params = [])
  {
    return View::renderView($view, $params);
  }

  public function redirect($url, $statusCode = 302, $method = 'GET')
  {
    Application::$app->request->setMethod($method);
    $this->setStatusCode($statusCode, self::$statusTexts[$statusCode])->setHeader('Location', LINK . $url)->setContent(Application::$app->resolve($method, $url))->send();
  }
}
