<?php
  $messages = $this->loadAdmModel("admmessenger");
  $data['messenger'] = $messages;
  $biletyna_event = $data['biletyna_event'];

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
                  <div class="col-12 text-center mb-3">
                    <a href="adm_events" class="btn btn-sm btn-success content-button">wróć!</a>
                  </div>

        <div class="col-12 mb-3 shadow py-md-5 " >
          <div class="row g-0">
        <?php $adm_message = $data['messenger']->admMessage();?>
          <!-- heading-->
          <div class="col-12 border border-success py-3 px-3 mb-2">
            <h5><?=$biletyna_event['artist_name'];?></h5>
            <h6><?=$biletyna_event['event_date'];?></h6>
            <p>minimalne wymiary obrazka: wysokość: <?=$data['image_height'];?>px | szerokość <?=$data['image_width'];?>px</p>
            <p class="text-danger">mniejszych obrazków proszę nie powiększać</p>
          </div>
          <!-- heading-->




          <!-- options form -->
          <div class="col-12 border border-danger py-3 px-3">
          <h5 class="ps-1 mb-3">Opcje</h5>
            <form method="POST" enctype="multipart/form-data" class="row g-2 custom-form"  id="register-form" >
                <input type="text" class="form-control" value="<?=$biletyna_event['event_id'];?>" name="event_id">
                <input type="text" class="form-control" value="<?=$biletyna_event['custom_event_image'];?>" name="custom_event_image">
                <input type="hidden" class="form-control" name="options_update" value="options_update">

                  <div class="col-md-2 d-flex align-items-end justify-content-start">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="active" name="active" <?=$data['biletyna_event_active'];?>>
                    <label class="form-check-label" for="active">Aktywny</label>
                  </div>
                  </div>

                  <div class="col-md-2 d-flex align-items-end justify-content-start">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="has_image" name="has_image" <?=$data['biletyna_event_image'];?>>
                    <label class="form-check-label" for="has_image">Własne zdjęcie</label>
                  </div>
                  </div>
                  
                  <div class="col-md-2 d-flex align-items-end justify-content-start d-none">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="featured" name="featured" <?=$data['biletyna_event_featured'];?>>
                    <label class="form-check-label" for="featured">Wyróżniony</label>
                  </div>
                  </div>
                  
                  





                  <div class="col-12 separator">
                    
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
                  <input type="hidden" id="id" class="form-control form-control-sm" name="event_id" value="<?=$biletyna_event['event_id'];?>">
                  <input type="hidden" id="id" class="form-control form-control-sm" name="update_content" value="update_content">


                  <!-- name and surname -->
                  <!-- headers -->
                  <div class="col-md-6">
                    <label for="contest_name" class="form-label w-100 ps-1">Nagłówek
                    </label>
                    <textarea type="text" name="artist_name" class="form-control ps-1 bg-white" aria-label="With textarea" rows="1" disabled><?=$biletyna_event['artist_name'];?></textarea>
                  </div>
                  <div class="col-md-6">
                    <label for="contest_sub_name" class="form-label w-100 ps-1">2 Nagłówek
                    </label>
                    <textarea type="text" name="subheader" class="form-control ps-1 " aria-label="With textarea" rows="1" ><?=$biletyna_event['subheader'];?></textarea>
                  </div>
                  <!-- headers -->

                  <div class="col-md-6 d-none">
                    <label for="short_content" class="form-label w-100 ps-1">Opis skrócony
                    </label>
                    <textarea type="text" name="short_content" class="form-control ps-1 trumbowyg-simple" aria-label="With textarea"><?=$biletyna_event['short_content'];?></textarea>
                  </div>
                  <div class="col-md-12">
                    <label for="content" class="form-label w-100 ps-1">Opis
                    </label>
                    <textarea type="text" name="content" class="form-control ps-1 trumbowyg-with-list" aria-label="With textarea" disabled><?=$biletyna_event['artist_description'];?></textarea>
                  </div>




                  <div class="col-12 text-md-end text-center ">
                    <button id="content-button" class="btn btn-sm btn-success content-button">zmień treść</button>
                  </div>

                </form>
          </div><!-- col 12-->
          <!-- content form -->



          <!-- image upload form-->
          <?php if ($biletyna_event['has_image'] == 'on'):

          $data['old_image'] = $biletyna_event['custom_event_image'];
          $data['prefix'] = 'custom_event_image';
          $data['form_title'] = 'Własne zdjęcie';
          $data['table'] = 'events';
          $this->admInclude("/adm_views/adm-upload-form.php", $data);

          ?>
          <!-- content form -->
          <div class="col-12 border py-3 px-3 mt-4 d-none">
          <h5 class="ps-1 mb-3">Alt images SEO</h5>

                <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                  <input type="hidden" id="id" class="form-control form-control-sm" name="id" value="<?=$biletyna_event['id'];?>">
                  <input type="hidden" id="id" class="form-control form-control-sm" name="update_seo" value="update_seo">


                  <!-- name and surname -->
                  <!-- headers -->
                  <div class="col-md-6">
                    <label for="contest_name" class="form-label w-100 ps-1">image_alt
                    </label>
                    <textarea type="text" name="image_alt" class="form-control ps-1" aria-label="With textarea" rows="1" required><?=$biletyna_event['image_alt'];?></textarea>
                  </div>
                  <div class="col-md-6">
                    <label for="image_mobile_alt" class="form-label w-100 ps-1">image_mobile_alt
                    </label>
                    <textarea type="text" name="image_mobile_alt" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$biletyna_event['image_mobile_alt'];?></textarea>
                  </div>
                  <div class="col-md-6">
                    <label for="image_index_alt" class="form-label w-100 ps-1">image_index_alt
                    </label>
                    <textarea type="text" name="image_index_alt" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$biletyna_event['image_index_alt'];?></textarea>
                  </div>
                  <div class="col-md-6">
                    <label for="index_mobile_image_alt" class="form-label w-100 ps-1">index_mobile_image_alt
                    </label>
                    <textarea type="text" name="index_mobile_image_alt" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$biletyna_event['index_mobile_image_alt'];?></textarea>
                  </div>
                  <!-- headers -->

                  <div class="col-12 text-md-end text-center ">
                    <button id="register-button" class="btn btn-sm btn-success register-button">zmień</button>
                  </div>

                </form>
          </div><!-- col 12-->
          <!-- content form -->


          <?php endif;?>
          <!-- image upload form-->




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

<script src="admarea/assets/js/trumbowyg.js"></script>

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
if ($biletyna_event['has_image'] == 'on') {
  // main image
  // $data['image_height'] = 500;
  // $data['image_width'] = 500;
  $data['prefix'] = 'custom_event_image';
  $data['image_q'] = '.9';
  $this->admInclude("/assets/admin-croopie-model-script.php", $data);
  // main image







  }
      



?>


  </body>
</html>
