<?php
namespace AdmUsers;
class SetAdmCookiesController extends SetAdmCookies{
  private $adm_email;
    public function __construct($adm_email){
      $this->adm_email = $adm_email;
    }

    public function SetAdmCookies(){
      //errors
      //errors ends
      $cookie_vars =  $this->checkAdmData($this->adm_email);
      $adm_f_name = $cookie_vars['adm_f_name'];
      $adm_l_name = $cookie_vars['adm_l_name'];
      $expire =  strtotime('+1hour', time());
      /// CookiesToSet in app setting cookies vars in SetADMCookies.class
      foreach (AdmCookiesToSet as $key => $cookie_name) {
        $cookie_value = $cookie_vars[$key];
        setcookie($cookie_name, $cookie_value, $expire, "/");
      }

    }// signpUser ends




}// class ends
