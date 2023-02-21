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
$this->view("/socials_includes/facebook_pixel_code.php", $data);
$this->view("/socials_includes/google_tag_manager_script.php", $data);

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
<svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-incognito" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="m4.736 1.968-.892 3.269-.014.058C2.113 5.568 1 6.006 1 6.5 1 7.328 4.134 8 8 8s7-.672 7-1.5c0-.494-1.113-.932-2.83-1.205a1.032 1.032 0 0 0-.014-.058l-.892-3.27c-.146-.533-.698-.849-1.239-.734C9.411 1.363 8.62 1.5 8 1.5c-.62 0-1.411-.136-2.025-.267-.541-.115-1.093.2-1.239.735Zm.015 3.867a.25.25 0 0 1 .274-.224c.9.092 1.91.143 2.975.143a29.58 29.58 0 0 0 2.975-.143.25.25 0 0 1 .05.498c-.918.093-1.944.145-3.025.145s-2.107-.052-3.025-.145a.25.25 0 0 1-.224-.274ZM3.5 10h2a.5.5 0 0 1 .5.5v1a1.5 1.5 0 0 1-3 0v-1a.5.5 0 0 1 .5-.5Zm-1.5.5c0-.175.03-.344.085-.5H2a.5.5 0 0 1 0-1h3.5a1.5 1.5 0 0 1 1.488 1.312 3.5 3.5 0 0 1 2.024 0A1.5 1.5 0 0 1 10.5 9H14a.5.5 0 0 1 0 1h-.085c.055.156.085.325.085.5v1a2.5 2.5 0 0 1-5 0v-.14l-.21-.07a2.5 2.5 0 0 0-1.58 0l-.21.07v.14a2.5 2.5 0 0 1-5 0v-1Zm8.5-.5h2a.5.5 0 0 1 .5.5v1a1.5 1.5 0 0 1-3 0v-1a.5.5 0 0 1 .5-.5Z"/>
</svg>

            </div><!-- col-md-4-->
            <div class="col-lg-8">
            <?php $error_message = $data['messenger']->errorUserMessage();?>
              <div class="card-body dark-text">
                <h2 class="card-title my-md-5 my-3 dark-heading">Rejestracja użytkownika!</h2>
                <div id="js-errors" class="alert alert-danger d-none" role="alert">
                  <p id="emailCheck-errors"></p>
                  <p id="passwordStrenght-errors"></p>
                  <p id="passwordMatch-errors"></p>
                  <p id="emailMatch-errors"></p>
                  <p id="f_name-errors"></p>
                  <p id="l_name-errors"></p>
                </div>

                <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form " >
                  <input type="hidden" name="register">

                  <div class="col-md-12 mb-3 mb-md-0 req" style="height: 0px; opacity:0;">
                    <label class="text-danger" for="important">your_type</label>
                    <input type="text" id="important" class="form-control form-control-sm" name="your_type">
                  </div>
                  <!-- name and surname -->
                  <div class="col-md-6">
                    <label for="input_u_f_name" class="form-label">Imię</label>
                    <input type="text" class="form-control form-control-sm" id="input_u_f_name" name="u_f_name" required>
                  </div>
                  <div class="col-md-6">
                    <label for="input_u_l_name" class="form-label">Nazwisko</label>
                    <input type="text" class="form-control form-control-sm" id="input_u_l_name" name="u_l_name" required>
                  </div>
                  <!-- name and surname -->
                  <!-- email -->
                  <div class="col-md-6">
                    <label for="inputEmail" class="form-label">Email
                    </label>
                    <input type="email" class="form-control form-control-sm" id="u_email" name="u_email" required>
                    <label id="email-error" class="email-field-error msg success text-danger d-none">Niepoprawny email!</label>

                  </div>

                  <div class="col-md-6">
                    <label for="inputEmail_repeat" class="form-label">Powtórz email
                    </label>
                    <input type="email" class="form-control form-control-sm email_confirm" id="confirm_email" name="email_repeat" required disabled onkeyup='check();'>
                    <label id='email-repeat-error'></label>
                  </div>
                  <!-- email -->

                  <!-- password -->
                  <div class="col-md-6">
                    <label for="password" class="form-label">Hasło</label>
                      <div class="input-group input-group-sm mb-3">
                      <input type="password" class="form-control form-control-sm" id="password" name="u_password" required>
                      <span class="input-group-text input-group-text-sm" id="show-password"><i id="password-icon" class="bi-eye text-primary"></i></span>
                    </div>
                    <label id="password-error" for="password" class="text-muted">&nbsp;</label>
                  </div>

                  <div class="col-md-6">
                    <label for="password_repeat" class="form-label">Potwierdź hasło</label>
                    <input type="password" class="form-control form-control-sm" id="password_repeat" name="password_repeat" required>
                    <label id="password-match" for="password_repeat" class="form-label">&nbsp;</label>


                  </div>
                  <!-- password -->


                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="agreement" required>
                      <label class="form-check-label" for="agreement">
                        Zgoda A
                      </label>
                      <p class="small">
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
                      </p>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="agreement2" required>
                      <label class="form-check-label" for="agreement2">
                        Zgoda B
                      </label>
                      <p class="small">
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                      </p>

                    </div>
                  </div>

                  <div class="col-12">

                    <input type="submit" name="login-submit" value="zmień" class="btn btn-primary register-button mb-3 md-md-0 text-white">

                  </div>

                </form>

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
$this->view("/assets/js/user-login.php", $data); // this is js
$this->view("/assets/js/user-register.php", $data); // this is js
?>
<?php
$this->view("/socials_includes/google_tag_manager_noscript.php", $data);
?>

  </body>
</html>
