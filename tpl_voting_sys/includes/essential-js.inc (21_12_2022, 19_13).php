<!-- Optional JavaScript; choose one of the two! -->
<link rel="preconnect" href="https://code.jquery.com/">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<script type="text/javascript">
// cookie modal
// removes 
mycookiemodal = getCookie("<?= CookiesVisitorPrefix;?>")
if(mycookiemodal)
{

}
else{

  let modal = bootstrap.Modal.getOrCreateInstance(document.getElementById('staticBackdrop')) // Returns a Bootstrap modal instance
// Show or hide:
modal.show();

}


function getCookie(name)
{
    var re = new RegExp(name + "=([^;]+)");
    var value = re.exec(document.cookie);
    return (value != null) ? unescape(value[1]) : null;
}
// cookie modal

</script>
<script type="text/javascript">
$(function() {
    var header = $(".navbar");
    var hamburger_inner = $(".hamburger-inner");
      var navbar1 = $("#navbar1");



    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
        if (scroll >= 550) {
            header.removeClass("bg-blue");
            header.addClass("bg-blue-100");
            hamburger_inner.addClass("scrolled");

            navbar1.removeClass("shadow-sm");
            navbar1.addClass("shadow");


            // this is when scrolled
        } else {
            header.addClass("bg-blue");
            header.removeClass("bg-blue-100");
            hamburger_inner.removeClass("scrolled");
            navbar1.addClass("shadow-sm");
            navbar1.removeClass("shadow");



        }
    });
  
});


  $('#agree_two').change(function () {
  if ($(this).is(':checked')) {
    // success
    // alert("success");
  $('.footer-button').attr("disabled", false);
  } else {
    // error
    // alert("error");
  $('.footer-button').attr("disabled", true);

  }

});

</script>
