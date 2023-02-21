<?php
include ('../../app/core/config.php');
require "admcore/admcontroller.php";
require "../../app/core/database.php";
require "../../app/core/queries.php";
$controller = new Controller();
$sponsors = $controller->loadAdmModel("sponsors");
$id = $_GET['value'];
if (isset($_POST['updateme'])) {
        $query_set = array(
        "sponsor_name" => $_POST['sponsor_name'],
        "sponsor_sub_name" => $_POST['sponsor_sub_name'],
        "sponsor_website" => $_POST['sponsor_website']
        );
        $query_where = array(
        "id" => $_POST['id']
        );
        $table = 'sponsors';
$sponsors_update = $sponsors->updateSponsor($table, $query_set, $query_where);
}


$sponsors_data = $sponsors->showOneSponsor($id);
$sponsor_row = $sponsors_data[0];
// if (file_exists('models/sponsors.class.php')) {
//   echo "really";
// }
include ('pl_includes/autoloader.inc.php');
$adm_cookies = new AdmUsers\CheckAdmCookiesController();
$adm_cookies->CanIBeHere();
$AdminRights = $adm_cookies->AdminRights();
$AdminData = $adm_cookies->AdminData();

// $load_me = new LanguageRelated\LoadFiles($file);
// $message = new Errors\messageController();
// $sponsors = new newModels\sponsors();


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

<link href="assets/css/croppie.css" rel="stylesheet">

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

          <div class="col-12 text-center">
            <h3><?=$sponsor_row['sponsor_name']?></h3>
            <h4><?=$sponsor_row['sponsor_sub_name']?></h4>
          </div>

 <!-- sponsor data-->         
  <div class="col-12 h-100 border border-light position-relative px-3 py-5">
      <!-- content cols-->
      <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
      <input type="hidden" name="updateme">
      <input type="hidden" name="id" value="<?=$sponsor_row['id']?>">

        <div class="col-md-6">
          <div class="input-group">
            <label for="sponsor_name" class="form-label w-100 ps-1">Nazwa
            </label>
            <textarea type="text" name="sponsor_name" class="form-control ps-1" aria-label="With textarea" rows="1" required><?=$sponsor_row['sponsor_name']?></textarea>
          </div>
        </div>
        <div class="col-md-6">
          <div class="input-group">
            <label for="sponsor_sub_name" class="form-label w-100 ps-1">Nazwa rozszerzona
            </label>
            <textarea type="text" name="sponsor_sub_name" class="form-control ps-1" aria-label="With textarea" rows="1"><?=$sponsor_row['sponsor_sub_name']?></textarea>
          </div>
        </div>
        <div class="col-md-6">
          <div class="input-group">
            <label for="sponsor_website" class="form-label w-100 ps-1">Strona www
            </label>
            <textarea type="text" name="sponsor_website" class="form-control ps-1" aria-label="With textarea" rows="1" required><?=$sponsor_row['sponsor_website']?></textarea>
          </div>
        </div>

        <div class="col-12">
            <button class="btn btn-sm btn-success" type="submit">zmień</button>

        </div>


      </form>
      <!-- content cols-->

  </div>
 <!-- sponsor data-->



  <!-- sponsor data-->         
  <div class="col-12 h-100 border border-light position-relative px-3 py-5">
      <!-- content cols-->
<?php

$prefix = 'sponsor_logo'; // name of the image field
// name of image field, record id, table, uploaded photo, back page, form title
$Load_croppie_form = new ImageUpload\CroppieFormLoader($prefix, $id, 'sponsors', $sponsor_row['sponsor_logo'],'sponsor-details.php',  'Logotyp');
$Load_croppie_form->ImageFormLoader();


?>
      <!-- content cols-->

  </div>
 <!-- sponsor data-->         


  </div>
</div>

    <?php
    // $load_me->loadFileFromIncludes('_includes/footer.view.php');
    ?>



<?php
    include ('assets/js/essential-js.php');
?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')
    </script>

<script src="assets/js/croppie.js"></script>
<?php
$prefix = 'sponsor_logo'; // name of the image field
// prefix, width, height, decrase viever, image quality
$Load_croppie_script = new ImageUpload\CroppieScriptLoader($prefix, $sponsor_row['p_width'], $sponsor_row['p_height'], 1, 1);
$Load_croppie_script->ImageScriptLoader();

?>
  </body>
</html>
