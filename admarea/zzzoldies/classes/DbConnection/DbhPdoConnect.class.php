<?php
namespace DbConnection;
use PDO;
class DbhPdoConnect{
protected function connect() {
$dsn = 'mysql:host=' .D_host. ';dbname=' .D_dbName .';charset=utf8mb4';
  try {
    $pdo = new PDO($dsn, D_user, D_pwd, D_options);
  } catch (Exception $e) {
    // echo $e->getMessage();
    exit();
  }
return $pdo;
}

}
