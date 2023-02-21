<?php
  $refresh_cookies = $this->loadModel("cookieform");
  $refresh_cookies->refreshVisitorCookies();
  $data['messenger'] = $messages;
  //smarty goes here
require('../app/Smarty/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir($_SERVER["DOCUMENT_ROOT"].'/'.TEMPLATE_FOLDER.'/templates');
$smarty->setCompileDir($_SERVER["DOCUMENT_ROOT"].'/'.TEMPLATE_FOLDER.'/templates_c');
$smarty->setCacheDir($_SERVER["DOCUMENT_ROOT"].'/'.TEMPLATE_FOLDER.'/cache');
$smarty->setConfigDir($_SERVER["DOCUMENT_ROOT"].'/configs');
 $smarty->assign('user_session', WEBSITE_NAME.'_u_id');
 $smarty->assign('IMAGEFOLDER', IMGFOLDER);
// $smarty->testInstall();


?>
<!DOCTYPE html>

<html lang="pl">
  <head>

<?php
$this->view("/socials_includes/facebook_pixel_code.php", $data);
$this->view("/socials_includes/google_tag_manager_script.php", $data);

$this->view("/includes/metatags.php", $data);
include ($_SERVER["DOCUMENT_ROOT"].'/'.TEMPLATE_FOLDER.'/assets/css/all-website-css.php');

?>
<link href="<?=TEMPLATE_FOLDER?>/assets/css/aos.css" rel="stylesheet">

    <title><?=$data['page_title']?></title>
  </head>


  <body data-feel="<?=website_feel?>" data-strenght="<?=website_strenght?>"  class="body-bg">
<?php
if (bg_animation !== 'none') {
$this->view("/includes/".bg_animation.".php", $data);
}
?>

<!-- there goes navi -->
<?php
  $smarty->display(website_navi.'.tpl');

?>


<div class="container-lg py-5 px-4">
  <div class="row align-items-center justify-content-center" style="min-height: 100vh">


        <div class="col-12 mb-3 shadow py-md-5 bg-white">
          <div class="row g-0">
            <div class="col-md-4 d-none d-md-flex align-items-center justify-content-center">
              <!-- <img src="..." class="img-fluid" alt="..."> -->
<!-- error envelope -->
<svg class="<?= $data['error_envelope'];?>" xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-envelope-exclamation" viewBox="0 0 16 16">
  <path style="fill: rgb(var(--lead-color-1));" d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
  <path style="fill: rgb(var(--lead-color-1));" d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1.5a.5.5 0 0 1-1 0V11a.5.5 0 0 1 1 0Zm0 3a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/>
</svg>
<!-- ok envelope -->
<svg class="<?= $data['ok_envelope'];?>" xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
  <path style="fill: rgb(var(--lead-color-1));" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
</svg>
<!-- error -->
<svg  class="<?= $data['d_error'];?>" xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-emoji-frown" viewBox="0 0 16 16">
  <path style="fill: rgb(var(--lead-color-1));" d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path style="fill: rgb(var(--lead-color-1));" d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.498 3.498 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.498 4.498 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
</svg>

            </div><!-- col-md-4-->

            <div class="col-lg-8">
              <div class="card-body">
                <h2 class="card-title my-md-5 my-3"><?= $data['heading_message'];?></h2>
                <h3 class="card-title my-md-5 my-3"><?= $data['thank_you'];?></h3>




              </div>
            </div>
          </div>
        </div>
  </div>
</div>






<?php
// footer
  $smarty->display('footer.tpl');
$this->visitor_cookies("/includes/cookie-banner.inc.php");
$this->view("/includes/essential-js.inc.php", $data);
?>
<script src="<?=TEMPLATE_FOLDER?>/assets/js/aos.js"></script>
 <script>
        AOS.init();
</script>
<?php
$this->view("/socials_includes/google_tag_manager_noscript.php", $data);
?>

  </body>
</html>
