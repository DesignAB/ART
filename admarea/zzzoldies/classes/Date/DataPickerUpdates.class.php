<?php
namespace Date;
use DbConnection\DbhPdoConnect as DbhPdoConnect;
use PDO;

class DataPickerUpdates extends DbhPdoConnect{

  protected function checkUpdateDate($id, $table, $start_date, $end_date, $end_time, $start_time){
    $result;
    try {
    $full_end = $end_date.' '.$end_time;
    $full_start = $start_date.' '.$start_time;
    $sql = "UPDATE $table SET 
    start_date = :start_date,
    end_date = :end_date,
    end_time = :end_time,
    start_time = :start_time,
    full_end = :full_end,
    full_start = :full_start
    WHERE id = :id";
    $stmt = $this->connect()->prepare($sql);

    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':start_date', $start_date);
    $stmt->bindValue(':end_date', $end_date);
    $stmt->bindValue(':end_time', $end_time);
    $stmt->bindValue(':start_time', $start_time);
    $stmt->bindValue(':full_end', $full_end);
    $stmt->bindValue(':full_start', $full_start);

    $stmt->execute();
    $stmt = null;
    $result = true;
  } catch (\PDOException $e) {
    $stmt = null;
    // header("Location:".DbErrors."?error_code=$e&error=confirm error");
    $result = false;
    }
    return $result;
  }// checkUpdateContestOptions



} //class ends
