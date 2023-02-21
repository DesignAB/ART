<?php
namespace Contests;
class ContestContentController extends ContestUpdates{
  public $upload_result = array();
  private $id;
  private $contest_name;
  private $contest_sub_name;
  private $contest_short_description;
  private $contest_description;
  private $contest_author;
  private $contest_author_address;
    public function __construct($id, $contest_name, $contest_sub_name, $contest_short_description, $contest_description, $contest_author, $contest_author_address){
      $this->id = $id;
      $this->contest_name = $contest_name;
      $this->contest_sub_name = $contest_sub_name;
      $this->contest_short_description = $contest_short_description;
      $this->contest_description = $contest_description;
      $this->contest_author = $contest_author;
      $this->contest_author_address = $contest_author_address;
    }

    public function doUpdateContent(){
      //errors
      switch (false) {
        case $this->UpdateContestContent():
        $this->upload_result = array("error"=>false, "message"=>"Błąd bazy danych, skontaktuj się z administratorem.");
          break;

        default:
        $this->upload_result =  array("error"=>true, "message"=>"Wszystko ok. Poprawnie zmieniliśmy treści konkursu");;
          break;
      }
      //errors ends
      return $this->upload_result;

    }// doUpload


    private function UpdateContestContent(){
      if (!$this->checkUpdateContestContent($this->id, $this->contest_name, $this->contest_sub_name, $this->contest_short_description, $this->contest_description, $this->contest_author, $this->contest_author_address)) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;
    }// UpdateContestOptions





}// class ends
