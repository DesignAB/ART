<?php
namespace SqlQueries;
use DbConnection\DbhPdoConnect as DbhPdoConnect;
use PDO;

class SqlContestPhotos extends DbhPdoConnect{

		protected function checkAllContestPhotos($contest_u_id){
			try {
				$table = 'contest_photos_'.$contest_u_id;
				$sql = "SELECT * FROM $table ORDER BY photo_upload_date DESC";
				$stmt = $this->connect()->prepare($sql);
				$stmt->execute();
				$row_count = $stmt->rowCount();
				$row = $stmt->fetchAll((PDO::FETCH_ASSOC));
				$return = array("error"=>"", "row"=>$row);
					} catch (\PDOException $e) {
					$return = false;
					// header("Location:".DbErrors."?error_code=$e&error=confirm error");
					$return = array("error"=>"error", "message"=>"DATABASE ERROR: checkAllContestPhotos");
			}
			return $return;
		}// checkAllContestPhotos

		protected function checkAllActiveContestPhotos($contest_u_id){
			try {
				$table = 'contest_photos_'.$contest_u_id;
				$sql = "SELECT * FROM $table WHERE photo_active = 'on' ORDER BY photo_upload_date DESC";
				$stmt = $this->connect()->prepare($sql);
				$stmt->execute();
				$row_count = $stmt->rowCount();
				$row = $stmt->fetchAll((PDO::FETCH_ASSOC));
				$return = array("error"=>"", "row"=>$row);
					} catch (\PDOException $e) {
					$return = false;
					// header("Location:".DbErrors."?error_code=$e&error=confirm error");
					$return = array("error"=>"error", "message"=>"DATABASE ERROR: checkAllContestPhotos");
			}
			return $return;
		}// checkAllContestPhotos




}// class ends
