<script type="text/javascript">

var viewportH = "<?=$data['height']?>";
 var viewportW = "<?=$data['width']?>";
  var previewWidth = document.getElementById('<?=$data['prefix']?>-croppie-data').clientWidth;


    // var newWidth = window.innerWidth;
    // var newHeight = window.innerHeight;
    if (previewWidth < viewportW) {

          // alert(previewWidth + 'zmniejszaj do:' + viewportW);
          var a = (viewportW / previewWidth);
          var b = a.toFixed(2);
          var newVH = (viewportH / b).toFixed(0) - 20;
          var newVW = (viewportW / b).toFixed(0) - 20;
          // alert(newVH + ' ' + newVW + ' ' + previewWidth);
          // location.reload();
    }else{


    }

var <?=$data['prefix']?> = $("#<?=$data['prefix']?>-croppie-view").croppie(
{
    enableExif: true,
    enableOrientation: true,
    viewport: { // Default { width: 100, height: 100, type: 'square' }
        height: "<?=$data['height']?>",
        width: "<?=$data['width']?>",
    },
    boundary: {
        height: "<?=$data['height']?>",
        width: "<?=$data['width']?>",
    }
});



$('#<?=$data['prefix']?>-croppie_upload').on('change', function () {


  $('#<?=$data['prefix']?>-croppie_crop').removeClass('d-none');
  $('#<?=$data['prefix']?>-croppie-view').removeClass('d-none');
  $('#<?=$data['prefix']?>-croppie-instruction').addClass('d-none');
  var reader = new FileReader();
    reader.onload = function (e) {
      <?=$data['prefix']?>.croppie('bind',{
        url: e.target.result
      }).then(function(){

    if (previewWidth < viewportW) {
    $(".cr-boundary").css("width",newVW);
    $(".cr-boundary").css("height",newVH);
    }

      });
    }
    reader.readAsDataURL(this.files[0]);
});

// this is for crop only
$('#<?=$data['prefix']?>-croppie_crop').on('click', function (ev) {

    <?=$data['prefix']?>.croppie('result', {
    type: 'base64',
    quality:"<?=$data['image_q']?>",
    backgroundColor:'white',
     size: { width: "<?=$data['width']?>", height: "<?=$data['height']?>" }
  }).then(function (img) {
    $.ajax({
      success: function (data) {
        html = '<img src="' + img + '" / class="img-fluid">';
        $("#<?=$data['prefix']?>-croppie_preview").html(html);
        $("#image_<?=$data['prefix']?>_value").val(img);// this sends value to form
        new bootstrap.Modal($('#croppie_<?=$data['prefix']?>_modal')).show();
      }

    });
  });
});
// this is for crop only
</script>
