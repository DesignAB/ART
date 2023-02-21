<?php
  $messages = $this->loadAdmModel("admmessenger");
  $data['messenger'] = $messages;
  $article = $data['article'];
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
            <h5><?=$article['header'];?></h5>
            <h6><?=$article['subheader'];?></h6>

            <h6>Dodane przez: <?=$article['author'];?> | <?=$article['the_date'];?></h6>
            <?php if(!empty($article['mod_by'])):?>
            <h6>Ostatnia modyfikacja przez: <?=$article['mod_by'];?> | <?=$article['mod_date'];?></h6>
            <?php endif;?>



          </div>
          <!-- heading-->




          <!-- options form -->
          <div class="col-12 border border-danger py-3 px-3">
          <h5 class="ps-1 mb-3">Opcje</h5>
            <form method="POST" enctype="multipart/form-data" class="row g-2 custom-form"  id="register-form" >
                <input type="hidden" class="form-control" value="<?=$article['id'];?>" name="id">
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

<?php if ($data['designer'] == 'on'):?>
          <!-- design form -->

          <div class="col-12 border py-3 px-3 mt-4">
          <h5 class="ps-1 mb-3">Des9</h5>
                <form method="POST" enctype="multipart/form-data" class="row custom-form"  id="design_me_form" >
                  <input type="hidden" id="id" class="form-control form-control-sm" name="id" value="<?=$article['id'];?>">
                  <input type="hidden" id="id" class="form-control form-control-sm" name="design_me" value="design_me">


<!-- buttons -->
                  <div class="col-12 separator">
                  <h5 class="ps-1 mb-2 mt-2">btn color </h5>
                  </div>

                <!-- one btn -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                      <i class="bi-circle-fill me-2" style="color: rgba(var(--lead-color-1), 1);"></i>
                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="button_kind" id="btn-01" value="btn-01" <?=$data['btn_01_checked'];?> >
                        <label class="form-check-label" for="btn-01">btn-01</label>
                      </div>
                  </div>
                <!-- one btn -->
                <!-- one btn -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                        <i class="bi-circle-fill me-2" style="color: rgba(var(--lead-color-2), 1);"></i>
                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="button_kind" id="btn-02" value="btn-02" <?=$data['btn_02_checked'];?> >
                        <label class="form-check-label" for="btn-02">btn-02</label>
                      </div>
                  </div>
                <!-- one btn -->
                <!-- one btn -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                        <i class="bi-circle-fill me-2" style="color: rgba(var(--lead-color-3), 1);"></i>
                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="button_kind" id="btn-03" value="btn-03" <?=$data['btn_03_checked'];?> >
                        <label class="form-check-label" for="btn-03">btn-03</label>
                      </div>
                  </div>
                <!-- one btn -->
                <!-- one btn -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                        <i class="bi-circle-fill me-2" style="color: rgba(var(--lead-color-4), 1);"></i>
                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="button_kind" id="btn-04" value="btn-04" <?=$data['btn_04_checked'];?> >
                        <label class="form-check-label" for="btn-04">btn-04</label>
                      </div>
                  </div>
                <!-- one btn -->
<!-- buttons -->                  

<!-- text color -->
                  <div class="col-12 separator">
                  <h5 class="ps-1 mb-2 mt-2">text color</h5>
                  </div>

                <!-- one color -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                  <i class="bi-circle-fill me-2" style="color: rgba(var(--lead-color-1), 1);"></i>

                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="text_color" id="color-01" value="color-01" <?=$data['color_01_checked'];?> >
                        <label class="form-check-label" for="color-01">color-01</label>
                      </div>
                  </div>
                <!-- one color -->
                <!-- one color -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                     <i class="bi-circle-fill me-2" style="color: rgba(var(--lead-color-2), 1);"></i>
                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="text_color" id="color-02" value="color-02" <?=$data['color_02_checked'];?> >
                        <label class="form-check-label" for="color-02">color-02</label>
                      </div>
                  </div>
                <!-- one color -->
                <!-- one color -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                     <i class="bi-circle-fill me-2" style="color: rgba(var(--lead-color-3), 1);"></i>
                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="text_color" id="color-03" value="color-03" <?=$data['color_03_checked'];?> >
                        <label class="form-check-label" for="color-03">color-03</label>
                      </div>
                  </div>
                <!-- one color -->
                <!-- one color -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                     <i class="bi-circle-fill me-2" style="color: rgba(var(--lead-color-4), 1);"></i>
                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="text_color" id="color-04" value="color-04" <?=$data['color_04_checked'];?> >
                        <label class="form-check-label" for="color-04">color-04</label>
                      </div>
                  </div>
                <!-- one color -->
                <!-- one color -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                  <i class="bi-circle-fill me-2 text-white"></i>

                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="text_color" id="color-reset" value="" <?=$data['color_reset_checked'];?> >
                        <label class="form-check-label" for="color-reset">theme def</label>
                      </div>
                  </div>
                <!-- one color -->
