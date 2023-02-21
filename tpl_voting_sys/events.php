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

          $smarty->assign('separator_display', '');
          $smarty->assign('event_dates', $data['event_dates']);
          $smarty->assign('image_path', IMGFOLDER.'events/');
          $smarty->assign('events', $data['all_events']);
          $smarty->assign('data_masonry', '{"percentPosition": true }');
          $smarty->display('events_index_def.tpl');


?>







<?php
// footer
  $smarty->display('footer.tpl');
$this->visitor_cookies("/includes/cookie-banner.inc.php");
$this->view("/includes/essential-js.inc.php", $data);
?>
 <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

<script src="<?=TEMPLATE_FOLDER?>/assets/js/aos.js"></script>
 <script>
        AOS.init();
</script>


<script type="text/javascript">

(function($) {
  "use strict";

  var siteIstotope = function() {
    var $container = $('#portfolio-grid').isotope({
      itemSelector: '.item',
      isFitWidth: true
    });


    $container.isotope({
      filter: '*'
    });

    $('#filters').on('click', 'a', function(e) {
      e.preventDefault();
      var filterValue = $(this).attr('data-filter');
      $container.isotope({
        filter: filterValue
      });
      $('#filters a').removeClass('active');
      $(this).addClass('active');
    // var divHeight = $('.sortable').height();
    // $('.sortable-row').css('height', divHeight+'px');
    // alert(divHeight);
    AOS.refresh();




    });
  }
  $(window).on('load', function() {
    siteIstotope();
  });


})(jQuery);


</script>

<?php
$this->view("/socials_includes/google_tag_manager_noscript.php", $data);
?>

  </body>
</html>
