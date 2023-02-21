<?php
namespace SysArrays;

class FooterArray{
    public $footer_array;
    public function __construct(){
        $this->footer_array = array(
 "footer_heading",
 "footer_tel_1",
 "footer_tel_1_desc",
 "footer_tel_2",
 "footer_tel_2_desc",
 "footer_fb",
 "footer_insta",
 "footer_address_1",
 "footer_address_2",
 "footer_form",
 "form_heading",
 "footer_form_email",
 "footer_map",
 "footer_map_content",
 "footer_logo",
 "footer_logo_image"
);

    }

    public function footerArray(){
      return $this->footer_array;
    }// createContest



}// class ends