<!-- text color -->

<!-- text color -->
                  <div class="col-12 separator">
                  <h5 class="ps-1 mb-2 mt-2">heading color</h5>
                  </div>

                <!-- one color -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                  <i class="bi-circle-fill me-2" style="color: rgba(var(--lead-color-1), 1);"></i>

                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="heading_color" id="heading_color-01" value="color-01" <?=$data['heading_01_checked'];?> >
                        <label class="form-check-label" for="heading_color-01">color-01</label>
                      </div>
                  </div>
                <!-- one color -->
                <!-- one color -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                     <i class="bi-circle-fill me-2" style="color: rgba(var(--lead-color-2), 1);"></i>
                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="heading_color" id="heading_color-02" value="color-02" <?=$data['heading_02_checked'];?> >
                        <label class="form-check-label" for="heading_color-02">color-02</label>
                      </div>
                  </div>
                <!-- one color -->
                <!-- one color -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                     <i class="bi-circle-fill me-2" style="color: rgba(var(--lead-color-3), 1);"></i>
                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="heading_color" id="heading_color-03" value="color-03" <?=$data['heading_03_checked'];?> >
                        <label class="form-check-label" for="heading_color-03">color-03</label>
                      </div>
                  </div>
                <!-- one color -->
                <!-- one color -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                     <i class="bi-circle-fill me-2" style="color: rgba(var(--lead-color-4), 1);"></i>
                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="heading_color" id="heading_color-04" value="color-04" <?=$data['heading_04_checked'];?> >
                        <label class="form-check-label" for="heading_color-04">color-04</label>
                      </div>
                  </div>
                <!-- one color -->
                <!-- one color -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                  <i class="bi-circle-fill me-2 text-white"></i>

                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="heading_color" id="heading_color-reset" value="" <?=$data['heading_reset_checked'];?> >
                        <label class="form-check-label" for="heading_color-reset">theme def</label>
                      </div>
                  </div>
                <!-- one color -->
<!-- text color -->
<!-- overlay color -->
                  <div class="col-12 separator">
                  <h5 class="ps-1 mb-2 mt-2">overlay color</h5>
                  </div>

                <!-- one color -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                  <i class="bi-circle-fill me-2" style="color: rgba(var(--lead-color-1), 1);"></i>

                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="overlay_color" id="overlay_color-01" value="bg-01" <?=$data['overlay_01_checked'];?> >
                        <label class="form-check-label" for="overlay_color-01">color-01</label>
                      </div>
                  </div>
                <!-- one color -->
                <!-- one color -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                     <i class="bi-circle-fill me-2" style="color: rgba(var(--lead-color-2), 1);"></i>
                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="overlay_color" id="overlay_color-02" value="bg-02" <?=$data['overlay_02_checked'];?> >
                        <label class="form-check-label" for="overlay_color-02">color-02</label>
                      </div>
                  </div>
                <!-- one color -->
                <!-- one color -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                     <i class="bi-circle-fill me-2" style="color: rgba(var(--lead-color-3), 1);"></i>
                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="overlay_color" id="overlay_color-03" value="bg-03" <?=$data['overlay_03_checked'];?> >
                        <label class="form-check-label" for="overlay_color-03">color-03</label>
                      </div>
                  </div>
                <!-- one color -->
                <!-- one color -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                     <i class="bi-circle-fill me-2" style="color: rgba(var(--lead-color-4), 1);"></i>
                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="overlay_color" id="overlay_color-04" value="bg-04" <?=$data['overlay_04_checked'];?> >
                        <label class="form-check-label" for="overlay_color-04">color-04</label>
                      </div>
                  </div>
                <!-- one color -->
                <!-- one color -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                  <i class="bi-circle-fill me-2 text-white"></i>

                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="overlay_color" id="overlay_color-reset" value="" <?=$data['overlay_reset_checked'];?> >
                        <label class="form-check-label" for="overlay_color-reset">theme def</label>
                      </div>
                  </div>
                <!-- one color -->
<!-- overlay color -->


                </form>
          </div>

          <!-- design form -->
