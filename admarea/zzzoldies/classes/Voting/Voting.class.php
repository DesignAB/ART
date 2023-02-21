<?php
namespace Voting;
use DbConnection\DbhPdoConnect as DbhPdoConnect;
use PDO;

class Voting extends DbhPdoConnect{


  protected function checkUpdatePhotoVotes($contest_u_id, $photo_u_id, $photo_votes){
    $result;
    try {
		$table = 'contest_photos_'.$contest_u_id;
		$new_photo_votes = $photo_votes + 1;
	    $sql = "UPDATE $table SET 
	    photo_votes = :photo_votes
	    WHERE photo_u_id = :photo_u_id";
	    $stmt = $this->connect()->prepare($sql);

	    $stmt->bindValue(':photo_u_id', $photo_u_id);
	    $stmt->bindValue(':photo_votes', $new_photo_votes);

	    $stmt->execute();
	    $stmt = null;
	    $result = true;
			} catch (\PDOException $e) {
				$stmt = null;
				// header("Location:".DbErrors."?error_code=$e&error=confirm error");
				$result = false;
			}
		return $result;
  }// checkUpdateContestAward


}// class ends
