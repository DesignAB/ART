<?php
namespace ImageUpload;
class ImageContestUploadController extends ImageContestUpload{
  public $upload_result = array();
  private $image;
  private $folder;
  private $image_name;
  private $image_file;
  private $prefix;
  private $contest_u_id;
  private $u_id;
  private $photo_title;
  private $photo_description;
  private $u_f_name;
  private $u_l_name;
    public function __construct($image, $prefix, $contest_u_id, $u_id, $u_f_name, $u_l_name, $photo_title, $photo_description){
      $this->u_f_name = $u_f_name;
      $this->u_l_name = $u_l_name;
      $this->image = $image;
      $this->prefix = $prefix;
      $this->contest_u_id = $contest_u_id;
      $this->u_id = $u_id;
      $this->photo_title = $photo_title;
      $this->photo_description = $photo_description;
      $this->folder = '../'.ImagesFolder.'contests/contests_photos_'.$this->contest_u_id;
      $this->image_name = $this->contest_u_id.'-'.substr(md5(time()), 0, 5).'.jpg';
      $this->image_file = $this->folder.'/'.$this->image_name;
    }

    public function doUpload(){
      // errors
      switch (false) {
        case $this->FileExists():
        $this->upload_result = array("error"=>false, "message"=>"Przepraszamy, wkradł się błąd.<br>Plik o takiej nazwie już istnieje, spróbuj jeszcze raz.");
          break;


        case $this->RealUpload():
        $this->upload_result = array("error"=>false, "message"=>"Przepraszamy, wkradł się błąd.<br>Plik o takiej nazwie już istnieje, spróbuj jeszcze raz.");
          break;

        case $this->InsertPhoto():
        $this->upload_result = array("error"=>false, "message"=>"Przepraszamy, coś poszło nie tak.<br>Nie udało się dopisać nazwy zdjęcia do bazy danych.");
          break;

        case $this->UserParticipate():
        $this->upload_result = array("error"=>false, "message"=>"Przepraszamy, coś poszło nie tak.<br>Participate error.");
          break;


        default:
        $this->upload_result =  array("error"=>true, "message"=>"Wszystko ok. Poprawnie dodaliśmy zdjęcie");;
          break;
      }
      // errors ends

      return $this->upload_result;

    }// doUpload





    private function FileExists(){
      if (!$this->checkFileExists($this->image_file)) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;
    }// FolderExists

    private function RealUpload(){
      if (!$this->checkRealUpload($this->image_file, $this->image)) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;
    }// RealUpload


    private function InsertPhoto(){
      if (!$this->checkInsertPhoto($this->prefix, $this->contest_u_id, $this->u_id, $this->u_f_name, $this->u_l_name, $this->photo_title, $this->photo_description, $this->image_name)) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;
    }// UpdateTable
    private function UserParticipate(){
      if (!$this->checkUserParticipate($this->u_id, $this->contest_u_id)) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;
    }// UpdateTable




}// class ends
