<?php
namespace DbConnection;
// use DbData\DbData as DbData;
use PDO;
class DbhPdoConnect extends DbData{
protected function connect() {
$dsn = 'mysql:host=' .$this->host. ';dbname=' .$this->dbName .';charset=utf8mb4';
  try {
    $pdo = new PDO($dsn, $this->user, $this->pwd, $this->options);
  } catch (Exception $e) {
    echo $e->getMessage();
    exit();
  }
return $pdo;
}

}
