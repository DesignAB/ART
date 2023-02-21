<?php
namespace Contests;
class ContestAwardController extends ContestUpdates{
  public $upload_result = array();
  private $id;
  private $contest_award_name;
  private $contest_award_sub_name;
  private $contest_award_short_description;
  private $contest_award_description;
    public function __construct($id, $contest_award_name, $contest_award_sub_name, $contest_award_short_description, $contest_award_description){
      $this->id = $id;
      $this->contest_award_name = $contest_award_name;
      $this->contest_award_sub_name = $contest_award_sub_name;
      $this->contest_award_short_description = $contest_award_short_description;
      $this->contest_award_description = $contest_award_description;
    }

    public function doUpdateAward(){
      //errors
      switch (false) {
        case $this->UpdateContestAward():
        $this->upload_result = array("error"=>false, "message"=>"Błąd bazy danych, skontaktuj się z administratorem.");
          break;

        default:
        $this->upload_result =  array("error"=>true, "message"=>"Wszystko ok. Poprawnie zmieniliśmy treści nagrody");;
          break;
      }
      //errors ends
      return $this->upload_result;

    }// doUpload


    private function UpdateContestAward(){
      if (!$this->checkUpdateContestAward($this->id, $this->contest_award_name, $this->contest_award_sub_name, $this->contest_award_short_description, $this->contest_award_description)) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;
    }// UpdateContestOptions





}// class ends
