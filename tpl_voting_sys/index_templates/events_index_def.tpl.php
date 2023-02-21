<?php
// vars definitions
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
$self_link = $before_link.createLinkForMe($data['header']).'/'.$data['id'];

?>

<div class="container-fluid">


  <div class="row heading-row mb-3 position-relative">
    <div class="col-12 text-center heading-row-content" style="">
      <h1 class="light-heading mb-0"><?= $data['category_display'];?></h1>
      <h2 class="light-heading mt-0 mb-0"><?= $data['category_sub_display'];?></h2>
    </div>
  </div>

    <div class="row subheading-row mb-3">
      <div class="col-12 text-center subheading-row-content" style="">
        <h3 class="light-heading"><?= $data['subcategory_display'];?></h3>
      </div>
    </div>


  <div class="row gx-3 cat-row" data-masonry='{"percentPosition": true }'>

<!-- there goes real template -->
<?php if(!empty($data['articles_row'])):?>
    <?php $events_counter = 1; foreach ($data['articles_row'] as $key => $value):
    $self_link = 'events/'.createLinkForMe($value['artist_name']).'/';

      ?>
        <?php if(empty($value['child'])):?>

  <div class="col-md-4 col-lg-3 mb-4 ">

    <div class="card mb-3 shadow">
      <img src="<?=$data['image_path'].$value['uploaded_image'];?>" class="card-img-top" alt="...">
      <div class="card-body">
      <h5 class="card-title dark_heading_color color-01"><?= $value['artist_name'];?></h5>
      <h6 class="card-title dark_heading_color color-01"><?= $value['custom_event_date'];?></h6>
      <a href="<?=$self_link.$value['event_id'];?>" class="btn btn-sm btn-01 mt-3 dark_heading_color">więcej</a>
      <a href="<?='https://bilety.34art.pl/event/view/id/'.$value['event_id'];?>" class="btn btn-sm btn-01 mt-3 dark_heading_color">kup <?=date('H:i',strtotime($value['custom_event_time']))?></a>
      <?php if(!empty($value['parent_to'])):?>
        <a href="<?='https://bilety.34art.pl/event/view/id/'.$value['parent_to'];?>" class="btn btn-sm btn-01 mt-3 dark_heading_color">kup <?=date('H:i',strtotime($value['child_hour']))?></a>

      <?php endif;?>
      </div>
    </div><!-- card ends -->

    </div><!-- col ends -->


    <?php endif;?>
    <?php $events_counter++; endforeach;?>
<?php endif; //!empty($data['articles_row']?>
<!-- there goes real template -->



  </div><!-- cat row-->

  
  <!-- more button -->
    <?php if ($data['all_articles_count'] > $data['articles_count']): // limitter button?>
    <div class="row gx-3 more-button-row standard-big-text">

    <div class="col-12 more-button text-center">
      <a href="<?= $data['category'];?>" class="btn btn-01 mt-3">zobacz wszystkie</a>
    </div>
    </div><!--more-button-row-->
    <?php endif; // limitter button ends?>
  <!-- more button -->

  </div><!-- cat row-->

</div><!-- container ends-->

