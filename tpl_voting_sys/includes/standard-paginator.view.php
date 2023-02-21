<div class="container-lg mt-3">
	<div class="row">
		<div class="col-12 d-flex flex-row justify-content-center custom-pagination">

<?php $x = 1; while($x <= $data['all_pages']):?> 
<?php if($data['page'] == $x):?>
			<div class="pagin-box shadow active bg-01 text-white">
		      <span class="pagin-link"><?=$x;?></span>
		    </div>  
<?php endif;?>
<?php if($data['page'] <> $x):?>
			<div class="pagin-box shadow-sm position-relative">
		    <a class="pagin-link color-01 stretched-link" href="<?=$data['pagelink'].$x;?>"><?=$x;?></a>
		    </div>  
<?php endif;?>

<?php  $x++;  endwhile;?>

		</div><!-- pagination col ends-->
	</div><!-- row ends -->
</div><!-- container ends -->

