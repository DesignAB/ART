<?php
include ('../../../app/core/config.php');
require "../admcore/admcontroller.php";
require "../../../app/core/database.php";
require "../../../app/core/queries.php";
// $controller = new Controller();
// $sponsors = $controller->loadAdmModel("sponsors");
// $sponsors_row = $sponsors->showAllSponsors();


foreach ($_POST['sponsors'] as $key => $value) {
	echo $key.' '.$value."<br>";

}

print_r($_POST['sponsors']);

exit();

?>