<?php

class DbhPdo{
public $host = "mariadb106.server645914.nazwa.pl";
public $user = "server645914_34art";
public $dbName = "server645914_34art";
public $pwd = "Jakies0k01907***";
public $options = [
  PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
];


protected function connect() {
$dsn = 'mysql:host=' .$this->$host. ';dbname=' .$this->$dbName .'; charset=utf8mb4';
$pdo = new PDO($dsn, $this->$user, $this->$pwd);


return $pdo;

}

}