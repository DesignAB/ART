<?php
include ('../../../app/core/config.php');
include ('../pl_includes/autoloader.inc.php');

$adm_cookies = new AdmUsers\CheckAdmCookiesController();
$adm_cookies->CanIBeHere();
$AdminRights = $adm_cookies->AdminRights();
$AdminData = $adm_cookies->AdminData();

$website_color = $_POST['website_color'];
$website_feel = $_POST['website_feel'];
$website_navi = $_POST['website_navi'];

// echo $website_color.'<br>'.$website_feel; exit();

$update_website_feel = new SqlQueries\SqlWebsiteLookController($website_color, $website_feel, $website_navi);
$update_website_feel->doWebsiteLook();

$error = $update_website_feel->website_look_result['error'];
$message = $update_website_feel->website_look_result['message'];

if (!$error==false) {
header("Location: ../website-feel");
} else{
header("Location: ../website-feel.php?error=$error&message=$message");
}

?>