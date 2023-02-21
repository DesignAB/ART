<?php
namespace Contests;
class ContestSponsorController extends ContestUpdates{
  public $upload_result = array();
  private $id;
  private $contest_sponsor_name;
  private $contest_sponsor_sub_name;
  private $contest_sponsor_website;
  private $contest_sponsor_short_description;
  private $contest_sponsor_description;
    public function __construct($id, $contest_sponsor_name, $contest_sponsor_sub_name, $contest_sponsor_website, $contest_sponsor_short_description, $contest_sponsor_description){
      $this->id = $id;
      $this->contest_sponsor_name = $contest_sponsor_name;
      $this->contest_sponsor_sub_name = $contest_sponsor_sub_name;
      $this->contest_sponsor_website = $contest_sponsor_website;
      $this->contest_sponsor_short_description = $contest_sponsor_short_description;
      $this->contest_sponsor_description = $contest_sponsor_description;
    }

    public function doUpdateSponsor(){
      //errors
      switch (false) {
        case $this->UpdateContestSponsor():
        $this->upload_result = array("error"=>false, "message"=>"Błąd bazy danych, skontaktuj się z administratorem.");
          break;

        default:
        $this->upload_result =  array("error"=>true, "message"=>"Wszystko ok. Poprawnie zmieniliśmy dane sponsora, nie zapomnij o logotypie");;
          break;
      }
      //errors ends
      return $this->upload_result;

    }// doUpload


    private function UpdateContestSponsor(){
      if (!$this->checkUpdateContestSponsor($this->id, $this->contest_sponsor_name, $this->contest_sponsor_sub_name, $this->contest_sponsor_website, $this->contest_sponsor_short_description, $this->contest_sponsor_description)) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;
    }// UpdateContestOptions





}// class ends
