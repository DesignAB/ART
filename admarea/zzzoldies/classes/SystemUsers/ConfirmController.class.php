<?php
namespace SystemUsers;
class ConfirmController extends Confirm{
  public $confirm_result = array();
  private $u_email;
  private $u_token;
    public function __construct($u_email, $u_token){
      $this->u_email = $u_email;
      $this->u_token = $u_token;
    }

    public function confirmUser(){
      //errors
      switch (false) {
        case $this->EmailExists():
        $this->confirm_result = array("error"=>true, "message"=>"Taki adres nie istnieje w naszej bazie, zarejestruj się.");
          break;
          case $this->UserConfirmed():
          if (AdminConfirmation == 'on') {
            $this->confirm_result = array("error"=>true, "message"=>"Twoje konto już zostało potwierdzone. Musisz poczekać na akceptację administratora");
          } else{
            $this->confirm_result = array("error"=>true, "message"=>"Twoje konto już zostało potwierdzone. Możesz się zalogować");

            }

            break;
            case $this->UserSuspended():
            $this->confirm_result = array("error"=>true, "message"=>"Twoje konto zostało zawieszone. Skontaktuj się z administratorem serwisu");
              break;
              case $this->TokenMatch():
              $this->confirm_result = array("error"=>true, "message"=>"Nieprawidłowy token.");
                break;
                case $this->TokenExpire():
                $this->confirm_result = array("error"=>true, "message"=>"Twój token wygasł, a Twój adres usunięty z bazy danych. Prosimy o ponowną rejestrację.<br>Przypominamy, że unikalny klucz który Ci wyślemy jest ważny przez godzinę.");
                $this->deleteUser($this->u_email); // deletes user from db we re wait to long for confirmation
                  break;

        default:
        $this->setConfirmUser($this->u_email); // changes status to user_confirmed
        $this->confirm_result = array("error"=>false, "message"=>"Dziękujemy za potwierdzenie adresu email.");
          break;
      }
      //errors ends
      return $this->confirm_result;
    }// signpUser ends




    private function EmailExists(){
      $result;
      if (!$this->checkUserEmail($this->u_email)) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;

    }// email check ends
    private function UserConfirmed(){
      $result;
      if (!$this->checkUserConfirmed($this->u_email)) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;

    }// email check ends
    private function UserSuspended(){
      $result;
      if (!$this->checkUserSuspended($this->u_email)) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;

    }// email check ends

    private function TokenMatch(){
      $result;
      if (!$this->checkUserToken($this->u_email, $this->u_token)) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;

    }// email check ends
    private function TokenExpire(){
      $result;
      if (!$this->checkUserTokenExpire($this->u_email)) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;

    }// email check ends


}// class ends
