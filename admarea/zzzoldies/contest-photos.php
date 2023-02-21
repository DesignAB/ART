<?php
include ('../../app/core/config.php');
include ('pl_includes/autoloader.inc.php');
$load_me = new LanguageRelated\LoadFiles($file);
$adm_cookies = new AdmUsers\CheckAdmCookiesController();
$adm_cookies->CanIBeHere();
$AdminRights = $adm_cookies->AdminRights();
$AdminData = $adm_cookies->AdminData();
$categories = new SqlQueries\sqlAdmCategoriesController();
$categories_array = $categories->categoriesArray();// only to control admin rights
// id, 

$contest_u_id = $_GET['value'];
$image_path = IMGFOLDER.'contests/contests_photos_'.$contest_u_id.'/';

$the_contest = new SqlQueries\SqlContestsController($contest_u_id, '', '');
$the_contest = $the_contest->doOneContestByUid();
if ($the_contest['error'] == 'false') {
  $message = $the_contest['message'];
  header("Location:".DbErrors."?error_code=$message");
  exit();
}
$the_contest = $the_contest['row'];


$photos = new SqlQueries\SqlContestsPhotoController($contest_u_id);
$photos = $photos->doAllContestPhotos();
if ($photos['error'] == 'false') {
  $message = $photos['message'];
  header("Location:".DbErrors."?error_code=$message");
  exit();
}
$photos = $photos['row'];
//errors handling
// if (isset($_GET['message'])) {
//   $message = $_GET['message'];
//   if (isset($_GET['error'])) {
//     $error = $_GET['error'];
//   } else{
//     $error = '';
//   }
//   $message = new Errors\messageController($message, $error);
// } 
//errors handling
  $message = new Errors\messageController();

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
$message->doAdmMessage();


$load_me->loadFileFromIncludes('_includes/adm-navbar.view.php');

?>
    <div class="container-lg">

        <div class="row g-2 mb-5">
          <div class="col-12 text-center">
            <h3>KONKURSY</h3>
          </div>

        </div><!-- row ends-->
        
        <div class="row g-2 row-cols-1 row-cols-md-3 row-cols-lg-4 mb-4">
<?php
if ($photos>0) {
      foreach ($photos as $key => $value) {
    $photo_u_id = $value['photo_u_id'];
    $photo_author_f_name = $value['photo_author_f_name'];
    $photo_title = $value['photo_title'];
    $photo_description = $value['photo_description'];
    $photo_portrait = $value['photo_portrait'];
    $photo_landscape = $value['photo_landscape'];
    $photo_votes = $value['photo_votes'];
    $photo_upload_date = $value['photo_upload_date'];
    $photo_active = $value['photo_active'];
    if (empty($photo_portrait)) {
      $image = $photo_landscape;
    } else{
      $image = $photo_portrait;
    }
    if (empty($photo_active)) {
      $d_spinner = <<<HTML
  <div class="spinner-grow spinner-grow-sm text-danger ms-auto" role="status" aria-hidden="true"></div>
HTML;
      $d_form = <<<HTML
    <form method="POST" action="adm-inc/block-photo.inc.php" enctype="multipart/form-data" class="custom-form"  id="register-form" >
      <input type="hidden" name="photo_u_id" value="$photo_u_id">
      <input type="hidden" name="contest_u_id" value="$contest_u_id">
      <input type="hidden" name="image_path" value="$image_path">
      <input type="hidden" name="unblock" value="unblock">
      <button class="btn btn-sm btn-success">odblokuj</button>
    </form>


HTML;


    } else{
      $d_spinner = '';
      $d_form = <<<HTML
    <form method="POST" action="adm-inc/block-photo.inc.php" enctype="multipart/form-data" class="custom-form"  id="register-form" >
      <input type="hidden" name="photo_u_id" value="$photo_u_id">
      <input type="hidden" name="contest_u_id" value="$contest_u_id">
      <input type="hidden" name="image_path" value="$image_path">
      <button class="btn btn-sm btn-danger">zablokuj</button>
    </form>


HTML;
    }

echo <<<HTML
<div class="col">
  <div class="card mb-3 shadow h-100">
    <img src="../$image_path$image" class="img-thumbnail" alt="$photo_title">

    <div class="card-body">

      <div class="d-flex align-items-center">
            <h5 class="card-title">$photo_title</h5>
            $d_spinner
      </div>
      <p class="card-text">
      $photo_description
      </p>
      <p class="card-text"><small class="text-muted">
      Autor: $photo_author_f_name
      <br>
      Dodane: $photo_upload_date
      <br>
      Liczba głosów: $photo_votes
      </small></p>
    </div>
      <div class="card-footer">
      $d_form
      </div>

  </div><!-- card -->
</div>

HTML;
  } // foreach ends


}
?>  
        </div><!-- row ends-->



    </div><!-- container ends-->

    <?php
    // $load_me->loadFileFromIncludes('_includes/footer.view.php');
    ?>



<?php
    include ('assets/js/essential-js.php');
?>

  </body>
</html>
