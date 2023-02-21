<?php
namespace AdmUsers;
use DbConnection\DbhPdoConnect as DbhPdoConnect;
use PDO;

class SetAdmCookies extends DbhPdoConnect{

      protected function checkAdmData($adm_email){
        try {
        $sql = "SELECT * FROM adm_users WHERE adm_email = :adm_email";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(':adm_email', $adm_email);
        $stmt->execute();
        $stmt_result = $stmt->fetch(PDO::FETCH_OBJ);
        $adm_id = $stmt_result->adm_id;
        $adm_status = $stmt_result->adm_status;
        $adm_login_counter = $stmt_result->adm_login_counter;
        $adm_rights = $stmt_result->adm_rights;
        $adm_f_name = $stmt_result->adm_f_name;
        $adm_l_name = $stmt_result->adm_l_name;
        $result = array("adm_id" => $adm_id,
        "adm_login_counter" => $adm_login_counter,
        "adm_rights" => $adm_rights,
        "adm_f_name" => $adm_f_name,
        "adm_l_name" => $adm_l_name
      );
        return $result;

      } catch (\PDOException $e) {
        header("Location:".DbErrors."?error_message=Skontaktuj się z administratorrem&error=checkUserNew");
                exit();

        }
      }// checkUserSuspended



} //class ends
