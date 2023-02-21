<?php
namespace AdmUsers;
class CheckAdmCookiesController extends CheckAdmCookies{

    public $adm_cookies;
    public $adm_f_name;
    public $adm_l_name;
    public $adm_rights;
    public function __construct(){
      $this->adm_cookies;
    }

    public function AdminData(){
        $this->adm_cookies = $_COOKIE[CookiesAdmPrefix];
          $result = $this->adm_userData();
          return $result;

    }// CheckUserCookies
    public function AdminRights(){
        $this->adm_cookies = $_COOKIE[CookiesAdmPrefix];
          $result = $this->adm_userData();
          return $this->adm_rights =  explode(', ' , $result['adm_rights']);

    }// CheckUserCookies

    public function CanIBeHere(){
      switch (true) {
        case $this->IsCookieSet():
        $this->adm_cookies = $_COOKIE[CookiesAdmPrefix];
        // but we have to check your status
          $check = $this->adm_userStatus();
        switch (true) {
          case $check['error']:
          header("Location:adm-login?message=".$check['message']."&error=".$check['error']);
            break;
          
          default:
            // echo "OK";
        // set cookies here
        $expire =  strtotime('+1hour', time());
        setcookie(CookiesAdmPrefix, $_COOKIE[CookiesAdmPrefix], $expire, "/");
            break;
        }

          break;
        
        default:
        header("Location:adm-login?message=Prawdopodobnie Twoja sesja wygasła, zaloguj się ponownie&error=YouCanNotBeHere");
        exit();
          echo " you can NOT be here"; // probably session expired
          break;
      }
    }// CanIBeHere



    private function IsCookieSet(){
      if(isset($_COOKIE[CookiesAdmPrefix])){
        $adm_cookies = $_COOKIE[CookiesAdmPrefix];
        $result = true;

      }
        else{
          $result = false;

        }
        return $result;
    }// IsCookieSet

    private function adm_userData(){
    $AdmUserData = $this->checkUserData($this->adm_cookies);
    return $AdmUserData;
    }

    private function adm_userStatus(){
      $checked_status = $this->checkUserStatus($this->adm_cookies);
      if ($checked_status == 'new') {
        $result = array(
        "error"=>true,
        "message"=>"Musisz potwierdzić swój adres email.<br>Sprawdź skrzynkę pocztową i postępuj zgodnie z instrukcjami."
        );
      }
      if ($checked_status == 'user_suspended') {
        $result = array(
        "error"=>true,
        "message"=>"Twoje konto zostało zawieszone.<br>Skontaktuj się z administratorem naszego serwisu"
        );
      }
      if ($checked_status == 'user_confirmed' && AdminConfirmation == 'on') {
        $result = array(
        "error"=>true,
        "message"=>"Needs confirmation."
        );
      }
      if ($checked_status == 'user_confirmed' && AdminConfirmation == '') {
        $result = array(
        "error"=>false,
        "message"=>"it is ok."
        );
      }

        return $result;

    }// adm_userStatus



}// class ends
