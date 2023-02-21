<?php
include ('../../../app/core/config.php');
include ('../pl_includes/autoloader.inc.php');

$adm_cookies = new AdmUsers\CheckAdmCookiesController();
$adm_cookies->CanIBeHere();
$AdminRights = $adm_cookies->AdminRights();
$AdminData = $adm_cookies->AdminData();
$contest_author = $AdminData['adm_f_name'].' '.$AdminData['adm_l_name'];

$create_contest = new admCreate\CreateContestController($contest_author);
$create_contest->createContest();
$error = $create_contest->result['error'];
$message = $create_contest->result['message'];

if (!$error==false) {
header("Location: ../contests.php?message=$message");

} else{
header("Location: ../contests.php?error=error&message=$message");
}


exit();

?>