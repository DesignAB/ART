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
<div class="container-lg px-0 ">
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
  <div class="row g-0 cat-row standard-big-text position-relative">
<?php endif;?>

<div class="col-12 p-0 content position-relative card shadow mb-3  <?= $even_odd;?>">
  <div class="center-stripe bg-03 <?=$data['overlay_color'];?>"></div>
  <div class="side-stripe bg-01 <?=$data['overlay_color'];?>"></div>

    <div class="row g-0 standard-big-text-row position-relative d-flex align-items-center p-5 <?= $even_odd;?>">

    <!-- content-col -->
    <div class="col-md-7 mb-3 mb-md-0 content-col p-lg-5 shadow <?= $content_col_order;?> bg-white position-relative"
      >
      <div class="text-container p-md-5 p-3 <?=$data['text_color'];?>">
          <h3 class="dark_heading_color <?=$data['heading_color'];?>"><?=$data['header'];?></h3>
          <h4 class="dark_heading_color <?=$data['heading_color'];?>"><?=$data['subheader'];?></h4>
          <?=$data['short_content'];?>
          <?php if(!empty($data['content'])):?>
          <a href="<?=$self_link;?>" class="btn btn-sm <?=$data['button_kind'];?> mt-3 dark_heading_color">czytaj to</a>
          <?php endif;?>

      </div>
    </div>
    <!-- content-col -->
      <!-- image-col -->
      <div class="col-md-5 image-col <?= $image_col_order;?> position-relative shadow mb-3" 
        data-aos="just-fade-in" data-aos-offset="0" data-aos-once="false" data-aos-duration="800" data-aos-delay="0" data-aos-anchor-placement="top-center"
>
      <div class="picture-underlay shadow bg-02 <?=$data['overlay_color'];?>"></div>
        <picture class="position-relative p-0">
          <source media="(min-width:500px)" srcset="<?=$index_image?>">
          <img src="<?=$index_mobile_image?>" class="img-fluid shadow" alt="<?=$data['image_index_alt'];?>" style="object-fit: cover; display: block;">
        </picture>
        <div class="square-1 bg-01"></div>
        <div class="square-2 bg-02"></div>
        <div class="square-3 bg-03"></div>

      </div>
      <!-- image-col -->


    </div> <!-- row standard-big-text-row -->

</div> <!-- content col-12 -->

<?php if ($data['imlast'] == 'last'):?>

  <!-- more button -->
  <?php if ($data['all_articles_count'] > $data['articles_count']): // limitter button?>
  <div class="col-12 more-button text-center">
    <a href="<?= $more_link;?>" class="btn btn-01 mt-3">zobacz wszystkie</a>
  </div>
  <?php endif; // limitter button ends?>

  <!-- more button -->

  </div><!-- cat row-->
</div><!-- container ends-->

<?php endif;?>
