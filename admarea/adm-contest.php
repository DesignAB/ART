<?php
  $messages = $this->loadAdmModel("admmessenger");
  $data['messenger'] = $messages;
  $timecontroller = $data['timecontroller'];
  $contest_sponsors_list_array = explode(" ", $data['contest_sponsors_list']);


?>
<!DOCTYPE html>

<html lang="pl">
  <head>
    <!-- Bootstrap CSS -->
<?php
// $load_me->loadFileFromIncludes('_includes/all-meta.php');

?>

<?php
include ('adm_includes/all_meta.php');
include ('assets/css/all-css.php');
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="admarea/assets/css/croppie.css">
<link rel="stylesheet" href="admarea/assets/css/trumbowyg.css">

    <title><?=$data['page_title']?></title>
  </head>
  <body>
<?php
$this->admInclude("/adm_views/admnavi.view.php", $data);

?>
    <div class="container-lg px-4" style="min-height: 100vh;">
      <div class="row align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 mb-3 shadow py-md-5 " >
          <div class="row g-0">
        <?php $adm_message = $data['messenger']->admMessage();?>
          <!-- heading-->
          <div class="col-12 border border-success py-3 px-3 mb-2">
            <h5><?=$data['contest_name'];?></h5>
            <h6><?=$data['contest_sub_name'];?></h6>
            <p>utworzony przez: <?=$data['contest_author'];?></p>
            <p>Data rozpoczęcia: <?=$data['full_start'];?></p>
            <p>Data zakończenia: <?=$data['full_end'];?></p>
          </div>
          <!-- heading-->

          <!-- datepicker form -->
          <div class="col-12 border border-danger py-3 px-3 mb-2">
          <h5 class="ps-1 mb-1">Daty</h5>
          <h6 class="ps-1 mb-5">data rozpoczęcia: <?=$data['full_start'];?> | data zakończenia: <?=$data['full_end'];?></h6>
            <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                <input type="hidden" name="date_update" value="date_update">
                <input type="hidden" name="id" value="<?=$data['id'];?>">
                <input type="hidden" name="full_start" value="<?=$data['full_start'];?>">
                <input type="hidden" name="full_end" value="<?=$data['full_end'];?>">

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
                    <select class="form-select form-select-sm" aria-label="form-select-sm example" name="start_hour">
                    <option class="border-0" value="<?=$data['start_hour'];?>" selected><?=$data['start_hour'];?></option>
                    <?php foreach ($data['hours'] as $key => $value):?>
                    <option value="<?=$value;?>"><?=$value;?></option>
                    <?php endforeach;?>
                    </select>
                    </div>     
                  </div>

                  <div class="col-md-4">
                    <div class="input-group">
                        <label for="Start_time" class="form-label w-100 ps-1">minuta rozpoczęcia [opcjonalnie*]
                        </label>
                    <select class="form-select form-select-sm" aria-label="form-select-sm example" name="start_minute">
                    <option class="border-0" value="<?=$data['start_minute'];?>" selected><?=$data['start_minute'];?></option>
                    <?php foreach ($data['minutes'] as $mkey => $mvalue):?>
                    <option value="<?=$mvalue;?>"><?=$mvalue;?></option>
                    <?php endforeach;?>
                    </select>
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
                        <select class="form-select form-select-sm" aria-label="form-select-sm example" name="end_hour">
                        <option class="border-0" value="<?=$data['end_hour'];?>" selected><?=$data['end_hour'];?></option>
                        <?php foreach ($data['hours'] as $key => $value):?>
                        <option value="<?=$value;?>"><?=$value;?></option>
                        <?php endforeach;?>
                    </select>
                    </div>     
                  </div>

                  <div class="col-md-4">
                    <div class="input-group">
                        <label for="End_time" class="form-label w-100 ps-1">minuta zakończenia [opcjonalnie*]
                        </label>
                        <select class="form-select form-select-sm" aria-label="form-select-sm example" name="end_minute">
                        <option class="border-0" value="<?=$data['end_minute'];?>" selected><?=$data['end_minute'];?></option>
                        <?php foreach ($data['minutes'] as $key => $value):?>
                        <option value="<?=$value;?>"><?=$value;?></option>
                        <?php endforeach;?>
                    </select>
                    </div>     
                  </div>


                  <!-- end time column ends-->

                  <div class="col-12 d-flex align-items-end justify-content-end">
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
          <div class="col-12 border border-danger py-3 px-3">
          <h5 class="ps-1 mb-3">Opcje</h5>
            <form method="POST" enctype="multipart/form-data" class="row g-2 custom-form"  id="register-form" >
                <input type="hidden" class="form-control" value="<?=$data['id'];?>" name="id">
                <input type="hidden" class="form-control" name="options_update" value="options_update">

                  <div class="col-md-2 d-flex align-items-end justify-content-start">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="active" name="active" <?=$data['check_contest_active'];?>>
                    <label class="form-check-label" for="active">Aktywny</label>
                  </div>
                  </div>

                  <!--
                  <div class="col-md-2 d-flex align-items-end justify-content-start">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="featured" name="featured" <?=$data['check_contest_featured'];?>>
                    <label class="form-check-label" for="featured">Wyróżniony</label>
                  </div>
                  </div>
                  -->
                  
                  <div class="col-md-3 d-flex align-items-end justify-content-start">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="contest_photo" name="contest_photo" <?=$data['check_contest_photo'];?>>
                    <label class="form-check-label" for="contest_photo">Zdjęcie wyróżniające</label>
                  </div>
                  </div>

                  <div class="col-12 separator">
                    
                  </div>
                  <div class="col-md-2 d-flex align-items-end justify-content-start">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="contest_award" name="contest_award" <?=$data['check_contest_award'];?>>
                    <label class="form-check-label" for="contest_award">Nagroda</label>
                  </div>
                  </div>


                  <div class="col-md-2 d-flex align-items-end justify-content-start">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="contest_sponsor" name="contest_sponsor" <?=$data['check_contest_sponsor'];?>>
                    <label class="form-check-label" for="contest_sponsor">Sponsor</label>
                  </div>
                  </div>

                  <div class="col-12 separator">
                    
                  </div>

                  <div class="col-md-3">
                    <div class="input-group">
                    <label for="contest_max_photos" class="form-label w-100 ps-1">ilość zdjęć/użytkownik*
                    </label>
                    <textarea type="text" name="contest_max_photos" class="form-control ps-1" aria-label="With textarea" rows="1" required><?=$data['contest_max_photos'];?></textarea>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="input-group">
                    <label for="contest_max_votes" class="form-label w-100 ps-1">ilość głosów**
                    </label>
                    <textarea type="text" name="contest_max_votes" class="form-control ps-1" aria-label="With textarea" rows="1" required><?=$data['contest_max_votes'];?></textarea>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="input-group">
                    <label for="contest_max_votes_per_photo" class="form-label w-100 ps-1">ilość głosów na zdjęcie***
                    </label>
                    <textarea type="text" name="contest_max_votes_per_photo" class="form-control ps-1" aria-label="With textarea" rows="1" required><?=$data['contest_max_votes_per_photo'];?></textarea>
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
                    <textarea type="text" name="p_p_height" class="form-control ps-1" aria-label="With textarea" rows="1" required><?=$data['p_p_height'];?></textarea>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="input-group">
                    <label for="p_p_width" class="form-label w-100 ps-1">szerokość zdjęcia
                    </label>
                    <textarea type="text" name="p_p_width" class="form-control ps-1" aria-label="With textarea" rows="1" required><?=$data['p_p_width'];?></textarea>
                    </div>
                  </div>

                  <div class="col-12 d-flex align-items-end justify-content-end">
                    <button id="register-button" class="btn btn-sm btn-danger register-button">zmień opcje</button>
                  </div>


            </form>
          </div>
          <!-- options form -->
          <!-- content form -->
          <div class="col-12 border py-3 px-3 mt-4">
          <h5 class="ps-1 mb-3">Treść</h5>

                <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                  <input type="text" id="id" class="form-control form-control-sm" name="id" value="<?=$data['id'];?>">
                  <input type="hidden" id="id" class="form-control form-control-sm" name="update_content" value="update_content">


                  <!-- name and surname -->
                  <!-- headers -->
                  <div class="col-md-6">
                    <label for="contest_name" class="form-label w-100 ps-1">Nagłówek
                    </label>
                    <textarea type="text" name="contest_name" class="form-control ps-1" aria-label="With textarea" rows="1" required><?=$data['contest_name'];?></textarea>
                  </div>
                  <div class="col-md-6">
                    <label for="contest_sub_name" class="form-label w-100 ps-1">2 Nagłówek
                    </label>
                    <textarea type="text" name="contest_sub_name" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$data['contest_sub_name'];?></textarea>
                  </div>
                  <!-- headers -->

                  <div class="col-md-6">
                    <label for="contest_short_description" class="form-label w-100 ps-1">Opis skrócony
                    </label>
                    <textarea type="text" name="contest_short_description" class="form-control ps-1 trumbowyg-simple" aria-label="With textarea"><?=$data['contest_short_description'];?></textarea>
                  </div>
                  <div class="col-md-6">
                    <label for="contest_description" class="form-label w-100 ps-1">Opis
                    </label>
                    <textarea type="text" name="contest_description" class="form-control ps-1 trumbowyg-with-list" aria-label="With textarea"><?=$data['contest_description'];?></textarea>
                  </div>

                  <div class="col-md-6">
                    <label for="contest_author" class="form-label w-100 ps-1">Autor konkursu
                    </label>
                    <textarea type="text" name="contest_author" class="form-control ps-1" aria-label="With textarea" rows="1" required><?=$data['contest_author'];?></textarea>
                  </div>
                  <div class="col-md-6">
                    <label for="contest_author_address" class="form-label w-100 ps-1">Email Autora konkursu
                    </label>
                    <textarea type="text" name="contest_author_address" class="form-control ps-1" aria-label="With textarea" rows="1"><?=$data['contest_author_address'];?></textarea>
                  </div>



                  <div class="col-12 text-md-end text-center ">
                    <button id="register-button" class="btn btn-sm btn-success register-button">zmień treść</button>
                  </div>

                </form>
          </div><!-- col 12-->
          <!-- content form -->



          <!-- image upload form-->
          <?php
          if ($data['contest_photo'] == 'on') {
          $data['old_image'] = $data['contest_photo_image'];
          $data['prefix'] = 'contest_photo_image';
          $data['form_title'] = 'Zdjęcie';
          $this->admInclude("/adm_views/adm-upload-form.php", $data);
          }
          ?>
          <!-- image upload form-->
          <!-- award-->
          <?php if($data['contest_award']=='on'):?>
          <div class="col-12 border p-3 mt-4">
          <h5 class="ps-1 mb-3">Nagroda</h5>
                <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                  <input type="hidden" id="award_update" class="form-control form-control-sm" name="award_update" value="award_update">
                  <input type="hidden" id="id" class="form-control form-control-sm" name="id" value="<?=$data['id'];?>">
                  <!-- headers -->
                  <div class="col-md-6">
                    <label for="contest_award_name" class="form-label w-100 ps-1">Nazwa
                    </label>
                    <textarea type="text" name="contest_award_name" class="form-control ps-1" aria-label="With textarea" rows="1" required><?=$data['contest_award_name'];?></textarea>
                  </div>
                  <div class="col-md-6">
                    <label for="contest_award_sub_name" class="form-label w-100 ps-1">Rozwinięcie nazwy
                    </label>
                    <textarea type="text" name="contest_award_sub_name" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$data['contest_award_sub_name'];?></textarea>
                  </div>
                  <!-- headers -->

                  <div class="col-md-6">
                    <label for="contest_award_short_description" class="form-label w-100 ps-1">Opis skrócony
                    </label>
                    <textarea type="text" name="contest_award_short_description" class="form-control ps-1 trumbowyg-simple" aria-label="With textarea" rows="1" ><?=$data['contest_award_short_description'];?></textarea>
                  </div>
                  <div class="col-md-6">
                    <label for="contest_award_description" class="form-label w-100 ps-1">Opis
                    </label>
                    <textarea type="text" name="contest_award_description" class="form-control ps-1 trumbowyg-with-list" aria-label="With textarea" rows="1" ><?=$data['contest_award_description'];?></textarea>
                  </div>



                  <div class="col-12 text-md-end text-center ">
                    <button id="register-button" class="btn btn-sm btn-success register-button">zmień treść</button>
                  </div>

                </form>
          </div><!-- col 12-->
          <!-- award-->


            <?php 
                    $data['old_image'] = $data['contest_award_photo'];
                    $data['prefix'] = 'contest_award_photo';
                    $data['form_title'] = 'Zdjęcie nagrody';
                    $this->admInclude("/adm_views/adm-upload-form.php", $data);
            endif;?>


            <!-- sponsors -->

            <?php if ($data['contest_sponsor'] == 'on'):?>
            <div class="col-12 border p-3 mt-4">
              <h5 class="ps-1 mb-3">Sponsorzy</h5>

              <?php if (!empty($data['sponsors_list'])):?>

              <form class="col-12"  method="POST" enctype="multipart/form-data" >
                <input type="hidden" name="id" value="<?=$id?>">
                <input type="hidden" name="sponsor_update" value="sponsor_update">

                  <div class="col-12 px-1">
                    <?php foreach ($data['sponsors_list'] as $key => $value):?>
                      <?php
                      $d_sponsor_checked = '';
                      if (in_array($value['id'], $contest_sponsors_list_array)) {
                      $d_sponsor_checked = 'checked';
                      }
                      ?>

                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" name="sponsors[]" value="<?=$value['id']?>" id="<?=$value['sponsor_u_id']?>" <?=$d_sponsor_checked?>>
                          <label class="form-check-label" for="<?=$value['sponsor_u_id']?>">
                          <?=$value['sponsor_name']?>
                          </label>
                        </div>

                    <?php endforeach;?>
                  </div>


                  <div class="col-12 text-end">
                  <button id="register-button" class="btn btn-sm btn-success register-button">zmień</button>
                  </div>


                </form>

              <?php endif; // !empty($data['sponsors_list']?>

              <?php if (empty($data['sponsors_list'])):?>
                  <div class="col-12 bg-danger">
                  <h5 class="ps-1 mb-3 text-white">Nie dodano sponsorów</h5>

                  </div>

              <?php endif; // !empty($data['sponsors_list']?>  

            </div>
            <?php endif;?>  
            <!-- sponsors -->


          </div>
        </div>
      </div>
    </div>

