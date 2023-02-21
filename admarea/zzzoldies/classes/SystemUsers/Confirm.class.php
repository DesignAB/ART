<?php
namespace SystemUsers;
use DbConnection\DbhPdoConnect as DbhPdoConnect;
use PDO;

class Confirm extends DbhPdoConnect{
  protected function setConfirmUser($u_email){
    $result;
    try {
      $u_status = 'user_confirmed';
      $u_token = '';
    $sql = "UPDATE system_users SET u_status = :u_status, u_token = :u_token WHERE u_email = :u_email";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindValue(':u_email', $u_email);
    $stmt->bindValue(':u_token', $u_token);
    $stmt->bindValue(':u_status', $u_status);
    $stmt->execute();
    $stmt = null;
    $result = true;
  } catch (\PDOException $e) {
    $stmt = null;
    header("Location:".DbErrors."?error_code=Skontaktuj się z administratorrem&error=confirm error");
    $result = false;
    exit();
    }
    return $result;
  }// setUser ends

  protected function checkUserEmail($u_email){
    try {
    $sql = "SELECT * FROM system_users WHERE u_email = :u_email";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindValue(':u_email', $u_email);
    $stmt->execute();
    $stmt_row_count = $stmt->rowCount();
    $result;
    if ($stmt_row_count == 1) {
      $result = true;
    } else{
      $result = false;
    }
    return $result;

  } catch (\PDOException $e) {
    header("Location:".DbErrors."?error_code=Skontaktuj się z administratorrem&error=checkUserEmail");
    				exit();

    }
  }// checkUserEmail ends

  protected function checkUserToken($u_email, $u_token){
    try {
    $sql = "SELECT * FROM system_users WHERE u_email = :u_email";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindValue(':u_email', $u_email);
    $stmt->execute();
    $stmt_result = $stmt->fetch(PDO::FETCH_OBJ);
    $db_u_token = $stmt_result->u_token;
    $result;
    if ($db_u_token !== $u_token) {
      $result = false;
    } else{
      $result = true;
    }
    return $result;

  } catch (\PDOException $e) {
    header("Location:".DbErrors."?error_code=Skontaktuj się z administratorrem&error=checkUserEmail");
    				exit();

    }
  }// checkUserEmail ends

  protected function checkUserTokenExpire($u_email){
    try {
    $sql = "SELECT * FROM system_users WHERE u_email = :u_email";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindValue(':u_email', $u_email);
    $stmt->execute();
    $stmt_result = $stmt->fetch(PDO::FETCH_OBJ);
    $u_token_timestamp = $stmt_result->u_token_timestamp;
    $result;
    $current = strtotime('now');
    $dateFromDatabase = strtotime($u_token_timestamp);
    $token_expire =  strtotime('+1 hour', strtotime($u_token_timestamp));
    if ($current > $token_expire) {
        // echo 'minęło';
        $result = false;
    }
    else {
      $result = true;
    }

    return $result;

  } catch (\PDOException $e) {
    header("Location:".DbErrors."?error_code=Skontaktuj się z administratorrem&error=checkUserEmail");
    				exit();

    }
  }// checkUserEmail ends
  protected function checkUserConfirmed($u_email){
    try {
    $sql = "SELECT * FROM system_users WHERE u_email = :u_email";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindValue(':u_email', $u_email);
    $stmt->execute();
    $stmt_result = $stmt->fetch(PDO::FETCH_OBJ);
    $u_status = $stmt_result->u_status;
    $result;
    if ($u_status == 'user_confirmed') {
        // echo 'minęło';
        $result = false;
    }
    else {
      $result = true;
    }

    return $result;

  } catch (\PDOException $e) {
    header("Location:".DbErrors."?error_code=Skontaktuj się z administratorrem&error=checkUserEmail");
    				exit();

    }
  }// checkUserEmail ends

  protected function checkUserSuspended($u_email){
    try {
    $sql = "SELECT * FROM system_users WHERE u_email = :u_email";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindValue(':u_email', $u_email);
    $stmt->execute();
    $stmt_result = $stmt->fetch(PDO::FETCH_OBJ);
    $u_status = $stmt_result->u_status;
    $result;
    if ($u_status == 'user_suspended') {
        // echo 'minęło';
        $result = false;
    }
    else {
      $result = true;
    }

    return $result;

  } catch (\PDOException $e) {
    header("Location:".DbErrors."?error_code=Skontaktuj się z administratorrem&error=checkUserEmail");
            exit();

    }
  }// checkUserEmail ends
  protected function deleteUser($u_email){
    try {
    $sql = "DELETE FROM system_users WHERE u_email = :u_email";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindValue(':u_email', $u_email);
    $stmt->execute();

  } catch (\PDOException $e) {
    header("Location:".DbErrors."?error_code=Skontaktuj się z administratorrem&error=checkUserEmail");
            exit();

    }
  }// checkUserEmail ends




} //class ends
