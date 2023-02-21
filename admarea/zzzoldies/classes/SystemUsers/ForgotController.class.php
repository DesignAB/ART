<?php
namespace SystemUsers;
class ForgotController extends Forgot{
  public $forgot_result = array();
  private $u_email;
    public function __construct($u_email){
      $this->u_email = $u_email;
    }

    public function forgottenPassword(){
      //errors
      switch (false) {
        //1
        case $this->EmailExists():
        $this->forgot_result = array("error"=>true, "message"=>"Taki adres nie istnieje w naszej bazie, zarejestruj się.");
          break;
          //2
          case $this->newUser():
          $this->forgot_result = array("error"=>true, "message"=>"Twój email nie został jeszcze potwierdzony. Sprawdź pocztę [również folder SPAM] i postępuj zgodnie z instrukcjami od nas.");
            break;
            //3
            case $this->UserSuspended():
            $this->forgot_result = array("error"=>true, "message"=>"Twoje konto zostało zawieszone. Skontaktuj się z administratorem serwisu");
              break;

          //4
          case $this->UserConfirmed():
          $this->forgot_result = array("error"=>true, "message"=>"Twój email nie został jeszcze potwierdzony. Sprawdź pocztę [również folder SPAM] i postępuj zgodnie z instrukcjami od nas.");
            break;

        default:
        $this->setNewPassword($this->u_email);
        $this->forgot_result = array("error"=>false, "message"=>"Sprawdź pocztę, wysłaliśmy Ci nowe hasło.");
          break;
      }
      //errors ends
      return $this->forgot_result;
    }// signpUser ends



//1
private function EmailExists(){
  $result;
  if (!$this->checkUserEmail($this->u_email)) {
    $result = false;
  } else{
    $result = true;
  }
  return $result;

}// email check ends
//2
private function newUser(){
  $result;
  if (!$this->checkUserNew($this->u_email)) {
    $result = false;
  } else{
    $result = true;
  }
  return $result;

}// email check ends

//3
    private function UserSuspended(){
      $result;
      if (!$this->checkUserSuspended($this->u_email)) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;

    }// email check ends
    //4
        private function UserConfirmed(){
          $result;
          if (!$this->checkUserConfirmed($this->u_email) && AdminConfirmation == 'on') {
            $result = false;
          } else{
            $result = true;
          }
          return $result;

        }// email check ends



}// class ends
