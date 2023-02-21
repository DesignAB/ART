<?php
namespace Footer;
class FooterConstructorController extends FooterConstructor{
  public $result;

    public function doFooter(){
     $result = $this->checkFooter();
     return $result;     
    }// doOneContest



}// class ends
