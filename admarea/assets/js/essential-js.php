<!-- Optional JavaScript; choose one of the two! -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<!-- Option 1: Bootstrap Bundle with Popper -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

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
// $(document).ready(function(){
//     $('.testowy').on('click',function(){
//         alert($(this).attr('lang'));
//     });
// });

</script>
