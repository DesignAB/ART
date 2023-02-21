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
<div class="container-fluid py-3">
  <div class="row heading-row my-3 position-relative">
    <div class="col-12 text-center heading-row-content" style="">
      <h1 class="light-heading mb-0"><?= $data['category_display'];?></h1>
      <h2 class="light-heading mt-0 mb-0"><?= $data['category_sub_display'];?>!</h2>
    </div>
  </div>
<?php endif;?>

  <?php if ($data['imfirst'] == 'first' && $data['subcategorized'] =='on'):?>
    <div class="row subheading-row mt-0">
      <div class="col-12 text-center" style="">
        <h3 class="light-heading"><?= $data['subcategory_display'];?></h3>
      </div>
    </div>
  <?php endif;?>


<?php if ($data['imfirst'] == 'first'):?>
  <div class="row cat-row mb-3">
<?php endif;?>

<div class="col-md-6 mb-3 standard-index-def">
  <div class="card h-100 text-center shadow">
      <picture>
        <source media="(min-width:768px)" srcset="<?=$index_image?>">
        <img src="<?=$index_mobile_image?>" class="card-img-top" alt="<?=$data['image_index_alt'];?>">
      </picture>


    <div class="card-body">
      <h3 class="card-title dark-heading"><?=$data['header'];?></h3>
      <h4 class="card-title dark-heading"><?=$data['subheader'];?></h4>

      <?=$data['short_content']?>
      <?php if(!empty($data['content'])):// more button if needed?>
      <a href="<?=$self_link;?>" class="btn btn-02">czytaj</a>
    <?php endif;?>
    </div>

    <div class="card-footer text-muted">

    </div>
  </div>

</div>

<?php if ($data['imlast'] == 'last'):?>
  <!-- more button -->
  <?php if ($data['all_articles_count'] > $data['articles_count']): // limitter button?>
  <div class="col-12 standard-index-def more-button text-center">
    <a href="<?= $more_link;?>" class="btn btn-01 mt-3">wszystkie</a>
  </div>
  <?php endif; // limitter button ends?>
  <!-- more button -->
  </div><!-- cat row-->
  <?php endif;// last in subcat?>
<?php if ($data['last_in_cat'] == 'last_in_cat'):?>


</div><!-- container ends-->

<?php endif;// last in cat?>

