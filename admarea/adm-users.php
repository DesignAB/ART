<?php
  $messages = $this->loadAdmModel("admmessenger");
  $data['messenger'] = $messages;
$shuffler = str_shuffle('!@#$%^&*()_+{}][\|><:;');
$shuffla = substr($shuffler, 0, 1);
$shuffler2 = str_shuffle('ABCDEFGHIJKLMNOPRSTUWXYZabcdefghijklmnoprstuwxyz');
$shuffla2 = substr($shuffler2, 0, 1);
$token = $shuffla2.'_'.random_token(6).'_'.$shuffla;

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
    <title><?=$data['page_title']?></title>
  </head>
  <body>
<?php
$this->admInclude("/adm_views/admnavi.view.php", $data);


?>
    <div class="container-lg px-4" style="min-height: 100vh;">
      <div class="row align-items-center justify-content-center" style="min-height: 100vh;">
<!-- create_modal -->
<div class="modal fade" id="create_modal" tabindex="-1" aria-labelledby="create_modal" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="create_modal">Dodajesz administratora</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form method="POST">
            <input type="hidden" name="add_user">


            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Adres email</label>
              <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="adm_email" required>
            </div>

            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Imię</label>
              <input type="text" class="form-control" placeholder="Imię" aria-label="Imię" aria-describedby="basic-addon1" name="adm_f_name" required>
            </div>

            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nazwisko</label>
              <input type="text" class="form-control" placeholder="nazwisko" aria-label="nazwisko" aria-describedby="basic-addon1"  name="adm_l_name" >
            </div>
                  <div class="mb-3 mt-2">
                    <h4>Podpowiedź hasła: <?= $token;?></h4>
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">Hasło</label>
                      <div class="input-group input-group-sm mb-3">
                        <input type="password" class="form-control form-control-sm" id="password" name="adm_password" required>
                        <span class="input-group-text input-group-text-sm" id="show-password"><i id="password-icon" class="bi-eye text-primary"></i></span>
                      </div>
                    <label id="password-error" for="password" class="text-muted">&nbsp;</label>
                  </div>

                  <div class="mb-3">
                    <label for="password_repeat" class="form-label">Potwierdź hasło</label>
                    <input type="password" class="form-control form-control-sm" id="password_repeat" name="password_repeat" required>
                    <label id="password-match" for="password_repeat" class="form-label">&nbsp;</label>
                  </div>



      </div>
      <div class="modal-footer">
              <button type="submit" class="btn btn-success btn-sm">dodaj</button>

      </div><!-- modal footer -->
          </form>


    </div>
  </div>
</div>




        <div class="col-12 mb-3 shadow py-md-5 " >
          <div class="row g-0">
        <?php $adm_message = $data['messenger']->admMessage();?>
        <div class="col-12 text-center">
              <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#create_modal">dodaj administratora</button>
      </div>
    
    <form action="" method="POST"  class="row">
      <input type="hidden" name="table" value="<?=$data['table']?>">
      <input type="hidden" name="order_us">
      <div class="col-12 text-center mb-3">
      </div>


          <?php if (!empty($data['all_users'])):?>
            <?php 
            ?>
          <div id="sortable">
          <?php foreach ($data['all_users'] as $key => $value):?>
          <?php
          $is_active = 'text-success';
          if ($value['adm_status'] =='suspended') {
          $is_active = 'text-danger';
          }
          if ($value['adm_status'] =='new') {
          $is_active = 'text-primary';
          }

          ?>

            <div class="new-sorted ui-state-default">
            <input class="the_one" type="hidden" name="the_order[<?=$value['id']?>]" value="<?=$value['id']?>">
            <div class="col-12 border p-3 my-3">
              <div class="d-flex flex-row">
                <div class="pe-3">
                    <h5 class="m-0"><?=$value['adm_f_name']?> <?=$value['adm_l_name']?></h5>
                </div>
                <div class="flex-grow-1">
                    <p class="m-0">status: <i class="bi bi-circle-fill <?=$is_active?>"></i></p>
                </div>
                <div class="">
                      <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete_<?=$value['id'];?>_modal">
                        usuń
                      </button>
                  <a href="/adm_user/<?=$value['id']?>" class="btn btn-primary btn-sm">edytuj</a>
                </div>

              </div>
            </div>
        </div>


          <?php endforeach;?>
        </div><!-- sortable ends-->

          <?php endif;?>

    </form>


          </div>
        </div>
      </div>
    </div>
    <?php foreach ($data['all_users'] as $key => $value):?>
<!-- modal to delete-->
<div class="modal fade" id="delete_<?=$value['id'];?>_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Usuwasz:</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <h5 class="modal-title" id="exampleModalLabel"><?=$value['adm_f_name'];?> <?=$value['adm_l_name'];?></h5>

          <form action="" method="POST"  class="row">
            <input type="hidden" name="id" value="<?=$value['id']?>">
            <input type="hidden" name="delete_me">
      </div>


      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">usuń</button>
        <button type="button" class="btn btn-primary"  data-bs-dismiss="modal">jednak nie</button>
      </div>
          </form>


    </div>
  </div>
</div>

<!-- modal to delete-->
    <?php endforeach;?>



<?php
$this->admInclude("/adm_views/adminfooter.view.php", $navbar_categories);
?>

<?php
    include ('assets/js/essential-js.php');

?>
<?php if (empty($data['category_id'])):?>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?php endif;?>
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
