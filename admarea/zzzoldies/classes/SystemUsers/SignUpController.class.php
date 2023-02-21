<?php
namespace SystemUsers;
class SignUpController extends SignUp{
  private $u_f_name;
  private $u_l_name;
  private $u_email;
  private $email_repeat;
  private $u_password;
  private $password_repeat;
    public function __construct($u_f_name, $u_l_name, $u_email, $email_repeat, $u_password, $password_repeat){
      $this->u_f_name =  $u_f_name;
      $this->u_l_name = $u_l_name;
      $this->u_email = $u_email;
      $this->email_repeat = $email_repeat;
      $this->u_password = $u_password;
      $this->password_repeat = $password_repeat;
    }

    public function signupUser(){
      //errors
      if ($this->EmailBlackList() == false) {
        header("Location: ../user-register.php?error=EmailBlackList&error_message=Adres: ".$this->u_email." został zablokowany w naszej bazie danych. Skontaktuj się z administratorem serwisu");
        exit();
      }

      if ($this->EmailExists() == false) {
        header("Location: ../user-register.php?error=EmailExists&error_message=Adres: ".$this->u_email." istnieje już w naszej bazie danych.");
        exit();
      }

      if ($this->EmailMatch() == false) {
        header("Location: ../user-register.php?error=EmailsDontMatch&error_message=Adresy: ".$this->u_email." ".$this->email_repeat." nie są identyczne.");
        exit();
      }
      if ($this->PasswordMatch() == false) {
        header("Location: ../user-register.php?error=PasswordsDontMatch");
        exit();
      }

      //errors ends
      $this->setUser($this->u_f_name, $this->u_l_name, $this->u_email, $this->u_password);
      // send email

    }// signpUser ends


    private function EmailMatch(){
      $result;
      if ($this->u_email !== $this->email_repeat) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;

    }// emailmatch check ends

    private function PasswordMatch(){
      $result;
      if ($this->u_password !== $this->password_repeat) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;

    }// emailmatch check ends


    private function EmailExists(){
      $result;
      if (!$this->checkUserEmail($this->u_email)) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;

    }// email check ends
    private function EmailBlackList(){
      $result;
      if (!$this->checkUserBlackList($this->u_email)) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;

    }// email black list check ends


}// class ends
