<?php
  $messages = $this->loadAdmModel("admmessenger");
  $data['messenger'] = $messages;
  $timecontroller = $data['timecontroller'];


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




          <!-- content form -->
          <div class="col-12 border py-3 px-3 mt-4">
          <h5 class="ps-1 mb-3">Treść</h5>

                <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                  <input type="hidden" id="id" class="form-control form-control-sm" name="id" value="<?=$data['id'];?>">
                  <input type="hidden" id="id" class="form-control form-control-sm" name="update" value="update">


                  <!-- name and surname -->
                  <!-- headers -->
                  <div class="col-md-6">
                    <label for="sponsor_name" class="form-label w-100 ps-1">Nazwa
                    </label>
                    <textarea type="text" name="sponsor_name" class="form-control ps-1" aria-label="With textarea" rows="1" required><?=$data['sponsor_name'];?></textarea>
                  </div>
                  <div class="col-md-6">
                    <label for="sponsor_sub_name" class="form-label w-100 ps-1">Rozwinięcie
                    </label>
                    <textarea type="text" name="sponsor_sub_name" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$data['sponsor_sub_name'];?></textarea>
                  </div>
                  <!-- headers -->

                  <div class="col-md-12">
                    <label for="sponsor_website" class="form-label w-100 ps-1">Strona WWW
                    </label>
                    <textarea type="text" name="sponsor_website" class="form-control ps-1" aria-label="With textarea" rows="1"><?=$data['sponsor_website'];?></textarea>
                  </div>



                  <div class="col-12 text-md-end text-center ">
                    <button id="register-button" class="btn btn-sm btn-success register-button">zmień treść</button>
                  </div>

                </form>
          </div><!-- col 12-->
          <!-- content form -->



          <!-- image upload form-->
          <?php
          $data['old_image'] = $data['sponsor_logo'];
          $data['prefix'] = 'sponsor_logo';
          $data['form_title'] = 'Logotyp';
          $this->admInclude("/adm_views/adm-upload-form.php", $data);
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
  
btns: [['bold'], ['p'], ['removeformat'], ['viewHTML']],
tagsToRemove: ['table', 'td', 'tr']

}); 



</script>
<?php
  $data['image_height'] = $data['p_height'];
  $data['image_width'] = $data['p_width'];
  $data['prefix'] = 'sponsor_logo';
  $data['image_q'] = '.9';
  $this->admInclude("/assets/admin-croopie-model-script.php", $data);
?>


  </body>
</html>
