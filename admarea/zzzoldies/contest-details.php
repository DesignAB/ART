<?php
include ('../../app/core/config.php');
require "admcore/admcontroller.php";
require "../../app/core/database.php";
require "../../app/core/queries.php";
$controller = new Controller();
$sponsors = $controller->loadAdmModel("sponsors");
$sponsors_row = $sponsors->showAllSponsors();

include ('pl_includes/autoloader.inc.php');
$load_me = new LanguageRelated\LoadFiles($file);
$id = $_GET['value'];

if (isset($_POST['change_sponsors'])) {
$contests = $controller->loadAdmModel("contests");
$contests_result = $contests->showOneContest($_POST['id']);
$contests_row = $contests_result[0];
$new_contest_sponsors_list = '';

if (!empty($_POST['sponsors'])) {
$new_contest_sponsors_list = implode(" ",$_POST['sponsors']);
    $query_set = array(
    "contest_sponsors_list" => $new_contest_sponsors_list
    );
} else{
    $query_set = array(
    "contest_sponsors_list" => $new_contest_sponsors_list,
    "contest_sponsor" => ""
    );
}

    $query_where = array(
    "id" => $id
    );
    $table = 'contests';
    $contests_update = $contests->updateContest($table, $query_set, $query_where);

  // var_dump($contests_row); 


}

if (isset($_GET['error']) && isset($_GET['message'])) {
$error = $_GET['error'];
$message = $_GET['message'];
if ($error == 'no-error') {
  $color = 'success';
  $message_heading = 'Sukces';
} else{
  $color = 'danger';
  $message_heading = 'Coś poszło nie tak :-<';

}
$d_message = <<<HTML
          <!-- message-->
          <div class="col-12 border border-$color py-3">
            <h5 class="text-$color">$message_heading</h5>
            <h6 class="text-$color">$message</h6>
          </div>
          <!-- message-->

HTML;
} else{
  $d_message = '';
}

$table = 'contests';

$adm_cookies = new AdmUsers\CheckAdmCookiesController();
$adm_cookies->CanIBeHere();
$AdminRights = $adm_cookies->AdminRights();
$AdminData = $adm_cookies->AdminData();

$categories = new SqlQueries\sqlAdmCategoriesController();
$categories_array = $categories->categoriesArray();// only to control admin rights

  // id, active, datetime, orderBy
$db_query = new SqlQueries\SqlContestsController($id, '', '');
$the_contest = $db_query->doOneContest();
// var_dump($the_contest); exit();
if ($the_contest['error'] == 'false') {
  $message = $the_contest['message'];
  header("Location:".DbErrors."?error_code=$message");
  exit();
}
$the_contest = $the_contest['row'];

$start_date = $the_contest->start_date;
$end_date = $the_contest->end_date;
$end_time = $the_contest->end_time;
$start_time = $the_contest->start_time;
$time  = strtotime($end_time);
$end_hour   = date('H',$time);
$end_minute = date('i',$time);
$end_second = date('s',$time);
$time  = strtotime($start_time);
$start_hour   = date('H',$time);
$start_minute = date('i',$time);
$start_second = date('s',$time);

$contest_award = $the_contest->contest_award;
$contest_sponsor = $the_contest->contest_sponsor;
$active = $the_contest->active;
$featured = $the_contest->featured;
$contest_photo = $the_contest->contest_photo;
$contest_sponsors_list = $the_contest->contest_sponsors_list;
$contest_sponsors_list_array = explode(" ",$contest_sponsors_list);
$p_l_height = $the_contest->p_l_height;
$p_l_width = $the_contest->p_l_width;
$p_p_height = $the_contest->p_p_height;
$p_p_width = $the_contest->p_p_width;



if ($contest_sponsor == 'on') {
  $check_contest_sponsor = 'checked';
} else{
    $check_contest_sponsor = '';

}
if ($contest_award == 'on') {
  $check_contest_award = 'checked';
} else{
    $check_contest_award = '';

}
if ($active == 'on') {
  $check_contest_active = 'checked';
} else{
    $check_contest_active = '';

}
if ($featured == 'on') {
  $check_contest_featured = 'checked';
} else{
    $check_contest_featured = '';

}
if ($contest_photo == 'on') {
  $check_contest_photo = 'checked';
} else{
    $check_contest_photo = '';

}
$full_end = $the_contest->full_end;
$full_start = $the_contest->full_start;



