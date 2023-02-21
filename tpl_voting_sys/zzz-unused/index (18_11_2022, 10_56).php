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
<div class="offcanvas offcanvas-start  shadow" tabindex="-1" id="offcanvasstart" aria-labelledby="offcanvasstartLabel" data-bs-backdrop="false" data-bs-scroll="true">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="newsletter_sign_in">Zapisz się do newslettera!</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close" onclick="setCookie('34_newsletter_thanx', 'yes', 30)"></button>
  </div>
  <div class="offcanvas-body row">

    <form class="col-12" action="https://app.getresponse.com/add_subscriber.html" accept-charset="utf-8" method="post">
      <div class="col-12">
        <label for="exampleInputEmail1" class="form-label">Imię</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="first_name">
      </div>
      <div class="col-12">
        <label for="email" class="form-label">email</label>
        <input type="text" class="form-control" id="email" aria-describedby="email" name="email" required>
      </div>
      <!-- Token listy -->
      <!-- Pobierz token na: https://app.getresponse.com/campaign_list.html -->
      <input type="hidden" name="campaign_token" value="rUMxR" />
      <!-- Strona z podziękowaniem (opcjonalnie) -->
      <input type="hidden" name="thankyou_url" value="https://o.tozobacz.pl/newsletter_thank_you"/>
      <!-- Dodaj subskrybenta do cyklu follow up z określonego dnia (opcjonalnie) -->
      <input type="hidden" name="start_day" value="0" />
      <!-- Forward form data to your page (optional) -->
      <input type="hidden" name="forward_data" value="post" />

      <div class="col-12 text-end">
        <!-- Przycisk zapisu -->

        <input onclick="setCookie('34_newsletter_thanx', 'yes', 30)" class="btn btn-sm btn-01 mt-3" type="submit" value="zapisz się"/>
      </div>

    </form>


  </div>
</div>





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
  $standard_data = array(
    "subcategorized" => "",
    "subcategories" => array('no_subcat'),
    "category_name" => $value['display_name'],
    "category_sub_name" => $value['sub_display_name'],
    "category" => $value['category'],
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
          $POST['query_rules'] = ' AND child IS NULL ORDER BY event_date ASC'.$limitter;
          $articles_row = $articles->events($POST);

          $POST['query_rules'] = ' AND child IS NULL';
          $all_articles_row = $articles->events($POST);
          $all_articles_count = count($all_articles_row);
          $articles_count = count($articles_row);

          $smarty->assign('all_articles_count', $all_articles_count);
          $smarty->assign('articles_count', $articles_count);
          $smarty->assign('image_path', IMGFOLDER.'events/');
          $smarty->assign('category_display', $value['display_name']);
          $smarty->assign('category_sub_display', $value['category_sub_display']);
          $smarty->assign('events', $articles_row);
          $smarty->assign('data_masonry', '{"percentPosition": true }');
          $smarty->display('events_index_def.tpl');

              // $this->view("/index_templates/".$value['index_template'].".tpl.php", $data);



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

          // $this->view("/index_templates/".$value['index_template'].".tpl.php", $data);
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
$this->view("/includes/footer.view.php", $data);
?>




<?php
$this->visitor_cookies("/includes/cookie-banner.inc.php");

$this->view("/includes/essential-js.inc.php", $data);
$db_error_message = $data['messenger']->errorDbMessage();

?>
<script src="<?=TEMPLATE_FOLDER?>/assets/js/aos.js"></script>
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
  var myCarousel = document.querySelector('#NewCarousel')
var myCarousel = new bootstrap.Carousel(myCarousel, {
  // interval: 1500,
  pause: false
})



$(document).ready(function(e) {
  $win_w=$(window).width();
  $win_h=$(window).height();
  $('.window-width').html("Window Width : "+$win_w);
  $('.window-height').html("Window Height : "+$win_h);   
});
$(window).resize(function(){
  $win_w=$(window).width();
  $win_h=$(window).height();
  $('.window-width').html("Window Width : "+$win_w);
  $('.window-height').html("Window Height : "+$win_h); 
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>


  </body>
</html>
