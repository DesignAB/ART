<?php
namespace ImageUpload;
class CroppieFormLoader{
//form and script prefix, width, height

  private $prefix;
  private $id;
  private $table;
  private $form_title;
  private $uploaded_image;
  private $image_path;
  private $back_page;
    public function __construct($prefix, $id, $table, $uploaded_image, $back_page, $form_title){
      $this->prefix = $prefix;
      $this->id = $id;
      $this->table = $table;
      $this->form_title = $form_title;
      $this->uploaded_image = $uploaded_image;
      $this->back_page = $back_page;
      $this->image_path = IMGFOLDER;
}

public function ImageFormLoader(){

  if (!empty($this->uploaded_image)) {
    $d_image = <<<HTML
<img src="../$this->image_path$this->table/$this->uploaded_image" class="img-fluid py-3" alt="\F428">
HTML;
  } else{
    $d_image = <<<HTML
            <h1 class="mt-5 text-muted"><i class="bi bi-image-alt"></i></h1>
            <p class="mb-5">Brak zdjęcia</p>          
HTML;
  }


echo <<<HTML
          <!-- one form -->
<div class="col-12 separator mt-3"></div>
<div class="col-12 border">
  <div class="container-lg mt-3">
    <div class="row gx-5 gy-3">

      <div class="col-12 py-3 text-center">
      <h5>$this->form_title</h5>
      </div>

      <div class="col-md-6 py-md-3">
        <p id="$this->prefix-croppie-instruction" class="">Uploading instruction if needed.</p>
        <div id="$this->prefix-croppie-view" class="d-none" style="">
        </div>

      </div>


      <div class="col-md-6">
        <div class="row g-0 d-flex h-100">


          <div class="col-md-12">
$d_image

          </div>

          <div class="col-md-6 align-self-end mb-3">
            <div class="input-group custom-file-button">
              <label class="input-group-text" for="$this->prefix-croppie_upload">Dodaj plik</label>
              <input type="file" class="form-control" id="$this->prefix-croppie_upload">
            </div>
          </div>

          <div class="col-md-6 align-self-end mb-3 px-3">
          <button id="$this->prefix-croppie_crop" class="btn btn-sm btn-primary d-none">przytnij</button>
          </div>


        </div>
      </div> <!-- col 6 ends-->

    </div>
  </div>
</div>

          <!-- Modal -->
<div class="modal fade show" id="$this->prefix-croppie_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
    <form method="POST" action="adm-inc/image.inc.php" enctype="application/x-www-form-urlencoded" id="upload" >
    <input type="hidden" id="table" class="form-control form-control-sm" name="table" value="$this->table">
    <input type="hidden" id="$this->prefix-image_value" class="form-control form-control-sm" name="image" value="">
    <input type="hidden" class="form-control form-control-sm" name="id" value="$this->id">
    <input type="hidden" class="form-control form-control-sm" name="prefix" value="$this->prefix">
    <input type="hidden" class="form-control form-control-sm" name="back_page" value="$this->back_page">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Oto Twoje zdjęcie zdjęcie</h5>
      </div>
      <div id="$this->prefix-croppie_preview" class="modal-body">

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">jeszcze nie</button>
        <button class="btn btn-sm btn-danger">zaakceptuj</button>

      </div><!-- footer-->

    </form>
    </div><!-- content-->
  </div>
</div>

          <!-- Modal -->



          <!-- one form -->
HTML;
}// ImageFormLoader






}// class ends
