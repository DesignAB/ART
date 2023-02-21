<?php
namespace ImageUpload;
class ImageUploadController extends ImageUpload{
  public $upload_result = array();
  private $image;
  private $table;
  private $id;
  private $folder;
  private $image_name;
  private $image_file;
  private $prefix;
    public function __construct($image, $table, $id, $prefix){
      $this->image = $image;
      $this->table = $table;
      $this->id = $id;
      $this->prefix = $prefix;
      $this->folder = '../../'.IMGFOLDER.$table;
      $this->image_name = $table.'-'.substr(md5(time()), 0, 5).'.jpg';
      $this->image_file = $this->folder.'/'.$this->image_name;
    }

    public function doUpload(){
      // echo $this->folder;
      // exit();
      //errors
      switch (false) {
        case $this->FileExists():
        $this->upload_result = array("error"=>false, "message"=>"Przepraszamy, wkradł się błąd.<br>Plik o takiej nazwie już istnieje, spróbuj jeszcze raz.");
          break;


        case $this->RealUpload():
        $this->upload_result = array("error"=>false, "message"=>"Przepraszamy, wkradł się błąd.<br>Plik o takiej nazwie już istnieje, spróbuj jeszcze raz.");
          break;
        case $this->OldPhoto():
        $this->upload_result = array("error"=>false, "message"=>"Stare foto");
          break;

        case $this->UpdateTable():
        $this->upload_result = array("error"=>false, "message"=>"Przepraszamy, coś poszło nie tak.<br>Nie udało się dopisać nazwy zdjęcia do bazy danych.");
          break;


        default:
        $this->upload_result =  array("error"=>true, "message"=>"Wszystko ok. Poprawnie dodaliśmy zdjęcie");;
        // $this->setConfirmUser($this->u_email);
        // $this->upload_result = array("error"=>false, "message"=>"Dziękujemy za potwierdzenie adresu email.");
          break;
      }
      //errors ends
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

    private function UpdateTable(){
      if (!$this->checkUpdateTable($this->id, $this->table, $this->image_name, $this->prefix)) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;
    }// UpdateTable

    private function OldPhoto(){
      if (!$this->checkOldPhoto($this->id, $this->table, $this->prefix, $this->folder)) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;
    }// checkOldPhoto



}// class ends
