<?php
include ('../../../app/core/config.php');
include ('../pl_includes/autoloader.inc.php');

$adm_cookies = new AdmUsers\CheckAdmCookiesController();
$adm_cookies->CanIBeHere();
$AdminRights = $adm_cookies->AdminRights();
$AdminData = $adm_cookies->AdminData();
$contest_author = $AdminData['adm_f_name'].' '.$AdminData['adm_l_name'];
$id = $_POST['id'];

$contest_name = $_POST['contest_name'];
$contest_sub_name = $_POST['contest_sub_name'];
$contest_short_description = $_POST['contest_short_description'];
$contest_description = $_POST['contest_description'];
$contest_author = $_POST['contest_author'];
$contest_author_address = $_POST['contest_author_address'];

$update_options = new Contests\ContestContentController($id, $contest_name, $contest_sub_name, $contest_short_description, $contest_description, $contest_author, $contest_author_address);
$update_options->doUpdateContent();
$error = $update_options->upload_result['error'];
$message = $update_options->upload_result['message'];

if (!$error==false) {
header("Location: ../contest-details.php?value=$id&message=$message&error=no-error");
} else{
header("Location: ../contest-details.php?value=$id&message=$message&error=$error");

}
exit();

?>