$time_select = new Date\DatePickerSelectTimeController($end_hour, $end_minute, $end_second, $start_hour, $start_minute, $start_second);

$time_status_creator = new Date\DatePickerTimeStatusController($full_start, $full_end);
$time_status = $time_status_creator->TimeStatusController();
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
<link rel="stylesheet" href="assets/css/trumbowyg.css">
<link rel="stylesheet" href="assets/css/croppie.css?<?php echo $token;  ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <title>Dashboard</title>
  </head>
  <body class="mz-custom">
<?php

$load_me->loadFileFromIncludes('_includes/adm-navbar.view.php');
?>
<div class="container-lg">
  <div class="row g-5">


<?php 

echo <<<HTML
          <!-- heading-->
          <div class="col-12 border border-success py-3">
            <h5>$the_contest->contest_name</h5>
            <h6>$the_contest->contest_sub_name</h6>
            <p>utworzony przez: $the_contest->contest_author</p>
            <p>Data rozpoczęcia: $the_contest->full_start</p>
            <p>Data zakończenia: $the_contest->full_end</p>
          </div>
          <!-- heading-->
          $d_message
          <!-- datepicker form -->
          <div class="col-12 border border-danger py-3">
          <h5 class="ps-1 mb-1">Daty</h5>
          <h6 class="ps-1 mb-5">data rozpoczęcia: $the_contest->full_start | data zakończenia: $the_contest->full_end</h6>
            <form method="POST" action="adm-inc/update-date.inc.php" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                <input type="hidden"  class="form-control form-control-sm" name="database_end_date" value="$the_contest->end_date">
                <input type="hidden"  class="form-control form-control-sm" name="database_start_date" value="$the_contest->start_date">
                <input type="hidden" class="form-control" value="$the_contest->id" name="id">
                <input type="hidden" class="form-control" value="$table" name="table">
                <input type="hidden" class="form-control" value="$end_time" name="end_time">

                  <!-- datepicker-->
                  <div class="col-md-3">
                    <div class="input-group">
                    <label for="contest_name" class="form-label w-100 ps-1">zmień datę rozpoczęcia
                    </label>

                        <input id="start_date" type='text' class="form-control" name="start_date" />
                    </div>
                  </div>
                  <!-- start time column-->
                  <div class="col-md-4">
                    <div class="input-group">
                        <label for="Start_time" class="form-label w-100 ps-1">godzina rozpoczęcia [opcjonalnie*]
                        </label>
HTML;
$time_select->constructStartHour();
$time_select->constructStartMinute();
$time_select->constructStartSecond();
echo<<<HTML
                    </div>     
                  </div>
                  <!-- start time column ends-->


                  <div class="col-12 separator">
                    
                  </div>

                  <div class="col-md-3">
                    <div class="input-group">
                    <label for="end_date" class="form-label w-100 ps-1">zmień datę zakończenia
                    </label>
                        <input id="end_date" type='text' class="form-control" name="end_date"/>
                    </div>
                  </div>
                  <!-- end time column-->
                  <div class="col-md-4">
                    <div class="input-group">
                        <label for="End_time" class="form-label w-100 ps-1">godzina zakończenia [opcjonalnie*]
                        </label>
