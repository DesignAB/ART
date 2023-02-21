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
            $('#password-error').html("Medium (should include alphabets, numbers and special characters or some combination.)");
        }
    }
  });
});


document.getElementById('agreement').onchange = function() {
    if ( document.getElementById('agreement').checked === true && document.getElementById('agreement2').checked === true ) {
      $('.register-button').attr("disabled", false);

    }else{
      $('.register-button').attr("disabled", true);
      // alert("NIE teraz!");

    }
};
document.getElementById('agreement2').onchange = function() {
    if ( document.getElementById('agreement').checked === true && document.getElementById('agreement2').checked === true ) {
      $('.register-button').attr("disabled", false);

    }else{
      $('.register-button').attr("disabled", true);
      // alert("NIE teraz!2");

    }
};


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
