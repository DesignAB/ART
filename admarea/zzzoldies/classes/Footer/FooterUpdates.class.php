<?php
namespace Footer;
use DbConnection\DbhPdoConnect as DbhPdoConnect;
use PDO;

class FooterUpdates extends DbhPdoConnect{

  protected function checkUpdateFooter($values_array, $footer_array){
    $result;
    try {
      // build params
        foreach ($values_array as $key => $value) {
        $param_array[]= $key.' = '.':'.$key;
      }
        $param_array = implode(', ', $param_array);
      // build params

    $sql = "UPDATE website_footer SET $param_array";
    $stmt = $this->connect()->prepare($sql);

    // $stmt->bindValue(':id', $id);
    // $do bind
      foreach ($values_array as $key => $value) {
        $stmt->bindValue(':'.$key, $value);
      }
    // do bind

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
  }// checkUpdateContestOptions




} //class ends
