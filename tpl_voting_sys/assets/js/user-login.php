<script>
$(document).ready(function(){
    $(".req").hide();

});

$('#show-password').click(function(e) {
  $password = $('#password');
  if ($password.prop('type') == 'password') {
    $password.prop('type', 'text');
  } else {
    $password.prop('type', 'password');
  }

  if ($("#password-icon").hasClass("bi-eye")) {
    $('#password-icon').removeClass('bi-eye');
    $('#password-icon').addClass('bi-eye-slash');
  } else {
    $('#password-icon').removeClass('bi-eye-slash');
    $('#password-icon').addClass('bi-eye');
  }
});
</script>