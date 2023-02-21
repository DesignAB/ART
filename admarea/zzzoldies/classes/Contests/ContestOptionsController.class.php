<?php
namespace Contests;
class ContestOptionsController extends ContestUpdates{
  public $upload_result = array();
  private $id;
  private $contest_award;
  private $contest_sponsor;
  private $contest_max_votes;
  private $contest_max_votes_per_photo;
  private $contest_max_photos;
  private $active;
  private $featured;
  private $contest_photo;
  private $p_p_height;
  private $p_p_width;
    public function __construct($id, $contest_award, $contest_sponsor, $contest_max_votes, $contest_max_votes_per_photo, $contest_max_photos, $active, $featured, $contest_photo, $p_p_height, $p_p_width){
      $this->id = $id;
      $this->contest_award = $contest_award;
      $this->contest_sponsor = $contest_sponsor;
      $this->contest_max_votes = $contest_max_votes;
      $this->contest_max_votes_per_photo = $contest_max_votes_per_photo;
      $this->contest_max_photos = $contest_max_photos;
      $this->active = $active;
      $this->featured = $featured;
      $this->contest_photo = $contest_photo;
      $this->p_p_height = $p_p_height;
      $this->p_p_width = $p_p_width;
    }

    public function doUpdateOptions(){
      //errors
      switch (false) {
        case $this->UpdateContestOptions():
        $this->upload_result = array("error"=>false, "message"=>"Błąd bazy danych, skontaktuj się z administratorem.");
          break;

        default:
        $this->upload_result =  array("error"=>true, "message"=>"Wszystko ok. Poprawnie zmieniliśmy opcje");;
          break;
      }
      //errors ends
      return $this->upload_result;

    }// doUpload





    private function UpdateContestOptions(){
      if (!$this->checkUpdateContestOptions($this->id, $this->contest_award, $this->contest_sponsor, $this->contest_max_votes, $this->contest_max_votes_per_photo, $this->contest_max_photos, $this->active, $this->featured, $this->contest_photo, $this->p_p_height, $this->p_p_width)) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;
    }// UpdateContestOptions





}// class ends
