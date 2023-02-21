<?php
  $messages = $this->loadAdmModel("admmessenger");
  $data['messenger'] = $messages;
  $options = $data['website_options_row'];
  $data['id'] = $options['id'];
  $data['table'] = 'index_img';
   $path = '../public'; 
   $files = glob($path.'/tpl_*');
   $template_count = count($files);


$fonts_path = MAIN_TEMPLATE.'/assets/fonts/'; 
  if (file_exists($fonts_path)) {
    $font_files = scandir($fonts_path);
    $selected_fonts = array();

      foreach($font_files as $font_file)
      {
        $tmp = explode(".", $font_file);
          if($tmp[1] == "ttf") { 
            array_push($selected_fonts, $font_file);
          }
      }

   }
$options['website_feel_array'] = array(
  "square" => "square",
  "oval" => "oval"

);
$options['website_navi_array'] = array(
  "megamenu" => "megamenu",
  "offcanvas" => "offcanvas",
  "navbar" => "navbar"

);
// print_r(CAT_DATA["events"]); exit();
// print_r(biletyna_id); exit();

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
            <h5 class="text-danger">Edytujesz opcje strony</h5>
            <h6 class="text-danger">To bardzo odpowiedzialne zadanie</h6>
            <p class="text-muted"><small>Przy każdym załadowaniu tej strony zapisywany jest plik konfiguracyjny ze stałymi, które są odpowiedzialne za funkcjonowanie tej strony.<br><strong>main_options.php</strong> znajduje się w folderze app/core
              <br>w tym pliku zapisana są między innymi metadane dla strony głównej
            </small></p>
            <p class="text-muted"><small>
            Dodatkowo tworzone są pliki:
            <br>google_tag_manager_script.php
            <br>google_tag_manager_noscript
            <br>facebook_pixel_code.php
            <br> w folderze wybranej templatki 'socials_includes'
          </small></p>
          </div>
          <!-- heading-->




          <!-- options form -->
          <div class="col-12 border border-danger py-3 px-3 d-none">
          <h5 class="ps-1 mb-3">Opcje</h5>
            <form method="POST" enctype="multipart/form-data" class="row g-2 custom-form"  id="register-form" >
                <input type="hidden" class="form-control" value="<?=$options['id'];?>" name="id">
                <input type="hidden" class="form-control" name="options_update" value="options_update">

                  <div class="col-md-2 d-flex align-items-end justify-content-start">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="active" name="active" <?=$data['article_active'];?>>
                    <label class="form-check-label" for="active">Aktywny</label>
                  </div>
                  </div>

                  <div class="col-md-2 d-flex align-items-end justify-content-start">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="has_image" name="has_image" <?=$data['article_image'];?>>
                    <label class="form-check-label" for="has_image">Zdjęcie</label>
                  </div>
                  </div>

                  
                  <div class="col-md-2 d-flex align-items-end justify-content-start">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="featured" name="featured" <?=$data['article_featured'];?>>
                    <label class="form-check-label" for="featured">Wyróżniony</label>
                  </div>
                  </div>
                  
                  
                  <div class="col-md-3 d-flex align-items-end justify-content-start">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="only_on_index" name="only_on_index" <?=$data['article_only_on_index'];?>>
                    <label class="form-check-label" for="only_on_index">Tylko na stronie głównej</label>
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

          <!-- main options form -->
          <div class="col-12 border py-3 px-3 mt-4">
          <h5 class="ps-1 mb-3">Opcje główne</h5>

                <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                  <input type="hidden" id="id" class="form-control form-control-sm" name="id" value="<?=$options['id'];?>">
                  <input type="hidden" id="id" class="form-control form-control-sm" name="update_content" value="update_content">

                  <!-- headers -->
                  <div class="col-md-4">
                    <label for="website_name" class="form-label w-100 ps-1">Nazwa strony
                    </label>
                    <textarea type="text" name="website_name" class="form-control ps-1" aria-label="With textarea" rows="1" required><?=$options['website_name'];?></textarea>
                    <p class="text-muted text-danger mt-2"><small>Zmiana nazwy strony ma wpływ na pliki cookies.<br>Wymagane będzie ponowne zalogowanie się do systemu administracyjnego</small></p>

                  </div>
                  <div class="col-md-4">
                    <label for="Website_address" class="form-label w-100 ps-1"> Website_address
                    </label>
                    <textarea type="text" name="website_address" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$options['website_address'];?></textarea>
                  </div>




                  <div class="col-12 text-md-end text-center ">
                    <button id="register-button" class="btn btn-sm btn-success register-button">zmień</button>
                  </div>

                </form>
          </div><!-- col 12-->
          <!-- main options form -->


          <!-- meta options form -->
          <div class="col-12 border py-3 px-3 mt-4">
          <h5 class="ps-1 mb-3">Opcje tagów google i facebook pixel</h5>

                <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                  <input type="hidden" id="id" class="form-control form-control-sm" name="id" value="<?=$options['id'];?>">
                  <input type="hidden" id="id" class="form-control form-control-sm" name="update_tags" value="update_tags">


                  <!-- meta -->
                  <div class="col-md-4">
                    <label for="google_tag_manager_script" class="form-label w-100 ps-1">google_tag_manager_script
                    </label>
                    <textarea type="text" name="google_tag_manager_script" class="form-control ps-1" aria-label="With textarea" rows="5" ><?=$options['google_tag_manager_script'];?></textarea>
                    <p class="text-muted text-danger mt-2">Lorem ipsum</p>
                  </div>
                  <div class="col-md-4">
                    <label for="google_tag_manager_noscript" class="form-label w-100 ps-1">google_tag_manager_noscript
                    </label>
                    <textarea type="text" name="google_tag_manager_noscript" class="form-control ps-1" aria-label="With textarea" rows="5" ><?=$options['google_tag_manager_noscript'];?></textarea>
                    <p class="text-muted text-danger mt-2">Lorem ipsum</p>
                  </div>

                  <div class="col-md-4">
                    <label for="meta_description" class="form-label w-100 ps-1">facebook_pixel_code
                    </label>
                    <textarea type="text" name="facebook_pixel_code" class="form-control ps-1" aria-label="With textarea" rows="5" ><?=$options['facebook_pixel_code'];?></textarea>
                    <p class="text-muted text-danger mt-2">Lorem ipsum</p>
                  </div>
                  <!-- meta -->



                  <div class="col-12 text-md-end text-center ">
                    <button id="register-button" class="btn btn-sm btn-success register-button">zmień</button>
                  </div>

                </form>
          </div><!-- col 12-->
          <!-- meta options form -->
