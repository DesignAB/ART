<?php
/* Smarty version 4.2.1, created on 2022-12-06 17:16:57
  from '/home/server645914/ftp/with_counter/public/tpl_voting_sys/templates/standard_carousel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_638f6af927e936_60885508',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a13fd372712290cc5dc684a3a9b793a0b3042e34' => 
    array (
      0 => '/home/server645914/ftp/with_counter/public/tpl_voting_sys/templates/standard_carousel.tpl',
      1 => 1670338515,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_638f6af927e936_60885508 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="main-page-carousel" class="carousel slide mb-3 mb-lg-5" data-bs-ride="carousel" style="height:100vh;">
	<!-- .carousel-indicators-->
	  <div class="carousel-indicators">
	    <div class="indicators-container d-none d-lg-block">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['standard_data']->value['carousels'], 'indicatorvalue', false, 'key', 'indicators', array (
));
$_smarty_tpl->tpl_vars['indicatorvalue']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['indicatorvalue']->value) {
$_smarty_tpl->tpl_vars['indicatorvalue']->do_else = false;
?>

    <button type="button" data-bs-target="#main-page-carousel" data-bs-slide-to="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" class="active" aria-current="true" aria-label="Slide <?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"></button>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	    </div>
	  </div>
	<!-- .carousel-indicators-->


	<div class="carousel-inner" style="height: 100vh;">

  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['standard_data']->value['carousels'], 'value', false, 'key', 'counter', array (
));
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
	<?php $_smarty_tpl->_assignInScope('active', '');?>
	<?php if ($_smarty_tpl->tpl_vars['key']->value == 0) {?>
	<?php $_smarty_tpl->_assignInScope('active', "active");?>
	<?php }?>

	<!-- .carousel-item-->
    <div class="carousel-item <?php echo $_smarty_tpl->tpl_vars['active']->value;?>
 bg1" data-bs-interval="4000" style="height: 100vh;">
      <div class="carousel-image-container">

        <picture>
          <source srcset="<?php echo IMGFOLDER;?>
carousels/<?php echo $_smarty_tpl->tpl_vars['value']->value['image'];?>
" media="(min-width:992px)" type="image/svg+xml">
          <img src="<?php echo IMGFOLDER;?>
carousels/<?php echo $_smarty_tpl->tpl_vars['value']->value['image_mobile'];?>
" class="img-fluid" alt="<?php echo $_smarty_tpl->tpl_vars['value']->value['image_alt'];?>
" style="object-position: center center; object-fit: cover; height: 100vh; width: 100%;">
        </picture>

        <div class="carousel-image-overlay d-flex align-items-center justify-content-center flex-column py-5 py-lg-0" style="">
        	<div class="bg2 <?php echo $_smarty_tpl->tpl_vars['value']->value['overlay_color'];?>
" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; content: ''; opacity: <?php echo $_smarty_tpl->tpl_vars['value']->value['overlay_opacity'];?>
;">
        	</div>

        	<div class="corousel-overlay-content text-center position-relative">
	          <h1 class="text-center px-lg-5"><?php echo $_smarty_tpl->tpl_vars['value']->value['header'];?>
</h1>
	          <h2 class="text-center px-lg-5 "><?php echo $_smarty_tpl->tpl_vars['value']->value['subheader'];?>
</h2>
	          <p><?php echo $_smarty_tpl->tpl_vars['value']->value['content'];?>
</p>
				<?php ob_start();
echo $_smarty_tpl->tpl_vars['value']->value['link'];
$_prefixVariable1 = ob_get_clean();
if (!empty($_prefixVariable1)) {?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['value']->value['link'];?>
" class="btn btn-outline-light mt-2 mt-lg-3 stretched-link">zobacz</a>
				<?php }?>
			</div>
        </div><!--.carousel-image-overlay-->
		

      </div><!--.carousel-image-container-->
    </div><!-- .carousel-item-->
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

	</div><!-- carousel inner-->

  <button class="carousel-control-prev $d_indicators" type="button" data-bs-target="#main-page-carousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next $d_indicators" type="button" data-bs-target="#main-page-carousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>


</div><!-- main page carousel ends--><?php }
}
