<?php
// vars definitions
$index_image = IMGFOLDER.$data['category'].'/'.$data['image_index'];
$index_mobile_image = IMGFOLDER.$data['category'].'/'.$data['index_mobile_image'];

 // self link
$category = humanize_category($data['category']);
$more_link = '/'.humanize_category($data['category']);
$before_link = '/'.$category.'/';
 if ($data['subcategorized'] =='on') {
    $subcategory = humanize_category($data['subcategory']);
    $before_link = '/'.$category.'/'.$subcategory.'/';
    $more_link = '/'.humanize_category($data['category']).'/'.humanize_category($data['subcategory']);


  } 
$self_link = $before_link.createLinkForMe($data['header']).'/'.$data['id'];

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
  <div class="row g-0 cat-row standard-tile position-relative">
<?php endif;?>

<div class="col-md-4 p-0 content position-relative card shadow">

      <picture>
        <source media="(min-width:500px)" srcset="<?=$index_image?>">
        <img src="<?=$index_mobile_image?>" class="img-fluid" alt="<?=$data['image_index_alt'];?>">
      </picture>


      <div class="tilecaption-heading">
        <div class="tilecaption-content-heading position-relative">
          <div class="tilecaption-overlay-heading bg-01">
          </div>
          <div class="tilecaption-text-heading position-relative text-center">
            <h4 class="light-heading <?=$data['heading_color'];?> m-0 py-3"><?=$data['header'];?></h4>
          </div><!-- tilecaption-text -->
        </div><!-- tilecaption-content -->
      </div><!-- tilecaption-->

      <div class="tilecaption">
        <div class="tilecaption-content position-relative h-100 d-flex align-items-center">
          <div class="tilecaption-overlay bg-01">
          </div>
          <div class="tilecaption-text position-relative text-center light-text px-3">
            <h4 class="light-heading <?=$data['heading_color'];?>"><?=$data['header'];?></h4>
            <h5 class="light-heading" <?=$data['heading_color'];?>><?=$data['subheader'];?></h5>
              <?=$data['short_content'];?>
              <?php if(!empty($data['content'])):?>
                <a href="<?=$self_link;?>" class="btn btn-02 mt-2">przeczytaj</a>
              <?php endif;?>
          </div><!-- tilecaption-text -->
        </div><!-- tilecaption-content -->
      </div><!-- tilecaption-->


</div>

<?php if ($data['imlast'] == 'last'):?>

  <!-- more button -->
  <?php if ($data['all_articles_count'] > $data['articles_count']): // limitter button?>
  <div class="col-12 standard-tile more-button text-center">
    <a href="<?= $more_link;?>" class="btn btn-01 mt-3">wszystkie</a>
  </div>
  <?php endif; // limitter button ends?>

  <!-- more button -->

  </div><!-- cat row-->
</div><!-- container ends-->

<?php endif;?>
