<?php
namespace SystemUsers;
class CheckUserCookiesController extends CheckUserCookies{

    public $u_cookies;
    public $result;
    public function __construct(){
      $this->u_cookies;
      $this->result;
    }


    public function doUserData(){
      $result = $this->userData();
      return $result;
    }// CheckUserCookies

    public function CanIParticipate(){
      $result;
      switch (true) {
        case $this->IsCookieSet():
        $this->u_cookies = $_COOKIE[CookiesPrefix];
        // but we have to check your rights
          $check = $this->u_userStatus();
        switch (true) {
          case $check['error']:
          header("Location:".UserLoginPage."?message=".$check['message']."&error=".$check['error']);
            break;
          
          default:
          // set cookies again
          $this->result = true;
            break;
        }
        // but we have to check your rights

          break;
        
        default:
        $error = 1;
        $message = 'Aby wziąć udział w konkursie należy się zalogować.<br> Jeśli nie masz konta w naszym systemie, zarejestruj się. To zajmie chwilę';
          header("Location:../user-login-participate");
            $this->result = false;
          break;
      }
      return $result;
    }// CanIParticipate

    public function CanIBeHere(){
      switch (true) {
        case $this->IsCookieSet():
        $this->u_cookies = $_COOKIE[CookiesPrefix];
        // but we have to check your rights
          $check = $this->u_userStatus();
        switch (true) {
          case $check['error']:
          header("Location:".UserLoginPage."?message=".$check['message']."&error=".$check['error']);
            break;
          
          default:
          // set cookies again
            // echo "OK";
            break;
        }
        // but we have to check your rights

          break;
        
        default:
        header("Location:".UserLoginPage."?message=Twoja sesja prawdopodobnie wygasła&error=YouCanNotBeHere");

          break;
      }
    }// CanIBeHere



    public function IsCookieSet(){
      if(isset($_COOKIE[CookiesPrefix])){
        $u_cookies = $_COOKIE[CookiesPrefix];
        $result = true;
      }
        else{
          $result = false;
        }
        return $result;
    }// IsCookieSet



    private function u_userStatus(){
      $checked_status = $this->checkUserStatus($this->u_cookies);
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

    }// u_userStatus

    private function userData(){
        $grab_user_data = $this->checkUserData($_COOKIE[CookiesPrefix]);
        switch (false) {
          case $grab_user_data:
            $result = false;
            break;
          
          default:
            $result = $grab_user_data;
            break;
        }
        return $result;

    }// userData


}// class ends
