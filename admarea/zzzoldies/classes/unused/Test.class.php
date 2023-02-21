<?php

class Test {
  private $host;
  private $user;
  private $dbName;
  private $pwd;
  function __construct() {
    include_once (Server_ROOT.ConfigFile);
    $this->host= $D_host;
    $this->user= $D_user;
    $this->dbName= $D_dbName;
    $this->pwd= $D_pwd;
  }
  protected function connect() {
  $dsn = 'mysql:host=' .$this->host. ';dbname=' .$this->dbName .';charset=utf8mb4';
    try {
      $pdo = new PDO($dsn, $this->user, $this->pwd, $this->options);
      echo "Success";
    } catch (Exception $e) {
      echo $e->getMessage();
      exit();
    }
  return $pdo;
  }

}
