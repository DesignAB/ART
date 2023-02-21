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

// SqlContestsController options
// id, active, datetime, orderBy
switch (isset($_POST['selector'])) {
  case 'value':
    $selector = $_POST['selector'];
    // selector switches
    switch ($selector) {
      case 'active':
      // id, datetime, orderBy
      $contests = new SqlQueries\SqlContestsController('', '', '');
      $contests = $contests->doActiveContests();
        break;
      case 'inactive':
      // id, datetime, orderBy
      $contests = new SqlQueries\SqlContestsController('', '', '');
      $contests = $contests->doInactiveContests();
        break;
      case 'intime':
      // id, datetime, orderBy
      $contests = new SqlQueries\SqlContestsController('', '', '');
      $contests = $contests->doInTimeContests();
        break;
      case 'planned':
      // id, datetime, orderBy
      $contests = new SqlQueries\SqlContestsController('', '', '');
      $contests = $contests->doPlannedContests();
        break;
      case 'ended':
      // id, datetime, orderBy
      $contests = new SqlQueries\SqlContestsController('', '', '');
      $contests = $contests->doEndedContests();
        break;
      case 'featured':
      // id, datetime, orderBy
      $contests = new SqlQueries\SqlContestsController('', '', '');
      $contests = $contests->doFeaturedContests();
        break;
      
      default:
        echo "there is not such a selector";
        break;
    }

    // selector switches
    break;
    // selector isset ends
  
  default:
  // id, datetime, orderBy
  $contests = new SqlQueries\SqlContestsController('', '', '');
  $contests = $contests->doAllContests();
    break;
}




if (!empty($contests['error'])) {
  $message = $contests['message'];
  header("Location:".DbErrors."?error_code=$message");
  exit();
}
$contests_row = $contests['row'];


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
          <div class="col-12 text-center mb-2"> <!-- buttons col-->
            <div class="row g-2 d-flex flex-row align-items-center" style="transition: all 1s">
              <div class="col py-3">
                <form method="POST" action="contests" enctype="multipart/form-data" class="custom-form"  id="register-form" >
                  <button class="btn btn-sm btn-outline-primary">wszystkie</button>
                </form>
              </div>

              <div class="col text-nowrap py-3">
                <form method="POST" action="contests" enctype="multipart/form-data" class="custom-form"  id="register-form" >
                  <input class="form-control" type="hidden" placeholder="Default input" aria-label="default input example" name="selector" value="active">
                  <button class="btn btn-sm btn-outline-primary">tylko aktywne</button>
                </form>
              </div>

              <div class="col text-nowrap py-3">
                <form method="POST" action="contests" enctype="multipart/form-data" class="custom-form"  id="register-form" >
                  <input class="form-control" type="hidden" placeholder="Default input" aria-label="default input example" name="selector" value="inactive">
                  <button class="btn btn-sm btn-outline-primary">tylko nieaktywne</button>
                </form>
              </div>
              <div class="col text-nowrap py-3">
                <form method="POST" action="contests" enctype="multipart/form-data" class="custom-form"  id="register-form" >
                  <input class="form-control" type="hidden" placeholder="Default input" aria-label="default input example" name="selector" value="intime">
                  <button class="btn btn-sm btn-outline-primary">tylko trwające</button>
                </form>
              </div>

<!--               <div class="col text-nowrap py-3">
                <form method="POST" action="contests" enctype="multipart/form-data" class="custom-form"  id="register-form" >
                  <input class="form-control" type="hidden" placeholder="Default input" aria-label="default input example" name="selector" value="planned">
                  <button class="btn btn-sm btn-outline-primary">tylko zaplanowane</button>
                </form>
              </div>
 -->              
              <div class="col text-nowrap py-3">
                <form method="POST" action="contests" enctype="multipart/form-data" class="custom-form"  id="register-form" >
                  <input class="form-control" type="hidden" placeholder="Default input" aria-label="default input example" name="selector" value="ended">
                  <button class="btn btn-sm btn-outline-primary">tylko zakończone</button>
                </form>
              </div>
