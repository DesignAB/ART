<?php
$articles = $data['articles_row'];
$image_path = $data['image_path'].'/';
?>
<div class="container-lg">


	<div class="row g-0 cat-row standard-big-text position-relative">
			<?php if(!empty($data['catinfo'])):?>
			<!-- this is heading for category purposes -->
			<div class="col-12">
				<h1><?= $data['catinfo']['display_name'].' '.$data['im_single'];?></h1>
				<h2><?= $data['catinfo']['sub_display_name'];?></h2>
			</div>
			<!-- this is heading for category purposes -->
			<?php endif?>

			<?php if(!empty($data['subcatinfo'])):?>
			<!-- this is heading for category purposes -->
			<div class="col-12">
				<h3><?= $data['subcatinfo']['subcategory_display'];?></h3>
				<h4><?= $data['subcatinfo']['subcategory_subdisplay'];?></h4>
			</div>
			<!-- this is heading for category purposes -->
			<?php endif?>
		</div><!-- heading-row ends -->

	<div class="row standard-big-text template-row">
		<?php if(!empty($articles)): // if one article do not extend template?>

		<?php foreach ($articles as $key => $article):
    $self_link = $before_link.createLinkForMe($article['header']).'/'.$article['id'];
  $image_col_order = 'order-md-1 order-1';
  $content_col_order = 'order-md-0 order-0';
  $even_odd = 'even';
  if ($article['custom_order'] % 2 <> 0) {
  $image_col_order = 'order-md-0 order-1';
  $content_col_order = 'order-md-1 order-0';
  $even_odd = 'odd';
  }


		?>

<div class="col-12 p-0 content position-relative card shadow mb-3  <?=$even_odd;?>">
  <div class="center-stripe bg-03 <?=$data['overlay_color'];?>"></div>
  <div class="side-stripe bg-01 <?=$data['overlay_color'];?>"></div>

    <div class="row g-0 standard-big-text-row position-relative d-flex align-items-center p-5 <?= $even_odd;?>">

    <!-- content-col -->
    <div class="col-md-7 mb-3 mb-md-0 content-col p-lg-5 shadow <?= $content_col_order;?> bg-white position-relative">
      <div class="text-container p-md-5 p-3 <?=$article['text_color'];?>">
          <h3 class="dark_heading_color <?=$article['heading_color'];?>"><?=$article['header'];?></h3>
          <h4 class="dark_heading_color <?=$article['heading_color'];?>"><?=$article['subheader'];?></h4>

          <?=$article['short_content'];?>
          <?php if(!empty($article['content'])):?>
          <a href="<?=$data['before_link'].$self_link;?>" class="btn btn-sm <?=$article['button_kind'];?> mt-3 dark_heading_color">czytaj to</a>
          <?php endif;?>

      </div>
    </div>
    <!-- content-col -->
      <!-- image-col -->
      <div class="col-md-5 image-col <?= $image_col_order;?> position-relative shadow mb-3">
      <div class="picture-underlay shadow bg-02 <?=$article['overlay_color'];?>"></div>
        <picture class="position-relative p-0">
          <source media="(min-width:500px)" srcset="<?=$image_path.$article['image_index']?>">
          <img src="<?=$image_path.$article['index_mobile_image']?>" class="img-fluid shadow" alt="<?=$article['image_index_alt'];?>" style="object-fit: cover; display: block;">
        </picture>
        <div class="square-1 bg-01"></div>
        <div class="square-2 bg-02"></div>
        <div class="square-3 bg-03"></div>

      </div>
      <!-- image-col -->


    </div> <!-- row standard-big-text-row -->

</div> <!-- content col-12 -->


		<?php $counter++; endforeach;?>
		
		<?php endif; //!empty($articles)?>
		<?php if(empty($articles)){$this->view("/includes/something-went-wrong.view.php", $data);}?>


	</div><!-- template-row ends -->



</div><!-- container ends -->
<?= $data['pagination'] ;?>


<?php if ($data['pagination'] == 'on'){$this->view("/includes/standard-paginator.view.php", $data);
}?>
