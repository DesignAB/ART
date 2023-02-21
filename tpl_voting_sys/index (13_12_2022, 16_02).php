<?php
  $refresh_cookies = $this->loadModel("cookieform");
  $refresh_cookies->refreshVisitorCookies();
  $articles = $data['index'];
  $data['carousels'] = $data['carousels_model']->activeCarousels();
  $messages = $this->loadModel("usermessage");

  $data['messenger'] = $messages;
  $data['carousel_count'] = count($data['carousels']);
  $sponsor_search = $data['sponsors_data'];
  $partners = $data['partners_data'];

// var_dump($data['partners_data']); exit();
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

$this->view("/includes/metatags-index.php", $data);
include (TEMPLATE_FOLDER.'/assets/css/all-website-css.php');

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





<?php
if (!empty($data['carousels'])) {
  $standard_data = array(
    "carousels" => $data['carousels'],
    "image_path" => IMGFOLDER.'carousels/'
  );
  $smarty->assign('standard_data', $standard_data);
  $smarty->display(carousel_kind.'.tpl');
}
?>

<!-- there goes navi -->
<?php 
  $smarty->display(website_navi.'.tpl');

// $this->view("/includes/".website_navi.".view.php", $data); 

?>



<?php if(!empty(INDEX_CAT_DATA)):?>
<?php foreach (INDEX_CAT_DATA as $key => $value):?>

