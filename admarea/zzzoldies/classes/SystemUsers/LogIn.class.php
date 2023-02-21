<?php
namespace SystemUsers;
use DbConnection\DbhPdoConnect as DbhPdoConnect;
use PDO;

class LogIn extends DbhPdoConnect{

  protected function setLoginUser($u_email){
    $result;
    // first check user counter
    try {
      $sql = "SELECT * FROM system_users WHERE u_email = :u_email";
      $stmt = $this->connect()->prepare($sql);
      $stmt->bindValue(':u_email', $u_email);
      $stmt->execute();
      $stmt_result = $stmt->fetch(PDO::FETCH_OBJ);
      $u_login_counter = $stmt_result->u_login_counter;
      $new_u_login_counter = $u_login_counter + 1;
  } catch (\PDOException $e) {
    $stmt = null;
    header("Location:".DbErrors."?error_message=Skontaktuj się z administratorrem&error=setLoginUser check user counter");
    $result = false;
    exit();
    }
    // first check user counter

    try {
    $sql = "UPDATE system_users SET u_login_counter = :u_login_counter WHERE u_email = :u_email";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindValue(':u_email', $u_email);
    $stmt->bindValue(':u_login_counter', $new_u_login_counter);
    $stmt->execute();
    $stmt = null;
    $result = true;
  } catch (\PDOException $e) {
    $stmt = null;
    header("Location:".DbErrors."?error_message=Skontaktuj się z administratorrem&error=setLoginUser");
    $result = false;
    exit();
    }
    return $result;
  }// setLoginUser ends


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
    header("Location:".DbErrors."?error_message=Skontaktuj się z administratorrem&error=checkUserEmail");
    				exit();

    }
  }// checkUserEmail ends

      protected function checkUserPassword($u_email, $u_password){
        try {
        $sql = "SELECT * FROM system_users WHERE u_email = :u_email";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(':u_email', $u_email);
        $stmt->execute();
        $stmt_result = $stmt->fetch(PDO::FETCH_OBJ);
        $database_password = $stmt_result->u_password;
        $password_check = password_verify($u_password, $database_password);

        $result;
        if ($password_check == false) {
            // echo 'minęło';
            $result = false;
        }
        else {
          $result = true;
        }

        return $result;

      } catch (\PDOException $e) {
        header("Location:".DbErrors."?error_message=Skontaktuj się z administratorrem&error=checkUserPassword");
                exit();

        }
      }// checkUserSuspended
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
        header("Location:".DbErrors."?error_message=Skontaktuj się z administratorrem&error=checkUserSuspended");
                exit();

        }
      }// checkUserSuspended

      // below is called only when AdminConfirmation is set to on
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
        header("Location:".DbErrors."?error_message=Skontaktuj się z administratorrem&error=checkUserConfirmed");
                exit();

        }
      }// checkUserConfirmed

    protected function checkLoginCount($u_email){
      try {
      $sql = "SELECT * FROM system_users WHERE u_email = :u_email";
      $stmt = $this->connect()->prepare($sql);
      $stmt->bindValue(':u_email', $u_email);
      $stmt->execute();
      $stmt_result = $stmt->fetch(PDO::FETCH_OBJ);
      $u_login_counter = $stmt_result->u_login_counter;
      $result;
      if ($u_login_counter == 0) {
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



} //class ends