HTML;
$time_select->constructEndHour();
$time_select->constructEndMinute();
$time_select->constructEndSecond();
echo<<<HTML
                    </div>     
                  </div>
                  <!-- end time column ends-->

                  <div class="col-md-2 d-flex align-items-end justify-content-end">
                    <button id="register-button" class="btn btn-sm btn-danger register-button">zmień daty</button>
                  </div>
                  <div class="col-md-12 d-flex align-items-end justify-content-start">
                    <p class="text-danger">Short info 'bout dates<br>It's very important to set dates.<br>If they are unset the contest starts the day it was created and will end the next day.</p>
                  </div>

                  <!-- datepicker-->
            </form>
          </div>
          <!-- datepicker form -->


          <!-- options form -->
          <div class="col-12 border border-danger py-3">
          <h5 class="ps-1 mb-3">Opcje</h5>
            <form method="POST" action="adm-inc/contest-options.inc.php" enctype="multipart/form-data" class="row g-2 custom-form"  id="register-form" >
                <input type="hidden" class="form-control" value="$the_contest->id" name="id">

                  <div class="col-md-2 d-flex align-items-end justify-content-start">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="active" name="active" $check_contest_active>
                    <label class="form-check-label" for="active">Aktywny</label>
                  </div>
                  </div>

                  <!--
                  <div class="col-md-2 d-flex align-items-end justify-content-start">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="featured" name="featured" $check_contest_featured>
                    <label class="form-check-label" for="featured">Wyróżniony</label>
                  </div>
                  </div>
                  -->
                  <div class="col-md-3 d-flex align-items-end justify-content-start">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="contest_photo" name="contest_photo" $check_contest_photo>
                    <label class="form-check-label" for="contest_photo">Zdjęcie wyróżniające</label>
                  </div>
                  </div>

                  <div class="col-12 separator">
                    
                  </div>
                  <div class="col-md-2 d-flex align-items-end justify-content-start">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="contest_award" name="contest_award" $check_contest_award>
                    <label class="form-check-label" for="contest_award">Nagroda</label>
                  </div>
                  </div>


                  <div class="col-md-2 d-flex align-items-end justify-content-start">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="contest_sponsor" name="contest_sponsor" $check_contest_sponsor>
                    <label class="form-check-label" for="contest_sponsor">Sponsor</label>
                  </div>
                  </div>

                  <div class="col-12 separator">
                    
                  </div>

                  <div class="col-md-3">
                    <div class="input-group">
                    <label for="contest_max_photos" class="form-label w-100 ps-1">ilość zdjęć/użytkownik*
                    </label>
                    <textarea type="text" name="contest_max_photos" class="form-control ps-1" aria-label="With textarea" rows="1" required>$the_contest->contest_max_photos</textarea>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="input-group">
                    <label for="contest_max_votes" class="form-label w-100 ps-1">ilość głosów**
                    </label>
                    <textarea type="text" name="contest_max_votes" class="form-control ps-1" aria-label="With textarea" rows="1" required>$the_contest->contest_max_votes</textarea>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="input-group">
                    <label for="contest_max_votes_per_photo" class="form-label w-100 ps-1">ilość głosów na zdjęcie***
                    </label>
                    <textarea type="text" name="contest_max_votes_per_photo" class="form-control ps-1" aria-label="With textarea" rows="1" required>$the_contest->contest_max_votes_per_photo</textarea>
                    </div>
                  </div>




                  <div class="col-md-12 d-flex flex-column align-items-start justify-content-start">
                  <p class="text-muted small mb-0">*określa maksymalną liczbę zdjęć, którą jeden użytkownik może dodać do konkursu</p>
                  <p class="text-muted small mb-0">**określa maksymalną liczbę głosów oddanych przez użytkownika w jednym konkursie</p>
                  <p class="text-muted small">***określa maksymalną liczbę głosów oddanych przez użytkownika na jedno zdjęcie</p>

                  </div>

                  <div class="col-md-2">
                    <div class="input-group">
                    <label for="p_p_height" class="form-label w-100 ps-1">wysokość zdjęcia
                    </label>
                    <textarea type="text" name="p_p_height" class="form-control ps-1" aria-label="With textarea" rows="1" required>$the_contest->p_p_height</textarea>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="input-group">
                    <label for="p_p_width" class="form-label w-100 ps-1">szerokość zdjęcia
                    </label>
                    <textarea type="text" name="p_p_width" class="form-control ps-1" aria-label="With textarea" rows="1" required>$the_contest->p_p_width</textarea>
                    </div>
                  </div>

                  <div class="col-md-2 d-flex align-items-end justify-content-end">
                    <button id="register-button" class="btn btn-sm btn-danger register-button">zmień opcje</button>
                  </div>


            </form>
          </div>
          <!-- options form -->

          <!-- content form -->
          <div class="col-12 border py-3">
          <h5 class="ps-1 mb-3">Treść</h5>

                <form method="POST" action="adm-inc/contest-content.inc.php" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                  <input type="hidden" id="id" class="form-control form-control-sm" name="id" value="$id">

                  <div class="col-md-12 mb-3 mb-md-0 req" style="height: 0px; opacity:0;">
                    <label class="text-danger" for="important">your_type</label>
                    <input type="text" id="important" class="form-control form-control-sm" name="your_type">
                  </div>
                  <!-- name and surname -->
                  <!-- headers -->
                  <div class="col-md-6">
                    <label for="contest_name" class="form-label w-100 ps-1">Nagłówek
                    </label>
                    <textarea type="text" name="contest_name" class="form-control ps-1" aria-label="With textarea" rows="1" required>$the_contest->contest_name</textarea>
                  </div>
                  <div class="col-md-6">
                    <label for="contest_sub_name" class="form-label w-100 ps-1">2 Nagłówek
                    </label>
                    <textarea type="text" name="contest_sub_name" class="form-control ps-1" aria-label="With textarea" rows="1" >$the_contest->contest_sub_name</textarea>
                  </div>
                  <!-- headers -->

                  <div class="col-md-6">
                    <label for="contest_short_description" class="form-label w-100 ps-1">Opis skrócony
                    </label>
                    <textarea type="text" name="contest_short_description" class="form-control ps-1 trumbowyg-simple" aria-label="With textarea" rows="1" >$the_contest->contest_short_description</textarea>
                  </div>
                  <div class="col-md-6">
                    <label for="contest_description" class="form-label w-100 ps-1">Opis
                    </label>
                    <textarea type="text" name="contest_description" class="form-control ps-1 trumbowyg-with-list" aria-label="With textarea" rows="1" >$the_contest->contest_description</textarea>
                  </div>

                  <div class="col-md-6">
                    <label for="contest_author" class="form-label w-100 ps-1">Autor konkursu
                    </label>
                    <textarea type="text" name="contest_author" class="form-control ps-1" aria-label="With textarea" rows="1" required>$the_contest->contest_author</textarea>
                  </div>
                  <div class="col-md-6">
                    <label for="contest_author_address" class="form-label w-100 ps-1">Email Autora konkursu
                    </label>
                    <textarea type="text" name="contest_author_address" class="form-control ps-1" aria-label="With textarea" rows="1">$the_contest->contest_author_address</textarea>
                  </div>



                  <div class="col-12 text-md-end text-center ">
                    <button id="register-button" class="btn btn-sm btn-success register-button">zmień treść</button>
                  </div>

                </form>
          </div><!-- col 12-->
          <!-- content form -->
