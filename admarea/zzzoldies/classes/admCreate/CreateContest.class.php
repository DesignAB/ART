<?php
namespace admCreate;
use DbConnection\DbhPdoConnect as DbhPdoConnect;
// use PDO;

class CreateContest extends DbhPdoConnect{
// unique_id is created in controller

  protected function checkCreatePhotoTable(){
    try {
      $TableName = 'contest_photos_'.$this->unique_id;
      $sql = "CREATE TABLE $TableName (
      id int(11) NOT NULL AUTO_INCREMENT,
      photo_active text COLLATE utf8_polish_ci NOT NULL DEFAULT 'on',
      photo_u_id text COLLATE utf8_polish_ci DEFAULT NULL,
      photo_author_u_id text COLLATE utf8_polish_ci DEFAULT NULL,
      photo_author_f_name text COLLATE utf8_polish_ci DEFAULT NULL,
      photo_author_l_name text COLLATE utf8_polish_ci DEFAULT NULL,
      photo_title text COLLATE utf8_polish_ci DEFAULT NULL,
      photo_description text COLLATE utf8_polish_ci DEFAULT NULL,
      photo_landscape text COLLATE utf8_polish_ci DEFAULT NULL,
      photo_portrait text COLLATE utf8_polish_ci DEFAULT NULL,
      photo_portrait_landscape text COLLATE utf8_polish_ci DEFAULT NULL,
      photo_votes int(11) DEFAULT 0,
      photo_upload_date datetime NOT NULL DEFAULT current_timestamp(),
      PRIMARY KEY (id)
      )ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_polish_ci";

    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $stmt = null;
    $result = true;
    return $result;
  } catch (\PDOException $e) {
    $stmt = null;
    $result = false;
    // header("Location:".DbErrors."?error_code=Skontaktuj się z administratorrem&error=createPhotoTable");
    // exit();
    }
    return $result;

  }// createPhotoTable

  protected function checkContestExists(){
    try {
    $sql = "SELECT * FROM contests WHERE contest_u_id = :contest_u_id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindValue(':contest_u_id', $this->unique_id);
    $stmt->execute();
    $resultCheck;
    if ($stmt->rowCount() > 0) {
      $resultCheck = false;
    } else{
      $resultCheck = true;
    }
    return $resultCheck;

  } catch (\PDOException $e) {
    header("Location:".DbErrors."?error_code=Skontaktuj się z administratorrem&error=checkContests");
            exit();

    }
    return $resultCheck;
  }// checkContestExists

  protected function checkFolderCreate($photo_folder){
    if (!file_exists($photo_folder) || !is_dir($photo_folder) ) {
      $create_dir = mkdir($photo_folder, 0755, true);
      $chmod_dir = chmod($photo_folder, 0755);
      $result = true;
      } else{
        $result = false;
      }
      return $result;
  }
  // protected function checkFolderExists($photo_folder){
  //   if (!file_exists($photo_folder) || !is_dir($photo_folder) ) {
  //     $result = false;
  //   } else{
  //     $result = true;
  //   }
  //   return $result;
  // }

  protected function checkInsertContest(){
    try {
    $tomorrow = date('Y-m-d', (strtotime(date("Y-m-d").'+1 day')));
    $full_end = $tomorrow.' 23:59:59'; 
    $contest_name = 'Nowy konkurs bez nazwy';
    $sql = "INSERT INTO contests (contest_u_id, contest_author, full_end, end_date, contest_name)
    VALUES (:contest_u_id, :contest_author, :full_end, :end_date, :contest_name)";
    $db = $this->connect();
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':contest_u_id', $this->unique_id);
    $stmt->bindValue(':contest_author', $this->contest_author);
    $stmt->bindValue(':full_end', $full_end);
    $stmt->bindValue(':end_date', $tomorrow);
    $stmt->bindValue(':contest_name', $contest_name);
    $stmt->execute();
    $last_id = $db->lastInsertId();

    $stmt = null;
    $result = true;

  } catch (\PDOException $e) {
    $stmt = null;
    // header("Location:".DbErrors."?error_code=Skontaktuj się z administratorrem&error=createContest");
    $result = false;
    }
    return $result;

  }// insertContest





} //class ends
