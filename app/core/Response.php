<?php

namespace app\core;

class Response
{
  const HTTP_CONTINUE = 100;
  const HTTP_SWITCHING_PROTOCOLS = 101;
  const HTTP_PROCESSING = 102;
  const HTTP_EARLY_HINTS = 103;
  const HTTP_OK = 200;
  const HTTP_CREATED = 201;
  const HTTP_ACCEPTED = 202;
  const HTTP_NON_AUTHORITATIVE_INFORMATION = 203;
  const HTTP_NO_CONTENT = 204;
  const HTTP_RESET_CONTENT = 205;
  const HTTP_PARTIAL_CONTENT = 206;
  const HTTP_MULTI_STATUS = 207;
  const HTTP_ALREADY_REPORTED = 208;
  const HTTP_IM_USED = 226;
  const HTTP_MULTIPLE_CHOICES = 300;
  const HTTP_MOVED_PERMANENTLY = 301;
  const HTTP_FOUND = 302;
  const HTTP_SEE_OTHER = 303;
  const HTTP_NOT_MODIFIED = 304;
  const HTTP_USE_PROXY = 305;
  const HTTP_RESERVED = 306;
  const HTTP_TEMPORARY_REDIRECT = 307;
  const HTTP_PERMANENTLY_REDIRECT = 308;
  const HTTP_BAD_REQUEST = 400;
  const HTTP_UNAUTHORIZED = 401;
  const HTTP_PAYMENT_REQUIRED = 402;
  const HTTP_FORBIDDEN = 403;
  const HTTP_NOT_FOUND = 404;
  const HTTP_METHOD_NOT_ALLOWED = 405;
  const HTTP_NOT_ACCEPTABLE = 406;
  const HTTP_PROXY_AUTHENTICATION_REQUIRED = 407;
  const HTTP_REQUEST_TIMEOUT = 408;
  const HTTP_CONFLICT = 409;
  const HTTP_GONE = 410;
  const HTTP_LENGTH_REQUIRED = 411;
  const HTTP_PRECONDITION_FAILED = 412;
  const HTTP_REQUEST_ENTITY_TOO_LARGE = 413;
  const HTTP_REQUEST_URI_TOO_LONG = 414;
  const HTTP_UNSUPPORTED_MEDIA_TYPE = 415;
  const HTTP_REQUESTED_RANGE_NOT_SATISFIABLE = 416;
  const HTTP_EXPECTATION_FAILED = 417;
  const HTTP_I_AM_A_TEAPOT = 418;
  const HTTP_MISDIRECTED_REQUEST = 421;
  const HTTP_UNPROCESSABLE_ENTITY = 422;
  const HTTP_LOCKED = 423;
  const HTTP_FAILED_DEPENDENCY = 424;
  const HTTP_TOO_EARLY = 425;
  const HTTP_UPGRADE_REQUIRED = 426;
  const HTTP_PRECONDITION_REQUIRED = 428;
  const HTTP_TOO_MANY_REQUESTS = 429;
  const HTTP_REQUEST_HEADER_FIELDS_TOO_LARGE = 431;
  const HTTP_UNAVAILABLE_FOR_LEGAL_REASONS = 451;
  const HTTP_INTERNAL_SERVER_ERROR = 500;
  const HTTP_NOT_IMPLEMENTED = 501;
  const HTTP_BAD_GATEWAY = 502;
  const HTTP_SERVICE_UNAVAILABLE = 503;
  const HTTP_GATEWAY_TIMEOUT = 504;
  const HTTP_VERSION_NOT_SUPPORTED = 505;
  const HTTP_VARIANT_ALSO_NEGOTIATES_EXPERIMENTAL = 506;
  const HTTP_INSUFFICIENT_STORAGE = 507;
  const HTTP_LOOP_DETECTED = 508;
  const HTTP_NOT_EXTENDED = 510;
  const HTTP_NETWORK_AUTHENTICATION_REQUIRED = 511;

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

  public function __construct(?string $content = '', int $status = 200, array $headers = [])
  {
    foreach ($headers as $key => $values) {
      $this->setHeader($key, $values);
    }
    $this->setContent($content);
    $this->setStatusCode($status);
  }

  public function sendHeaders()
  {
    if (headers_sent()) {
      return $this;
    }

    foreach ($this->headers as $key => $value) {
      header($key . ': ' . $value, true, $this->statusCode);
    }

    header(sprintf('HTTP/%s %s', $this->statusCode, $this->statusText), true, $this->statusCode);

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
  }

  public function getHeader(string $key, string $default = null)
  {
    $headers = (null !== $key ? $this->headers[strtr($key, self::UPPER, self::LOWER)] ?? [] : $this->headers);

    if (!$headers) {
      return $default;
    }

    if (null === $headers[0]) {
      return null;
    }

    return (string) $headers[0];
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
    if ($this->isInvalid()) {
      throw new \InvalidArgumentException(sprintf('The HTTP status code "%s" is not valid.', $code));
    }
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
    return \in_array($this->statusCode, [201, 301, 302, 303, 307, 308]) && (null === $location ?: $location == $this->getHeader('Location'));
  }

  public function isEmpty(): bool
  {
    return \in_array($this->statusCode, [204, 304]);
  }

  public function render($view, array $params = [])
  {
    return Application::$app->view->renderView($view, $params);
  }

  public function redirect(String $to)
  {
    header("Location: $to");
  }

  public function json($res)
  {
    echo json_encode($res);
    return $this;
  }

  public function end()
  {
    $this->sendHeaders();
    $this->sendContent();
    return exit;
  }
}
