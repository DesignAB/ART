<?php
namespace Footer;
class FooterOptionsController extends FooterUpdates{
  public $upload_result = array();
  private $values_array;
  private $footer_array;
  private $param_array;
    public function __construct($values_array, $footer_array){
      $this->values_array = $values_array;
      $this->footer_array = $footer_array;
    }

    public function doUpdateFooter(){
      //errors
      switch (false) {
        case $this->UpdateFooter():
        $this->upload_result = array("error"=>false, "message"=>"Błąd bazy danych, skontaktuj się z administratorem.");
          break;

        default:
        $this->upload_result =  array("error"=>true, "message"=>"Wszystko ok. Poprawnie zmieniliśmy opcje");;
          break;
      }
      //errors ends
      return $this->upload_result;

    }// doUpload





    private function UpdateFooter(){
      if (!$this->checkUpdateFooter($this->values_array, $this->footer_array)) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;
    }// UpdateContestOptions





}// class ends
