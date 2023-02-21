<?php
namespace SystemUsers;
class LogInController extends LogIn{
  public $confirm_result = array();
  private $u_email;
  private $u_password;
    public function __construct($u_email, $u_password){
      $this->u_email = $u_email;
      $this->u_password = $u_password;
    }

    public function loginUser(){
      //errors
      switch (false) {
        case $this->EmailExists():
        $this->confirm_result = array("error"=>true, "message"=>$this->u_email."<br />Taki adres nie istnieje w naszej bazie, zarejestruj się.", "FirstTime"=>"");
          break;
          case $this->PasswordVerify():
          $this->confirm_result = array("error"=>true, "message"=>$this->u_password."<br />Niepoprawne hasło.", "FirstTime"=>"");
            break;
          case $this->UserSuspended():
          $this->confirm_result = array("error"=>true, "message"=>$this->u_email."<br />Twoje konto zostało zawieszone. Skontaktuj się z administratorem serwisu", "FirstTime"=>"");
            break;

            case $this->UserNew():
            $this->confirm_result = array("error"=>true, "message"=>$this->u_email."<br />Twój email nie został jeszcze potwierdzony. Sprawdź pocztę [również folder SPAM] i postępuj zgodnie z instrukcjami od nas.", "FirstTime"=>"");
              break;
              // this is needed only if AdminConfirmation is set to on
                case $this->UserConfirmed():
                $this->confirm_result = array("error"=>true, "message"=>$this->u_email."<br />Twój email nie został jeszcze potwierdzony przez administratora. Wyślemy Ci email z powiadomieniem.", "FirstTime"=>"");
                  break;
              // this is needed only if AdminConfirmation is set to on

        default:
        // check login count
        switch ($this->LoginCount($this->u_email)) {
          case false:
          $this->confirm_result = array("error"=>false, "message"=>"sukcess logowania.", "FirstTime"=>"on");
            break;

          default:
          $this->confirm_result = array("error"=>false, "message"=>"sukcess logowania.", "FirstTime"=>"");
            break;
        }
        // check login count
        // login user means update all fields
        $this->setLoginUser($this->u_email);
        // login user means update all fields

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
    private function PasswordVerify(){
      $result;
      if (!$this->checkUserPassword($this->u_email, $this->u_password)) {
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

    private function UserNew(){
      $result;
      if (!$this->checkUserNew($this->u_email)) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;

    }// email check ends
    private function UserConfirmed(){
      $result;
      if (!$this->checkUserConfirmed($this->u_email) && AdminConfirmation == 'on') {
        $result = false;
      } else{
        $result = true;
      }
      return $result;

    }// email check ends
    private function LoginCount(){
      $result;
      if (!$this->checkLoginCount($this->u_email)) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;

    }// email check ends



}// class ends