<?php endif;?>


          <!-- content form -->
          <div class="col-12 border py-3 px-3 mt-4">
          <h5 class="ps-1 mb-3">Treść</h5>

                <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                  <input type="hidden" id="id" class="form-control form-control-sm" name="id" value="<?=$article['id'];?>">
                  <input type="hidden" id="id" class="form-control form-control-sm" name="update_content" value="update_content">


                  <!-- name and surname -->
                  <!-- headers -->
                  <div class="col-md-6">
                    <label for="contest_name" class="form-label w-100 ps-1">Nagłówek
                    </label>
                    <textarea type="text" name="header" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$article['header'];?></textarea>
                  </div>
                  <div class="col-md-6">
                    <label for="contest_sub_name" class="form-label w-100 ps-1">2 Nagłówek
                    </label>
                    <textarea type="text" name="subheader" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$article['subheader'];?></textarea>
                  </div>
                  <!-- headers -->

                  <div class="col-md-6">
                    <label for="short_content" class="form-label w-100 ps-1">Opis skrócony
                    </label>
                    <textarea type="text" name="short_content" class="form-control ps-1 trumbowyg-simple" aria-label="With textarea"><?=$article['short_content'];?></textarea>
                  </div>
                  <div class="col-md-6">
                    <label for="content" class="form-label w-100 ps-1">Opis
                    </label>
                    <textarea type="text" name="content" class="form-control ps-1 trumbowyg-with-list" aria-label="With textarea"><?=$article['content'];?></textarea>
                  </div>




                  <div class="col-12 text-md-end text-center ">
                    <button id="register-button" class="btn btn-sm btn-success register-button">zmień treść</button>
                  </div>

                </form>
          </div><!-- col 12-->
          <!-- content form -->



          <!-- image upload form-->
          <?php if ($article['has_image'] == 'on'):

          $data['old_image'] = $article['image'];
          $data['prefix'] = 'image';
          $data['form_title'] = 'Zdjęcie';
          $this->admInclude("/adm_views/adm-upload-form.php", $data);

          $data['old_image'] = $article['image_mobile'];
          $data['prefix'] = 'image_mobile';
          $data['form_title'] = 'Zdjęcie mobilne';
          $this->admInclude("/adm_views/adm-upload-form.php", $data);

          $data['old_image'] = $article['image_index'];
          $data['prefix'] = 'image_index';
          $data['form_title'] = 'Zdjęcie index';
          $this->admInclude("/adm_views/adm-upload-form.php", $data);


          $data['old_image'] = $article['index_mobile_image'];
          $data['prefix'] = 'index_mobile_image';
          $data['form_title'] = 'Zdjęcie mobilne index';
          $this->admInclude("/adm_views/adm-upload-form.php", $data);
          ?>
          <!-- content form -->
          <div class="col-12 border py-3 px-3 mt-4">
          <h5 class="ps-1 mb-3">Alt images SEO</h5>

                <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                  <input type="hidden" id="id" class="form-control form-control-sm" name="id" value="<?=$article['id'];?>">
                  <input type="hidden" id="id" class="form-control form-control-sm" name="update_seo" value="update_seo">


                  <!-- name and surname -->
                  <!-- headers -->
                  <div class="col-md-6">
                    <label for="contest_name" class="form-label w-100 ps-1">image_alt
                    </label>
                    <textarea type="text" name="image_alt" class="form-control ps-1" aria-label="With textarea" rows="1" required><?=$article['image_alt'];?></textarea>
                  </div>
                  <div class="col-md-6">
                    <label for="image_mobile_alt" class="form-label w-100 ps-1">image_mobile_alt
                    </label>
                    <textarea type="text" name="image_mobile_alt" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$article['image_mobile_alt'];?></textarea>
                  </div>
                  <div class="col-md-6">
                    <label for="image_index_alt" class="form-label w-100 ps-1">image_index_alt
                    </label>
                    <textarea type="text" name="image_index_alt" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$article['image_index_alt'];?></textarea>
                  </div>
                  <div class="col-md-6">
                    <label for="index_mobile_image_alt" class="form-label w-100 ps-1">index_mobile_image_alt
                    </label>
                    <textarea type="text" name="index_mobile_image_alt" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$article['index_mobile_image_alt'];?></textarea>
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
  
btns: [['bold'], ['p'], ['removeformat'], ['viewHTML'], ['em']],
tagsToRemove: ['table', 'td', 'tr']

}); 



