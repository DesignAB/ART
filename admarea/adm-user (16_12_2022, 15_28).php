<?php
  $messages = $this->loadAdmModel("admmessenger");
  $data['messenger'] = $messages;
  $timecontroller = $data['timecontroller'];
$user= $data['user'];
?>
<!DOCTYPE html>

<html lang="pl">
  <head>
    <!-- Bootstrap CSS -->
<?php
// $load_me->loadFileFromIncludes('_includes/all-meta.php');

?>

<?php
include ('adm_includes/all_meta.php');
include ('assets/css/all-css.php');
?>

<link rel="stylesheet" href="admarea/assets/css/croppie.css">
<link rel="stylesheet" href="admarea/assets/css/trumbowyg.css">

    <title><?=$data['page_title']?></title>
  </head>
  <body>
<?php
$this->admInclude("/adm_views/admnavi.view.php", $data);

?>
    <div class="container-lg px-4" style="min-height: 100vh;">
      <div class="row align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 py-3 px-3 mt-4 text-center">
          <a href="adm_users" class="btn btn-success btn-sm mb-3">wróć</a>

          </div>

        <div class="col-12 mb-3 shadow py-md-5 " >
          <div class="row g-0">
        <?php $adm_message = $data['messenger']->admMessage();?>



          <!-- content form -->
          <div class="col-12 border py-3 px-3">
          <h5 class="ps-1 mb-3">Administrator</h5>

                <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                  <input type="hidden" id="id" class="form-control form-control-sm" name="id" value="<?=$user['id'];?>">
                  <input type="hidden" id="id" class="form-control form-control-sm" name="update_data" value="update_data">


                  <!-- name and surname -->
                  <!-- headers -->
                  <div class="col-md-6">
                    <label for="partner_name" class="form-label w-100 ps-1">Imię
                    </label>
                    <textarea type="text" name="adm_f_name" class="form-control ps-1" aria-label="With textarea" rows="1" required><?=$user['adm_f_name'];?></textarea>
                  </div>
                  <div class="col-md-6">
                    <label for="subheader" class="form-label w-100 ps-1">Nazwisko
                    </label>
                    <textarea type="text" name="adm_l_name" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$user['adm_l_name'];?></textarea>
                  </div>

                  <div class="col-md-6">
                    <label for="subheader" class="form-label w-100 ps-1">Email
                    </label>
                    <textarea type="text" name="adm_email" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$user['adm_email'];?></textarea>
                  </div>


                  <!-- headers -->


                  <div class="col-12 text-md-end text-center ">
                    <button id="dane" class="btn btn-sm btn-success register-button">zmień dane!</button>
                  </div>

                </form>
          </div><!-- col 12-->
          <!-- content form -->




          <!-- password form -->
          <div class="col-12 border py-3 px-3 mt-2">
          <h5 class="ps-1 mb-3">Zmiana hasła</h5>

                <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                  <input type="hidden" id="id" class="form-control form-control-sm" name="id" value="<?=$user['id'];?>">
                  <input type="hidden" id="id" class="form-control form-control-sm" name="password_change" value="password_change">


                  <!-- name and surname -->

                  <!-- password -->
                  <div class="col-md-6">
                    <label for="password" class="form-label">Hasło</label>
                      <div class="input-group input-group-sm mb-3">
                        <input type="password" class="form-control form-control-sm" id="password" name="adm_password" required>
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

                  <div class="col-12 text-md-end text-center ">
                    <button id="password button" class="btn btn-sm btn-success register-button">zmień hasło!</button>
                  </div>

                </form>
          </div><!-- col 12-->
          <!-- password form -->



          <!-- rights form -->
          <div class="col-12 border py-3 px-3 mt-2">
          <h5 class="ps-1 mb-3">Zmiana praw</h5>

                <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                  <input type="hidden" id="id" class="form-control form-control-sm" name="id" value="<?=$user['id'];?>">
                  <input type="hidden" id="id" class="form-control form-control-sm" name="rights_change" value="right_change">



                  <!-- right -->
                  <div class="col-md-2">
                    <input class="form-check-input" type="checkbox" value="advanced" id="flexCheckChecked" name="advanced" <?= $data['advanced_checked'];?>>
                    <label class="form-check-label" for="flexCheckChecked" >
                      Advanced
                    </label>
                  </div>
                  <!-- right -->
                  <?php if(in_array('full', $data['adm_rights'])):?>
                  <!-- right full -->
                  <div class="col-md-2">
                    <input class="form-check-input" type="checkbox" value="full" id="full" name="full" <?= $data['full_checked'];?>>
                    <label class="form-check-label" for="full">
                      Full
                    </label>
                  </div>
                  <!-- right full -->
                <?php endif;?>
                  <div class="col-12 text-md-end text-center ">
                    <button id="rights-button" class="btn btn-sm btn-success register-button">zmień prawa!</button>
                  </div>

                </form>
          </div><!-- col 12-->
          <!-- rights form -->



          <!-- image upload form-->
          <?php
          $data['old_image'] = $data['image'];
          $data['prefix'] = 'image';
          $data['form_title'] = 'Logotyp';
          // $this->admInclude("/adm_views/adm-upload-form.php", $data);
          ?>
          <!-- image upload form-->





          </div>
        </div>
      </div>
    </div>

<?php
$this->admInclude("/adm_views/adminfooter.view.php", $navbar_categories);
?>

<?php
    include ('assets/js/essential-js.php');
// admInclude("/assets/js/trumbowyg.js", $data);
?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')
    </script>
  <script src="admarea/assets/js/croppie.js"></script>


<script src="admarea/assets/js/trumbowyg.js"></script>


