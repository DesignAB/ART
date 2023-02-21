
<script type="text/javascript">

var <?=$data['prefix'];?> = $("#<?=$data['prefix'];?>-croppie-view").croppie({
    enableExif: true,
    enableOrientation: true,
    enforceBoundary: false,

    viewport: { // Default { width: 100, height: 100, type: 'square' } 
    // transport unique vars here
        width: "<?=$data['image_width'];?>", 
        height: "<?=$data['image_height'];?>",
    // transport unique vars here

    },
    boundary: {
    // transport unique vars here
        width: "<?=$data['image_width'];?>",
        height: "<?=$data['image_height'];?>",
    // transport unique vars here
    }

});

$('#<?=$data['prefix'];?>-croppie_upload').on('change', function () {
  $('#<?=$data['prefix'];?>-croppie_crop').removeClass('d-none');
  $('#<?=$data['prefix'];?>-croppie-view').removeClass('d-none');
  $('#<?=$data['prefix'];?>-croppie-instruction').addClass('d-none');
  var reader = new FileReader();
    reader.onload = function (e) {
      <?=$data['prefix'];?>.croppie('bind',{
        url: e.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
});

// this is for crop only
$('#<?=$data['prefix'];?>-croppie_crop').on('click', function (ev) {

    <?=$data['prefix'];?>.croppie('result', {
    type: 'base64',
    quality: <?=$data['image_q'];?>,
    backgroundColor:'white',
    // transport unique vars here
     size: { width: "<?=$data['image_width'];?>", height: "<?=$data['image_height'];?>" }
  }).then(function (img) {
    $.ajax({
      success: function (data) {

        html = '<img src="' + img + '" / class="img-fluid" style="padding:20px;">';
        $("#<?=$data['prefix'];?>-croppie_preview").html(html);
        $("#<?=$data['prefix'];?>-image_value").val(img);// this sends value to form
        new bootstrap.Modal($('#<?=$data['prefix'];?>-croppie_modal')).show();
      }

    });
  });
});
// this is for crop only
</script>