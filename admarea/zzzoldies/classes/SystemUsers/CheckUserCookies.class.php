<?php
namespace SystemUsers;
use DbConnection\DbhPdoConnect as DbhPdoConnect;
use PDO;

class CheckUserCookies extends DbhPdoConnect{

      protected function checkUserData($u_id){
        try {
        $sql = "SELECT * FROM system_users WHERE u_id = :u_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(':u_id', $u_id);
        $stmt->execute();
        $stmt_result = $stmt->fetch(PDO::FETCH_OBJ);
        $u_id = $stmt_result->u_id;
        $u_status = $stmt_result->u_status;
        $u_login_counter = $stmt_result->u_login_counter;
        $u_rights = $stmt_result->u_rights;
        $u_f_name = $stmt_result->u_f_name;
        $u_l_name = $stmt_result->u_l_name;
        $u_email = $stmt_result->u_email;
        $u_participate = $stmt_result->u_participate;
        $u_newsletter = $stmt_result->u_newsletter;
        $result = array(
        "id" => $id,
        "u_id" => $u_id,
        "u_status" => $u_status,
        "u_login_counter" => $u_login_counter,
        "u_rights" => $u_rights,
        "u_f_name" => $u_f_name,
        "u_l_name" => $u_l_name,
        "u_email" => $u_email,
        "u_participate" => $u_participate,
        "u_newsletter" => $u_newsletter
      );

      } catch (\PDOException $e) {

        $result = false;

        }
        return $result;


      }// checkUserData

      protected function checkUserStatus($u_id){
        try {
        $sql = "SELECT * FROM system_users WHERE u_id = :u_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(':u_id', $u_id);
        $stmt->execute();
        $stmt_result = $stmt->fetch(PDO::FETCH_OBJ);
        $u_id = $stmt_result->u_id;
        $u_status = $stmt_result->u_status;
        return $u_status;

      } catch (\PDOException $e) {
        header("Location:".DbErrors."?error_message=Skontaktuj się z administratorrem&error=CheckUserCookies");
                exit();

        }
      }// checkUserStatus


} //class ends
