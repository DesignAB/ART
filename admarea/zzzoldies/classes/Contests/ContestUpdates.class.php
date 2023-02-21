<?php
namespace Contests;
use DbConnection\DbhPdoConnect as DbhPdoConnect;
use PDO;

class ContestUpdates extends DbhPdoConnect{

  protected function checkUpdateContestOptions($id, $contest_award, $contest_sponsor, $contest_max_votes, $contest_max_votes_per_photo, $contest_max_photos, $active, $featured, $contest_photo, $p_p_height, $p_p_width){
    $result;
    try {
    $sql = "UPDATE contests SET 
    contest_award = :contest_award,
    contest_sponsor = :contest_sponsor,
    contest_max_votes = :contest_max_votes,
    contest_max_votes_per_photo = :contest_max_votes_per_photo,
    contest_max_photos = :contest_max_photos,
    active = :active,
    featured = :featured,
    contest_photo = :contest_photo,
    p_p_height = :p_p_height,
    p_p_width = :p_p_width
    WHERE id = :id";
    $stmt = $this->connect()->prepare($sql);

    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':contest_award', $contest_award);
    $stmt->bindValue(':contest_sponsor', $contest_sponsor);
    $stmt->bindValue(':contest_max_votes', $contest_max_votes);
    $stmt->bindValue(':contest_max_votes_per_photo', $contest_max_votes_per_photo);
    $stmt->bindValue(':contest_max_photos', $contest_max_photos);
    $stmt->bindValue(':active', $active);
    $stmt->bindValue(':featured', $featured);
    $stmt->bindValue(':contest_photo', $contest_photo);
    $stmt->bindValue(':p_p_height', $p_p_height);
    $stmt->bindValue(':p_p_width', $p_p_width);

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


  protected function checkUpdateContestAward($id, $contest_award_name, $contest_award_sub_name, $contest_award_short_description, $contest_award_description){
    $result;
    try {
    $sql = "UPDATE contests SET 
    contest_award_name = :contest_award_name,
    contest_award_sub_name = :contest_award_sub_name,
    contest_award_short_description = :contest_award_short_description,
    contest_award_description = :contest_award_description
    WHERE id = :id";
    $stmt = $this->connect()->prepare($sql);

    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':contest_award_name', $contest_award_name);
    $stmt->bindValue(':contest_award_sub_name', $contest_award_sub_name);
    $stmt->bindValue(':contest_award_short_description', $contest_award_short_description);
    $stmt->bindValue(':contest_award_description', $contest_award_description);

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

    protected function checkUpdateContestSponsor($id, $contest_sponsor_name, $contest_sponsor_sub_name, $contest_sponsor_website, $contest_sponsor_short_description, $contest_sponsor_description){
    $result;
    try {
    $sql = "UPDATE contests SET 
    contest_sponsor_name = :contest_sponsor_name,
    contest_sponsor_sub_name = :contest_sponsor_sub_name,
    contest_sponsor_website = :contest_sponsor_website,
    contest_sponsor_short_description = :contest_sponsor_short_description,
    contest_sponsor_description = :contest_sponsor_description
    WHERE id = :id";
    $stmt = $this->connect()->prepare($sql);

    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':contest_sponsor_name', $contest_sponsor_name);
    $stmt->bindValue(':contest_sponsor_sub_name', $contest_sponsor_sub_name);
    $stmt->bindValue(':contest_sponsor_website', $contest_sponsor_website);
    $stmt->bindValue(':contest_sponsor_short_description', $contest_sponsor_short_description);
    $stmt->bindValue(':contest_sponsor_description', $contest_sponsor_description);

    $stmt->execute();
    $stmt = null;
    $result = true;
  } catch (\PDOException $e) {
    $stmt = null;
    // header("Location:".DbErrors."?error_code=$e&error=confirm error");
    $result = false;
    }
    return $result;
  }// checkUpdateContestSponsor


      protected function checkUpdateContestContent($id, $contest_name, $contest_sub_name, $contest_short_description, $contest_description, $contest_author, $contest_author_address){
    $result;
    try {
    $sql = "UPDATE contests SET 
    contest_name = :contest_name,
    contest_sub_name = :contest_sub_name,
    contest_short_description = :contest_short_description,
    contest_description = :contest_description,
    contest_author = :contest_author,
    contest_author_address = :contest_author_address
    WHERE id = :id";
    $stmt = $this->connect()->prepare($sql);

    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':contest_name', $contest_name);
    $stmt->bindValue(':contest_sub_name', $contest_sub_name);
    $stmt->bindValue(':contest_short_description', $contest_short_description);
    $stmt->bindValue(':contest_description', $contest_description);
    $stmt->bindValue(':contest_author', $contest_author);
    $stmt->bindValue(':contest_author_address', $contest_author_address);

    $stmt->execute();
    $stmt = null;
    $result = true;
  } catch (\PDOException $e) {
    $stmt = null;
    // header("Location:".DbErrors."?error_code=$e&error=confirm error");
    $result = false;
    }
    return $result;
  }// checkUpdateContestContent


} //class ends
