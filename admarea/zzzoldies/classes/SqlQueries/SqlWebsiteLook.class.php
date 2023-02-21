<?php
namespace SqlQueries;
use DbConnection\DbhPdoConnect as DbhPdoConnect;
use PDO;

class SqlWebsiteLook extends DbhPdoConnect{

  protected function checkWebsiteLook($website_color, $website_feel, $website_navi){
    $result;
    try {
    $sql = "UPDATE website_options SET 
    website_color = :website_color,
    website_feel = :website_feel,
    website_navi = :website_navi
    ";
    $stmt = $this->connect()->prepare($sql);

    $stmt->bindValue(':website_color', $website_color);
    $stmt->bindValue(':website_feel', $website_feel);
    $stmt->bindValue(':website_navi', $website_navi);

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



}// class ends