HTML;

if ($contest_photo == 'on') {
$prefix = 'contest_photo_image'; // name of the image field
// name of image field, record id, table, uploaded photo, back page, form title
$Load_croppie_form = new ImageUpload\CroppieFormLoader($prefix, $id, $table, $the_contest->contest_photo_image,'contest-details.php',  'Zdjęcie wyróżniające');
$Load_croppie_form->ImageFormLoader();
}

?>




        </div>
    </div>


<!-- image forms -->
    <div class="container-lg">
        <div class="row g-5">

<?php
if ($contest_award == 'on') {
echo <<<HTML
<div class="col-12 separator mt-3"></div>

          <div class="col-12 border py-3">
          <h5 class="ps-1 mb-3">Nagroda</h5>

                <form method="POST" action="adm-inc/contest-award.inc.php" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                  <input type="hidden" id="id" class="form-control form-control-sm" name="id" value="$id">
                  <!-- headers -->
                  <div class="col-md-6">
                    <label for="contest_award_name" class="form-label w-100 ps-1">Nazwa
                    </label>
                    <textarea type="text" name="contest_award_name" class="form-control ps-1" aria-label="With textarea" rows="1" required>$the_contest->contest_award_name</textarea>
                  </div>
                  <div class="col-md-6">
                    <label for="contest_award_sub_name" class="form-label w-100 ps-1">Rozwinięcie nazwy
                    </label>
                    <textarea type="text" name="contest_award_sub_name" class="form-control ps-1" aria-label="With textarea" rows="1" >$the_contest->contest_award_sub_name</textarea>
                  </div>
                  <!-- headers -->

                  <div class="col-md-6">
                    <label for="contest_award_short_description" class="form-label w-100 ps-1">Opis skrócony
                    </label>
                    <textarea type="text" name="contest_award_short_description" class="form-control ps-1 trumbowyg-simple" aria-label="With textarea" rows="1" >$the_contest->contest_award_short_description</textarea>
                  </div>
                  <div class="col-md-6">
                    <label for="contest_award_description" class="form-label w-100 ps-1">Opis
                    </label>
                    <textarea type="text" name="contest_award_description" class="form-control ps-1 trumbowyg-with-list" aria-label="With textarea" rows="1" >$the_contest->contest_award_description</textarea>
                  </div>



                  <div class="col-12 text-md-end text-center ">
                    <button id="register-button" class="btn btn-sm btn-success register-button">zmień treść</button>
                  </div>

                </form>
          </div><!-- col 12-->


HTML;
$prefix = 'contest_award_photo'; // name of the image field
// name of image field, record id, table, uploaded photo, back page, form title
$Load_croppie_form = new ImageUpload\CroppieFormLoader($prefix, $id, $table, $the_contest->contest_award_photo,'contest-details.php',  'Zdjęcie nagrody');
$Load_croppie_form->ImageFormLoader();
}

