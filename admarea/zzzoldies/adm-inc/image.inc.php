<?php
include ('../../../app/core/config.php');
include ('../pl_includes/autoloader.inc.php');
$adm_cookies = new AdmUsers\CheckAdmCookiesController();
$adm_cookies->CanIBeHere();
$AdminRights = $adm_cookies->AdminRights();
$image = $_POST['image'];
$table = $_POST['table'];
$id = $_POST['id'];
$prefix = $_POST['prefix'];
$back_page = $_POST['back_page'];
$ImageUpload = new ImageUpload\ImageUploadController($image, $table, $id, $prefix);
$ImageUpload->doUpload();
$error = $ImageUpload->upload_result['error'];
$message = $ImageUpload->upload_result['message'];
if (!$error==false) {
    $error = 'no-error';
}
$back = '../'.$back_page.'?message='.$message.'&error='.$error.'&value='.$id;

if (!$ImageUpload->upload_result['error']) {
    header("Location:".$back);

} else{
    header("Location:".$back);

}



?>