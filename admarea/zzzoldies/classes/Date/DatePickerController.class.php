<?php
namespace Date;
class DatePickerController extends DataPickerUpdates{
  public $upload_result = array();
  private $id;
  private $table;
  private $start_date;
  private $end_date;
  private $end_time;
  private $start_time;
    public function __construct($id, $table, $start_date, $end_date, $end_time, $start_time){
      $this->id = $id;
      $this->table = $table;
      $this->start_date = $start_date;
      $this->end_date = $end_date;
      $this->end_time = $end_time;
      $this->start_time = $start_time;
    }

    public function doUpdatedDate(){
      //errors
      switch (false) {
        case $this->UpdateDate():
        $this->upload_result = array("error"=>false, "message"=>"Błąd bazy danych, skontaktuj się z administratorem.");
          break;

        default:
        $this->upload_result =  array("error"=>true, "message"=>"Wszystko ok. Poprawnie zmieniliśmy daty konkursu");;
          break;
      }
      //errors ends
      return $this->upload_result;

    }// doUpload


    private function UpdateDate(){
      if (!$this->checkUpdateDate($this->id, $this->table, $this->start_date, $this->end_date, $this->end_time, $this->start_time)) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;
    }// UpdateContestOptions





}// class ends
