<?php
namespace AdmUsers;
use DbConnection\DbhPdoConnect as DbhPdoConnect;
use PDO;

class LogIn extends DbhPdoConnect{

  protected function setLoginUser($adm_email){
    $result;
    // first check user counter
    try {
      $sql = "SELECT * FROM adm_users WHERE adm_email = :adm_email";
      $stmt = $this->connect()->prepare($sql);
      $stmt->bindValue(':adm_email', $adm_email);
      $stmt->execute();
      $stmt_result = $stmt->fetch(PDO::FETCH_OBJ);
      $adm_login_counter = $stmt_result->adm_login_counter;
      $new_adm_login_counter = $adm_login_counter + 1;
  } catch (\PDOException $e) {
    $stmt = null;
    header("Location:".DbErrors."?error_message=Skontaktuj się z administratorrem&error=setLoginUser check user counter");
    $result = false;
    exit();
    }
    // first check user counter

    try {
    $sql = "UPDATE adm_users SET adm_login_counter = :adm_login_counter WHERE adm_email = :adm_email";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindValue(':adm_email', $adm_email);
    $stmt->bindValue(':adm_login_counter', $new_adm_login_counter);
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


  protected function checkUserEmail($adm_email){
    try {
    $sql = "SELECT * FROM adm_users WHERE adm_email = :adm_email";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindValue(':adm_email', $adm_email);
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

      protected function checkUserPassword($adm_email, $adm_password){
        try {
        $sql = "SELECT * FROM adm_users WHERE adm_email = :adm_email";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(':adm_email', $adm_email);
        $stmt->execute();
        $stmt_result = $stmt->fetch(PDO::FETCH_OBJ);
        $database_password = $stmt_result->adm_password;
        $password_check = password_verify($adm_password, $database_password);

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
      protected function checkUserNew($adm_email){
        try {
        $sql = "SELECT * FROM adm_users WHERE adm_email = :adm_email";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(':adm_email', $adm_email);
        $stmt->execute();
        $stmt_result = $stmt->fetch(PDO::FETCH_OBJ);
        $adm_status = $stmt_result->adm_status;
        $result;
        if ($adm_status == 'new') {
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

      protected function checkUserSuspended($adm_email){
        try {
        $sql = "SELECT * FROM adm_users WHERE adm_email = :adm_email";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(':adm_email', $adm_email);
        $stmt->execute();
        $stmt_result = $stmt->fetch(PDO::FETCH_OBJ);
        $adm_status = $stmt_result->adm_status;
        $result;
        if ($adm_status == 'user_suspended') {
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
      protected function checkUserConfirmed($adm_email){
        try {
        $sql = "SELECT * FROM adm_users WHERE adm_email = :adm_email";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(':adm_email', $adm_email);
        $stmt->execute();
        $stmt_result = $stmt->fetch(PDO::FETCH_OBJ);
        $adm_status = $stmt_result->adm_status;
        $result;
        if ($adm_status == 'user_confirmed') {
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

    protected function checkLoginCount($adm_email){
      try {
      $sql = "SELECT * FROM adm_users WHERE adm_email = :adm_email";
      $stmt = $this->connect()->prepare($sql);
      $stmt->bindValue(':adm_email', $adm_email);
      $stmt->execute();
      $stmt_result = $stmt->fetch(PDO::FETCH_OBJ);
      $adm_login_counter = $stmt_result->adm_login_counter;
      $result;
      if ($adm_login_counter == 0) {
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
