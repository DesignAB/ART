<?php
namespace DbData;
use PDO;
class DbData{
  protected $host = D_host;
  protected $user = D_user;
  protected $pwd = D_pwd;
  protected $dbName = D_dbName;
  protected $options = [
    PDO::ATTR_EMULATE_PREPARES => false, // turn off emulation mode for "real" prepared statements
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
  ];
}
