<?php
// do not modify if templating
  $refresh_cookies = $this->loadModel("cookieform");
  $refresh_cookies->refreshVisitorCookies();
  $messages = $this->loadModel("usermessage");
  $data['messenger'] = $messages;
  $contest_data = $this->loadModel("contests_model");
  $contest_row = $contest_data->oneContest($data['id']);
  // metas do not do metas when there is database error
  if (!isset($_SESSION['db-error'])) {
  $data['metatitle'] = $contest_row['contest_name'];
  $data['metadescription'] = $contest_row['contest_short_description'];
  $data['metaimage'] = WEBSITE_ADDRESS.'/'.IMGFOLDER.'contests/'.$contest_row['contest_photo_image'];
  }
    $sponsors_data = $this->loadModel("sponsors");  

// do not modify if templating


?>
<!DOCTYPE html>

<html lang="pl">
  <head>
    <!-- Bootstrap CSS -->

<?php
$this->view("/socials_includes/facebook_pixel_code.php", $data);
$this->view("/socials_includes/google_tag_manager_script.php", $data);

$this->view("/includes/metatags.php", $data);
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

<!-- Load Facebook SDK for JavaScript -->
<div class="" style="position: fixed; top: 0; right: 0; height: 25%; width: 15%; content: ''; z-index: -2;">
  <div class="burst-12" style="margin-top: 15vh"></div>
</div>

<!-- there goes navi -->
<?=$this->view("/includes/".website_navi.".view.php", $data);?>


<div class="container-fluid" style="min-height: 100vh;">
      <?php if (!empty($contest_row)):?>
      <div class="row">

        <!-- content-->
        <div class="col-12 shadow-sm mb-4 bg-white">
          <div class="row">
            <!-- image-->
            <div class="col-md-5 <?=$even?> px-0">
              <img src="<?=IMGFOLDER?>contests/<?=$contest_row['contest_photo_image']?>" class="img-fluid" alt="...">
            </div>

            <div class="col-md-7  d-flex align-items-center dark-text <?=$odd?>">
              <div class="contest-column-padding p-lg-5 w-100">
                <h3 class="dark-heading mb-1"><?=$contest_row['contest_name']?></h3>
                <?php if (!empty($contest_row['contest_sub_name'])):?>
                <h4 class="dark-heading"><?=$contest_row['contest_sub_name']?></h4>
                <?php endif;?>
                <?=$contest_row['contest_short_description']?>
                  <div class="contest-links">
                    <a href="contestphotos/<?=$contest_row['contest_u_id']?>" class="btn btn-sm btn-01">zdjęcia</a>
                    <a href="/userupload/<?=$contest_row['contest_u_id']?>" class="btn btn-sm btn-01">dodaj zdjęcie!</a>
                  </div><!-- contest-links -->

                  <div class="contest-sponsors mt-4">
                      <!-- sponsors-->
                    <?php if ($contest_row['contest_sponsor'] == 'on' && !empty($contest_row['contest_sponsors_list'])):
                      $sponsors_count = count(explode(' ', $contest_row['contest_sponsors_list']));
                        $d_sponsors = 'Sponsor';
                      if ($sponsors_count>1) {
                        $d_sponsors = 'Sponsorzy';
                      }
                      $query_fields = array("id");
                      $query_params = explode(' ', $contest_row['contest_sponsors_list']);
                      $query_rules = '';
                      $table = 'sponsors';
                      $sponsors_row = $sponsors_data->searchSponsors($table, $query_params, $query_fields, $query_rules);

                      ?>
                      <h5 class="card-title mb-3"><?=$d_sponsors?></h5>
                        <div class="row d-flex flex-row">
                        <?php foreach ($sponsors_row as $chuj => $value):?>
                        <a href="<?=$value['sponsor_website']?>" target="blank" class="col-md-3">
                            <img src="<?=IMGFOLDER?>sponsors/<?=$value['sponsor_logo']?>" class="img-fluid" alt="...">
                          </a>

                        <?php endforeach;?>
                        </div>
                    <?php endif;?>
                      <!-- sponsors-->

                  </div><!-- contest-sponsors-->

              </div>
            </div>

          </div>
        </div>
        <!-- content-->


        <!-- award-->
      <?php if ($contest_row['contest_award'] == 'on'):?>

        <div class="col-12 shadow-sm mb-4 bg-white">
          <div class="row">

            <div class="col-md-7  d-flex align-items-center <?=$odd?>">
              <div class="contest-column-padding p-lg-5 w-100">
                <h3 class="dark-heading mb-1"><?=$contest_row['contest_award_name']?></h3>
                <?php if (!empty($contest_row['contest_award_sub_name'])):?>
                <h4 class="dark-heading"><?=$contest_row['contest_award_sub_name']?></h4>
                <?php endif;?>
                <?=$contest_row['contest_award_description']?>
              </div>
            </div>


            <div class="col-md-5 <?=$even?> px-0 text-end">
              <img src="<?=IMGFOLDER?>contests/<?=$contest_row['contest_award_photo']?>" class="img-fluid" alt="...">
            </div>




          </div>
        </div>
      <?php endif; // $contest_row['contest_award'] == 'on'?>
        <!-- award-->



      </div><!-- row ends-->
      <?php endif; ?>
</div><!-- container ends-->


<?php
// footer
$this->view("/includes/footer.view.php", $data);
$this->visitor_cookies("/includes/cookie-banner.inc.php");
$this->view("/includes/essential-js.inc.php", $data);
$db_error_message = $data['messenger']->errorDbMessage();


?>
<script>
  
var btnShareToFb = document.querySelector('.btn-share-to-fb');
btnShareToFb.addEventListener('click',function(event){
  window.open('https://www.facebook.com/share.php?u=<?=WEBSITE_ADDRESS.$_SERVER['REQUEST_URI']?>', '', 'width=500,height=500');
})  
</script>
<?php
$this->view("/socials_includes/google_tag_manager_noscript.php", $data);
?>

  </body>
</html>
