<?php
  $refresh_cookies = $this->loadModel("cookieform");
  $refresh_cookies->refreshVisitorCookies();
  $messages = $this->loadModel("usermessage");
  $data['messenger'] = $messages;
?>
<!DOCTYPE html>

<html lang="pl">
  <head>
<meta name="viewport" content="width=device-width, height=device-height,  initial-scale=1.0, user-scalable=no;user-scalable=0;"/>
    <!-- Bootstrap CSS -->
<?php
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

<div class="container-lg py-5 px-4">
  <div class="row align-items-center justify-content-center" style="min-height: 100vh">


        <div class="col-12 mb-3 shadow py-md-5 bg-white">
          <div class="row g-0">
            <div class="col-md-4 d-none d-md-flex align-items-center justify-content-center">
              <!-- <img src="..." class="img-fluid" alt="..."> -->
<svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
</svg>
            </div><!-- col-md-4-->

            <div class="col-lg-8">
              <div class="card-body">
                <h2 class="card-title my-md-5 my-3">Dziękujemy <?= $data['first_name'];?></h2>
                <h3 class="card-title my-md-5 my-3">Twój adres email <?= $data['email'];?> został dodany do naszej listy newslettera.</h3>




              </div>
            </div>
          </div>
        </div>
  </div>
</div>

<?php
// footer
$this->view("/includes/footer.view.php", $data);
$this->visitor_cookies("/includes/cookie-banner.inc.php");
$this->view("/includes/essential-js.inc.php", $data);
?>

  </body>
</html>