<?php if(!empty(CAT_DATA["events"]) && CAT_DATA["events"]["module_active"]):?>


          <!-- biletyna options form -->
          <div class="col-12 border py-3 px-3 mt-4">
          <h5 class="ps-1 mb-3">Biletyna ID</h5>

                <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                  <input type="hidden" id="id" class="form-control form-control-sm" name="id" value="<?=$options['id'];?>">
                  <input type="hidden" id="id" class="form-control form-control-sm" name="update_biletyna_id" value="update_biletyna_id">


                  <!-- biletyna -->
                  <div class="col-md-4">
                    <label for="biletyna_id" class="form-label w-100 ps-1">Biletyna id
                    </label>
                    <textarea type="text" name="biletyna_id" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$options['biletyna_id'];?></textarea>
                  </div>
                  <div class="col-md-4">
                    <label for="biletyna_url" class="form-label w-100 ps-1">biletyna_url
                    </label>
                    <textarea type="text" name="biletyna_url" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$options['biletyna_url'];?></textarea>
                  </div>
                  <div class="col-md-4">
                    <label for="biletyna_key" class="form-label w-100 ps-1">biletyna_key
                    </label>
                    <textarea type="text" name="biletyna_key" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$options['biletyna_key'];?></textarea>
                  </div>


                  <div class="col-12 text-md-end text-center ">
                    <button id="register-button" class="btn btn-sm btn-success register-button">zmień</button>
                  </div>

                </form>
          </div><!-- col 12-->
          <!-- biletyna options form -->


