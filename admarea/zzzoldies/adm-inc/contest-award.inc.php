<?php
include ('../../../app/core/config.php');
include ('../pl_includes/autoloader.inc.php');

$adm_cookies = new AdmUsers\CheckAdmCookiesController();
$adm_cookies->CanIBeHere();
$AdminRights = $adm_cookies->AdminRights();
$AdminData = $adm_cookies->AdminData();
$contest_author = $AdminData['adm_f_name'].' '.$AdminData['adm_l_name'];
$id = $_POST['id'];

$contest_award_name = $_POST['contest_award_name'];
$contest_award_sub_name = $_POST['contest_award_sub_name'];
$contest_award_short_description = $_POST['contest_award_short_description'];
$contest_award_description = $_POST['contest_award_description'];

$update_options = new Contests\ContestAwardController($id, $contest_award_name, $contest_award_sub_name, $contest_award_short_description, $contest_award_description);
$update_options->doUpdateAward();
$error = $update_options->upload_result['error'];
$message = $update_options->upload_result['message'];

if (!$error==false) {
header("Location: ../contest-details.php?value=$id&message=$message&error=no-error");
} else{
header("Location: ../contest-details.php?value=$id&message=$message&error=$error");

}
var_dump($error); echo "<br>";
print_r($message);
exit();

?>