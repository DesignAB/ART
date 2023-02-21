<?php
namespace SystemUsers;
use DbConnection\DbhPdoConnect as DbhPdoConnect;
use PDO;

class Forgot extends DbhPdoConnect{
  protected function setNewPassword($u_email){
    $result;
    try {
      $u_password = substr(md5(time()), 0, 6).'M!2';
      // $u_password = 'qazqaz';

      $hashed_password = password_hash($u_password, PASSWORD_DEFAULT);
    $sql = "UPDATE system_users SET u_password = :u_password WHERE u_email = :u_email";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindValue(':u_email', $u_email);
    $stmt->bindValue(':u_password', $hashed_password);
    $stmt->execute();
    $stmt = null;
    $result = true;

  } catch (\PDOException $e) {
    $stmt = null;
    header("Location:".DbErrors."?error_code=Skontaktuj się z administratorrem&error=confirm error");
    $result = false;
    exit();
    }
    // send email to user
    try {
    $sql = "SELECT * FROM system_users WHERE u_email = :u_email";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindValue(':u_email', $u_email);
    $stmt->execute();
    $stmt_result = $stmt->fetch(PDO::FETCH_OBJ);
    $u_f_name = $stmt_result->u_f_name;
    $u_l_name = $stmt_result->u_l_name;
    $result;
    include (EmailFolder.'user-forgot-email.php');

    } catch (\PDOException $e) {
    header("Location:".DbErrors."?error_message=Skontaktuj się z administratorrem&error=checkUserNew");
            exit();

    }

    // send email to user

    return $result;
  }// setUser ends
  //1
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
  //2
  protected function checkUserNew($u_email){
    try {
    $sql = "SELECT * FROM system_users WHERE u_email = :u_email";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindValue(':u_email', $u_email);
    $stmt->execute();
    $stmt_result = $stmt->fetch(PDO::FETCH_OBJ);
    $u_status = $stmt_result->u_status;
    $result;
    if ($u_status == 'new') {
        // echo 'minęło';
        $result = false;
    }
    else {
      $result = true;
    }

    return $result;

  } catch (\PDOException $e) {
    header("Location:".DbErrors."?error_message=Skontaktuj się z administratorrem&error=checkUserNew");
            exit();

    }
  }// checkUserSuspended

//3
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

//4
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





} //class ends
