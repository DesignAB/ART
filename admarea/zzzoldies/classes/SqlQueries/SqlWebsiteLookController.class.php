<?php
namespace SqlQueries;
class SqlWebsiteLookController extends SqlWebsiteLook{


    public $website_look_result = array();
    private $website_color;
    private $website_feel;
    private $website_navi;
    public function __construct($website_color, $website_feel, $website_navi){
      $this->website_color = $website_color;
      $this->website_feel = $website_feel;
      $this->website_navi = $website_navi;
    }


    public function doWebsiteLook(){
      switch (false) {
        case $this->checkWebsiteLook($this->website_color, $this->website_feel, $this->website_navi):
        $this->website_look_result = array("error"=>true, "message"=>"coś poszło nie tak.");
          break;
        
        default:
        $this->website_look_result = array("error"=>false, "message"=>"wszystko OK");
          break;
      }
    }// doAllContests








}// class ends
