<?php
include ('../app/app-settings.inc.php');
include (WebsiteFolder.'app/autoloader.inc.php');

$u_email = $_POST['email'];
$u_password = $_POST['password'];
echo "here i am";
exit();
$login_user = new SystemUsers\LogInController($u_email, $u_password);
$login_user->loginUser();


$error = $login_user->confirm_result['error'];
$message = $login_user->confirm_result['message'];
$FirstTime = $login_user->confirm_result['FirstTime'];
if ($error == true) {
  header("Location: ../user-login?error=$error&message=$message");
} else {
  $set_users_cookies = new SystemUsers\SetUserCookiesController($u_email);
  $set_users_cookies->SetUserCookies();
    switch ($FirstTime) {
      case 'on':
      header("Location: ../user-data.php?FirstTime=on&email=$u_email");
        break;

      default:
      header("Location: ../user-dashboard.php?email=$u_email");
        break;
    }
}


?>
