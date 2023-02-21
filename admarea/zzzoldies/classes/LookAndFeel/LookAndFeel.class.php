<?php
namespace LookAndFeel;
use DbConnection\DbhPdoConnect as DbhPdoConnect;
use PDO;

class LookAndFeel extends DbhPdoConnect{

		protected function websiteFeelAndLook(){
			try {
				$sql = "SELECT * FROM website_options";
				$stmt = $this->connect()->prepare($sql);
				$stmt->execute();
				$row = $stmt->fetch(PDO::FETCH_OBJ);
				return $row;
			} catch (\PDOException $e) {
			header("Location:".DbErrors."?message=Skontaktuj się z administratorrem&error=admCategories");
				exit();
			}

		}// admCategories

}// class ends
