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
  "navbar" => "navbar",
  "europe_navbar" => "europe_navbar"

);
$options['website_strenght_array'] = array(
  "strong" => "strong",
  "light" => "light"

);
$options['carousel_kind_array'] = array(
  "standard_carousel" => "standard_carousel",
  "tile_carousel" => "tile_carousel"

);
$options['background_animation_array'] = array(
  "background_squares" => "background_squares",
  "none" => "none"

);

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
            <h5 class="text-danger">Edytujesz design strony</h5>
            <h6 class="text-danger">To bardzo odpowiedzialne zadanie</h6>
          </div>
          <!-- heading-->


          <!-- main options form -->
          <div class="col-12 border py-3 px-3 mt-4">
          <h5 class="ps-1 mb-3">Styl</h5>

                <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                  <input type="text" id="id" class="form-control form-control-sm" name="id" value="<?=$options['id'];?>">
                  <input type="hidden" id="id" class="form-control form-control-sm" name="update_style" value="update_style">

                  <!-- fonts -->
                  <div class="col-md-4">
                    <label for="Website_address" class="form-label w-100 ps-1">Font główny
                    </label>
                      <select class="form-select" aria-label="Default select example" name="FONTFILE">
                        <?php foreach ($selected_fonts as $key => $value):
                          ?>
                          <?php if ($value == $options['FONTFILE']):?>
                        <option class="text-danger" value="<?=$value;?>" selected><?=$value;?></option>
                          <?php endif;?>
                          <?php if ($value <> $options['FONTFILE']):?>
                        <option value="<?=$value;?>"><?=$value;?></option>
                          <?php endif;?>

                      <?php endforeach;?>
                      </select>
                  </div>
                  <!-- fonts -->

                  <!-- fonts -->
                  <div class="col-md-4">
                    <label for="Website_address" class="form-label w-100 ps-1">Font Nagłówków
                    </label>
                      <select class="form-select" aria-label="Default select example" name="HEADINGFONTFILE">
                        <?php foreach ($selected_fonts as $key => $value):
                          ?>
                          <?php if ($value == $options['HEADINGFONTFILE']):?>
                        <option class="text-danger" value="<?=$value;?>" selected><?=$value;?></option>
                          <?php endif;?>
                          <?php if ($value <> $options['HEADINGFONTFILE']):?>
                        <option value="<?=$value;?>"><?=$value;?></option>
                          <?php endif;?>

                      <?php endforeach;?>
                      </select>
                  </div>
                  <!-- fonts -->

                <!-- template -->
                  <div class="col-md-4">
                    <label for="Website_address" class="form-label w-100 ps-1">Template folder [<?=$template_count;?>]
                    </label>
                      <select class="form-select" aria-label="Default select example" name="main_template">
                        <?php foreach ($files as $key => $value):
                        $avaliable_template_name = str_replace('../public/', '', $value);
                          ?>
                          <?php if ($avaliable_template_name == $options['main_template']):?>
                        <option value="<?=$avaliable_template_name;?>" selected><?=$avaliable_template_name;?> SELECTED</option>
                          <?php endif;?>
                          <?php if ($avaliable_template_name <> $options['main_template']):?>
                        <option value="<?=$avaliable_template_name;?>"><?=$avaliable_template_name;?></option>
                          <?php endif;?>

                      <?php endforeach;?>
                      </select>
                  </div>
                <!-- template -->

                  <!-- square oval -->
                  <div class="col-md-2">
                    <label for="Website_address" class="form-label w-100 ps-1">Oval Square
                    </label>
                      <select class="form-select" aria-label="Default select example" name="website_feel">
                        <?php foreach ($options['website_feel_array'] as $key => $value):
                          ?>
                          <?php if ($value == $options['website_feel']):?>
                        <option class="text-danger" value="<?=$value;?>" selected><?=$value;?></option>
                          <?php endif;?>
                          <?php if ($value <> $options['website_feel']):?>
                        <option value="<?=$value;?>"><?=$value;?></option>
                          <?php endif;?>

                      <?php endforeach;?>
                      </select>
                  </div>
                  <!-- square oval -->

                     <!-- square oval -->
                  <div class="col-md-2">
                    <label for="Website_address" class="form-label w-100 ps-1">website strenght
                    </label>
                      <select class="form-select" aria-label="Default select example" name="website_strenght">
                        <?php foreach ($options['website_strenght_array'] as $key => $value):
                          ?>
                          <?php if ($value == $options['website_strenght']):?>
                        <option class="text-danger" value="<?=$value;?>" selected><?=$value;?></option>
                          <?php endif;?>
                          <?php if ($value <> $options['website_strenght']):?>
                        <option value="<?=$value;?>"><?=$value;?></option>
                          <?php endif;?>

                      <?php endforeach;?>
                      </select>
                  </div>
                  <!-- square oval -->
                  <!-- navi -->
                  <div class="col-md-2">
                    <label for="website_navi" class="form-label w-100 ps-1">Navi
                    </label>
                      <select class="form-select" aria-label="Default select example" name="website_navi">
                        <?php foreach ($options['website_navi_array'] as $key => $value):
                          ?>
                          <?php if ($value == $options['website_navi']):?>
                        <option class="text-danger" value="<?=$value;?>" selected><?=$value;?></option>
                          <?php endif;?>
                          <?php if ($value <> $options['website_navi']):?>
                        <option value="<?=$value;?>"><?=$value;?></option>
                          <?php endif;?>

                      <?php endforeach;?>
                      </select>
                  </div>
                  <!-- navi -->

                  <!-- carousel -->
                  <div class="col-md-2">
                    <label for="carousel_kind" class="form-label w-100 ps-1">Carousel kind
                    </label>
                      <select class="form-select" aria-label="Default select example" name="carousel_kind">
                        <?php foreach ($options['carousel_kind_array'] as $key => $value):
                          ?>
                          <?php if ($value == $options['carousel_kind']):?>
                        <option class="text-danger" value="<?=$value;?>" selected><?=$value;?></option>
                          <?php endif;?>
                          <?php if ($value <> $options['carousel_kind']):?>
                        <option value="<?=$value;?>"><?=$value;?></option>
                          <?php endif;?>

                      <?php endforeach;?>
                      </select>
                  </div>
                  <!-- carousel -->
                  <!-- bg animation -->
                  <div class="col-md-2">
                    <label for="carousel_kind" class="form-label w-100 ps-1">bg animation
                    </label>
                      <select class="form-select" aria-label="Default select example" name="bg_animation">
                        <?php foreach ($options['background_animation_array'] as $key => $value):
                          ?>
                          <?php if ($value == $options['bg_animation']):?>
                        <option class="text-danger" value="<?=$value;?>" selected><?=$value;?></option>
                          <?php endif;?>
                          <?php if ($value <> $options['bg_animation']):?>
                        <option value="<?=$value;?>"><?=$value;?></option>
                          <?php endif;?>
                      <?php endforeach;?>
                      </select>
                  </div>
                  <!-- bg animation -->


                  <div class="col-12 mt-3 separator mt-2"><hr class="border-danger"></div>
                <!-- navi& footer colors-->
                  <div class="col-12">
                    <h5>Navi & footer colors</h5>
                  </div>
                  <!-- single color -->
                  <div class="col-md-2">
                      <label for="navi_background_color" class="form-label">navi background</label>
                      <input type="color" class="form-control form-control-color" id="navi_background_color" value="<?=$options['navi_background_color'];?>" title="Choose your color" name="navi_background_color">  
                      <p class="text-muted text-danger mt-2">RGB: <?=implode(',', rgb2hex2rgb($options['navi_background_color']));?></p>
                  </div>
                  <!-- single color -->
                  <!-- single color -->
                  <div class="col-md-2">
                      <label for="navi_text_color" class="form-label">navi_text_color</label>
                      <input type="color" class="form-control form-control-color" id="navi_text_color" value="<?=$options['navi_text_color'];?>" title="Choose your color" name="navi_text_color">  
                      <p class="text-muted text-danger mt-2">RGB: <?=implode(',', rgb2hex2rgb($options['navi_text_color']));?></p>
                  </div>
                  <!-- single color -->
                  <!-- single color -->
                  <div class="col-md-2">
                      <label for="footer_background_color" class="form-label">footer background</label>
                      <input type="color" class="form-control form-control-color" id="footer_background_color" value="<?=$options['footer_background_color'];?>" title="Choose your color" name="footer_background_color">  
                      <p class="text-muted text-danger mt-2">RGB: <?=implode(',', rgb2hex2rgb($options['footer_background_color']));?></p>
                  </div>
                  <!-- single color -->
                  <!-- single color -->
                  <div class="col-md-2">
                      <label for="footer_text_color" class="form-label">footer_text_color</label>
                      <input type="color" class="form-control form-control-color" id="footer_text_color" value="<?=$options['footer_text_color'];?>" title="Choose your color" name="footer_text_color">  
                      <p class="text-muted text-danger mt-2">RGB: <?=implode(',', rgb2hex2rgb($options['footer_text_color']));?></p>
                  </div>
                  <!-- single color -->
                  <!-- navi & footer colors-->
                  <div class="col-12 mt-3 separator mt-2"><hr class="border-danger"></div>
                <!-- bg gradients colors-->
                  <div class="col-12">
                    <h5>Bg colors</h5>
                  </div>
                  <!-- single color -->
                  <div class="col-md-2">
                      <label for="body_bg_start" class="form-label">body_bg_start</label>
                      <input type="color" class="form-control form-control-color" id="body_bg_start" value="<?=$options['body_bg_start'];?>" title="Choose your color" name="body_bg_start">  
                      <p class="text-muted text-danger mt-2">RGB: <?=implode(',', rgb2hex2rgb($options['body_bg_start']));?></p>
                  </div>
                  <!-- single color -->
                  <!-- single color -->
                  <div class="col-md-2">
                      <label for="body_bg_middle" class="form-label">body_bg_middle</label>
                      <input type="color" class="form-control form-control-color" id="body_bg_middle" value="<?=$options['body_bg_middle'];?>" title="Choose your color" name="body_bg_middle">  
                      <p class="text-muted text-danger mt-2">RGB: <?=implode(',', rgb2hex2rgb($options['body_bg_middle']));?></p>
                  </div>
                  <!-- single color -->
                  <!-- single color -->
                  <div class="col-md-2">
                      <label for="body_bg_end" class="form-label">body_bg_end</label>
                      <input type="color" class="form-control form-control-color" id="body_bg_end" value="<?=$options['body_bg_end'];?>" title="Choose your color" name="body_bg_end">  
                      <p class="text-muted text-danger mt-2">RGB: <?=implode(',', rgb2hex2rgb($options['body_bg_end']));?></p>
                  </div>
                  <!-- single color -->
                  <!-- bg gradients colors-->

                  <div class="col-12 mt-3 separator mt-2"><hr class="border-danger"></div>

                    <h5>Lead colors</h5>

                  <!-- colors -->
                  <!-- single color -->
                  <div class="col-md-2">
                      <label for="lead_color_1" class="form-label">color_1</label>
                      <input type="color" class="form-control form-control-color" id="lead_color_1" value="<?=$options['lead_color_1'];?>" title="Choose your color" name="lead_color_1">  
                      <p class="text-muted text-danger mt-2">RGB: <?=implode(',', rgb2hex2rgb($options['lead_color_1']));?></p>
                  </div>
                  <!-- single color -->

                  <div class="col-md-2">
                      <label for="lead_color_2" class="form-label">color_2</label>
                      <input type="color" class="form-control form-control-color" id="lead_color_2" value="<?=$options['lead_color_2'];?>" title="Choose your color" name="lead_color_2"> 
                      <p class="text-muted text-danger mt-2">RGB: <?=implode(',', rgb2hex2rgb($options['lead_color_2']));?></p>
                   
                  </div>
                  <div class="col-md-2">
                      <label for="lead_color_3" class="form-label">color_3</label>
                      <input type="color" class="form-control form-control-color" id="lead_color_3" value="<?=$options['lead_color_3'];?>" title="Choose your color" name="lead_color_3"> 
                      <p class="text-muted text-danger mt-2">RGB: <?=implode(',', rgb2hex2rgb($options['lead_color_3']));?></p>
                   
                  </div>
                  <div class="col-md-2">
                      <label for="lead_color_4" class="form-label">color_4</label>
                      <input type="color" class="form-control form-control-color" id="lead_color_4" value="<?=$options['lead_color_4'];?>" title="Choose your color" name="lead_color_4"> 
                      <p class="text-muted text-danger mt-2">RGB: <?=implode(',', rgb2hex2rgb($options['lead_color_4']));?></p>
                   
                  </div>
                  <div class="col-12"></div>

                  <div class="col-md-2">
                      <label for="light_heading_color" class="form-label">light_heading_color</label>
                      <input type="color" class="form-control form-control-color" id="light_heading_color" value="<?=$options['light_heading_color'];?>" title="Choose your color" name="light_heading_color">   
                      <p class="text-muted text-danger mt-2">RGB: <?=implode(',', rgb2hex2rgb($options['light_heading_color']));?></p>
                 
                  </div>


                  <div class="col-md-2">
                      <label for="light_text_color" class="form-label">light_text_color</label>
                      <input type="color" class="form-control form-control-color" id="light_text_color" value="<?=$options['light_text_color'];?>" title="Choose your color" name="light_text_color">   
                      <p class="text-muted text-danger mt-2">RGB: <?=implode(',', rgb2hex2rgb($options['light_text_color']));?></p>
                 
                  </div>

                  <div class="col-md-2">
                      <label for="dark_heading_color" class="form-label">dark_heading_color</label>
                      <input type="color" class="form-control form-control-color" id="dark_heading_color" value="<?=$options['dark_heading_color'];?>" title="Choose your color" name="dark_heading_color">   
                      <p class="text-muted text-danger mt-2">RGB: <?=implode(',', rgb2hex2rgb($options['dark_heading_color']));?></p>
                 
                  </div>


                  <div class="col-md-2">
                      <label for="dark_text_color" class="form-label">dark_text_color</label>
                      <input type="color" class="form-control form-control-color" id="dark_text_color" value="<?=$options['dark_text_color'];?>" title="Choose your color" name="dark_text_color">   
                      <p class="text-muted text-danger mt-2">RGB: <?=implode(',', rgb2hex2rgb($options['dark_text_color']));?></p>
                 
                  </div>


                  <!-- colors -->

                  <div class="col-12 text-md-end text-center ">
                    <button id="register-button" class="btn btn-sm btn-success register-button">zmień</button>
                  </div>

                </form>
          </div><!-- col 12-->
          <!-- main options form -->





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
