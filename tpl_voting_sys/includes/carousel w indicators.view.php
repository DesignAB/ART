<div id="NewCarousel" class="carousel slide" data-bs-ride="carousel">

<?php if($data['carousel_count'] > 1):?>
  <!-- indicators-->
  <div class="carousel-indicators ">
    <?php $carousel_button_counter = 0; foreach ($data['carousels']  as $key => $value):
      $first_button = '';
      if ($key === array_key_first($data['carousels'])) {
      $first_button = 'active';
      }

    ?>
    <button type="button" data-bs-target="#NewCarousel" data-bs-slide-to="<?=$carousel_button_counter;?>" class="<?=$first_button;?> bg-01" aria-current="true" aria-label="Slide <?=$carousel_button_counter;?>"></button>


    <?php $carousel_button_counter++; endforeach;?>



  </div>
  <!-- indicators-->
<?php endif;?>

  <!-- inner-->
  <div class="carousel-inner">
    <?php $carousel_counter = 0; foreach ($data['carousels']  as $key => $value):

      $first_slide = '';
      if ($key === array_key_first($data['carousels'])) {
      $first_slide = 'active';
      }

    ?>

  <!-- item-->
    <div class="carousel-item <?=$first_slide;?>" data-bs-interval="5000">
      <picture>
          <source media="(min-width:768px)" srcset="<?=IMGFOLDER.'carousels/'.$value['image'];?>">

        <img src="<?=IMGFOLDER.'carousels/'.$value['image_mobile'];?>" class="d-block w-100" alt="...">
      </picture>
  <!-- caption-->
      <div class="carousel-item-content d-flex justify-content-center w-100">
      <div class="carousel-mycaption d-md-block px-0 d-flex text-white <?= $value['text_color']?>">

        <!-- carousel-caption-content-->
        <div class="carousel-caption-content position-relative">
        <!-- carousel-image-overlay-->
        <div class="carousel-image-overlay <?=$value['overlay_color'];?>" style="opacity: <?=$value['overlay_opacity'];?>"></div>
        <!-- carousel-image-overlay-->


          <!-- carousel-caption-text -->
          <div class="carousel-caption-text position-relative p-lg-5">
            <h4><?= $value['header']?></h4>

            <?= $value['content']?>
          <?php if(!empty($value['link'])):?>
          <a href="<?=$value['link'];?>" class="btn btn-sm <?=$value['button_kind'];?> mt-3 dark_heading_color">czytaj to</a>
          <?php endif;?>


          </div>
          <!-- carousel-caption-text -->
        </div>
        <!-- carousel-caption-content-->


      </div>
  <!-- caption-->

      </div><!-- carousel-item-content -->
  <?php if($data['carousel_count'] > 1):?>
  <button class="carousel-control-prev " type="button" data-bs-target="#NewCarousel" data-bs-slide="prev">
    <i class="bi bi-arrow-left <?=$value['indicators_color'];?>"></i>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#NewCarousel" data-bs-slide="next">
    <i class="bi bi-arrow-right <?=$value['indicators_color'];?>"></i>
  </button>
<?php endif;?>

    </div>
  <!-- item-->

    <?php $carousel_counter++; endforeach;?>
  </div>
  <!-- inner-->




</div>