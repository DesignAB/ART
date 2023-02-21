<?php
include ('../../app/core/config.php');
include ('pl_includes/autoloader.inc.php');
$load_me = new LanguageRelated\LoadFiles($file);
$id = $_GET['value'];

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

$table = 'website_footer';

$adm_cookies = new AdmUsers\CheckAdmCookiesController();
$adm_cookies->CanIBeHere();
$AdminRights = $adm_cookies->AdminRights();
$AdminData = $adm_cookies->AdminData();

$categories = new SqlQueries\sqlAdmCategoriesController();
$categories_array = $categories->categoriesArray();// only to control admin rights


$footer_array = new SysArrays\FooterArray();
$footer_array = $footer_array->footerArray();
  // id, active, datetime, orderBy
$db_query = new SqlQueries\SqlFooterController();
$db_query = $db_query->doWebsiteFooter();
$website_footer_data= $db_query['row'];
foreach ($footer_array as $key) {
  // echo $key.'<br>';
  $$key = $website_footer_data->$key;
}
$id = $website_footer_data->id;


// exit();
// var_dump($the_contest); exit();
if ($db_query['error'] == 'false') {
  $message = $db_query['message'];
  header("Location:".DbErrors."?error_code=$message");
  exit();
}



if ($footer_form == 'on') {
  $check_footer_form = 'checked';
} else{
    $check_footer_form = '';

}
if ($footer_logo == 'on') {
  $check_footer_logo = 'checked';
} else{
    $check_footer_logo = '';

}
if ($footer_map == 'on') {
  $check_footer_map = 'checked';
} else{
    $check_footer_map = '';

}


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
            <h5>Footer edit $id</h5>

          </div>
          <!-- heading-->
          $d_message




          <!-- options form -->
          <div class="col-12 border border-danger py-3">
          <h5 class="ps-1 mb-3">Opcje</h5>
            <form method="POST" action="adm-inc/website-footer.inc.php" enctype="multipart/form-data" class="row g-2 custom-form"  id="register-form" >
                <input type="hidden" class="form-control" value="$the_contest->id" name="id">

                  <div class="col-md-2 d-flex align-items-end justify-content-start">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="footer_form" name="footer_form" $check_footer_form>
                    <label class="form-check-label" for="footer_form">Footer form</label>
                  </div>
                  </div>


                  <div class="col-md-2 d-flex align-items-end justify-content-start">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="footer_logo" name="footer_logo" $check_footer_logo>
                    <label class="form-check-label" for="footer_logo">footer_logo</label>
                  </div>
                  </div>

                  <div class="col-md-2 d-flex align-items-end justify-content-start">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="footer_map" name="footer_map" $check_footer_map>
                    <label class="form-check-label" for="footer_map">footer map</label>
                  </div>
                  </div>




                  <div class="col-12 separator mb-3">
                    
                  </div>

                  <div class="col-md-6">
                    <div class="input-group">
                    <label for="footer_heading" class="form-label w-100 ps-1">Nagłówek
                    </label>
                    <textarea type="text" name="footer_heading" class="form-control ps-1" aria-label="With textarea" rows="1">$footer_heading</textarea>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="input-group">
                    <label for="form_heading" class="form-label w-100 ps-1">Nagłówek formularza
                    </label>
                    <textarea type="text" name="form_heading" class="form-control ps-1" aria-label="With textarea" rows="1">$form_heading</textarea>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="input-group">
                    <label for="footer_form_email" class="form-label w-100 ps-1">footer_form_email
                    </label>
                    <textarea type="text" name="footer_form_email" class="form-control ps-1" aria-label="With textarea" rows="1">$footer_form_email</textarea>
                    </div>
                  </div>

                  <div class="col-12 separator mb-3">
                    
                  </div>

                  <div class="col-md-3">
                    <div class="input-group">
                    <label for="footer_tel_1" class="form-label w-100 ps-1">telefon
                    </label>
                    <textarea type="text" name="footer_tel_1" class="form-control ps-1" aria-label="With textarea" rows="1">$footer_tel_1</textarea>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="input-group">
                    <label for="footer_tel_1_desc" class="form-label w-100 ps-1">opis telefonu
                    </label>
                    <textarea type="text" name="footer_tel_1_desc" class="form-control ps-1" aria-label="With textarea" rows="1">$footer_tel_1_desc</textarea>
                    </div>
                  </div>


                  <div class="col-md-3">
                    <div class="input-group">
                    <label for="footer_tel_2" class="form-label w-100 ps-1">telefon 2
                    </label>
                    <textarea type="text" name="footer_tel_2" class="form-control ps-1" aria-label="With textarea" rows="1">$footer_tel_2</textarea>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="input-group">
                    <label for="footer_tel_2_desc" class="form-label w-100 ps-1">opis telefonu 2
                    </label>
                    <textarea type="text" name="footer_tel_2_desc" class="form-control ps-1" aria-label="With textarea" rows="1">$footer_tel_2_desc</textarea>
                    </div>
                  </div>

                  <div class="col-12 separator mb-3">
                    
                  </div>
                  <div class="col-md-6">
                    <div class="input-group">
                    <label for="footer_fb" class="form-label w-100 ps-1">FB
                    </label>
                    <textarea type="text" name="footer_fb" class="form-control ps-1" aria-label="With textarea" rows="1">$footer_fb</textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group">
                    <label for="footer_insta" class="form-label w-100 ps-1">Instagram
                    </label>
                    <textarea type="text" name="footer_insta" class="form-control ps-1" aria-label="With textarea" rows="1">$footer_insta</textarea>
                    </div>
                  </div>

                  <div class="col-12 separator mb-3">
                    
                  </div>


                  <div class="col-md-12">
                    <div class="input-group">
                    <label for="footer_map_content" class="form-label w-100 ps-1">footer_map_content
                    </label>
                    <textarea type="text" name="footer_map_content" class="form-control ps-1" aria-label="With textarea" rows="3">$footer_map_content</textarea>
                    </div>
                  </div>


                  <div class="col-12 separator mb-3">
                    
                  </div>


                  <div class="col-md-6">
                    <label for="contest_short_description" class="form-label w-100 ps-1">Adres
                    </label>
                    <textarea type="text" name="footer_address_1" class="form-control ps-1 trumbowyg-medium" aria-label="With textarea" rows="1" >$footer_address_1</textarea>
                  </div>

                  <div class="col-md-6">
                    <label for="contest_short_description" class="form-label w-100 ps-1">Adres 2
                    </label>
                    <textarea type="text" name="footer_address_2" class="form-control ps-1 trumbowyg-medium" aria-label="With textarea" rows="1" >$footer_address_12</textarea>
                  </div>






                  <div class="col-12 d-flex align-items-end justify-content-end">
                    <button id="register-button" class="btn btn-sm btn-danger register-button">zmień opcje</button>
                  </div>


            </form>
          </div>
          <!-- options form -->



