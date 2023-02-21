<?php
namespace SqlQueries;
use DbConnection\DbhPdoConnect as DbhPdoConnect;
use PDO;

class sqlAdmCategories extends DbhPdoConnect{

		protected function allCategories(){
			try {
				$sql = "SELECT * FROM categories";
				$stmt = $this->connect()->prepare($sql);
				$stmt->execute();
				$result = $stmt->fetchAll((PDO::FETCH_ASSOC));
				return $result;
			} catch (\PDOException $e) {
			header("Location:".DbErrors."?message=Skontaktuj się z administratorrem&error=admCategories");
				exit();
			}

		}// admCategories

}// class ends
