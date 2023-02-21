<?php
namespace Footer;
use DbConnection\DbhPdoConnect as DbhPdoConnect;
use PDO;

class FooterConstructor extends DbhPdoConnect{

		protected function checkFooter(){
			try {
				$sql = "SELECT * FROM website_footer";
				$stmt = $this->connect()->prepare($sql);
				$stmt->execute();
				$row = $stmt->fetch(PDO::FETCH_OBJ);
				$return = array("error"=>"", "row"=>$row);
					} catch (\PDOException $e) {
						$return = array("error"=>"false", "message"=>"checkFooter");
					}
			return $return;

		}// one




}// class ends
