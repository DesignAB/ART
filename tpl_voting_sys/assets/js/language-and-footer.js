<script>
function setLanguage(key, value) {
  var expires = new Date();

    expires.setTime(expires.getTime() + 86400000); //1 month
    document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();

}

$(".language").click(function(){
  var lang = 'pl';
  lang = $(this).attr('lang');;

  setLanguage('<?php echo CookiesLanguagePrefix;?>', lang);
  location.reload();

});

this is for footer form

document.getElementById('footer-agreement').onchange = function() {
    if ( document.getElementById('footer-agreement').checked === true && document.getElementById('footer-agreement2').checked === true ) {
      $('.footer-button').attr("disabled", false);

    }else{
      $('.footer-button').attr("disabled", true);
      // alert("NIE teraz!");

    }
};
document.getElementById('footer-agreement2').onchange = function() {
    if ( document.getElementById('footer-agreement').checked === true && document.getElementById('footer-agreement2').checked === true ) {
      $('.footer-button').attr("disabled", false);

    }else{
      $('.footer-button').attr("disabled", true);
      // alert("NIE teraz!2");

    }
};



</script>