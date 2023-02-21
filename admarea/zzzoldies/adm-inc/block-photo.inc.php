<?php
include ('../../../app/core/config.php');
include ('../pl_includes/autoloader.inc.php');
$adm_cookies = new AdmUsers\CheckAdmCookiesController();
$adm_cookies->CanIBeHere();
$AdminRights = $adm_cookies->AdminRights();
$AdminData = $adm_cookies->AdminData();
$photo_u_id = $_POST['photo_u_id'];
$contest_u_id = $_POST['contest_u_id'];
$image_path = $_POST['image_path'];

$update_options = new Contests\ContestPhotoController($contest_u_id, $photo_u_id, $image_path);
if (isset($_POST['unblock'])) {
$update_options->doUnBlockContestPhoto();
} else{
$update_options->doBlockContestPhoto();

}

$error = $update_options->upload_result['error'];
$message = $update_options->upload_result['message'];

if (!$error==false) {
header("Location: ../contest-photos.php?value=$contest_u_id&message=$message&error=no-error");
} else{
header("Location: ../contest-photos.php?value=$contest_u_id&message=$message&error=$error");

}
exit();

?>