?> 

<?php if ($contest_sponsor == 'on'):?>
<div class="col-12 separator my-3"></div>


  <div class="col-12 border py-3">
    <h5 class="ps-1 mb-3">Sponsorzy</h5>

      <form class="row"  method="POST"
      enctype="multipart/form-data" >
      <input type="hidden" name="id" value="<?=$id?>">
      <input type="hidden" name="change_sponsors">

        <div class="col-12">

<?php foreach ($sponsors_row as $key => $value):?>
<?php 
  $d_checked = '';

if (in_array($value['id'], $contest_sponsors_list_array)) {
  $d_checked = 'checked';
}


?>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="sponsors[]" value="<?=$value['id']?>" id="<?=$value['sponsor_u_id']?>" <?=$d_checked?>>
  <label class="form-check-label" for="<?=$value['sponsor_u_id']?>">
  <?=$value['sponsor_name']?>
  </label>
</div>


<?php endforeach;?>
        </div>
        <div class="col-12">
          <button id="register-button" class="btn btn-sm btn-success register-button">zmień</button>
        </div>
      </form>

  </div><!-- col 12-->
  </div>
</div>
<?php endif;?>

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

<script src="assets/js/trumbowyg.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.pl.min.js" integrity="sha512-ScqJL8X5IqP89pKmQnXULodix6OkrTtcWiTdJxPGPGdrncyJkI7KOwNRPqzZ6lWnTk/u5xboSjEeYQgeyOHyhQ==" crossorigin="anonymous"></script>


<script>

$.trumbowyg.svgPath = 'assets/css/icons.svg'; 

$('.trumbowyg-with-list').trumbowyg({
  
btns: [['bold'], ['h4'], ['h5'], ['p'], ['unorderedList'], ['removeformat'], ['viewHTML'], ['link']],
tagsToRemove: ['table', 'td', 'tr']


}); 
$('.trumbowyg-simple').trumbowyg({
  
btns: [['bold'], ['p'], ['removeformat'], ['viewHTML']],
tagsToRemove: ['table', 'td', 'tr']

}); 



</script>

<script src="assets/js/croppie.js"></script>
<?php
$prefix = 'contest_award_photo'; // name of the image field
// prefix, width, height, decrase viever, image quality
$Load_croppie_script = new ImageUpload\CroppieScriptLoader($prefix, 500, 500, 2, 1);
$Load_croppie_script->ImageScriptLoader();


$prefix = 'contest_photo_image'; // name of the image field
// prefix, width, height, decrase viever, image quality
$Load_croppie_script3 = new ImageUpload\CroppieScriptLoader($prefix, 600, 400, 2, 1);
$Load_croppie_script3->ImageScriptLoader();



?>
<script type="text/javascript">
$(document).ready(function(){
  $(function () {
   $("#start_date").datepicker({
            language: "pl",
            format: 'yyyy-mm-dd',
            startDate: '0d',
            autoclose: true,
            firstDay: 1
        }).on('changeDate', function(selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#end_date').datepicker('setStartDate', minDate);
        });

  // $('#contest_start').datepicker({
  //  format: 'dd-mm-yyyy',
  //  language:'pl',
  //   startDate: '0d',
  // });

  $('#end_date').datepicker({
   format: 'yyyy-mm-dd',
   language:'pl',
    // startDate: '0d',
  });


  });
  
  
  
});  
</script>


  </body>
</html>
