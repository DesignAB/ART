<?php
namespace SqlQueries;
use DbConnection\DbhPdoConnect as DbhPdoConnect;
use PDO;

class SqlContests extends DbhPdoConnect{

		protected function checkAllContests(){
			try {
				$sql = "SELECT * FROM contests ORDER BY full_start DESC";
				$stmt = $this->connect()->prepare($sql);
				$stmt->execute();
				$row_count = $stmt->rowCount();
				$row = $stmt->fetchAll((PDO::FETCH_ASSOC));
				$return = array("error"=>"", "row"=>$row);
					} catch (\PDOException $e) {
					$return = false;
					// header("Location:".DbErrors."?error_code=$e&error=confirm error");
					$return = array("error"=>"error", "message"=>"DATABASE ERROR: checkAllContests");
			}
			return $return;
		}// SqlAll

		protected function checkOneContest($id){
			try {
				$sql = "SELECT * FROM contests WHERE id = :id";
				$stmt = $this->connect()->prepare($sql);
				$stmt->bindValue(':id', $id);
				$stmt->execute();
				$row = $stmt->fetch(PDO::FETCH_OBJ);
				$return = array("error"=>"", "row"=>$row);
					} catch (\PDOException $e) {
						$return = array("error"=>"false", "message"=>"checkOneContest");
					}
			return $return;

		}// one
		protected function checkOneContestByUid($contest_u_id){
			try {
				$sql = "SELECT * FROM contests WHERE contest_u_id = :contest_u_id";
				$stmt = $this->connect()->prepare($sql);
				$stmt->bindValue(':contest_u_id', $contest_u_id);
				$stmt->execute();
				$row = $stmt->fetch(PDO::FETCH_OBJ);
				$return = array("error"=>"", "row"=>$row);
					} catch (\PDOException $e) {
						$return = array("error"=>"false", "message"=>"checkOneContest");
					}
			return $return;

		}// one

		protected function checkActiveContests(){
			try {
				$sql = "SELECT * FROM contests WHERE active = :active";
				$active = 'on';
				$stmt = $this->connect()->prepare($sql);
				$stmt->bindValue(':active', $active);
				$stmt->execute();
				$row = $stmt->fetchAll((PDO::FETCH_ASSOC));
				$return = array("error"=>"", "row"=>$row);
					} catch (\PDOException $e) {
						$return = array("error"=>"false", "message"=>"checkActiveContests");
			}
			return $return;

		}// checkActiveContests

		protected function checkInactiveContests(){
			try {
				$sql = "SELECT * FROM contests WHERE active IS NULL";
				$stmt = $this->connect()->prepare($sql);
				$stmt->execute();
				$row = $stmt->fetchAll((PDO::FETCH_ASSOC));
				$return = array("error"=>"", "row"=>$row);
					} catch (\PDOException $e) {
						$return = array("error"=>"false", "message"=>"checkInactiveContests");
					}
			return $return;

		}// checkInactiveContests

		protected function checkInTimeContests(){
			try {
				$full_now = date('Y-m-d H:i:s');
				// $full_now = strtotime(date('Y-m-d H:i:s'));

				// echo $full_now; exit();
				// $sql = "SELECT * FROM contests WHERE full_start < $full_now AND full_end > $full_now";
				$sql = "SELECT * FROM contests WHERE full_start < NOW() AND full_end > NOW()";
				$stmt = $this->connect()->prepare($sql);
				$stmt->execute();
				$row = $stmt->fetchAll((PDO::FETCH_ASSOC));
				$return = array("error"=>"", "row"=>$row);
					} catch (\PDOException $e) {
						$return = array("error"=>"false", "message"=>"checkInTimeContests");
					}
			return $return;

		}// checkInTimeContests

		protected function checkPlannedContests(){
			try {
				$full_now = date('Y-m-d H:i:s');
				$sql = "SELECT * FROM contests WHERE full_start > NOW()";
				$stmt = $this->connect()->prepare($sql);
				$stmt->execute();
				$row = $stmt->fetchAll((PDO::FETCH_ASSOC));
				$return = array("error"=>"", "row"=>$row);
					} catch (\PDOException $e) {
						$return = array("error"=>"false", "message"=>"checkPlannedContests");
					}
			return $return;

		}// checkPlannedContests
		protected function checkEndedContests(){
			try {
				$full_now = date('Y-m-d H:i:s');
				$sql = "SELECT * FROM contests WHERE full_end < NOW()";
				$stmt = $this->connect()->prepare($sql);
				$stmt->execute();
				$row = $stmt->fetchAll((PDO::FETCH_ASSOC));
				$return = array("error"=>"", "row"=>$row);
					} catch (\PDOException $e) {
						$return = array("error"=>"false", "message"=>"checkPlannedContests");
					}
			return $return;

		}// checkEndedContests

		protected function checkFeaturedContests(){
			try {
				$sql = "SELECT * FROM contests WHERE featured = 'on'";
				$stmt = $this->connect()->prepare($sql);
				$stmt->execute();
				$row = $stmt->fetchAll((PDO::FETCH_ASSOC));
				$return = array("error"=>"", "row"=>$row);
					} catch (\PDOException $e) {
						$return = array("error"=>"false", "message"=>"checkFeaturedContests");
					}
			return $return;

		}// checkFeaturedContests

		protected function checkUserContests($id){
			try {

				$sql = "SELECT * FROM contests WHERE";
				$counter = 1;
				$participations = count($id);
				foreach ($id as $key) {
				  if ($participations<=$counter) {
				    $and = " OR";
				  } else{
				    $and = '';
				  }
				  $sql .= $and.' contest_u_id = '."'".$key."'";

				$counter++;

				}
				// print_r($sql); exit();
				$stmt = $this->connect()->prepare($sql);
				$stmt->execute();
				$row = $stmt->fetchAll((PDO::FETCH_ASSOC));
				$return = array("error"=>"", "row"=>$row);
					} catch (\PDOException $e) {
						echo $e; exit();
						$return = array("error"=>"false", "message"=>"checkFeaturedContests");
					}
			return $return;

		}// checkFeaturedContests


		protected function checkActiveInTimeContests(){
			try {
				$sql = "SELECT * FROM contests WHERE full_start < NOW() AND full_end > NOW() AND active = 'on'";
				$stmt = $this->connect()->prepare($sql);
				$stmt->execute();
				$row = $stmt->fetchAll((PDO::FETCH_ASSOC));
				$return = array("error"=>"", "row"=>$row);
					} catch (\PDOException $e) {
						$return = array("error"=>"false", "message"=>"checkActiveInTimeContests");
					}
			return $return;

		}// checkActiveInTimeContests



}// class ends
