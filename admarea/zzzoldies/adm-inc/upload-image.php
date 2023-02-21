<?php
include ('../../../app/core/config.php');
include ('../pl_includes/autoloader.inc.php');
$adm_cookies = new AdmUsers\CheckAdmCookiesController();
$adm_cookies->CanIBeHere();
$AdminRights = $adm_cookies->AdminRights();

$name = $_POST['name'];
$image = $_POST['image'];
$folder = $_POST['folder'];
$tableName = $_POST['tableName'];
$id = $_POST['id'];
$index_old_image = $_POST['index_old_image'];
$author = $_POST['author'];
$ext_u_id = $_POST['ext_u_id'];


list($type, $image) = explode(';',$image);
list(, $image) = explode(',',$image);

$image = base64_decode($image);
$image_name =$name;

if (file_exists($folder.$index_old_image)) {
	unlink($folder.$index_old_image);
}

file_put_contents($folder.$image_name, $image);
// $newimagename='totototot.jpg';



// echo 'successfully uploaded';

?>