</script>
<?php
if ($article['has_image'] == 'on') {
  $max_image_viever = 550;
  // main image
  $data['image_height'] = $data['template_image_height'];
  $data['image_width'] = $data['template_image_width'];
  $data['prefix'] = 'image';
  $data['image_q'] = '.9';

  $vieport_height = $data['image_height'];
  $vieport_width = $data['image_width'];
  $boundary_height = $data['image_height'];
  $boundary_width = $data['image_width'];
      if ($data['image_width']>=$max_image_viever) {
      $vieport_height = round($data['image_height'],0,PHP_ROUND_HALF_UP) / 2;
      $vieport_width = round($data['image_width'],0,PHP_ROUND_HALF_UP) / 2;
      $boundary_height = round($data['image_height'],0,PHP_ROUND_HALF_UP) / 2;
      $boundary_width = round($data['image_width'],0,PHP_ROUND_HALF_UP) / 2;
      }
      $data['vieport_height'] = $vieport_height;
      $data['vieport_width'] = $vieport_width;
      $data['boundary_height'] = $boundary_height;
      $data['boundary_width'] = $boundary_width;

  $this->admInclude("/assets/new-admin-croopie-model-script.php", $data);
  // main image


  // main image
  $data['image_height'] = $data['template_mobile_image_height'];
  $data['image_width'] = $data['template_mobile_image_width'];
  $data['prefix'] = 'image_mobile';
  $data['image_q'] = '.9';

  $vieport_height = $data['image_height'];
  $vieport_width = $data['image_width'];
  $boundary_height = $data['image_height'];
  $boundary_width = $data['image_width'];
      if ($data['image_width']>=$max_image_viever) {
      $vieport_height = round($data['image_height'],0,PHP_ROUND_HALF_UP) / 2;
      $vieport_width = round($data['image_width'],0,PHP_ROUND_HALF_UP) / 2;
      $boundary_height = round($data['image_height'],0,PHP_ROUND_HALF_UP) / 2;
      $boundary_width = round($data['image_width'],0,PHP_ROUND_HALF_UP) / 2;
      }
      $data['vieport_height'] = $vieport_height;
      $data['vieport_width'] = $vieport_width;
      $data['boundary_height'] = $boundary_height;
      $data['boundary_width'] = $boundary_width;

  $this->admInclude("/assets/new-admin-croopie-model-script.php", $data);
  // main image

  // index image
  $data['image_height'] = $data['template_image_index_height'];
  $data['image_width'] = $data['template_image_index_width'];
  $data['prefix'] = 'image_index';
  $data['image_q'] = '.9';

  $vieport_height = $data['image_height'];
  $vieport_width = $data['image_width'];
  $boundary_height = $data['image_height'];
  $boundary_width = $data['image_width'];
      if ($data['image_width']>=$max_image_viever) {
      $vieport_height = round($data['image_height'],0,PHP_ROUND_HALF_UP) / 2;
      $vieport_width = round($data['image_width'],0,PHP_ROUND_HALF_UP) / 2;
      $boundary_height = round($data['image_height'],0,PHP_ROUND_HALF_UP) / 2;
      $boundary_width = round($data['image_width'],0,PHP_ROUND_HALF_UP) / 2;
      }
      $data['vieport_height'] = $vieport_height;
      $data['vieport_width'] = $vieport_width;
      $data['boundary_height'] = $boundary_height;
      $data['boundary_width'] = $boundary_width;

  $this->admInclude("/assets/new-admin-croopie-model-script.php", $data);
  // index image

  // index_mobile_image
  $data['image_height'] = $data['template_mobile_image_index_height'];
  $data['image_width'] = $data['template_mobile_image_index_width'];
  $data['prefix'] = 'index_mobile_image';
  $data['image_q'] = '.9';

  $vieport_height = $data['image_height'];
  $vieport_width = $data['image_width'];
  $boundary_height = $data['image_height'];
  $boundary_width = $data['image_width'];
      if ($data['image_width']>=$max_image_viever) {
      $vieport_height = round($data['image_height'],0,PHP_ROUND_HALF_UP) / 2;
      $vieport_width = round($data['image_width'],0,PHP_ROUND_HALF_UP) / 2;
      $boundary_height = round($data['image_height'],0,PHP_ROUND_HALF_UP) / 2;
      $boundary_width = round($data['image_width'],0,PHP_ROUND_HALF_UP) / 2;
      }
      $data['vieport_height'] = $vieport_height;
      $data['vieport_width'] = $vieport_width;
      $data['boundary_height'] = $boundary_height;
      $data['boundary_width'] = $boundary_width;

  $this->admInclude("/assets/new-admin-croopie-model-script.php", $data);
  // index_mobile_image




  }
      



?>


  </body>
</html>
