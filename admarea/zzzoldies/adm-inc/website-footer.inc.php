<?php
include ('../../../app/core/config.php');
include ('../pl_includes/autoloader.inc.php');

$adm_cookies = new AdmUsers\CheckAdmCookiesController();
$adm_cookies->CanIBeHere();
$AdminRights = $adm_cookies->AdminRights();
$AdminData = $adm_cookies->AdminData();

$footer_array = new SysArrays\FooterArray();
$footer_array = $footer_array->footerArray();

$footer_array = array_diff($footer_array, array('footer_logo_image'));

// print_r(implode(', ', $footer_array));
// echo "<br>";
// $values_array[];
foreach ($footer_array as $key) {
	// $$key = $_POST[$key];
$values_array[$key]=$_POST[$key];
}
// echo $footer_address_1;
// $values_array = implode(', ', $values_array);

// print_r($values_array);
// exit();


$footer_options = new Footer\FooterOptionsController($values_array, $footer_array);
$footer_options->doUpdateFooter();
$error = $footer_options->upload_result['error'];
$message = $footer_options->upload_result['message'];

if (!$error==false) {
header("Location: ../website-footer.php?message=$message&error=no-error");
} else{
header("Location: ../website-footer.php?message=$message&error=$error");

}
var_dump($error); echo "<br>";
print_r($message);
exit();

?>