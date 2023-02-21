
<div class="container-fluid py-3 partners">

  <div class="row heading-row mb-3 position-relative">
    <div class="col-12 text-center heading-row-content" style="">
      <h1 class="light-heading mb-0">Nasi Partnerzy</h1>
    </div>
  </div>

  <div class="row cat-row mb-3 d-flex justify-content-center">
<?php foreach ($data['partners_row'] as $key => $value):?>
    <div class="col-md-2 mb-3 standard-index-def">
      <div class="card h-100 text-center shadow">
            <img src="<?=$data['image_path'].$value['image']?>" class="card-img-top">
    <a href="<?=$value['link'];?>" class="stretched-link"></a>      

        <div class="card-body">
          <h4 class="card-title dark-heading"><?=$value['header'];?></h4>
        </div>

      </div>

    </div>
<?php endforeach;?>





  </div><!-- cat row-->


</div><!-- container ends-->


