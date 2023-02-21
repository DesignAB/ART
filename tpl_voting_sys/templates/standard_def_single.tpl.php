<?php
$articles = $data['articles_row'];
$image_path = $data['image_path'].'/';
?>
<div class="container-lg">


	<div class="row g-0 cat-row standard-def position-relative">
			<?php if(!empty($data['catinfo'])):?>
			<!-- this is heading for category purposes -->
			<div class="col-12">
				<h1><?= $data['catinfo']['display_name'];?></h1>
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

	<div class="row standard-def template-row">
		<?php if(!empty($articles)): // if one article do not extend template?>

		<?php foreach ($articles as $key => $article):?>

<div class="col-12 p-3 content position-relative card shadow mb-3">

    <div class="row g-0">

      <!-- image-col -->
      <div class="col-md-6 image-col">
        <picture class="p-0">
          <source media="(min-width:500px)" srcset="<?=$image_path.$article['image_index']?>">
          <img src="<?=$image_path.$article['index_mobile_image']?>" class="img-fluid" alt="<?=$article['image_index_alt'];?>">
        </picture>

      </div>
      <!-- image-col -->
    <!-- content-col -->
    <div class="col-md-6 mb-3 mb-md-0 content-colbg-white position-relative d-flex align-items-center">
      <div class="text-container p-md-5 p-3 <?=$article['text_color'];?>">
          <h3 class="dark_heading_color <?=$article['heading_color'];?>"><?=$article['header'];?></h3>
          <h4 class="dark_heading_color <?=$article['heading_color'];?>"><?=$article['subheader'];?></h4>

          <?=$article['short_content'];?>

      </div>
    </div>
    <!-- content-col -->


    </div> <!-- row standard-big-text-row -->

</div> <!-- content col-12 -->


		<?php $counter++; endforeach;?>
		
		<?php endif; //!empty($articles)?>
		<?php if(empty($articles)){$this->view("/includes/something-went-wrong.view.php", $data);}?>


	</div><!-- template-row ends -->



</div><!-- container ends -->


<?php if ($data['pagination'] == 'on'){$this->view("/includes/standard-paginator.view.php", $data);
}?>
