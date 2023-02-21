<?php
include ('../../../app/core/config.php');
include ('../pl_includes/autoloader.inc.php');

$adm_email = $_POST['email'];
$adm_password = $_POST['password'];
$login_user = new AdmUsers\LogInController($adm_email, $adm_password);
$login_user->loginUser();
$error = $login_user->confirm_result['error'];
$message = $login_user->confirm_result['message'];
if ($error == true) {
  header("Location: ../adm-login?error=$error&message=$message");
} else {
  $set_users_cookies = new AdmUsers\SetAdmCookiesController($adm_email);
  $set_users_cookies->SetAdmCookies();
      header("Location: ../adm-dashboard.php?email=$adm_email");

}
?>
