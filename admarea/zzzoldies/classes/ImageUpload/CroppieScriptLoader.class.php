<?php
namespace ImageUpload;
class CroppieScriptLoader{
//form and script prefix, width, height

  private $prefix;
  private $croppie_width;
  private $croppie_height;
  private $croppie_viewport_width;
  private $croppie_viewport_height;
  private $decrease_view;
  private $image_quality;
    public function __construct($prefix, $croppie_width, $croppie_height, $decrease_view, $image_quality){
      $this->prefix = $prefix;
      $this->croppie_width = $croppie_width;
      $this->croppie_height = $croppie_height;
      $this->decrease_view = $decrease_view;
      $this->image_quality = $image_quality;
      $this->croppie_viewport_width = number_format($croppie_width/$decrease_view, 2);
      $this->croppie_viewport_height = number_format($croppie_height/$decrease_view, 2);

    }

public function ImageScriptLoader(){
echo <<<HTML
<script type="text/javascript">

var $this->prefix = $("#$this->prefix-croppie-view").croppie({
    enableExif: true,
    enableOrientation: true,
    enforceBoundary: false,

    viewport: { // Default { width: 100, height: 100, type: 'square' } 
        height: "$this->croppie_viewport_height",
        width: "$this->croppie_viewport_width",
    },
    boundary: {
        height: "$this->croppie_viewport_height",
        width: "$this->croppie_viewport_width",
    }

});

$('#$this->prefix-croppie_upload').on('change', function () {
  $('#$this->prefix-croppie_crop').removeClass('d-none');
  $('#$this->prefix-croppie-view').removeClass('d-none');
  $('#$this->prefix-croppie-instruction').addClass('d-none');
  var reader = new FileReader();
    reader.onload = function (e) {
      $this->prefix.croppie('bind',{
        url: e.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
});

// this is for crop only
$('#$this->prefix-croppie_crop').on('click', function (ev) {

    $this->prefix.croppie('result', {
    type: 'base64',
    quality:"$this->image_quality",
    backgroundColor:'white',
     size: { width: "$this->croppie_width", height: "$this->croppie_height" }
  }).then(function (img) {
    $.ajax({
      success: function (data) {

        html = '<img src="' + img + '" / class="img-fluid" style="padding:20px;">';
        $("#$this->prefix-croppie_preview").html(html);
        $("#$this->prefix-image_value").val(img);// this sends value to form
        new bootstrap.Modal($('#$this->prefix-croppie_modal')).show();
      }

    });
  });
});
// this is for crop only
</script>
HTML;
}// ImageFormLoader






}// class ends
