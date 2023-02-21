<?php
namespace SystemUsers;
class SetUserCookiesController extends SetUserCookies{
  private $u_email;
    public function __construct($u_email){
      $this->u_email = $u_email;
    }

    public function SetUserCookies(){
      //errors
      //errors ends
      $cookie_vars =  $this->checkUserData($this->u_email);
      $u_f_name = $cookie_vars['u_f_name'];
      $u_l_name = $cookie_vars['u_l_name'];
      $expire =  strtotime('+1hour', time());
      /// CookiesToSet in app setting cookies vars in SetUserCookies.class
      foreach (CookiesToSet as $key => $cookie_name) {
        $cookie_value = $cookie_vars[$key];
        setcookie($cookie_name, $cookie_value, $expire, "/");
      }
      $expire =  strtotime('+1year', time());
      setcookie(CookiesPrefix.'_ever_logged', $u_f_name.' '.$u_l_name, $expire, "/");
    }// signpUser ends




}// class ends