<script>

$.trumbowyg.svgPath = 'admarea/assets/css/icons.svg'; 

$('.trumbowyg-with-list').trumbowyg({
  
btns: [['bold'], ['h4'], ['h5'], ['p'], ['unorderedList'], ['removeformat'], ['viewHTML'], ['link']],
tagsToRemove: ['table', 'td', 'tr']


}); 
$('.trumbowyg-simple').trumbowyg({
  
btns: [['bold'], ['p'], ['removeformat'], ['viewHTML']],
tagsToRemove: ['table', 'td', 'tr']

}); 



</script>
<?php
  $data['image_height'] = 100;
  $data['image_width'] = 220;
  $data['prefix'] = 'image';
  $data['image_q'] = '1';
  $this->admInclude("/assets/admin-croopie-model-script.php", $data);
?>
<script>
$(document).ready(function(){
    $(".req").hide();

});

var emailMatch = false;
var emailCheck = false;
var passwordMatch = false;
var passwordStrenght = false;

$('form input[name="u_email"]').keyup(function () {
  var email = $(this).val();
var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/igm;
if (re.test(email)) {
  // success
    $('#email-error').addClass("d-none");
    $('.email_confirm').attr("disabled", false);
    emailCheck = true;
} else {
  // error
    // $('.email-error').hide();
    $('#email-error').removeClass("d-none");
    $('.email_confirm').attr("disabled", true);
    emailCheck = false;
}
});

var check = function() {
  if (document.getElementById('u_email').value ==
    document.getElementById('confirm_email').value) {
    document.getElementById('email-repeat-error').style.color = 'green';
    document.getElementById('email-repeat-error').innerHTML = 'sukces';
     emailMatch = true;

  } else {
    document.getElementById('email-repeat-error').style.color = 'tomato';
    document.getElementById('email-repeat-error').innerHTML = 'różne adresy';
     emailMatch = false;
  }
}




$(function() {
  $("#password_repeat").keyup(function() {
  if (document.getElementById('password').value ==
    document.getElementById('password_repeat').value) {
    document.getElementById('password-match').style.color = 'green';
    document.getElementById('password-match').innerHTML = 'OK';
     passwordMatch = true;

  } else {
    document.getElementById('password-match').style.color = 'tomato';
    document.getElementById('password-match').innerHTML = 'hasła się różnią';
     passwordMatch = false;
  }
  });
});
$(document).ready(function () {
  $("#password").on('keyup', function(){
    var number = /([0-9])/;
    var alphabets = /([a-zA-Z])/;
    var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;

    if ($('#password').val().length < 6) {
        $('#password-error').removeClass();
        $('#password-error').addClass('text-danger');
        $('#password-error').html("Hasło musi zawierać conajmniej 6 znaków, liczbę i znak specjalny");
         passwordStrenght = false;


    } else {
        if ($('#password').val().match(number) && $('#password').val().match(alphabets) && $('#password').val().match(special_characters)) {
            $('#password-error').removeClass();
            $('#password-error').addClass('text-success');
            $('#password-error').html("Strong");
             passwordStrenght = true;


        } else {
            // $('#password-strength-status').removeClass();
            // $('#password-strength-status').addClass('medium-password');
            $('#password-error').html("Hasło musi zawierać conajmniej 6 znaków, liczbę i znak specjalny");
        }
    }
  });
});




$('#show-password').click(function(e) {
  $password = $('#password');
  $password_repeat = $('#password_repeat');
  if ($password.prop('type') == 'password') {
    $password.prop('type', 'text');
  } else {
    $password.prop('type', 'password');
  }
  if ($password_repeat.prop('type') == 'password') {
    $password_repeat.prop('type', 'text');
  } else {
    $password_repeat.prop('type', 'password');
  }

  if ($("#password-icon").hasClass("bi-eye")) {
    $('#password-icon').removeClass('bi-eye');
    $('#password-icon').addClass('bi-eye-slash');
  } else {
    $('#password-icon').removeClass('bi-eye-slash');
    $('#password-icon').addClass('bi-eye');
  }
});
$('#register-button').click(function(e) {  // using click function
                                               // on contact form submit button
                                               e.preventDefault();  // stop form from submitting right away

    if (emailCheck == false || passwordStrenght == false || passwordMatch == false || emailMatch == false || $('#input_u_f_name').val().length < 1 || $('#input_u_l_name').val().length < 1) {
      // alert ("bad "  + passwordStrenght + " " + passwordMatch + " " + emailMatch);
      if (emailCheck == false) {
        $('#js-errors').removeClass('d-none');
        // do something
        $('#emailCheck-errors').html("Niepoprawny adres email.");

      }

      if (passwordStrenght == false) {
        // do something
        $('#js-errors').removeClass('d-none');
        $('#passwordStrenght-errors').html("Zbyt słabe hasło.");

      }
      if (passwordMatch == false) {
        // do something
        $('#js-errors').removeClass('d-none');
        $('#passwordMatch-errors').html("Hasła różnią się.");

      }
      if (emailMatch == false) {
        // do something
        $('#js-errors').removeClass('d-none');
        $('#emailMatch-errors').html("Różne adresy email.");

      }
      if ($('#input_u_f_name').val().length < 1) {
        // do something
        $('#js-errors').removeClass('d-none');
        $('#f_name-errors').html("Puste pole imię.");

      }
      if ($('#input_u_l_name').val().length < 1) {
        // do something
        $('#js-errors').removeClass('d-none');
        $('#l_name-errors').html("Puste pole nazwisko.");

      }

    } else {
      $('#register-form').submit();  // you submit form

    }





});
</script>

  </body>
</html>
