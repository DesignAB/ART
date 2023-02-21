<?php
/* Smarty version 4.2.1, created on 2022-11-15 12:50:27
  from '/home/server645914/ftp/smartytozobacz/public/tpl_voting_sys/templates/tile_carousel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63737d0396b0a5_08698984',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c819b0bfb6bc891be9d87e504b0ac7db9fb09b64' => 
    array (
      0 => '/home/server645914/ftp/smartytozobacz/public/tpl_voting_sys/templates/tile_carousel.tpl',
      1 => 1668513025,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63737d0396b0a5_08698984 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/server645914/ftp/smartytozobacz/app/Smarty/plugins/function.counter.php','function'=>'smarty_function_counter',),));
?>
<div class="container-fluid carousel_tile  p-0">


  <!-- row-->
  <div class="row g-0 carousel_tile_row">
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['standard_data']->value['carousels'], 'value', false, 'key', 'counter', array (
));
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
echo smarty_function_counter(array('assign'=>'pos'),$_smarty_tpl);?>

    <div class="col-md-4" style="perspective: 1000px;">

      <div class="card carousel-tile-card name<?php echo $_smarty_tpl->tpl_vars['pos']->value;?>
 bg-transparent h-100">
              <?php if (!empty($_smarty_tpl->tpl_vars['value']->value['link'])) {?>
              <a href="<?php echo $_smarty_tpl->tpl_vars['value']->value['link'];?>
" class="stretched-link" aria-label="Przeczytaj więcej o <?php echo $_smarty_tpl->tpl_vars['value']->value['header'];?>
"></a>
              <?php }?>

      <picture>
          <source media="(min-width:768px)" srcset="<?php echo $_smarty_tpl->tpl_vars['standard_data']->value['image_path'];
echo $_smarty_tpl->tpl_vars['value']->value['image'];?>
">

        <img src="<?php echo $_smarty_tpl->tpl_vars['standard_data']->value['image_path'];
echo $_smarty_tpl->tpl_vars['value']->value['image_mobile'];?>
" class="d-block w-100 shadow" alt="...">
      </picture>


        <div class="card-body pt-0 pb-0 px-4">

          <div class="body-content w-100 h-100 p-md-4 px-md-5 text-white <?php echo $_smarty_tpl->tpl_vars['value']->value['text_color'];?>
 position-relative d-flex flex-column row shadow">
            <div class="body-content-overlay <?php echo $_smarty_tpl->tpl_vars['value']->value['overlay_color'];?>
" style="opacity: <?php echo $_smarty_tpl->tpl_vars['value']->value['overlay_opacity'];?>
">
            </div>
            <div class="col-12">
          <h4 class="card-title position-relative"><?php echo $_smarty_tpl->tpl_vars['value']->value['header'];?>
!</h4>
            <?php echo $_smarty_tpl->tpl_vars['value']->value['content'];?>

          </div>

            <?php if (!empty($_smarty_tpl->tpl_vars['value']->value['link'])) {?>
            <div class="col-12 mt-auto">
              <a href="<?php echo $_smarty_tpl->tpl_vars['value']->value['link'];?>
" class="mt-auto btn btn-sm position-relative <?php echo $_smarty_tpl->tpl_vars['value']->value['button_kind'];?>
 dark_heading_color stretched-link"  aria-label="Przeczytaj więcej o <?php echo $_smarty_tpl->tpl_vars['value']->value['header'];?>
">czytaj to!</a>
            </div>
              <?php }?>

          </div><!-- body-content-->
        </div><!-- card body-->


      </div>

    </div><!-- col ends-->


  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

  </div>
  <!-- row-->




</div><?php }
}