HTML;

if ($footer_logo == 'on') {
$prefix = 'footer_logo_image'; // name of the image field
// name of image field, record id, table, uploaded photo, back page, form title
$Load_croppie_form = new ImageUpload\CroppieFormLoader($prefix, $id, $table, $footer_logo_image,'website-footer.php',  'Logotyp');
$Load_croppie_form->ImageFormLoader();
}

?>




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

<script src="assets/js/trumbowyg.js"></script>



<script>

$.trumbowyg.svgPath = 'assets/css/icons.svg'; 

$('.trumbowyg-with-list').trumbowyg({
  
btns: [['bold'], ['h4'], ['h5'], ['p'], ['unorderedList'], ['removeformat'], ['viewHTML'], ['link']],
tagsToRemove: ['table', 'td', 'tr']


});

$('.trumbowyg-medium').trumbowyg({
  
btns: [['bold'], ['h4'], ['h5'], ['p'], ['removeformat'], ['viewHTML']],
tagsToRemove: ['table', 'td', 'tr']


});


$('.trumbowyg-simple').trumbowyg({
  
btns: [['bold'], ['p'], ['removeformat'], ['viewHTML']],
tagsToRemove: ['table', 'td', 'tr']

}); 



</script>

<script src="assets/js/croppie.js"></script>
<?php
$prefix = 'footer_logo_image'; // name of the image field
// prefix, width, height, decrase viever, image quality
$Load_croppie_script = new ImageUpload\CroppieScriptLoader($prefix, 150, 60, 1, 1);
$Load_croppie_script->ImageScriptLoader();





?>
  </body>
</html>
