<?php
  $refresh_cookies = $this->loadModel("cookieform");
  $refresh_cookies->refreshVisitorCookies();
  $messages = $this->loadModel("usermessage");
  $data['messenger'] = $messages;
  $data_load = $this->loadModel("contests_model");
  $row = $data_load->activeContestsPhotos($data['contest_u_id']);
?>
<!DOCTYPE html>

<html lang="pl">
  <head>
    <!-- Bootstrap CSS -->
<meta name="viewport" content="width=device-width, height=device-height,  initial-scale=1.0, user-scalable=no, user-scalable=0"/>

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



<!-- there goes navi -->
<?=$this->view("/includes/".website_navi.".view.php", $data);?>


    <div class="container-fluid" style="min-height: 100vh;">
        <div class="row heading-row py-3">
          <div class="col-12 text-center text-white" style="">
            <?php if (!empty($row)):?>
            <h1 class="p-3">Zdjęcia</h1>
            <?php endif;?>
            <?php if (empty($row)):?>
            <h1 class="p-3">Nikt jeszcze nie dodał zdjęć.</h1>
            <?php endif;?>

          </div>
        </div>

        <div class="row">

          <!-- cards go here -->
      <?php if (!empty($row)):?>
          <?php $counter=1; foreach ($row as $key ):
          if ($counter % 2 == 0) {
            $even = 'order-1';
            $odd = 'order-0';
          } else{
            $even = 'order-0';
            $odd = 'order-1';
          }
          ?>
          <div class="col-lg-4 col-md-6">

              <div class="card photo-card overflow-hidden">

                  <img src="<?=IMGFOLDER?>/contests/contests_photos_<?=$data['contest_u_id']?>/<?=$key['photo_portrait']?>" class="card-img" alt="..." data-bs-toggle="modal" data-bs-target="#exampleModal<?=$key['photo_u_id']?>">
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal<?=$key['photo_u_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-muted" id="exampleModalLabel"><?=$key['photo_title']?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <img src="<?=IMGFOLDER?>/contests/contests_photos_<?=$data['contest_u_id']?>/<?=$key['photo_portrait']?>" class="img-fluid" alt="...">
      </div>
    </div>
  </div>
</div>
                <div class="card-body photo-card-descr p-3">
                  <h5 class="card-title">
                    <?=$key['photo_title']?>
                    </h5>
                  <p class="card-text">
                    <?=$key['photo_description']?>
                    <br>
                    <?=$key['photo_votes']?> oddanych głosów
                    <br>
                    przesłane przez: <?=$key['photo_author_f_name']?>

                  </p>
                </div>

                  <div class="card-footer border-success">
                <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form "  id="register-form" >
                <input type="hidden" class="form-control form-control" id="password" name="vote_me">
                <input type="hidden" class="form-control form-control" id="password" name="photo_u_id" value="<?=$key['photo_u_id']?>">

                  <div class="col-12 text-center text-lg-start">
                    <button id="register-button" class="btn btn-sm btn-01 register-button">głosuj</button>
                  </div>

                </form>
                  </div>


              </div>

          </div>

          <?php $counter++; endforeach; ?>
          <?php endif; ?>
          <?php if(empty($row)):?>




          <?php endif; ?>

          <!-- cards go here -->




        </div>


    </div><!-- container ends-->


<?php
// footer
$this->view("/includes/footer.view.php", $data);
$this->visitor_cookies("/includes/cookie-banner.inc.php");
$this->view("/includes/essential-js.inc.php", $data);
$db_error_message = $data['messenger']->errorDbMessage();
$vote_message = $data['messenger']->voteDbMessage();


?>
<script src="https://cdn.jsdelivr.net/npm/bs5-lightbox@1.8.0/dist/index.bundle.min.js"></script>

<?php
$this->view("/socials_includes/google_tag_manager_noscript.php", $data);
?>

  </body>
</html>
