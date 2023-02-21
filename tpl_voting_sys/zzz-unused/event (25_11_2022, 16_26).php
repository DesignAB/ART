<?php
  $refresh_cookies = $this->loadModel("cookieform");
  $refresh_cookies->refreshVisitorCookies();
  $data['messenger'] = $messages;
    $event = $data['event'];

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

  // $smarty->assign('data', $data);
  // $smarty->display($data['template'].$data['im_single'].'.tpl');

?>

<div class="container-lg">

  <!-- footing-->
  <div class="row">
        <div class="col-12" style="height: 60px;"></div>

    <div class="col-12 text-center d-flex flex-column align-items-center justify-content-center heading   my-3 py-5 aos-animate">
      <div class="heading-effect d-flex justify-content-center" data-aos="aos-heading" data-aos-offset="-100" data-aos-once="false" data-aos-duration="300" data-aos-delay="300" data-aos-anchor-placement="top-center"><span data-aos="aos-heading-dot" data-aos-offset="-100" data-aos-once="false" data-aos-duration="300" data-aos-delay="200" data-aos-anchor-placement="top-center"><p>•</p></span>
      </div>
    </div>
  </div>
  <!-- footing-->

    <div class="row">
    <div class="card mb-3 shadow mt-md-3 border-0">
        <div class="row px-0">


            <div class="col-md-4 px-0 d-flex align-items-center">
            <img src="<?=IMGFOLDER.'events/'.$event['uploaded_image'];?>" class="img-fluid shadow-sm" alt="...">
            </div>

            <div class="col-md-8 d-flex align-items-center">
                <div class="card-body">
                <h5 class="card-title"><?= $event['artist_name']?></h5>
                <hr>
                <h6 class="card-title"><?= $event['hall_full_name']?> <?=$event['custom_event_date']?></h6>
                <a href="<?='https://bilety.34art.pl/event/view/id/'.$event['event_id'];?>" class="btn btn-danger btn-sm rounded-0">kup bilet <?=date('H:i',strtotime($event['custom_event_time']))?></a>
                <?php if(!empty($event['parent_to'])):?>
                    <a href="<?='https://bilety.34art.pl/event/view/id/'.$event['parent_to'];?>" class="btn btn-danger btn-sm rounded-0">kup bilet <?=date('H:i',strtotime($event['child_hour']))?></a>

                <?php endif;?>
                <hr>

                    <p class="card-text"><?= $event['artist_description']?></p>
                </div>
            </div>


        </div>
    </div><!-- card ends -->




    </div><!-- row ends -->
    <div class="row for-similar-cards row-cols-1 row-cols-md-3 row-cols-lg-4 g-4 mt-2">
        <?php foreach ($data['similar_events'] as $key => $value):?>
        <?php $seo_link = createLinkForMe($value['artist_name'])?>
          <div class="col">

            <div class="card similar-card h-100 border-0 shadow bg1 text-white">
                <div class="card-body">
                  <h6 class="card-title mb-1"><?=$value['artist_name'];?></h6>
                  <p class="card-text"><?=$value['hall_full_name'];?><br><?=$value['hall_city'];?></p>
                  <a href="event/<?=$seo_link;?>/<?=$value['event_id'];?>" class="stretched-link"></a>
                </div>
                <div class="card-footer bg-transparent">
                <small class=" text-white"><?=$value['custom_event_date'];?> <?=$value['event_hour'];?></small>
                </div>

            </div>

          </div>  <!-- .col for-similar-cards-->




        <?php endforeach;?>


    </div><!-- row for-similar-cards-->
  <!-- footing-->
  <div class="row">
    <div class="col-12 text-center d-flex flex-column align-items-center justify-content-center heading  my-5 mb-md-5 mt-md-5 py-5 aos-animate">
      <div class="heading-effect d-flex justify-content-center" data-aos="aos-heading" data-aos-offset="-100" data-aos-once="false" data-aos-duration="300" data-aos-delay="0" data-aos-anchor-placement="top-center"><span data-aos="aos-heading-dot" data-aos-offset="-100" data-aos-once="false" data-aos-duration="300" data-aos-delay="0" data-aos-anchor-placement="top-center"><p>•</p></span>
      </div>
    </div>
  </div>
  <!-- footing-->

</div><!-- container ends-->






<?php
// footer
$this->view("/includes/footer.view.php", $data);
$this->visitor_cookies("/includes/cookie-banner.inc.php");
$this->view("/includes/essential-js.inc.php", $data);
?>
<script src="<?=TEMPLATE_FOLDER?>/assets/js/aos.js"></script>
 <script>
        AOS.init();
</script>
  </body>
</html>
