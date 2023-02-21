<?php
include ('../../app/core/config.php');
include ('pl_includes/autoloader.inc.php');
$load_me = new LanguageRelated\LoadFiles($file);
$message_controller = new Errors\messageController();

$id = $_GET['value'];


$adm_cookies = new AdmUsers\CheckAdmCookiesController();
$adm_cookies->CanIBeHere();
$AdminRights = $adm_cookies->AdminRights();
$AdminData = $adm_cookies->AdminData();

$categories = new SqlQueries\sqlAdmCategoriesController();
$categories_array = $categories->categoriesArray();// only to control admin rights

  // id, active, datetime, orderBy
$db_query = new LookAndFeel\LookAndFeelController();
$db_query = $db_query->doCheckLookAndFeel();


$WebsiteOptionsArray = new SysArrays\WebsiteOptionsArray();
$WebsiteColors = $WebsiteOptionsArray->doWebsiteColors();
$WebsiteFeel = $WebsiteOptionsArray->doWebsiteFeel();
$WebsiteNavi = $WebsiteOptionsArray->doWebsiteNavi();

?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <!-- Bootstrap CSS -->
<?php
$load_me->loadFileFromIncludes('_includes/all-meta.php');
?>

<?php
include ('assets/css/all-css.php');
?>

    <title>Dashboard</title>
  </head>
  <body class="mz-custom">
<?php
$message_controller->doAdmMessage();

$load_me->loadFileFromIncludes('_includes/adm-navbar.view.php');
?>
    <div class="container-lg">
        <div class="row g-5">
<?php
echo <<<HTML
          <!-- heading-->
          <div class="col-12 border border-success py-3">

          <form  method="POST" action="adm-inc/update-website-feel.inc.php" enctype="multipart/form-data"  class="row">

          
            <div class="col-md-12">
              <div class="row">

<!-- 1 select-item -->
                <div class="col-md-6">
              <label for="website_color" class="form-label">Kolorystyka</label>
              <select id="website_color" class="form-select" aria-label="Default select example" name="website_color">
                <option selected>$db_query->website_color</option>
HTML;                
foreach ($WebsiteColors as $key) {

if ($key != $db_query->website_color) {
  echo<<<HTML
  <option value="$key">$key</option>

HTML;
  }  


}
echo <<<HTML
              </select>
              </div>
<!-- 1 select-item -->

<!-- 2 select-item -->
              <div class="col-md-6">
              <label for="website_feel" class="form-label">Wygląd</label>
              <select id="website_feel" class="form-select" aria-label="Default select example" name="website_feel">
                <option selected>$db_query->website_feel</option>
HTML;                
foreach ($WebsiteFeel as $key) {

if ($key != $db_query->website_feel) {
  echo<<<HTML
  <option value="$key">$key</option>

HTML;
  }  


}
echo <<<HTML

              </select>
              </div>
<!-- 2 select-item -->

              </div> <!-- row in col-->
            </div><!-- column 12-->


<!-- second group starts -->
            <div class="col-12">
              <div class="row">

<!-- 3 select-item -->
              <div class="col-md-6 mt-3">
              <label for="website_navi" class="form-label">Nawigacja</label>
              <select id="website_navi" class="form-select" aria-label="Default select example" name="website_navi">
                <option selected>$db_query->website_navi</option>
HTML;                
foreach ($WebsiteNavi as $key) {

if ($key != $db_query->website_navi) {
  echo<<<HTML
  <option value="$key">$key</option>

HTML;
  }  


}
echo <<<HTML

              </select>
              </div>
<!-- 3 select-item -->

              </div><!-- row in col-->
            </div><!-- col 12 -->

            <div class="col-12 text-right mt-5">
            <button type="submit" class="btn btn-sm btn-primary">zmień</button>
            </div>
          </form>

          </div>
          <!-- heading-->
HTML;
?>
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
