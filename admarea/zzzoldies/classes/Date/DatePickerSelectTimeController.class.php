<?php
namespace Date;
class DatePickerSelectTimeController{
  public $upload_result = array();
  private $end_hour;
  private $end_minute;
  private $end_second;
  private $start_hour;
  private $start_minute;
  private $start_second;
    public function __construct($end_hour, $end_minute, $end_second, $start_hour, $start_minute, $start_second){
      $this->end_hour = $end_hour;
      $this->end_minute = $end_minute;
      $this->end_second = $end_second;
      $this->start_hour = $start_hour;
      $this->start_minute = $start_minute;
      $this->start_second = $start_second;
    }

    public function constructEndHour(){
echo<<<HTML
    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="end_hour">
          <option value="$this->end_hour" selected>$this->end_hour</option>

HTML;
$x = 0; 
while($x <= 23) {
  $e_h= str_pad($x, 2, '0', STR_PAD_LEFT);
echo<<<HTML
      <option value="$e_h">$e_h</option>
HTML;

  $x++;
} 


echo<<<HTML
    </select>
HTML;

    }// constructEndHour
    public function constructEndMinute(){
echo<<<HTML
    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="end_minute">
          <option value="$this->end_minute" selected>$this->end_minute</option>

HTML;
$x = 0; 
while($x <= 59) {
  $e_m= str_pad($x, 2, '0', STR_PAD_LEFT);
echo<<<HTML
      <option value="$e_m">$e_m</option>
HTML;

  $x++;
} 


echo<<<HTML
    </select>
HTML;

    }// constructEndMinute
    public function constructEndSecond(){
echo<<<HTML
    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="end_second">
          <option class="border-0" value="$this->end_second" selected>$this->end_second</option>

HTML;
$x = 0; 
while($x <= 23) {
  $e_s= str_pad($x, 2, '0', STR_PAD_LEFT);
echo<<<HTML
      <option class="border-0" value="$e_s">$e_s</option>
HTML;

  $x++;
} 


echo<<<HTML
    </select>
HTML;

    }// constructEndSecond


// STARTS

    public function constructStartHour(){
echo<<<HTML
    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="start_hour">
          <option class="border-0" value="$this->start_hour" selected>$this->start_hour</option>

HTML;
$x = 0; 
while($x <= 23) {
  $s_h= str_pad($x, 2, '0', STR_PAD_LEFT);
echo<<<HTML
      <option class="border-0" value="$s_h">$s_h</option>
HTML;

  $x++;
} 


echo<<<HTML
    </select>
HTML;

    }// constructStartHour
    public function constructStartMinute(){
echo<<<HTML
    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="start_minute">
          <option class="border-0" value="$this->start_minute" selected>$this->start_minute</option>

HTML;
$x = 0; 
while($x <= 23) {
  $s_m= str_pad($x, 2, '0', STR_PAD_LEFT);
echo<<<HTML
      <option class="border-0" value="$s_m">$s_m</option>
HTML;

  $x++;
} 


echo<<<HTML
    </select>
HTML;

    }// constructStartMinute

    public function constructStartSecond(){
echo<<<HTML
    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="start_second">
          <option class="border-0" value="$this->start_second" selected>$this->start_second</option>

HTML;
$x = 0; 
while($x <= 23) {
  $s_s= str_pad($x, 2, '0', STR_PAD_LEFT);
echo<<<HTML
      <option class="border-0" value="$s_s">$s_s</option>
HTML;

  $x++;
} 


echo<<<HTML
    </select>
HTML;

    }// constructStartSecond





}// class ends
