<?php
namespace Contests;
class ContestPhotoController extends ContestPhoto{
  public $upload_result = array();
  private $contest_u_id;
  private $photo_u_id;
  private $image_path;
    public function __construct($contest_u_id, $photo_u_id, $image_path){
      $this->contest_u_id = $contest_u_id;
      $this->photo_u_id = $photo_u_id;
      $this->image_path = $image_path;
    }

    public function doBlockContestPhoto(){
      //errors
      switch (false) {
        case $this->BlockContestPhoto():
        $this->upload_result = array("error"=>false, "message"=>"Błąd bazy danych, skontaktuj się z administratorem.");
          break;

        default:
        $this->upload_result =  array("error"=>true, "message"=>"Wszystko ok. Poprawnie zmieniliśmy opcje");;
          break;
      }
      //errors ends
      return $this->upload_result;

    }// doBlockContestPhoto

    public function doUnBlockContestPhoto(){
      //errors
      switch (false) {
        case $this->UnBlockContestPhoto():
        $this->upload_result = array("error"=>false, "message"=>"Błąd bazy danych, skontaktuj się z administratorem.");
          break;

        default:
        $this->upload_result =  array("error"=>true, "message"=>"Wszystko ok. Poprawnie zmieniliśmy opcje");;
          break;
      }
      //errors ends
      return $this->upload_result;

    }// doUnBlockContestPhoto





    private function BlockContestPhoto(){
      if (!$this->checkBlockContestPhoto($this->contest_u_id, $this->photo_u_id)) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;
    }// BlockContestPhoto

    private function UnBlockContestPhoto(){
      if (!$this->checkUnBlockContestPhoto($this->contest_u_id, $this->photo_u_id)) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;
    }// BlockContestPhoto





}// class ends
