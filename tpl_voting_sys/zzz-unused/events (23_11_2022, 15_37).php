<?php
  $refresh_cookies = $this->loadModel("cookieform");
  $refresh_cookies->refreshVisitorCookies();
  $data['messenger'] = $messages;
  $events = $data['events'];
//   print_r($event); exit();
?>
<!DOCTYPE html>

<html lang="pl">
  <head>

<?php
$this->view("/includes/metatags-index.php", $data);
include (TEMPLATE_FOLDER.'/assets/css/all-website-css.php');

?>

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
$this->view("/includes/".website_navi.".view.php", $data);
?>
<div class="container-lg">
    <div class="row">

<?php if(!empty($events)):?>
<?php foreach ($events as $key => $value):?>
    <?php if(empty($value['child'])):?>

    <div class="card mb-3 shadow">
        <div class="row px-0">

            <div class="col-md-2 px-0 d-flex align-items-center">
            <img src="<?=IMGFOLDER.'events/'.$value['uploaded_image'];?>" class="img-fluid shadow-sm" alt="...">
            </div>

            <div class="col-md-10 d-flex align-items-center ps-md-5">
                <div class="card-body">
                    <div class="row in-card-body">
                        <div class="col-md-6">
                        <h5 class="card-title"><?= $value['artist_name']?></h5>
                        <h6 class="card-title "><?= $value['hall_full_name']?> <?=$value['custom_event_date']?></h6>
                        </div>
                        <div class="col-md-6">
                            <a href="<?='https://bilety.34art.pl/event/view/id/'.$value['event_id'];?>" class="btn btn-sm btn-01 mt-3 dark_heading_color">kup <?=date('H:i',strtotime($value['custom_event_time']))?></a>
                            <?php if(!empty($value['parent_to'])):?>
                                <a href="<?='https://bilety.34art.pl/event/view/id/'.$value['parent_to'];?>" class="btn btn-sm btn-01 mt-3 dark_heading_color">kup <?=date('H:i',strtotime($value['child_hour']))?></a>
                            <?php endif;?>

                            <button class="btn btn-sm btn-01 mt-3 dark_heading_color" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?=$value['event_id']?>" aria-expanded="true" aria-controls="collapseOne">szczegóły</button>
                        </div>
                        <div class="col-12">
                            <!-- accordion for description -->
                                    <div class="accordion-item">

                                        <div id="collapse<?=$value['event_id']?>" class="accordion-collapse collapse" aria-labelledby="headingOne">
                                        <div class="accordion-body">
                                        <p class="card-text"><?= $value['artist_description']?></p>
                                        </div>
                                        </div>
                                    </div>

                            <!-- accordion for description -->
                        </div>
                    </div><!-- row in-card-body -->

                </div><!-- card-body ends-->
            </div>


        </div>
    </div><!-- card ends -->


    <?php endif; //empty($value['child']?>
<?php endforeach; //foreach ($events as $key => $value)?>
<?php endif; //if(!empty($events))?>


    </div><!-- row ends -->
</div><!-- container ends-->







<?php
// footer
$this->view("/includes/footer.view.php", $data);
$this->visitor_cookies("/includes/cookie-banner.inc.php");
$this->view("/includes/essential-js.inc.php", $data);
?>
<script type="text/javascript">

</script>
  </body>
</html>
