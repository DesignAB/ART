<div class="container-fluid carousel_tile  p-0">


  <!-- row-->
  <div class="row g-0 carousel_tile">
    <?php $carousel_counter = 0; foreach ($data['carousels']  as $key => $value):?>

    <div class="col-md-4">

      <div class="card bg-transparent h-100">

      <picture>
          <source media="(min-width:768px)" srcset="<?=IMGFOLDER.'carousels/'.$value['image'];?>">

        <img src="<?=IMGFOLDER.'carousels/'.$value['image_mobile'];?>" class="d-block w-100" alt="...">
      </picture>

        <div class="card-body pt-0 pb-0 px-4">
          <div class="body-content w-100 h-100 p-md-4 px-md-5 text-white <?=$value['text_color'];?> position-relative">
            <div class="body-content-overlay <?=$value['overlay_color'];?>" style="opacity: <?=$value['overlay_opacity'];?>">
            </div>
          <h4 class="card-title position-relative"><?= $value['header']?></h4>
            <?= $value['content']?>
          </div><!-- body-content-->
        </div><!-- card body-->


          <div class="card-footer text-muted px-4 pt-0 mt-0 border-0">
            <div class="footer-content position-relative w-100 h-100 shadow-sm p-md-4 px-md-5 m-0 text-white <?=$value['text_color'];?>">
            <div class="footer-content-overlay <?=$value['overlay_color'];?>" style="opacity: <?=$value['overlay_opacity'];?>">
            </div>
              <?php if(!empty($value['link'])):?>
              <a href="<?=$value['link'];?>" class="btn btn-sm position-relative <?=$value['button_kind'];?> mt-3 dark_heading_color stretched-link">czytaj to!</a>
              <?php endif;?>
            </div>
          </div>



      </div>

    </div><!-- col ends-->


    <?php $carousel_counter++; endforeach;?>
  </div>
  <!-- row-->




</div>