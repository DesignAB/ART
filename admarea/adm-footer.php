<?php
  $messages = $this->loadAdmModel("admmessenger");
  $data['messenger'] = $messages;
  $options = $data['website_footer_row'];

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
        <div class="col-12 mb-3 shadow py-md-5 " >
          <div class="row g-0">
        <?php $adm_message = $data['messenger']->admMessage();?>
          <!-- heading-->
          <div class="col-12 border border-success py-3 px-3 mb-2">
            <h5 class="text-danger">Edytujesz stopkę strony</h5>
          </div>
          <!-- heading-->






          <!-- main options form -->
          <div class="col-12 border py-3 px-3 mt-4">
          <h5 class="ps-1 mb-3">Opcje główne</h5>

                <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                  <input type="hidden" id="id" class="form-control form-control-sm" name="id" value="<?=$options['id'];?>">
                  <input type="hidden" id="id" class="form-control form-control-sm" name="update_content" value="update_content">

                  <!-- headers -->

                  <div class="col-md-2 d-flex align-items-end justify-content-start">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="footer_form" name="footer_form" <?=$data['footer_form_active'];?>>
                    <label class="form-check-label" for="footer_form">footer_form</label>
                  </div>
                  </div>

                  <div class="col-md-2 d-flex align-items-end justify-content-start">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="footer_map" name="footer_map" <?=$data['footer_map_active'];?>>
                    <label class="form-check-label" for="footer_map">footer_map</label>
                  </div>
                  </div>
                  <div class="col-md-2 d-flex align-items-end justify-content-start">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="footer_logo" name="footer_logo" <?=$data['footer_logo_active'];?>>
                    <label class="form-check-label" for="footer_logo">footer_logo</label>
                  </div>
                  </div>


                  <div class="col-12 mb-2">
                    <label for="website_name" class="form-label w-100 ps-1">Nagłówek
                    </label>
                    <textarea type="text" name="footer_heading" class="form-control ps-1" aria-label="With textarea" rows="1" required><?=$options['footer_heading'];?></textarea>

                  </div>
                  <!-- phone 1 -->
                  <div class="col-md-3">
                    <label for="footer_tel_1" class="form-label w-100 ps-1"> footer_tel_1
                    </label>
                    <textarea type="text" name="footer_tel_1" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$options['footer_tel_1'];?></textarea>
                  </div>
                  <div class="col-md-3">
                    <label for="footer_tel_1_desc" class="form-label w-100 ps-1"> footer_tel_1_desc
                    </label>
                    <textarea type="text" name="footer_tel_1_desc" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$options['footer_tel_1_desc'];?></textarea>
                  </div>
                  <!-- phone 1 -->
                  <!-- phone 2 -->
                  <div class="col-md-3">
                    <label for="footer_tel_2" class="form-label w-100 ps-1"> footer_tel_1
                    </label>
                    <textarea type="text" name="footer_tel_2" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$options['footer_tel_2'];?></textarea>
                  </div>
                  <div class="col-md-3">
                    <label for="footer_tel_2_desc" class="form-label w-100 ps-1"> footer_tel_1_desc
                    </label>
                    <textarea type="text" name="footer_tel_2_desc" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$options['footer_tel_2_desc'];?></textarea>
                  </div>
                  <!-- phone 2 -->
                  <?php if ($options['footer_map'] == 'on'):?>
                  <div class="col-md-12">
                    <label for="footer_fb" class="form-label w-100 ps-1"> footer_map_content
                    </label>
                    <textarea type="text" name="footer_map_content" class="form-control ps-1" aria-label="With textarea" rows="3" ><?=$options['footer_map_content'];?></textarea>
                  </div>

                  <?php endif;?>

                  <div class="col-md-6">
                    <label for="footer_fb" class="form-label w-100 ps-1"> footer_fb
                    </label>
                    <textarea type="text" name="footer_fb" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$options['footer_fb'];?></textarea>
                  </div>

                  <div class="col-md-6">
                    <label for="footer_insta" class="form-label w-100 ps-1"> footer_insta
                    </label>
                    <textarea type="text" name="footer_insta" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$options['footer_insta'];?></textarea>
                  </div>

                  <div class="col-md-6">
                    <label for="footer_address_1" class="form-label w-100 ps-1">footer_address_1
                    </label>
                    <textarea type="text" name="footer_address_1" class="form-control ps-1 trumbowyg-simple" aria-label="With textarea"><?=$options['footer_address_1'];?></textarea>
                  </div>
                  <div class="col-md-6">
                    <label for="footer_address_2" class="form-label w-100 ps-1">footer_address_2
                    </label>
                    <textarea type="text" name="footer_address_2" class="form-control ps-1 trumbowyg-simple" aria-label="With textarea"><?=$options['footer_address_2'];?></textarea>
                  </div>


                  <div class="col-12 text-md-end text-center ">
                    <button id="register-button" class="btn btn-sm btn-success register-button">zmień</button>
                  </div>

                </form>
          </div><!-- col 12-->
          <!-- main options form -->


                  <?php if ($options['footer_form'] == 'on'):?>
          <!-- footer form options form -->
          <div class="col-12 border py-3 px-3 mt-4">
          <h5 class="ps-1 mb-3">Opcje formularza</h5>

                <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                  <input type="hidden" id="id" class="form-control form-control-sm" name="id" value="<?=$options['id'];?>">
                  <input type="hidden" id="id" class="form-control form-control-sm" name="update_footer_form" value="update_footer_form">
                  <div class="col-md-6">
                    <label for="form_heading" class="form-label w-100 ps-1">form_heading
                    </label>
                    <textarea type="text" name="form_heading" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$options['form_heading'];?></textarea>
                  </div>
                  <div class="col-md-6">
                    <label for="footer_form_email" class="form-label w-100 ps-1">footer_form_email
                    </label>
                    <textarea type="text" name="footer_form_email" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$options['footer_form_email'];?></textarea>
                  </div>
                  <div class="col-12">
                      <h5 class="ps-1 mb-3">Zgody</h5>
                  </div>
                  <!-- for 1st agreement -->
                  <div class="col-md-4">
                    <label for="agreement_heading_1" class="form-label w-100 ps-1">agreement_heading_1
                    </label>
                    <textarea type="text" name="agreement_heading_1" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$options['agreement_heading_1'];?></textarea>
                  </div>
                  <div class="col-md-8">
                    <label for="agreement_content_1" class="form-label w-100 ps-1">agreement_content_1
                    </label>
                    <textarea type="text" name="agreement_content_1" class="form-control ps-1 trumbowyg-simple" aria-label="With textarea"><?=$options['agreement_content_1'];?></textarea>
                  </div>
                  <!-- for 1st agreement -->

                  <!-- for 2nd agreement -->
                  <div class="col-md-4">
                    <label for="agreement_heading_2" class="form-label w-100 ps-1">agreement_heading_2
                    </label>
                    <textarea type="text" name="agreement_heading_2" class="form-control ps-1" aria-label="With textarea" rows="1" required><?=$options['agreement_heading_2'];?></textarea>
                  </div>
                  <div class="col-md-8">
                    <label for="agreement_content_2" class="form-label w-100 ps-1">agreement_content_2
                    </label>
                    <textarea type="text" name="agreement_content_2" class="form-control ps-1 trumbowyg-simple" aria-label="With textarea"><?=$options['agreement_content_2'];?></textarea>
                  </div>
                  <!-- for 2nd agreement -->

                  <div class="col-12 text-md-end text-center ">
                    <button id="register-button" class="btn btn-sm btn-success register-button">zmień</button>
                  </div>

                </form>


          </div><!-- col 12-->
          <!-- footer form options form -->
                  <?php endif;?>  
                  <!-- headers -->




          <!-- image upload form-->
          <?php
          if ($options['footer_logo'] == 'on') {
          $data['old_image'] = $options['footer_logo_image'];
          $data['prefix'] = 'footer_logo_image';
          $data['form_title'] = 'footer_logo';
          $data['id'] = $options['id'];
          $data['table'] = 'website_footer';
          $this->admInclude("/adm_views/adm-upload-form.php", $data);
          }
          ?>
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
  
btns: [['bold'], ['h4'], ['h5'], ['p'], ['removeformat'], ['viewHTML']],
tagsToRemove: ['table', 'td', 'tr']

}); 



</script>
<?php
  if ($options['footer_logo'] == 'on') {
  $data['image_height'] = 500;
  $data['image_width'] = 500;
  $data['prefix'] = 'footer_logo_image';
  $data['image_q'] = '.9';
  $this->admInclude("/assets/admin-croopie-model-script.php", $data);
}



?>


  </body>
</html>
