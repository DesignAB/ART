<?php
namespace SystemUsers;
use DbConnection\DbhPdoConnect as DbhPdoConnect;
use PDO;

class SetUserCookies extends DbhPdoConnect{

      protected function checkUserData($u_email){
        try {
        $sql = "SELECT * FROM system_users WHERE u_email = :u_email";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(':u_email', $u_email);
        $stmt->execute();
        $stmt_result = $stmt->fetch(PDO::FETCH_OBJ);
        $u_id = $stmt_result->u_id;
        $u_status = $stmt_result->u_status;
        $u_login_counter = $stmt_result->u_login_counter;
        $u_rights = $stmt_result->u_rights;
        $u_f_name = $stmt_result->u_f_name;
        $u_l_name = $stmt_result->u_l_name;
        $result = array("u_id" => $u_id,
        "u_login_counter" => $u_login_counter,
        "u_rights" => $u_rights,
        "u_f_name" => $u_f_name,
        "u_l_name" => $u_l_name
      );
        return $result;

      } catch (\PDOException $e) {
        header("Location:".DbErrors."?error_message=Skontaktuj się z administratorrem&error=checkUserNew");
                exit();

        }
      }// checkUserSuspended



} //class ends
