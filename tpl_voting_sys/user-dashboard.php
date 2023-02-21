<?php
  $refresh_cookies = $this->loadModel("cookieform");
  $refresh_cookies->refreshVisitorCookies();
  $messages = $this->loadModel("usermessage");
  $data['messenger'] = $messages;
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


<!-- there goes navi -->
<?=$this->view("/includes/".website_navi.".view.php", $data);?>


<div class="container-lg py-5 px-4">
  <div class="row align-items-center justify-content-center" style="min-height: 100vh">
        <div class="col-12 mb-3 shadow py-5 bg-white">
        <?php $error_message = $data['messenger']->errorUserMessage();?>

              <?php if (isset($_SESSION[WEBSITE_NAME.'_user_name'])) {
        $this->view("/includes/user-form.viev.php", $data);
              }?>


        </div>

  </div>
</div>

<?php
// footer
$this->view("/includes/footer.view.php", $data);
$this->visitor_cookies("/includes/cookie-banner.inc.php");
$this->view("/includes/essential-js.inc.php", $data);
// $this->view("/assets/js/user-register.php", $data); // this is js

?>

<!-- user data scripts -->

<script type="application/javascript">

   // add remove
$('#u_is_company').change(function () {
    $('.company').toggleClass("d-none");

});
 // add remove
   // add remove
$('#u_alt_address').change(function () {
    $('.u_alt_address_row').toggleClass("d-none");

});
 // add remove

$(document).ready(function(){
    $(".req").hide();
});

$('form input[name="u_alt_email"]').on("keydown keyup change", function(){
  var email = $(this).val();
var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/igm;

if (re.test(email)) {
  // success
    $('.email-field-error').addClass("d-none");
    $('.email_confirm').attr("disabled", false);
    $('.email_confirm').attr("required", true);
    // $('.email_confirm').focus();
} else {
  // error
    // $('.email-field-error').hide();
    $('.email-field-error').removeClass("d-none");
    $('.email_confirm').attr("disabled", true);
    $('.email_confirm').attr("required", false);
}


});

// check if alt_email is eqial to u_email
$('form input[name="u_alt_email"]').change(function () {
  var u_alt_email = $(this).val();
  var useremail = '<?php echo $data['u_email'];?>';
 if (u_alt_email === useremail) {
     $('.email_confirm').attr("disabled", true);
    $('.email_confirm').attr("required", false);
    $('form input[name="u_alt_email"]').val('');
    alert('Alternatywny adres email nie może być taki sam jak podstawowy adres email');

 }


});


// check if alt_email is eqial to u_email




var check = function() {
  if (document.getElementById('u_alt_email').value ==
    document.getElementById('confirm_email').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'OK';
  } else {
    document.getElementById('message').style.color = 'tomato';
    document.getElementById('message').innerHTML = 'różne adresy';
  }
}


$(function() {  
  $(".password_repeat").keyup(function() {


  if (document.getElementById('password').value ==
    document.getElementById('password_repeat').value) {
    document.getElementById('pwd_match').style.color = 'green';
    document.getElementById('pwd_match').innerHTML = 'OK';
  } else {
    document.getElementById('pwd_match').style.color = 'tomato';
    document.getElementById('pwd_match').innerHTML = 'hasła się różnią';
  }
  });


});



$(".u_postal_1").keyup(function () {
    if (this.value.length == this.maxLength) {
      $('.u_postal_2').focus();
    }
});
$(".u_alt_postal_1").keyup(function () {
    if (this.value.length == this.maxLength) {
      $('.u_alt_postal_2').focus();
    }
});


</script>
<script>
// onkeyup="addHyphen(this)" <= add this to input field
// script adds '-' every three digits

  function addHyphen (element) {
      let ele = document.getElementById(element.id);
        ele = ele.value.split('-').join('');    // Remove dash (-) if mistakenly entered.

        let finalVal = ele.match(/.{1,3}/g).join('-');
        document.getElementById(element.id).value = finalVal;
    }
  function postal (element) {
      let ele = document.getElementById(element.id);
        ele = ele.value.split('-').join('');    // Remove dash (-) if mistakenly entered.

        let finalVal = ele.match(/.{1,2}/g).join('-');
        document.getElementById(element.id).value = finalVal;
    }

</script>

<script>
// onkeyup="nospaces(this)" <= add this to input field
// script disable spaces in input field

// function nospaces(t){
//   if(t.value.match(/[^0-9\.+]/g)){
//     t.value=t.value.replace(/[^0-9\.+]/g,'');
//   }

// }


// this is for tel no

var minLength = 9;
var maxLength = 11;

$("#u_tel_number_01").on("keydown keyup change", function(){
    var value = $(this).val();
    // removes spase and letters but leaves +
      if(this.value.match(/[^0-9\.+]/g)){
        this.value=this.value.replace(/[^0-9\.+]/g,'');
      }
    // removes spase and letters but leaves +

    if (value.length < minLength)
        $("#u_tel_number_01").next("span").text("Text is short!");
    else
        $("#u_tel_number_01").next("span").text("Text is valid");
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


});




</script>
<!-- user data scripts -->
<?php
$this->view("/socials_includes/google_tag_manager_noscript.php", $data);
?>

  </body>
</html>
