<?php
/* Smarty version 4.2.1, created on 2022-11-22 13:45:46
  from '/home/server645914/ftp/smartyart/public/tpl_voting_sys/templates/standard_index_big_text.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_637cc47a0537c3_09874392',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aab667ef5903edd5360743cc1638dae6773ce29a' => 
    array (
      0 => '/home/server645914/ftp/smartyart/public/tpl_voting_sys/templates/standard_index_big_text.tpl',
      1 => 1669120595,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_637cc47a0537c3_09874392 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/server645914/ftp/smartyart/app/Smarty/plugins/function.cycle.php','function'=>'smarty_function_cycle',),));
?>
<div class="container-lg px-0 mb-5 standard-big-text">
  
  <div class="row heading-row my-3 position-relative">
    <div class="col-12 text-left heading-row-content position-relative" style="">
      <h1 data-aos="test" data-aos-offset="0" data-aos-once="false" data-aos-duration="800" data-aos-delay="0" data-aos-anchor-placement="top-center"
 class="light-heading mb-0 position-relative d-inline animated-header"><?php echo $_smarty_tpl->tpl_vars['standard_data']->value['category_name'];?>
</h1>
      <h2 class="light-heading mt-0 mb-0 position-relative bg-secondary"><?php echo $_smarty_tpl->tpl_vars['standard_data']->value['category_sub_name'];?>
</h2>
    </div>
  </div>

  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['standard_data']->value['subcategories'], 'subcategory', false, 'key', 'counter', array (
  'first' => true,
  'last' => true,
  'index' => true,
  'iteration' => true,
  'total' => true,
));
$_smarty_tpl->tpl_vars['subcategory']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['subcategory']->value) {
$_smarty_tpl->tpl_vars['subcategory']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_counter']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_counter']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_counter']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_counter']->value['index'];
$_smarty_tpl->tpl_vars['__smarty_foreach_counter']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_counter']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_counter']->value['total'];
?>
    <?php if ($_smarty_tpl->tpl_vars['standard_data']->value['subcategorized'] == 'on') {?>

  <div class="row subheading-row my-3 position-relative">
    <div class="col-12 text-center heading-row-content" style="">
      <h3 class="light-heading mb-0 "><?php echo $_smarty_tpl->tpl_vars['subcat_heading_'.($_smarty_tpl->tpl_vars['subcategory']->value)]->value;?>
</h3>
      <h4 class="light-heading mt-0 mb-0"><?php echo $_smarty_tpl->tpl_vars['subcat_subheading_'.($_smarty_tpl->tpl_vars['subcategory']->value)]->value;?>
</h4>
    </div>
  </div>
  <?php }?>


  
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articles_row_'.($_smarty_tpl->tpl_vars['subcategory']->value)]->value, 'value', false, 'k', 'counter', array (
  'first' => true,
  'last' => true,
  'index' => true,
  'iteration' => true,
  'total' => true,
));
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_counter']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_counter']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_counter']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_counter']->value['index'];
$_smarty_tpl->tpl_vars['__smarty_foreach_counter']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_counter']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_counter']->value['total'];
?>
    <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_counter']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_counter']->value['first'] : null)) {?>

  <div class="row g-0 cat-row  position-relative mb-5">
    <?php }?>
      <div class="col-12 p-0 content position-relative card shadow mb-3  <?php echo smarty_function_cycle(array('name'=>'first','values'=>'even,odd'),$_smarty_tpl);?>
 ">
        <div class="center-stripe bg-03 <?php echo $_smarty_tpl->tpl_vars['value']->value['overlay_color'];?>
"></div>
        <div class="side-stripe bg-01 <?php echo $_smarty_tpl->tpl_vars['value']->value['overlay_color'];?>
"></div>
    <div class="row g-0 standard-big-text-row position-relative d-flex align-items-center p-5 <?php echo smarty_function_cycle(array('name'=>'second','values'=>'even,odd'),$_smarty_tpl);?>
">

        <!-- content-col -->
        <div class="col-md-7 mb-3 mb-md-0 content-col p-lg-5 shadow <?php echo smarty_function_cycle(array('name'=>'third','values'=>'order-md-0 order-0, order-md-1 order-0'),$_smarty_tpl);?>
 bg-white position-relative"
          >
          <div class="text-container p-md-5 p-3 <?php echo $_smarty_tpl->tpl_vars['value']->value['text_color'];?>
">
              <h3 class="dark_heading_color <?php echo $_smarty_tpl->tpl_vars['value']->value['heading_color'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['header'];?>
</h3>
              <h4 class="dark_heading_color <?php echo $_smarty_tpl->tpl_vars['value']->value['heading_color'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['subheader'];?>
</h4>
              <?php echo $_smarty_tpl->tpl_vars['value']->value['short_content'];?>


              <?php if (!empty($_smarty_tpl->tpl_vars['value']->value['content'])) {?> 
              <a href="<?php echo humanize_category($_smarty_tpl->tpl_vars['standard_data']->value['category']);?>
/<?php echo humanize_category($_smarty_tpl->tpl_vars['subcategory_'.($_smarty_tpl->tpl_vars['subcategory']->value)]->value);
echo createLinkForMe($_smarty_tpl->tpl_vars['value']->value['header']);?>
/<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="btn btn-sm <?php echo $_smarty_tpl->tpl_vars['value']->value['button_kind'];?>
 mt-3 dark_heading_color" aria-label="Przeczytaj więcej o <?php echo $_smarty_tpl->tpl_vars['value']->value['header'];?>
">więcej</a>
              <?php }?>

          </div>
        </div>
        <!-- content-col -->
      <!-- image-col -->
      <div class="col-md-5 image-col <?php echo smarty_function_cycle(array('name'=>'fourtth','values'=>'order-md-1 order-1, order-md-0 order-1'),$_smarty_tpl);?>
 position-relative shadow mb-3" 
        data-aos="just-fade-in" data-aos-offset="0" data-aos-once="false" data-aos-duration="800" data-aos-delay="0" data-aos-anchor-placement="top-center"
>
      <div class="picture-underlay shadow bg-02 <?php echo $_smarty_tpl->tpl_vars['value']->value['overlay_color'];?>
"></div>
        <picture class="position-relative p-0">
          <source media="(min-width:500px)" srcset="<?php echo $_smarty_tpl->tpl_vars['standard_data']->value['image_path'];
echo $_smarty_tpl->tpl_vars['value']->value['image_index'];?>
">
          <img src="<?php echo $_smarty_tpl->tpl_vars['standard_data']->value['image_path'];
echo $_smarty_tpl->tpl_vars['value']->value['index_mobile_image'];?>
" class="img-fluid shadow" alt="<?php echo $_smarty_tpl->tpl_vars['value']->value['image_index_alt'];?>
" style="object-fit: cover; display: block;">
        </picture>
        <div class="square-1 bg-01"></div>
        <div class="square-2 bg-02"></div>
        <div class="square-3 bg-03"></div>

      </div>
      <!-- image-col -->

</div>

      </div> <!-- content in row col-12 -->

    <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_counter']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_counter']->value['last'] : null)) {?>
    <?php if ($_smarty_tpl->tpl_vars['all_articles_count_'.($_smarty_tpl->tpl_vars['subcategory']->value)]->value > $_smarty_tpl->tpl_vars['articles_count_'.($_smarty_tpl->tpl_vars['subcategory']->value)]->value) {?>
    <?php if ($_smarty_tpl->tpl_vars['standard_data']->value['subcategorized'] == '') {?>
    <?php $_smarty_tpl->_assignInScope('subcategory', '');?>
    <?php }?>

  <div class="col-12 more-button text-center">
    <a href="<?php echo humanize_category($_smarty_tpl->tpl_vars['standard_data']->value['category']);?>
/<?php echo humanize_category($_smarty_tpl->tpl_vars['subcategory']->value);?>
" class="btn btn-01 mt-3">zobacz wszystkie</a>
  </div>

    <?php }?>
  </div><!-- cat-row standard-big-text -->


    <?php }?>


  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  












  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>



</div><?php }
}
