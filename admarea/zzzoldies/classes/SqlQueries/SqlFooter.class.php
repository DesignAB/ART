<?php
namespace SqlQueries;
use DbConnection\DbhPdoConnect as DbhPdoConnect;
use PDO;

class SqlFooter extends DbhPdoConnect{

		protected function checkWebsiteFooter(){
			try {
				$sql = "SELECT * FROM website_footer";
				$stmt = $this->connect()->prepare($sql);
				$stmt->execute();
				$row = $stmt->fetch(PDO::FETCH_OBJ);
				$return = array("error"=>"", "row"=>$row);
					} catch (\PDOException $e) {
						$return = array("error"=>"false", "message"=>"checkOneContest");
					}
			return $return;

		}// one

}// class ends