<?php endif;?>
          <!-- meta options form -->
          <div class="col-12 border py-3 px-3 mt-4">
          <h5 class="ps-1">Opcje meta</h5>
          <p class="ps-1 mb-3">Wyświetlane na stronie głównej</p>

                <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                  <input type="hidden" id="id" class="form-control form-control-sm" name="id" value="<?=$options['id'];?>">
                  <input type="hidden" id="id" class="form-control form-control-sm" name="update_meta" value="update_meta">


                  <!-- meta -->
                  <div class="col-md-4">
                    <label for="og:title" class="form-label w-100 ps-1">og:title
                    </label>
                    <textarea type="text" name="og_title" class="form-control ps-1" aria-label="With textarea" rows="1" required><?=$options['og_title'];?></textarea>
                    <p class="text-muted text-danger mt-2">Lorem ipsum</p>
                  </div>
                  <div class="col-md-4">
                    <label for="og_description" class="form-label w-100 ps-1">og:description
                    </label>
                    <textarea type="text" name="og_description" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$options['og_description'];?></textarea>
                    <p class="text-muted text-danger mt-2">Lorem ipsum</p>
                  </div>

                  <div class="col-md-4">
                    <label for="meta_description" class="form-label w-100 ps-1">meta_description
                    </label>
                    <textarea type="text" name="meta_description" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$options['meta_description'];?></textarea>
                    <p class="text-muted text-danger mt-2">Lorem ipsum</p>
                  </div>
                  <!-- meta -->



                  <div class="col-12 text-md-end text-center ">
                    <button id="register-button" class="btn btn-sm btn-success register-button">zmień</button>
                  </div>

                </form>
          </div><!-- col 12-->
          <!-- meta options form -->


          <!-- image upload form-->
          <?php
          $data['old_image'] = $options['og_image'];
          $data['prefix'] = 'og_image';
          $data['form_title'] = 'og_image INDEX';
          $this->admInclude("/adm_views/adm-upload-form.php", $data);
          ?>
          <!-- image upload form-->

          <!-- mailer options form -->
          <div class="col-12 border py-3 px-3 mt-4">
          <h5 class="ps-1 mb-3">Opcje mailer</h5>

                <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                  <input type="hidden" id="id" class="form-control form-control-sm" name="id" value="<?=$options['id'];?>">
                  <input type="hidden" id="id" class="form-control form-control-sm" name="update_mailer" value="update_mailer">


                  <!-- mailer -->
                  <div class="col-md-3">
                    <label for="ADMEMAIL" class="form-label w-100 ps-1">Email administratora
                    </label>
                    <textarea type="text" name="ADMEMAIL" class="form-control ps-1" aria-label="With textarea" rows="1" required><?=$options['ADMEMAIL'];?></textarea>
                    <p class="text-muted text-danger mt-2">Lorem ipsum</p>
                  </div>
                  <div class="col-md-3">
                    <label for="FromEmail" class="form-label w-100 ps-1"> FromEmail
                    </label>
                    <textarea type="text" name="FromEmail" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$options['FromEmail'];?></textarea>
                    <p class="text-muted text-danger mt-2">Lorem ipsum</p>

                  </div>
                  <div class="col-md-3">
                    <label for="FromPassword" class="form-label w-100 ps-1"> FromPassword
                    </label>
                    <textarea type="text" name="FromPassword" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$options['FromPassword'];?></textarea>
                    <p class="text-muted text-danger mt-2">Lorem ipsum</p>

                  </div>
                  <div class="col-md-3">
                    <label for="Host" class="form-label w-100 ps-1">Host
                    </label>
                    <textarea type="text" name="Host" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$options['Host'];?></textarea>
                    <p class="text-muted text-danger mt-2">Lorem ipsum</p>

                  </div>
                  <div class="col-md-3">
                    <label for="contact_form_email" class="form-label w-100 ps-1">Formularz kontaktowy
                    </label>
                    <textarea type="text" name="contact_form_email" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$options['contact_form_email'];?></textarea>
                    <p class="text-muted text-danger mt-2">Lorem ipsum</p>

                  </div>
                  <!-- mailer -->



                  <div class="col-12 text-md-end text-center ">
                    <button id="register-button" class="btn btn-sm btn-success register-button">zmień</button>
                  </div>

                </form>
          </div><!-- col 12-->
          <!-- mailer options form -->



          <!-- get response options form -->
          <div class="col-12 border py-3 px-3 mt-4">
          <h5 class="ps-1 mb-3">Get response</h5>

                <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="get-response-form" >
                  <input type="hidden" id="id" class="form-control form-control-sm" name="id" value="<?=$options['id'];?>">
                  <input type="hidden" id="gr" class="form-control form-control-sm" name="update_get_response" value="update_get_response">


                  <!-- mailer -->
                  <div class="col-md-3">
                    <label for="get_response" class="form-label w-100 ps-1">Kampania GetResponse
                    </label>
                    <textarea type="text" name="get_response_token" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$options['get_response_token'];?></textarea>
                  </div>
                  <!-- mailer -->



                  <div class="col-12 text-md-end text-center ">
                    <button id="get-response-button" class="btn btn-sm btn-success register-button">zmień</button>
                  </div>

                </form>
          </div><!-- col 12-->
          <!-- get response options form -->






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
  // main image
  $data['image_height'] = 500;
  $data['image_width'] = 500;
  $data['prefix'] = 'og_image';
  $data['image_q'] = '.9';
  $this->admInclude("/assets/admin-croopie-model-script.php", $data);
  // main image
?>


  </body>
</html>
