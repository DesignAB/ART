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

  $smarty->assign('data', $data);
  $smarty->display($data['template'].$data['im_single'].'.tpl');

?>







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


<script type="text/javascript">

$(document).ready(function(){
    $(".req").hide();
});

$('form input[name="email"]').change(function () {
  var email = $(this).val();
var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/igm;
if (re.test(email)) {
  // success
    $('.email-field-error').addClass("d-none");
    $('.mailer-button').removeClass("d-none");
    $('.email-class').removeClass("tomato-color");
} else {
  // error
    // $('.email-field-error').hide();
    $('.email-field-error').removeClass("d-none");
    $('.mailer-button').addClass("d-none");

}
});

$('form input[name="email"]').keyup(function () {
  var email_color = $(this).val();
var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/igm;
if (re.test(email_color)) {
  // success
    $('.email-class').removeClass("tomato-color");
} else {
  // error
    // $('.email-field-error').hide();
    $('.email-class').addClass("tomato-color");

}
});






$('#agree_one').change(function () {
  if ($(this).is(':checked')) {
    // success
    // alert("success");
  $('.mailer-button').attr("disabled", false);
  } else {
    // error
    // alert("error");
  $('.mailer-button').attr("disabled", true);

  }

});



</script>

<?php
$this->view("/socials_includes/google_tag_manager_noscript.php", $data);
?>

  </body>
</html>