<?php
$this->admInclude("/adm_views/adminfooter.view.php", $navbar_categories);
?>

<?php
    include ('assets/js/essential-js.php');
// admInclude("/assets/js/trumbowyg.js", $data);
?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')
    </script>
  <script src="admarea/assets/js/croppie.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.pl.min.js" integrity="sha512-ScqJL8X5IqP89pKmQnXULodix6OkrTtcWiTdJxPGPGdrncyJkI7KOwNRPqzZ6lWnTk/u5xboSjEeYQgeyOHyhQ==" crossorigin="anonymous"></script>
<script src="admarea/assets/js/trumbowyg.js"></script>

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
<script>

$.trumbowyg.svgPath = 'admarea/assets/css/icons.svg'; 

$('.trumbowyg-with-list').trumbowyg({
  
btns: [['bold'], ['h4'], ['h5'], ['p'], ['unorderedList'], ['removeformat'], ['viewHTML'], ['link']],
tagsToRemove: ['table', 'td', 'tr']


}); 
$('.trumbowyg-simple').trumbowyg({
  
btns: [['bold'], ['p'], ['removeformat'], ['viewHTML']],
tagsToRemove: ['table', 'td', 'tr']

}); 



</script>
<?php
if ($data['contest_photo'] == 'on') {
  $data['image_height'] = 550;
  $data['image_width'] = 550;
  $data['prefix'] = 'contest_photo_image';
  $data['image_q'] = '.9';
  $this->admInclude("/assets/admin-croopie-model-script.php", $data);
  }
  if ($data['contest_award'] == 'on') {
    $data['image_height'] = 500;
    $data['image_width'] = 500;
    $data['prefix'] = 'contest_award_photo';
    $data['image_q'] = '.9';
    $this->admInclude("/assets/admin-croopie-model-script.php", $data);
    }
      



?>


  </body>
</html>
