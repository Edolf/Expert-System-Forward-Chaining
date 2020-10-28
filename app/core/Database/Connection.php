<?php

namespace app\core\Database;

use PDO;

class Connection
{
  public \PDO $pdo;
  private static string $dsn = DB_CONNECTON . ":host=" . DB_HOSTNAME . ";port=" . DB_PORT . ";dbname=" . DB_NAME;
  private static string $username = DB_USERNAME;
  private static string $password = DB_PASSWORD;

  protected $_conn;
  protected $_config;
  protected $_eventManager;
  protected $_expr;
  private $params = [];
  private $platform = DB_CONNECTON;

  public function __construct()
  {
    $this->pdo = new PDO(self::$dsn, self::$username, self::$password);
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  public function getName()
  {
    return 'pdo_mysql';
  }

  public function createQueryBuilder()
  {
    return new QueryBuilder($this);
  }

  public function executeQuery($query, array $params = [], $types = [])
  {
  }

  public function executeUpdate($query, array $params = [], array $types = [])
  {
  }

  public function getDatabasePlatform()
  {
    return $this->platform;
  }

  public function getExpressionBuilder()
  {
    return $this->_expr;
  }

  public function prepare($sql): \PDOStatement
  {
    return $this->pdo->prepare($sql);
  }
}
