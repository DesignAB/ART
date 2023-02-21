<?php
// vars definitions
$index_image = IMGFOLDER.$data['category'].'/'.$data['image_index'];
$index_mobile_image = IMGFOLDER.$data['category'].'/'.$data['index_mobile_image'];
?>

<?php if ($data['imfirst'] == 'first' && $data['first_in_cat'] == 'first_in_cat'):?>
<div class="container-fluid px-0 ">
  <div class="row heading-row my-3 position-relative">
    <div class="col-12 text-center heading-row-content" style="">
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
  <div class="row g-0 cat-row standard-tile">
<?php endif;?>

<div class="col-md-6 p-0 content position-relative card shadow">

      <picture>
        <source media="(min-width:500px)" srcset="<?=$index_image?>">
        <img src="<?=$index_mobile_image?>" class="img-fluid" alt="<?=$data['image_index_alt'];?>">
      </picture>
      <div class="image-overlay-header p-3 text-center">
      <h4 class="light-heading"><?=$data['header'];?></h4>
      </div>
      <div class="image-overlay-content p-3 px-5 text-center light-text d-flex  align-items-center justify-content-center">
          <div>
          <h4 class="light-heading"><?=$data['header'];?></h4>
          <h5 class="light-heading"><?=$data['subheader'];?></h5>
          <?=$data['short_content'];?>
          <?php if(!empty($data['content'])):?>
            <a href="#" class="btn btn-02 mt-2">przeczytaj</a>
          <?php endif;?>

          </div>
      </div>

</div>

<?php if ($data['imlast'] == 'last'):?>

  <!-- more button -->
  <?php if ($data['all_articles_count'] > $data['articles_count']): // limitter button?>
  <div class="col-12 standard-tile more-button text-center">
    <a href="#" class="btn btn-02 mt-3">zobacz wszystkie</a>
  </div>
  <?php endif; // limitter button ends?>

  <!-- more button -->

  </div><!-- cat row-->
</div><!-- container ends-->

<?php endif;?>
