<?php
/* Smarty version 4.2.1, created on 2022-11-08 18:57:52
  from '/home/server645914/ftp/smartytozobacz/public/tpl_voting_sys/index_templates/standard_tile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_636a98a0251a77_30122680',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bd9bbc79f774197516a646a217947a511a1a199a' => 
    array (
      0 => '/home/server645914/ftp/smartytozobacz/public/tpl_voting_sys/index_templates/standard_tile.tpl',
      1 => 1667930271,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_636a98a0251a77_30122680 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container-lg px-0 mb-5 standard-big-text">
  
  <div class="row heading-row my-3 position-relative">
    <div class="col-12 text-center heading-row-content" style="">
      <h1 class="light-heading mb-0"><?php echo $_smarty_tpl->tpl_vars['standard_data']->value['category_name'];?>
</h1>
      <h2 class="light-heading mt-0 mb-0"><?php echo $_smarty_tpl->tpl_vars['standard_data']->value['category_sub_name'];?>
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
      <h3 class="light-heading mb-0"><?php echo $_smarty_tpl->tpl_vars['subcat_heading_'.($_smarty_tpl->tpl_vars['subcategory']->value)]->value;?>
</h3>
      <h2 class="light-heading mt-0 mb-0"><?php echo $_smarty_tpl->tpl_vars['subcat_subheading_'.($_smarty_tpl->tpl_vars['subcategory']->value)]->value;?>
</h2>
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
    <div class="row g-0 cat-row standard-tile position-relative mb-5">
    <?php }?>
  
        <div class="col-md-4 p-0 content position-relative card shadow">

            <picture>
              <source media="(min-width:500px)" srcset="<?php echo $_smarty_tpl->tpl_vars['standard_data']->value['image_path'];
echo $_smarty_tpl->tpl_vars['value']->value['image_index'];?>
">
              <img src="<?php echo $_smarty_tpl->tpl_vars['standard_data']->value['image_path'];
echo $_smarty_tpl->tpl_vars['value']->value['index_mobile_image'];?>
" class="img-fluid" alt="<?php echo $_smarty_tpl->tpl_vars['value']->value['image_index_alt'];?>
">
            </picture>


            <div class="tilecaption-heading">
              <div class="tilecaption-content-heading position-relative">
                <div class="tilecaption-overlay-heading bg-01">
                </div>
                <div class="tilecaption-text-heading position-relative text-center">
                  <h4 class="light-heading <?php echo $_smarty_tpl->tpl_vars['value']->value['heading_color'];?>
 m-0 py-3"><?php echo $_smarty_tpl->tpl_vars['value']->value['header'];?>
</h4>
                </div><!-- tilecaption-text -->
              </div><!-- tilecaption-content -->
            </div><!-- tilecaption-->

            <div class="tilecaption">
              <div class="tilecaption-content position-relative h-100 d-flex align-items-center justify-content-center">
                <div class="tilecaption-overlay bg-01">
                </div>
                <div class="tilecaption-text position-relative text-center light-text px-3">
                  <h4 class="light-heading <?php echo $_smarty_tpl->tpl_vars['value']->value['heading_color'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['header'];?>
</h4>
                  <h4 class="light-heading <?php echo $_smarty_tpl->tpl_vars['value']->value['heading_color'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['subheader'];?>
</h4>
                    <?php echo $_smarty_tpl->tpl_vars['value']->value['short_content'];?>

                    <?php if (!empty($_smarty_tpl->tpl_vars['value']->value['content'])) {?> 
                      <a href="<?php echo humanize_category($_smarty_tpl->tpl_vars['standard_data']->value['category']);?>
/<?php echo createLinkForMe($_smarty_tpl->tpl_vars['value']->value['header']);?>
/<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="btn btn-02 <?php echo $_smarty_tpl->tpl_vars['value']->value['button_kind'];?>
 mt-2">przeczytaj</a>
                    <?php }?>
                </div><!-- tilecaption-text -->
              </div><!-- tilecaption-content -->
            </div><!-- tilecaption-->


      </div>



  
    <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_counter']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_counter']->value['last'] : null)) {?>
    <?php if ($_smarty_tpl->tpl_vars['all_articles_count_'.($_smarty_tpl->tpl_vars['subcategory']->value)]->value > $_smarty_tpl->tpl_vars['articles_count_'.($_smarty_tpl->tpl_vars['subcategory']->value)]->value) {?>
    <?php if ($_smarty_tpl->tpl_vars['standard_data']->value['subcategorized'] == '') {?>
    <?php $_smarty_tpl->_assignInScope('subcategory', '');?>
    <?php }?>

  <div class="col-12 more-button text-center">
    <a href="<?php echo $_smarty_tpl->tpl_vars['standard_data']->value['category'];?>
/<?php echo $_smarty_tpl->tpl_vars['subcategory']->value;?>
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
