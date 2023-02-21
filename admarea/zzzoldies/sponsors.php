<?php
include ('../../app/core/config.php');
require "admcore/admcontroller.php";
require "../../app/core/database.php";
require "../../app/core/queries.php";
$controller = new Controller();
$sponsors = $controller->loadAdmModel("sponsors");
if (isset($_POST['createme'])) {
  $sponsor_u_id = substr(md5(time()), 3, 6);
  $table = 'sponsors';
  $query_params = array(
    "sponsor_u_id" => $sponsor_u_id,
    "sponsor_name" => 'Nowy Sponsor bez nazwy'

        );
    $sponsor_create = $sponsors->createSponsor($table, $query_params);

}



$sponsors_row = $sponsors->showAllSponsors();
include ('pl_includes/autoloader.inc.php');
$adm_cookies = new AdmUsers\CheckAdmCookiesController();
$adm_cookies->CanIBeHere();
$AdminRights = $adm_cookies->AdminRights();
$AdminData = $adm_cookies->AdminData();

?>

<!DOCTYPE html>

<html lang="pl">
  <head>
    <!-- Bootstrap CSS -->
<?php
// $load_me->loadFileFromIncludes('_includes/all-meta.php');

?>

<?php
include ('assets/css/all-css.php');
?>
    <title>Dashboard</title>
  </head>
  <body class="mz-custom">
<?php
// $message->doAdmMessage();
include ('pl_includes/adm-navbar.view.php');

// $load_me->loadFileFromIncludes('_includes/adm-navbar.view.php');

?>
<div class="container-lg">
  <div class="row g-2 mb-5">

          <div class="col-12 text-center mb-5">
            <h3>Sponsorzy</h3>
            <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
              <input type="hidden" name="createme">
              <div class=col-12>
                <button class="btn btn-sm btn-success" type="submit">dodaj sponsora</button>
              </div>
            </form>
          </div>
<?php foreach ($sponsors_row as $key => $value):?>

    <div class="col-md-6 px-3">

        <div class="card  mb-3">
          <div class="row g-0">

            <div class="col-md-3">
              <img src="../<?=IMGFOLDER?>sponsors/<?=$value['sponsor_logo']?>" class="img-fluid" alt="...">
            </div>

            <div class="col-md-6">

              <div class="card-body">
                <h6 class="card-title"><?=$value['sponsor_name']?></h6>
                <h6 class="card-title"><?=$value['sponsor_sub_name']?></h6>
              </div>

            </div>


            <div class="col-md-3 my-auto text-end">

          <a href="sponsor-details.php?value=<?=$value['id']?>" class="btn btn-sm btn-outline-success me-3">edytuj</a>

            </div>



          </div>
        </div>


    </div>


<?php endforeach;?>


  </div>
</div>

    <?php
    // $load_me->loadFileFromIncludes('_includes/footer.view.php');
    ?>



<?php
    include ('assets/js/essential-js.php');
?>

  </body>
</html>
