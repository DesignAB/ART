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
        <div class="col-12 py-3 px-3 mt-4 text-center">
          <a href="adm_partners" class="btn btn-success btn-sm mb-3">wróć do partnerów</a>

          </div>

        <div class="col-12 mb-3 shadow py-md-5 " >
          <div class="row g-0">
        <?php $adm_message = $data['messenger']->admMessage();?>



          <!-- content form -->
          <div class="col-12 border py-3 px-3">
          <h5 class="ps-1 mb-3">Treść</h5>

                <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                  <input type="hidden" id="id" class="form-control form-control-sm" name="id" value="<?=$data['id'];?>">
                  <input type="hidden" id="id" class="form-control form-control-sm" name="update" value="update">


                  <!-- name and surname -->
                  <!-- headers -->
                  <div class="col-md-6">
                    <label for="partner_name" class="form-label w-100 ps-1">Nazwa
                    </label>
                    <textarea type="text" name="header" class="form-control ps-1" aria-label="With textarea" rows="1" required><?=$data['header'];?></textarea>
                  </div>
                  <div class="col-md-6">
                    <label for="subheader" class="form-label w-100 ps-1">Rozwinięcie
                    </label>
                    <textarea type="text" name="subheader" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$data['subheader'];?></textarea>
                  </div>
                  <!-- headers -->

                  <div class="col-md-12">
                    <label for="link" class="form-label w-100 ps-1">Strona WWW
                    </label>
                    <textarea type="text" name="link" class="form-control ps-1" aria-label="With textarea" rows="1"><?=$data['link'];?></textarea>
                  </div>



                  <div class="col-12 text-md-end text-center ">
                    <button id="register-button" class="btn btn-sm btn-success register-button">zmień treść</button>
                  </div>

                </form>
          </div><!-- col 12-->
          <!-- content form -->



          <!-- image upload form-->
          <?php
          $data['old_image'] = $data['image'];
          $data['prefix'] = 'image';
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
  $data['image_height'] = 100;
  $data['image_width'] = 220;
  $data['prefix'] = 'image';
  $data['image_q'] = '1';
  $this->admInclude("/assets/admin-croopie-model-script.php", $data);
?>


  </body>
</html>
