<?php
namespace Contests;
use DbConnection\DbhPdoConnect as DbhPdoConnect;
use PDO;

class ContestPhoto extends DbhPdoConnect{

  protected function checkBlockContestPhoto($contest_u_id, $photo_u_id){
    $result;
    try {
      $table = 'contest_photos_'.$contest_u_id;
      $photo_active = '';
    $sql = "UPDATE $table SET 
    photo_active = :photo_active
    WHERE photo_u_id = :photo_u_id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindValue(':photo_u_id', $photo_u_id);
    $stmt->bindValue(':photo_active', $photo_active);
    $stmt->execute();
    $stmt = null;
    $result = true;
  } catch (\PDOException $e) {
    $stmt = null;
    echo $e; exit();
    // header("Location:".DbErrors."?error_code=$e&error=confirm error");
    $result = false;
    }
    return $result;
  }// checkBlockContestPhoto

  protected function checkUnBlockContestPhoto($contest_u_id, $photo_u_id){
    $result;
    try {
      $table = 'contest_photos_'.$contest_u_id;
      $photo_active = 'on';
    $sql = "UPDATE $table SET 
    photo_active = :photo_active
    WHERE photo_u_id = :photo_u_id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindValue(':photo_u_id', $photo_u_id);
    $stmt->bindValue(':photo_active', $photo_active);
    $stmt->execute();
    $stmt = null;
    $result = true;
  } catch (\PDOException $e) {
    $stmt = null;
    echo $e; exit();
    // header("Location:".DbErrors."?error_code=$e&error=confirm error");
    $result = false;
    }
    return $result;
  }// checkUnBlockContestPhoto



} //class ends
