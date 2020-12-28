<?php
define('DEBUG', false);
define('DS', DIRECTORY_SEPARATOR);
define('PS', PATH_SEPARATOR);

if (DEBUG) {
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
} else {
  ini_set('display_errors', 0);
  ini_set('display_startup_errors', 0);
}

if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
  $uri = 'https://';
} else {
  $uri = 'http://';
}
$uri .= $_SERVER['HTTP_HOST'];

define('HTTP_HOST_URI', $uri);

define('ROOT_DIR', dirname(__DIR__));
define('VIEW_DIR', ROOT_DIR . "/resources/views");


$dirurl = explode(DS, parse_url(dirname(__DIR__), PHP_URL_PATH));
define('PROJECT_DIR', $dirurl[count($dirurl) - 1]);

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// var_dump(get_defined_constants());

if (strpos($url, PROJECT_DIR) !== false) {
  define('ROOT', HTTP_HOST_URI . substr($url, 0, strlen(PROJECT_DIR) + 1) . '/public');
  define('LINK', HTTP_HOST_URI . substr($url, 0, strlen(PROJECT_DIR) + 1));
} else {
  if (PHP_SAPI !== 'cli-server') {
    define('ROOT', HTTP_HOST_URI . '/public');
  } else {
    define('ROOT', HTTP_HOST_URI);
  }
  define('LINK', HTTP_HOST_URI);
}

define('APP_NAME', 'EdoSulaiman');
define('APP_LOCALE', 'en');

define('CIPHER_METHOD', 'AES-256-CBC');

define('REMEMBER_ME_COOKIE_NAME', 'rememberme');
define('REMEMBER_ME_COOKIE_EXPIRY', 604800);

define('DB_CONNECTON', 'mysql');
define('DB_HOSTNAME', 'mydbinstance.cxzk9cwtlbjn.us-east-1.rds.amazonaws.com');
define('DB_PORT', '3306');
define('DB_NAME', 'expertsystem');
define('DB_USERNAME', 'admin');
define('DB_PASSWORD', 'uFtCP3pqW43Oivh4uYci');

define('MAIL_MAILER', 'smtp');
define('MAIL_HOST', 'smtp.mailtrap.io');
define('MAIL_PORT', '2525');
define('MAIL_USERNAME', '78af3d7a428121');
define('MAIL_PASSWORD', '9ca9d89c43c4d4');
define('MAIL_ENCRYPTION', 'TSL');
define('MAIL_FROM_ADDRESS', '6a736c8ca1-40c865@inbox.mailtrap.io');
define('MAIL_FROM_NAME', APP_NAME);
