<?php
namespace LookAndFeel;
class LookAndFeelController extends LookAndFeel{

      public $look_and_feel;
    public function __construct(){
      $this->look_and_feel;
    }



    public function doLookAndFeel(){
     $row = $this->websiteFeelAndLook();
     $color = $row->website_color;
     $feel = $row->website_feel;
     $tag = <<<HTML
     data-colors="$color" data-feel="$feel" 
HTML;
     return $tag;
    }// doVisitorCookies

    public function doWebsiteNavi(){
     $row = $this->websiteFeelAndLook();
     $website_navi = $row->website_navi;
     return $website_navi;
    }// doVisitorCookies



    public function doCheckLookAndFeel(){
     $row = $this->websiteFeelAndLook();
     return $row;
    }// doVisitorCookies



    // private function IsCookiesColorsSet(){
    //   if(isset($_COOKIE[CookiesColorsPrefix])){
    //     $result = true;
    //   }
    //     else{
    //       $result = false;
    //     }
    //     return $result;
    // }// IsCookieSet






}// class ends
