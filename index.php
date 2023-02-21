<?php
session_start();
require "../app/init.php";
if (isset($_POST['log_out'])) {
	unset($_SESSION[WEBSITE_NAME.'_user_name']);
	unset($_SESSION[WEBSITE_NAME.'_u_id']);
}

// cookies works
if (isset($_POST['accept_cookies'])) {
	$expire =  strtotime('+1 month', strtotime(date('Y-m-d H:i:s')));
	$token = substr(md5(time()), 0, 10);
	setcookie(CookiesVisitorPrefix, $token, $expire, "/");

       if ($_POST['marketing_cookies'] == 'on') {
       setcookie(CookiesVisitorPrefix.'_marketing', $token, $expire, "/");
       }
       if ($_POST['other_cookies'] == 'on') {
       setcookie(CookiesVisitorPrefix.'_other', $token, $expire, "/");
       }

// exit();

}


// cookies works end



$app = new App();