<?php if ($value['subcategory'] == ''): ?>
<?php 
  $POST['table'] = $value['category'];
  $POST['query_params'] = array(
    "active" => 'on',
    "indexable" => 'on'
  );
  $limitter = '';
  if (!empty($value['display_limit_index'])) {
      $limitter = ' LIMIT '.$value['display_limit_index'];

  }

  if ($value['modular'] == 'standard') {
  $POST['query_rules'] = 'ORDER BY custom_order ASC'.$limitter;
  $articles_row = $articles->activeArticles($POST);
  $POST['query_rules'] = '';
  $all_articles_row = $articles->activeArticles($POST);
  $all_articles_count = count($all_articles_row);
  $articles_count = count($articles_row);
  $counter = 0;
  switch ($value['first_image']) {
    case 'on':
      $smarty->assign('image_cycle', 'order-0 order-md-0, order-1 order-md-1');
      $smarty->assign('content_cycle', 'order-1 order-md-1, order-0 order-md-0');
      break;
    
    default:
      $smarty->assign('image_cycle', 'order-1 order-md-1, order-0 order-md-0');
      $smarty->assign('content_cycle', 'order-0 order-md-0, order-1 order-md-1');
      break;
  }
  $standard_data = array(
    "subcategorized" => "",
    "subcategories" => array('no_subcat'),
    "category_name" => $value['display_name'],
    "category_sub_name" => $value['sub_display_name'],
    "category" => $value['category'],
    "first_image" => $value['first_image'],
    "image_path" => IMGFOLDER.$value['category'].'/'
  );
  $subcategory = 'no_subcat';
  $smarty->assign('standard_data', $standard_data);
  $smarty->assign('all_articles_count_'.$subcategory, $all_articles_count);
  $smarty->assign('articles_count_'.$subcategory, $articles_count);
  $smarty->assign('articles_row_'.$subcategory, $articles_row);
  $smarty->display($value['index_template'].'.tpl');
  } // if $value['modular'] == 'standard'

  else{
    // there goes module MODULES DO NOT HAVE SUBCATEGORIES

        // partners
        if($value['category'] == 'partners'){
          $partners_row = $partners->partners();
          $partners_count = count($partners_row);
          $data['partners_row'] = $partners_row;
          $data['image_path'] = IMGFOLDER.'partners/';
          $standard_data = array(
            "partners_row" => $partners_row,
            "image_path" => IMGFOLDER.'partners/'
            );


          if ($partners_count > 0) {
          $smarty->assign('standard_data', $standard_data);
          $smarty->display('partners.tpl');
          }


        }
        // partners


        // events
        if($value['category'] == 'events'){
          $POST['query_params'] = array(
            "active" => 'on'
          );
          $limitter = '';
          if (!empty($value['display_limit_index'])) {
              $limitter = ' LIMIT '.$value['display_limit_index'];
        
          }
          $POST['query_rules'] = ' AND event_date >= NOW() AND child IS NULL ORDER BY event_date ASC'.$limitter;
          $articles_row = $articles->events($POST);

          $POST['query_rules'] = ' AND child IS NULL';
          $all_articles_row = $articles->events($POST);
          $all_articles_count = count($all_articles_row);
          $articles_count = count($articles_row);
          foreach ($articles_row as $key => $dates) {
            $event_dates[] = date('Y-m', strtotime($dates['event_date']));
          }
          if (!empty($event_dates)) {
          $event_dates = array_unique($event_dates);
          }
          // foreach ($event_dates as $key => $month) {
          //   $monthName =  date('Y', strtotime($month));
          //   echo $monthName.'<br>';
          // }

          if (!empty($articles_row)) {

          $smarty->assign('separator_display', 'd-none');
          $smarty->assign('event_dates', $event_dates);
          $smarty->assign('all_articles_count', $all_articles_count);
          $smarty->assign('articles_count', $articles_count);
          $smarty->assign('image_path', IMGFOLDER.'events/');
          $smarty->assign('category_display', $value['display_name']);
          $smarty->assign('category_sub_display', $value['category_sub_display']);
          $smarty->assign('events', $articles_row);
          $smarty->assign('data_masonry', '{"percentPosition": true }');
          $smarty->display('events_index_def.tpl');
          }



        }
        // events

        // contests
        if($value['category'] == 'contests'){
          $POST['query_params'] = array(
            "active" => 'on'
          );
          $limitter = '';
          if (!empty($value['display_limit_index'])) {
              $limitter = ' LIMIT '.$value['display_limit_index'];
        
          }
          $POST['query_rules'] = ' AND full_end >= NOW() AND full_start <= NOW() ORDER BY full_start DESC'.$limitter;
          $articles_row = $articles->activeContests($POST);
          $POST['query_rules'] = ' AND full_end >= NOW() AND full_start <= NOW() ORDER BY full_start DESC';
          $all_articles_row = $articles->activeContests($POST);
          $all_articles_count = count($all_articles_row);
          $articles_count = count($articles_row);
          $data['articles_count'] = $articles_count;
          $data['all_articles_count'] = $all_articles_count;
          $data['category_display'] = $value['display_name'];
          $data['category_sub_display'] = $value['sub_display_name'];
          $data['category'] = $value['category'];
          $data['contests_row'] = $articles_row;
          $data['image_path'] = IMGFOLDER.'contests/';
          $data['sponsors'] = $sponsor_search;

          $POST['query_rules'] = ' AND contest_sponsor = "on" AND full_end >= NOW() AND full_start <= NOW() ORDER BY full_start DESC';
          $sponsored_articles = $articles->activeContests($POST);
          foreach ($sponsored_articles as $key => $sponsored_value) {
            $sponsored_value['contest_sponsors_list'];
             $sponsors_count = count(explode(' ', $sponsored_value['contest_sponsors_list']));
                  $query_fields = array("id");
                  $query_params = explode(' ', $sponsored_value['contest_sponsors_list']);
                  $query_rules = '';
                  $table = 'sponsors';
                  $sponsors_row = $data['sponsors']->searchSponsors($table, $query_params, $query_fields, $query_rules);
          $smarty->assign('sponsors_of_'.$sponsored_value['id'], $sponsors_row);
            // Sponsor or Sponsors
            $d_sponsor = 'Sponsor';
            if($sponsors_count>1){
            $d_sponsor = 'Sponsorzy';
            };
            $smarty->assign('d_sponsor_'.$sponsored_value['id'], $d_sponsor);
            // Sponsor or Sponsors
          }

          $smarty->assign('data', $data);
          $smarty->assign('contests', $articles_row);

          if ($articles_count > 0) {
          $smarty->display($value['index_template'].'.tpl');


          }




        }
        // contests


  }


