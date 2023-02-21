<?php
namespace Date;
class DatePickerTimeStatusController{
  public $upload_result = array();
  private $full_start;
  private $full_end;
    public function __construct($full_start, $full_end){
      $this->full_start = $full_start;
      $this->full_end = $full_end;
    }
    public function TimeStatusController(){
		// create class
		$full_now = strtotime(date('Y-m-d H:i:s'));
		$expire = date('Y-m-d H:i:s', (strtotime($this->full_end.'+1 second')));
		$expire = strtotime(date($expire));
		$starts = strtotime(date($this->full_start));
		 switch (true) {
		     case $full_now > $expire:
		    $time_status = "old";
		     break;
		     case $full_now < $starts:
		    $time_status = "planned";
		     break;
		   case $full_now < $expire && $full_now > $starts:
		    $time_status = "in_progress";
		     break;
		   
		   default:
		     // code...
		     break;
		 }
		//create class
		 return $time_status;
    }// TimeStatusController
}// class ends
