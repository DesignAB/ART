<?php
  $refresh_cookies = $this->loadModel("cookieform");
  $refresh_cookies->refreshVisitorCookies();
  $messages = $this->loadModel("usermessage");
  $data['messenger'] = $messages;
?>
<!DOCTYPE html>

<html lang="pl">
  <head>
    <!-- Bootstrap CSS -->
<?php
$this->view("/socials_includes/facebook_pixel_code.php", $data);
$this->view("/socials_includes/google_tag_manager_script.php", $data);

$this->view("/includes/metatags.php", $data);

include (TEMPLATE_FOLDER.'/assets/css/all-website-css.php');

?>
<link href="<?=MAIN_TEMPLATE?>/assets/css/croppie.css" rel="stylesheet">

    <title><?=$data['page_title']?></title>
  </head>


  <body data-feel="<?=website_feel?>" data-strenght="<?=website_strenght?>"  class="body-bg">
<?php
if (bg_animation !== 'none') {
$this->view("/includes/".bg_animation.".php", $data);
}
?>


<!-- there goes navi -->
<?=$this->view("/includes/".website_navi.".view.php", $data);?>


<div class="container-lg py-5 px-4">
  <div class="row align-items-center justify-content-center" style="min-height: 100vh">
        <div class="col-12 mb-3 shadow py-5 bg-white">
        <?php
        $error_message = $data['messenger']->errorUserMessage();
        $upload_message = $data['messenger']->userUploadMessage();

        ?>
              <?php if (!isset($_SESSION[WEBSITE_NAME.'_user_name'])) {
				$this->view("/includes/login-form.viev.php", $data);

              }?>

<?php if ($data['load_form']) :?>
 <?php
        $data['prefix'] = 'croppie_'.$data['contest_u_id'];
        $data['form-title'] = 'Dodaj zdjęcie';
?>
          <!-- one form -->
<div class="col-12 separator mt-lg-3"></div>
<div class="col-12 border bg-white my-5 py-5">
  <div class="container-lg mt-3">
    <div class="row">

      <div class="col-12 py-5 text-center">
      <h5><?=$data['form-title']?>!</h5>
      </div>

      <div id="<?=$data['prefix']?>-croppie-data" class="col-md-6 py-md-3">
        <p id="<?=$data['prefix']?>-croppie-instruction" class="test">Uploading instruction if needed!</p>

        <div id="<?=$data['prefix']?>-croppie-view" class=" d-none" style="">
        </div>

      </div>


      <div class="col-md-6">
        <div class="row g-0 d-flex h-100">



          <div class="col-md-6 align-self-end mb-3">
            <div class="input-group custom-file-button">
              <label class="input-group-text" for="<?=$data['prefix']?>-croppie_upload">Dodaj plik</label>
              <input type="file" class="form-control" id="<?=$data['prefix']?>-croppie_upload">
            </div>
          </div>

          <div class="col-md-6 align-self-end mb-3 px-md-3">
          <button id="<?=$data['prefix']?>-croppie_crop" class="btn btn-sm btn-primary d-none">zaakceptuj</button>
          </div>




        </div>
      </div> <!-- col 6 ends-->

    </div>
  </div>
</div>

          <!-- Modal -->
<div class="modal fade" id="croppie_<?=$data['prefix']?>_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
    <form method="POST" enctype="application/x-www-form-urlencoded" id="upload" >
    <input type="hidden" id="image_<?=$data['prefix']?>_value" class="form-control form-control-sm" name="image" value="">
    <input type="hidden" class="form-control form-control-sm" name="prefix" value="<?=$data['prefix']?>">
    <input type="hidden" class="form-control form-control-sm" name="contest_u_id" value="<?=$data['contest_u_id']?>">
    <input type="hidden" class="form-control form-control-sm" name="u_id" value="<?=$_SESSION[WEBSITE_NAME.'_u_id']?>">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tak będzie to wyglądało:</h5>
      </div>
      <div class="modal-body">
        <div class="row">
            <div id="<?=$data['prefix']?>-croppie_preview" class="col-md-6">
            </div>
            <div class="col-md-6">
            <h4>Opis</h4>
              <div class="input-group">
                    <label for="photo_title" class="form-label w-100 ps-1">Tytuł
                    </label>
                    <textarea type="text" name="photo_title" class="form-control ps-1" aria-label="With textarea" rows="1" required></textarea>
              </div>
              <div class="input-group mt-md-3">
                    <label for="photo_description" class="form-label w-100 ps-1">Krótki opis
                    </label>
                    <textarea type="text" name="photo_description" class="form-control ps-1" aria-label="With textarea" rows="4" required></textarea>
              </div>

            </div>


        </div>

      </div><!-- modal body ends-->
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">jeszcze nie</button>
        <button class="btn btn-sm btn-danger">zaakceptuj</button>
      </div><!-- footer-->

    </form>
    </div><!-- content-->
  </div>
</div>

          <!-- Modal -->



          <!-- one form --><?php endif;?>



        </div>

  </div>
</div>

<?php
// footer
$this->view("/includes/footer.view.php", $data);
$this->visitor_cookies("/includes/cookie-banner.inc.php");
$this->view("/includes/essential-js.inc.php", $data);
$data['image_q'] = 1;
$this->view("/assets/js/user-login.php", $data); // this is js

?>

<?php if ($data['load_form']):?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')
</script>
  <script src="<?=MAIN_TEMPLATE?>/assets/js/croppie.js"></script>
  <?php

  $this->view("/includes/croppie-script.php", $data);

  ?>
<?php endif;?>


<?php
$this->view("/socials_includes/google_tag_manager_noscript.php", $data);
?>

  </body>
</html>