?>

<?php endif; // $value['subcategory'] == ''?>


<?php if ($value['subcategory'] == 'on'): ?>
<?php 
$subcategories=array();
foreach (leaveIndexableSubcategory($value['category']) as $key => $novalue) {
  $subcategories[] = $key;
}
$subcategory_counter = 0;
  $standard_data = array(
    "subcategorized" => "on",
    "subcategories" => $subcategories,
    "category_name" => $value['display_name'],
    "category_sub_name" => $value['sub_display_name'],
    "category" => $value['category'],
    "image_path" => IMGFOLDER.$value['category'].'/'
  );
  $smarty->assign('standard_data', $standard_data);
foreach (leaveIndexableSubcategory($value['category']) as $key => $sub_value):
$subcategory_count = count(leaveIndexableSubcategory($value['category']));

  $POST['table'] = $value['category'];
  $POST['query_params'] = array(
    "active" => 'on',
    "indexable" => 'on',
    "subcategory" => $sub_value['subcategory']
  );
  $limitter = '';
  if (!empty($sub_value['display_limit_index'])) {
      $limitter = ' LIMIT '.$sub_value['display_limit_index'];

  }

  $POST['query_rules'] = 'ORDER BY custom_order ASC'.$limitter;
  $articles_row = $articles->activeArticles($POST);
  $POST['query_rules'] = '';
  $all_articles_row = $articles->activeArticles($POST);
  $all_articles_count = count($all_articles_row);
  $articles_count = count($articles_row);
  $smarty->assign('all_articles_count_'.$sub_value['subcategory'], $all_articles_count);
  $smarty->assign('articles_count_'.$sub_value['subcategory'], $articles_count);
  $smarty->assign('articles_row_'.$sub_value['subcategory'], $articles_row);
  $smarty->assign('subcat_heading_'.$sub_value['subcategory'], $sub_value['subcategory_display']);
  $smarty->assign('subcat_subheading_'.$sub_value['subcategory'], $sub_value['subcategory_subdisplay']);
  $smarty->assign('subcategory_'.$sub_value['subcategory'], $sub_value['subcategory'].'/');

?>


<?php endforeach; //leaveSubcategory($leave)?>

<?php 
// there we are going to load smarty
  $smarty->display($value['index_template'].'.tpl');
// smarty load ends
?>
<?php endif; //if has subcat THERE ENDS TEMPLATE IF WITH SUBCATS?> 


<?php endforeach; //foreach (CAT_DATA?> 
<?php endif; //!empty(CAT_DATA)?>



<?php
// footer
  // $smarty->display('kontakt.tpl');
  $smarty->display('footer.tpl');

// $this->view("/includes/footer.view.php", $data);

?>




<?php
$this->visitor_cookies("/includes/cookie-banner.inc.php");

$this->view("/includes/essential-js.inc.php", $data);
$db_error_message = $data['messenger']->errorDbMessage();

?>
 <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

<script src="<?=TEMPLATE_FOLDER?>/assets/js/aos.js"></script>


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




 <script>
        AOS.init();
</script>
<script type="text/javascript">
function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+d.toUTCString();
        document.cookie = cname + "=" + cvalue + "; " + expires;
    }

// removes 
mycookieValue = getCookie("34_newsletter_thanx")
if(mycookieValue)
{
    var element = document.getElementById("offcanvasstart");
  element.classList.remove("show");
}
else{


}


function getCookie(name)
{
    var re = new RegExp(name + "=([^;]+)");
    var value = re.exec(document.cookie);
    return (value != null) ? unescape(value[1]) : null;
}

</script>

<script type="text/javascript">
  var myCarousel = document.querySelector('#main-page-carousel')
var carousel = new bootstrap.Carousel(myCarousel, {
  // interval: 1500,
  pause: false
})

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
<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
<?php
$this->view("/socials_includes/google_tag_manager_noscript.php", $data);

?>

  </body>
</html>