<!--               <div class="col text-nowrap py-3">
                <form method="POST" action="contests" enctype="multipart/form-data" class="custom-form"  id="register-form" >
                  <input class="form-control" type="hidden" placeholder="Default input" aria-label="default input example" name="selector" value="featured">
                  <button class="btn btn-sm btn-outline-primary">tylko wyróżnione</button>
                </form>
              </div>
 -->
            </div>

          </div> <!-- /buttons col-->

          <div class="col-12 text-center">
            <a href="adm-inc/adm-create-contest.inc.php" class="btn btn-success btn-sm">dodaj konkurs</a>
            <p class="text-danger mt-2">
              UWAGA:<br>
              Jeśli konkurs ma status NIEAKTYWNY będzie niewidoczny dla użytkowników,  nawet jeśli jest zaplanowany.
              <br>
              Aby konkurs, który jest zaplanowany był widoczny dla użytkowników, musi mieć status AKTYWNY.
            </p>
          </div>

        </div><!-- row ends-->
        
        <div class="row gy-3">
<?php
if ($contests_row < 1 ) {
  echo<<<HTML
  <div class="col-12 text-center">
        <h3 class="card-title text-danger">nic nie znaleźliśmy</h6>
  </div>
HTML;
} else{
      foreach ($contests_row as $key => $value) {
        $contest_id = $value['id'];
        $contest_u_id = $value['contest_u_id'];
        $contest_name = $value['contest_name'];
        $contest_sub_name = $value['contest_sub_name'];
        $contest_short_description = $value['contest_short_description'];
        $full_end = $value['full_end'];
        $full_start = $value['full_start'];
        $start_date = $value['start_date'];
        $end_date = $value['end_date'];
        $active = $value['active'];
        // check active
        if ($active == 'on') {
          $d_badge_active = <<<HTML
          <span class="badge bg-success rounded-pill p-2">Aktywny</span>
HTML;
        } else{
          $d_badge_active = <<<HTML
          <span class="badge bg-danger rounded-pill p-2">Nieaktywny</span>

HTML;
        }
        //check active
      // check intime
$time_status_creator = new Date\DatePickerTimeStatusController($full_start, $full_end);
$time_status = $time_status_creator->TimeStatusController();
switch ($time_status) {
  case 'planned':
  $d_badge_time_status = <<<HTML
        <!--  <span class="badge bg-primary rounded-pill p-2">Zaplanowany</span> -->
HTML;
    break;
  case 'in_progress':
  $d_badge_time_status = <<<HTML
          <span class="badge bg-success rounded-pill p-2">Trwa</span>
HTML;
    break;
  case 'old':
  $d_badge_time_status = <<<HTML
          <span class="badge bg-secondary rounded-pill p-2">Zakończony</span>
HTML;
    break;
  default:
    // code...
    break;
}
      // check intime


echo <<<HTML
<div class="col-12 h-100 border border-light contests-list position-relative">
  <div class="row g-3 g-md-5 py-3">
    <!-- content cols-->
    <div class="col-md-3 headings d-flex flex-column align-items-start justify-content-md-center">
      <h6>$contest_name</h5>
      <h6>$contest_sub_name</h5>
    </div>
    <div class="col-6 col-md-2 d-flex flex-row align-items-center">
      <p><i class="bi bi-sunrise lead text-success"> </i>$start_date</p>
    </div>
    <div class="col-6 col-md-2 d-flex flex-row align-items-center">
      <p class="text-muted"><i class="bi bi-sunset lead text-secondary"> </i>$end_date</p>
    </div>
    <div class="col-md-5 d-flex flex-row align-items-center justify-content-md-end">
      <span>
      $d_badge_active $d_badge_time_status

            <a href="contest-details.php?value=$contest_id" class="btn btn-sm btn-outline-success">edytuj</a>
            <a href="contest-photos.php?value=$contest_u_id" class="btn btn-sm btn-outline-success">pokaż zdjęcia</a>

      </span>
    </div>
    <!-- content cols-->


  </div>
</div>


HTML;
      }// foreach ends
}// $contests_row < 1




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
