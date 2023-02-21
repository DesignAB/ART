<?php
namespace SqlQueries;
class SqlFooterController extends SqlFooter{


    public $website_footer_result = array();
    private $website_color;
    private $website_feel;
    private $website_navi;
    public function __construct(){
    }


    public function doWebsiteFooter(){
     $website_footer_result = $this->checkWebsiteFooter();
     return $website_footer_result;     
    }// doAllContests






}// class ends
