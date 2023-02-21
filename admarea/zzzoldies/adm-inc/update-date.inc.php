<?php
include ('../../../app/core/config.php');
include ('../pl_includes/autoloader.inc.php');

$adm_cookies = new AdmUsers\CheckAdmCookiesController();
$adm_cookies->CanIBeHere();
$AdminRights = $adm_cookies->AdminRights();
$AdminData = $adm_cookies->AdminData();


$id = $_POST['id'];
$table = $_POST['table'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
if (empty($start_date)) {
$start_date = $_POST['database_start_date'];
}
if (empty($end_date)) {
$end_date = $_POST['database_end_date'];
}
$end_hour = $_POST['end_hour'];
$end_minute = $_POST['end_minute'];
$end_second = $_POST['end_second'];
$end_time = $end_hour.':'.$end_minute.':'.$end_second;

$start_hour = $_POST['start_hour'];
$start_minute = $_POST['start_minute'];
$start_second = $_POST['start_second'];
$start_time = $start_hour.':'.$start_minute.':'.$start_second;
$update_date = new Date\DatePickerController($id, $table, $start_date, $end_date, $end_time, $start_time);
$update_date->doUpdatedDate();
$error = $update_date->upload_result['error'];
$message = $update_date->upload_result['message'];

if (!$error==false) {
header("Location: ../contest-details.php?value=$id&message=$message&error=no-error");
} else{
header("Location: ../contest-details.php?value=$id&message=$message&error=$error");

}
var_dump($error); echo "<br>";
print_r($message);
exit();

?>