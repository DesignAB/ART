<?php
namespace AdmUsers;
class LogInController extends LogIn{
  public $confirm_result = array();
  private $adm_email;
  private $adm_password;
    public function __construct($adm_email, $adm_password){
      $this->adm_email = $adm_email;
      $this->adm_password = $adm_password;
    }

    public function loginUser(){
      //errors
      switch (false) {
        case $this->EmailExists():
        $this->confirm_result = array("error"=>true, "message"=>$this->adm_email."<br />Taki adres nie istnieje w naszej bazie, zarejestruj się.", "FirstTime"=>"");
          break;
          case $this->PasswordVerify():
          $this->confirm_result = array("error"=>true, "message"=>$this->adm_password."<br />Niepoprawne hasło.", "FirstTime"=>"");
            break;
          case $this->UserSuspended():
          $this->confirm_result = array("error"=>true, "message"=>$this->adm_email."<br />Twoje konto zostało zawieszone. Skontaktuj się z administratorem serwisu", "FirstTime"=>"");
            break;

            case $this->UserNew():
            $this->confirm_result = array("error"=>true, "message"=>$this->adm_email."<br />Twój email nie został jeszcze potwierdzony. Sprawdź pocztę [również folder SPAM] i postępuj zgodnie z instrukcjami od nas.", "FirstTime"=>"");
              break;
              // this is needed only if AdminConfirmation is set to on
                case $this->UserConfirmed():
                $this->confirm_result = array("error"=>true, "message"=>$this->adm_email."<br />Twój email nie został jeszcze potwierdzony przez administratora. Wyślemy Ci email z powiadomieniem.", "FirstTime"=>"");
                  break;
              // this is needed only if AdminConfirmation is set to on

        default:
        // check login count
        switch ($this->LoginCount($this->adm_email)) {
          case false:
          $this->confirm_result = array("error"=>false, "message"=>"sukcess logowania.", "FirstTime"=>"on");
            break;

          default:
          $this->confirm_result = array("error"=>false, "message"=>"sukcess logowania.", "FirstTime"=>"");
            break;
        }
        // check login count
        // login user means update all fields
        $this->setLoginUser($this->adm_email);
        // login user means update all fields

          break;
      }
      //errors ends
      return $this->confirm_result;
    }// signpUser ends



    private function EmailExists(){
      $result;
      if (!$this->checkUserEmail($this->adm_email)) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;

    }// email check ends
    private function PasswordVerify(){
      $result;
      if (!$this->checkUserPassword($this->adm_email, $this->adm_password)) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;

    }// email check ends

    private function UserSuspended(){
      $result;
      if (!$this->checkUserSuspended($this->adm_email)) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;

    }// email check ends

    private function UserNew(){
      $result;
      if (!$this->checkUserNew($this->adm_email)) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;

    }// email check ends
    private function UserConfirmed(){
      $result;
      if (!$this->checkUserConfirmed($this->adm_email) && AdminConfirmation == 'on') {
        $result = false;
      } else{
        $result = true;
      }
      return $result;

    }// email check ends
    private function LoginCount(){
      $result;
      if (!$this->checkLoginCount($this->adm_email)) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;

    }// email check ends



}// class ends
