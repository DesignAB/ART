<?php
include ('../../../app/core/config.php');
include ('../pl_includes/autoloader.inc.php');

$adm_cookies = new AdmUsers\CheckAdmCookiesController();
$adm_cookies->CanIBeHere();
$AdminRights = $adm_cookies->AdminRights();
$AdminData = $adm_cookies->AdminData();
$contest_author = $AdminData['adm_f_name'].' '.$AdminData['adm_l_name'];
$id = $_POST['id'];
$contest_award = $_POST['contest_award'];
$contest_sponsor = $_POST['contest_sponsor'];
$contest_max_votes = $_POST['contest_max_votes'];
$contest_max_votes_per_photo = $_POST['contest_max_votes_per_photo'];
$contest_max_photos = $_POST['contest_max_photos'];
$active = $_POST['active'];
$featured = $_POST['featured'];
$contest_photo = $_POST['contest_photo'];
$p_p_height = $_POST['p_p_height'];
$p_p_width = $_POST['p_p_width'];

$update_options = new Contests\ContestOptionsController($id, $contest_award, $contest_sponsor, $contest_max_votes, $contest_max_votes_per_photo, $contest_max_photos, $active, $featured, $contest_photo, $p_p_height, $p_p_width);
$update_options->doUpdateOptions();
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