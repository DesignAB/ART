<?php
namespace ImageUpload;
use DbConnection\DbhPdoConnect as DbhPdoConnect;
use PDO;

class ImageUpload extends DbhPdoConnect{
  
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

  protected function checkOldPhoto($id, $table, $prefix, $folder){
    try {
    $sql = "SELECT * FROM $table WHERE id = :id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $stmt_result = $stmt->fetch(PDO::FETCH_OBJ);
    $image_to_delete = $stmt_result->$prefix;
      if (!empty($image_to_delete) && file_exists($folder.'/'.$image_to_delete)) {
      unlink($folder.'/'.$image_to_delete);
      }
    $result = true;

  } catch (\PDOException $e) {
    // header("Location:".DbErrors."?error_code=Skontaktuj się z administratorrem&error=checkUserEmail");
    $result = false;

    }

    return $result;
  }// checkUserEmail ends


} //class ends
