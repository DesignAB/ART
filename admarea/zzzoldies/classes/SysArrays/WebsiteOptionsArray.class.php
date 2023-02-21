<?php
namespace SysArrays;
class WebsiteOptionsArray{
      public $look_and_feel;
    public function __construct(){
      $this->look_and_feel;
    }

    public function doWebsiteColors(){
        $ColorsArray = array(
         "light",
         "dark"
        );
        return $ColorsArray;

    }// doVisitorCookies
    public function doWebsiteFeel(){
        $ColorsArray = array(
         "round",
         "square"
        );
        return $ColorsArray;

    }// doVisitorCookies
    public function doWebsiteNavi(){
        $ColorsArray = array(
         "navbar",
         "offcanvas"
        );
        return $ColorsArray;

    }// doVisitorCookies



}
