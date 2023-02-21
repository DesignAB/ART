<?php
/* Smarty version 4.2.1, created on 2022-11-18 16:26:33
  from '/home/server645914/ftp/smartytozobacz/public/tpl_voting_sys/templates/big_text_single.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6377a4290cc769_59875316',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c4887c794cdd8753110361c4e5c350e45f361e7' => 
    array (
      0 => '/home/server645914/ftp/smartytozobacz/public/tpl_voting_sys/templates/big_text_single.tpl',
      1 => 1668785192,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6377a4290cc769_59875316 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/server645914/ftp/smartytozobacz/app/Smarty/plugins/function.cycle.php','function'=>'smarty_function_cycle',),));
?>

<div class="container-lg px-0 mb-5 standard-big-text">
  <div class="row g-0 cat-row standard-big-text position-relative mb-3">
    <?php if (!empty($_smarty_tpl->tpl_vars['data']->value['catinfo'])) {?>
      <div class="col-12">
        <h1><?php echo $_smarty_tpl->tpl_vars['data']->value['catinfo']['display_name'];?>
</h1>
        <h1><?php echo $_smarty_tpl->tpl_vars['data']->value['catinfo']['sub_display_name'];?>
</h1>
      </div>
    <?php }?>
    <?php if (!empty($_smarty_tpl->tpl_vars['data']->value['subcatinfo'])) {?>
      <div class="col-12">
        <h1><?php echo $_smarty_tpl->tpl_vars['data']->value['subcatinfo']['subcategory_display'];?>
</h1>
        <h1><?php echo $_smarty_tpl->tpl_vars['data']->value['subcatinfo']['subcategory_subdisplay'];?>
</h1>
      </div>
    <?php }?>

  </div> <!-- heading row ends-->



  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['articles_row'], 'value', false, 'key', 'counter', array (
));
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
  <div class="row standard-big-text template-row">
    <div class="col-12 p-0 content-column position-relative card shadow mb-3  <?php echo smarty_function_cycle(array('name'=>'first','values'=>'even,odd'),$_smarty_tpl);?>
 ">
            <div class="center-stripe bg-03 <?php echo $_smarty_tpl->tpl_vars['data']->value['overlay_color'];?>
"></div>
      <div class="side-stripe bg-01 <?php echo $_smarty_tpl->tpl_vars['data']->value['overlay_color'];?>
"></div>
            <div class="row g-0 standard-big-text-row position-relative d-flex align-items-center p-5 <?php echo smarty_function_cycle(array('name'=>'second','values'=>'even,odd'),$_smarty_tpl);?>
">

        <!-- content-col -->
        <div class="col-md-7 mb-3 mb-md-0 content-col p-lg-5 shadow <?php echo smarty_function_cycle(array('name'=>'third','values'=>'order-md-0 order-0,order-md-1 order-0'),$_smarty_tpl);?>
 bg-white position-relative">
          <div class="text-container p-md-5 p-3 <?php echo $_smarty_tpl->tpl_vars['value']->value['text_color'];?>
">
              <h3 class="dark_heading_color <?php echo $_smarty_tpl->tpl_vars['value']->value['heading_color'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['header'];?>
</h3>
              <h4 class="dark_heading_color <?php echo $_smarty_tpl->tpl_vars['value']->value['heading_color'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['subheader'];?>
</h4>
              <?php echo $_smarty_tpl->tpl_vars['value']->value['short_content'];?>

              <br>
                            <?php echo $_smarty_tpl->tpl_vars['value']->value['author'];?>

          </div>
        </div>
        <!-- content-col -->

        <!-- image-col -->
        <div class="col-md-5 image-col <?php echo smarty_function_cycle(array('name'=>'fourth','values'=>'order-md-1 order-1,order-md-0 order-1 '),$_smarty_tpl);?>
 position-relative shadow mb-3">
        <div class="picture-underlay shadow bg-02 <?php echo $_smarty_tpl->tpl_vars['value']->value['overlay_color'];?>
"></div>
          <picture class="position-relative p-0">
            <source media="(min-width:500px)" srcset="<?php echo $_smarty_tpl->tpl_vars['IMAGEFOLDER']->value;
echo $_smarty_tpl->tpl_vars['data']->value['catinfo']['category'];?>
/<?php echo $_smarty_tpl->tpl_vars['value']->value['image_index'];?>
">
            <img src="<?php echo $_smarty_tpl->tpl_vars['IMAGEFOLDER']->value;
echo $_smarty_tpl->tpl_vars['data']->value['catinfo']['category'];?>
/<?php echo $_smarty_tpl->tpl_vars['value']->value['index_mobile_image'];?>
" class="img-fluid shadow" alt="<?php echo $_smarty_tpl->tpl_vars['value']->value['image_alt'];?>
" style="object-fit: cover; display: block;">
          </picture>
          <div class="square-1 bg-01"></div>
          <div class="square-2 bg-02"></div>
          <div class="square-3 bg-03"></div>

        </div>
        <!-- image-col -->

    <!-- ext content-col -->
    <div class="col-md-7 mt-3 mt-md-5 content-col p-lg-5 shadow order-last bg-white position-relative <?php echo smarty_function_cycle(array('name'=>'fifth','values'=>'order-md-3 order-2, order-md-2 order-2'),$_smarty_tpl);?>
 ">
      <div class="text-container p-md-5 p-3 <?php echo $_smarty_tpl->tpl_vars['value']->value['text_color'];?>
">
          <?php echo $_smarty_tpl->tpl_vars['value']->value['content'];?>



      </div>
    </div>
    <!-- ext content-col -->

      <!-- ext_image-col -->
      <div class="col-md-5 <?php echo smarty_function_cycle(array('name'=>'sixth','values'=>'order-md-2 order-3,order-md-3 order-3'),$_smarty_tpl);?>
  ext-image-col position-relative shadow mb-3">
      <div class="picture-underlay shadow bg-02 <?php echo $_smarty_tpl->tpl_vars['value']->value['overlay_color'];?>
"></div>
        <picture class="position-relative p-0">
          <source media="(min-width:500px)" srcset="<?php echo $_smarty_tpl->tpl_vars['IMAGEFOLDER']->value;
echo $_smarty_tpl->tpl_vars['data']->value['catinfo']['category'];?>
/<?php echo $_smarty_tpl->tpl_vars['value']->value['image'];?>
">
          <img src="<?php echo $_smarty_tpl->tpl_vars['IMAGEFOLDER']->value;
echo $_smarty_tpl->tpl_vars['data']->value['catinfo']['category'];?>
/<?php echo $_smarty_tpl->tpl_vars['value']->value['image_mobile'];?>
" class="img-fluid shadow" alt="<?php echo $_smarty_tpl->tpl_vars['value']->value['image_alt'];?>
" style="object-fit: cover; display: block;">
        </picture>
        <div class="square-1 bg-01"></div>
        <div class="square-2 bg-02"></div>
        <div class="square-3 bg-03"></div>

      </div>
      <!-- ext_image-col -->


      </div><!-- row in content-column-->
    </div><!-- content-column-->


  </div>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div><!-- main container ends -->




<?php }
}
