
          <!-- one form -->
<div class="col-12 separator mt-3"></div>
<div class="col-12 border">
  <div class="container-lg mt-3">
    <div class="row gx-5 gy-3">

      <div class="col-12 py-3 text-center">
      <h5><?=$data['form_title'];?></h5>
      </div>

      <div class="col-md-6 py-md-3">
        <p id="<?=$data['prefix'];?>-croppie-instruction" class="">Uploading instruction if needed.</p>
        <div id="<?=$data['prefix'];?>-croppie-view" class="d-none" style="">
        </div>

      </div>


      <div class="col-md-6">
        <div class="row g-0 d-flex h-100">


          <div class="col-md-12">
          <?php if (!empty($data['old_image'])):?>
          <img src="<?=IMGFOLDER.$data['table'].'/'.$data['old_image'];?>" class="img-fluid py-3" alt="">
          <?php endif;?>
          <?php if (empty($data['old_image'])):?>
            <h1 class="mt-5 text-muted"><i class="bi bi-image-alt"></i></h1>
            <p class="mb-5">Brak zdjęcia</p>          
          <?php endif;?>
          </div>

          <div class="col-md-6 align-self-end mb-3">
            <div class="input-group custom-file-button">
              <label class="input-group-text" for="<?=$data['prefix'];?>-croppie_upload">Dodaj plik</label>
              <input type="file" class="form-control" id="<?=$data['prefix'];?>-croppie_upload">
            </div>
          </div>

          <div class="col-md-6 align-self-end mb-3 px-3">
          <button id="<?=$data['prefix'];?>-croppie_crop" class="btn btn-sm btn-primary d-none">przytnij</button>
          </div>


        </div>
      </div> <!-- col 6 ends-->

    </div>
  </div>
</div>

          <!-- Modal -->
<div class="modal fade show" id="<?=$data['prefix'];?>-croppie_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
    <form method="POST" enctype="application/x-www-form-urlencoded" id="upload" >
    <input type="hidden" id="photo_upload" class="form-control form-control-sm" name="photo_upload">
    <input type="hidden" id="prefix" class="form-control form-control-sm" name="prefix" value="<?=$data['prefix'];?>">
    <input type="hidden" id="table" class="form-control form-control-sm" name="table" value="<?=$data['table'];?>">
    <input type="hidden" id="<?=$data['prefix'];?>-image_value" class="form-control form-control-sm" name="image" value="">

    <input type="hidden" class="form-control form-control-sm" name="old_image" value="<?=$data['old_image'];?>">
    <input type="hidden" class="form-control form-control-sm" name="id" value="<?=$data['id'];?>">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Oto Twoje zdjęcie</h5>
      </div>
      <div id="<?=$data['prefix'];?>-croppie_preview" class="modal-body">

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