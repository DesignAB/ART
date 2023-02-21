<?php
namespace SqlQueries;
use DbConnection\DbhPdoConnect as DbhPdoConnect;
use PDO;

class SqlContestParticipate extends DbhPdoConnect{

		protected function checkOneContestMaxPhotos($contest_u_id, $contest_max_photos, $u_id){
			try {
				$table = 'contest_photos_'.$contest_u_id;
				$sql = "SELECT * FROM $table WHERE photo_author_u_id = :photo_author_u_id";
				$stmt = $this->connect()->prepare($sql);
				$stmt->bindValue(':photo_author_u_id', $u_id);
				$stmt->execute();
				$row_count = $stmt->rowCount();
				switch (true) {
					case $row_count == 0:
						$return = array(
							"error" => true,
							"row_count"=> 0
						);
						break;
					case $row_count >= $contest_max_photos:
						$return = array(
							"error" => false,
							"row_count"=> $row_count
						);
						break;
					default:
						$return = array(
							"error" => true,
							"row_count"=> $row_count
						);
						break;
				}
					} catch (\PDOException $e) {
						$return = false;
					}
			return $return;
		}// one




}// class ends
