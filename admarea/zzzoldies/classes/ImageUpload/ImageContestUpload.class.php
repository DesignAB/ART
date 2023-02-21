<?php
namespace ImageUpload;
use DbConnection\DbhPdoConnect as DbhPdoConnect;
use PDO;

class ImageContestUpload extends DbhPdoConnect{
  
  protected function checkFileExists($image_file){
    if (!file_exists($image_file)) {
      $result = true;
    } else{
      $result = false;
    }
    return $result;
  }
  protected function checkRealUpload($image_file, $image){
  list($type, $image) = explode(';',$image);
  list(, $image) = explode(',',$image);
  $image = base64_decode($image);
    if (file_put_contents($image_file, $image)) {
      $result = true;
    } else{
      $result = false;
    }
    return $result;
  }


  protected function checkUpdateTable($id, $table, $image_name, $prefix){
    $result;
    try {
    $sql = "UPDATE $table SET $prefix = :image_name  WHERE id = :id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindValue(':image_name', $image_name);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $stmt = null;
    $result = true;
  } catch (\PDOException $e) {
    $stmt = null;
    // header("Location:".DbErrors."?error_code=Skontaktuj się z administratorrem&error=confirm error");
    $result = false;
    exit();
    }
    return $result;
  }// setUser ends


  protected function checkInsertPhoto($prefix, $contest_u_id, $u_id, $u_f_name, $u_l_name, $photo_title, $photo_description, $image_name){
    try {
      $table = 'contest_photos_'.$contest_u_id;
      $photo_u_id = substr(md5(time()), 0, 5);
      $photo_author_u_id = $u_id;
      $image_field = ':'.$prefix;
    $sql = "INSERT INTO $table (photo_u_id, photo_author_u_id, photo_author_f_name, photo_author_l_name, photo_title, photo_description, $prefix)
    VALUES (:photo_u_id, :photo_author_u_id, :photo_author_f_name, :photo_author_l_name, :photo_title, :photo_description, $image_field)";
    $db = $this->connect();
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':photo_u_id', $photo_u_id);
    $stmt->bindValue(':photo_author_u_id', $u_id);
    $stmt->bindValue(':photo_author_f_name', $u_f_name);
    $stmt->bindValue(':photo_author_l_name', $u_l_name);
    $stmt->bindValue(':photo_title', $photo_title);
    $stmt->bindValue(':photo_description', $photo_description);
    $stmt->bindValue(':'.$prefix, $image_name);
    $stmt->execute();

    $stmt = null;
    $result = true;

  } catch (\PDOException $e) {
    $stmt = null;
    echo $e; exit();
    // header("Location:".DbErrors."?error_code=Skontaktuj się z administratorrem&error=createContest");
    $result = false;
    }
    return $result;

  }// insertContest

  protected function checkUserParticipate($u_id, $contest_u_id){
    $result;
            try {
                $sql = "SELECT * FROM system_users WHERE u_id = :u_id";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindValue(':u_id', $u_id);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_OBJ);
                $participate_array = explode(", ",$row->u_participate);
                if (!in_array($contest_u_id, $participate_array)) {
                    // do update
                    if (empty($row->u_participate)) {
                      $new_participate_array = $contest_u_id;
                    } else{
                    $new_participate_array = implode(', ', array_merge($participate_array, array($contest_u_id)));
                    }
                      try {
                      $sql = "UPDATE system_users SET u_participate = :u_participate  WHERE u_id = :u_id";
                      $stmt = $this->connect()->prepare($sql);
                      $stmt->bindValue(':u_participate', $new_participate_array);
                      $stmt->bindValue(':u_id', $u_id);
                      $stmt->execute();
                      $result = true;
                    } catch (\PDOException $e) {
                      $stmt = null;
                      // header("Location:".DbErrors."?error_code=Skontaktuj się z administratorrem&error=confirm error");
                      $result = false;
                      }
                    // do update
                  $result = true;

                } // !in_array ends
                $result = true;
                    } catch (\PDOException $e) {
                    $result = false;
                    // header("Location:".DbErrors."?error_code=$e&error=confirm error");
                    $return = array("error"=>"error", "message"=>"DATABASE ERROR: checkAllContests");
                      }
    return $result;
  }// setUser ends



} //class ends
