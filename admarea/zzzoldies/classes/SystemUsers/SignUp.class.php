<?php
namespace SystemUsers;
use DbConnection\DbhPdoConnect as DbhPdoConnect;
// use PDO;

class SignUp extends DbhPdoConnect{
  protected function setUser($u_f_name, $u_l_name, $u_email, $u_password){
    try {
    $sql = "INSERT INTO system_users (u_f_name, u_l_name, u_email, u_password, u_token, u_id)
    VALUES (:u_f_name, :u_l_name, :u_email, :u_password, :u_token, :u_id)";
    $u_token = substr(md5(time()), 0, 15);
    $u_id = substr(md5(time()), 0, 10);
    $hashed_password = password_hash($u_password, PASSWORD_DEFAULT);
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindValue(':u_f_name', $u_f_name);
    $stmt->bindValue(':u_l_name', $u_l_name);
    $stmt->bindValue(':u_email', $u_email);
    $stmt->bindValue(':u_password', $hashed_password);
    $stmt->bindValue(':u_token', $u_token);
    $stmt->bindValue(':u_id', $u_id);
    $stmt->execute();
    $stmt = null;
    include (EmailFolder.'user-register-email.php');

  } catch (\PDOException $e) {
    $stmt = null;
    header("Location:".DbErrors."?error_code=Skontaktuj się z administratorrem&error=checkUserEmail");
    exit();
    }

  }// setUser ends

  protected function checkUserEmail($u_email){
    try {
    $sql = "SELECT * FROM system_users WHERE u_email = :u_email";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindValue(':u_email', $u_email);
    $stmt->execute();
    $resultCheck;
    if ($stmt->rowCount() > 0) {
      $resultCheck = false;
    } else{
      $resultCheck = true;
    }
    return $resultCheck;

  } catch (\PDOException $e) {
    header("Location:".DbErrors."?error_code=Skontaktuj się z administratorrem&error=checkUserEmail");
    				exit();

    }
  }// checkUserEmail ends

  protected function checkUserBlackList($u_email){
    try {
    $sql = "SELECT * FROM system_users_black_list WHERE u_blacklist_email = :u_blacklist_email";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindValue(':u_blacklist_email', $u_email);
    $stmt->execute();
    $resultCheck;
    if ($stmt->rowCount() > 0) {
      $resultCheck = false;
    } else{
      $resultCheck = true;
    }
    return $resultCheck;

  } catch (\PDOException $e) {
    header("Location:".DbErrors."?error_code=Skontaktuj się z administratorrem&error=checkUserEmail");
    				exit();

    }
  }// checkUserEmail ends



} //class ends
