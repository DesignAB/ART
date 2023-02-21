<?php
// vars definitions
$index_image = IMGFOLDER.$data['category'].'/'.$data['image_index'];
$index_mobile_image = IMGFOLDER.$data['category'].'/'.$data['index_mobile_image'];

  $image_col_order = 'order-md-1 order-1';
  $content_col_order = 'order-md-0 order-0';
  $even_odd = 'even';
  if ($data['counter'] % 2 == 0) {
  $image_col_order = 'order-md-0 order-1';
  $content_col_order = 'order-md-1 order-0';
  $even_odd = 'odd';
  }


?>

<?php if ($data['imfirst'] == 'first' && $data['first_in_cat'] == 'first_in_cat'):?>
<div class="container-fluid mb-5">
  <div class="row heading-row my-3 position-relative">
    <div class="col-12 text-left heading-row-content" style="">
      <h1 class="light-heading mb-0"><?= $data['category_display'];?></h1>
      <h2 class="light-heading mt-0 mb-0"><?= $data['category_sub_display'];?></h2>
    </div>
  </div>
<?php endif;?>

  <?php if ($data['imfirst'] == 'first' && $data['subcategorized'] =='on'):?>
    <div class="row subheading-row mb-3">
      <div class="col-12 text-center subheading-row-content" style="">
        <h3 class="light-heading"><?= $data['subcategory_display'];?></h3>
      </div>
    </div>
  <?php endif;?>


<?php if ($data['imfirst'] == 'first'):?>
  <div class="row g-0 cat-row standard-big-text">
<?php endif;?>

<div class="col-12 p-md-5 py-md-5 p-2 content position-relative card shadow-sm mb-3 <?= $even_odd;?> overflow-hidden">
  <div class="center-stripe bg-03 <?=$data['overlay_color'];?>"></div>

  <div class="square-1 bg-01"></div>
  <div class="square-2 bg-02"></div>
  <div class="square-3 bg-03"></div>

  <div class="row g-0 content-row d-flex align-items-center position-relative">


    <div class="col-md-5 image-col <?= $image_col_order;?> position-relative shadow mb-3">

        <picture class="position-relative p-0">
          <source media="(min-width:500px)" srcset="<?=$index_image?>">
          <img src="<?=$index_mobile_image?>" class="img-fluid shadow" alt="<?=$data['image_index_alt'];?>" style="object-fit: cover; display: block;">
        </picture>
      <div class="picture-underlay shadow bg-02 <?=$data['overlay_color'];?>"></div>

    </div>


    <div class="col-md-7 mb-3 mb-md-0 content-col p-md-5 shadow <?= $content_col_order;?> bg-white">
      <div class="text-container p-md-5 p-3 <?=$data['text_color'];?>">
          <h3 class="dark_heading_color <?=$data['heading_color'];?>"><?=$data['header'];?></h3>
          <h4 class="dark_heading_color <?=$data['heading_color'];?>"><?=$data['subheader'];?></h4>
          <?=$data['short_content'];?>
          <?=$data['all_articles_count'];?>

          <?php if(!empty($data['content'])):?>
          <a href="#" class="btn btn-sm <?=$data['button_kind'];?> mt-3 dark_heading_color">czytaj to</a>
          <?php endif;?>

      </div>

    </div>


  </div>

</div><!-- .content -->

<?php if ($data['imlast'] == 'last'):?>
  <!-- more button -->
  <?php if ($data['all_articles_count'] > $data['articles_count']): // limitter button?>
  <div class="col-12 more-button text-center mt-5">
    <a href="#" class="btn btn-01 mt-3 text-danger">co to jest?</a>
  </div>
  <?php endif; // limitter button ends?>
  <!-- more button -->


  </div><!-- cat row-->
</div><!-- container ends-->

<?php endif;?>
