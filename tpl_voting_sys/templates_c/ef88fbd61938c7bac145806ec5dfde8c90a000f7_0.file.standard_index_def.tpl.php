<?php
/* Smarty version 4.2.1, created on 2022-12-07 21:39:35
  from '/var/www/vhosts/34art.pl/nowa34art/public/tpl_voting_sys/templates/standard_index_def.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6390fa079e45a2_98260832',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ef88fbd61938c7bac145806ec5dfde8c90a000f7' => 
    array (
      0 => '/var/www/vhosts/34art.pl/nowa34art/public/tpl_voting_sys/templates/standard_index_def.tpl',
      1 => 1670445509,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6390fa079e45a2_98260832 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/vhosts/34art.pl/nowa34art/app/Smarty/plugins/function.cycle.php','function'=>'smarty_function_cycle',),));
?>
<div class="container-fluid px-0 my-5 pb-4 standard">
  
  <div class="row heading-row my-3 position-relative">
    <div class="col-12 text-center d-flex flex-column align-items-center justify-content-center heading mb-md-5 pb-3 aos-animate">
      <h1 data-aos="aos-heading-h1" data-aos-offset="0" data-aos-once="false" data-aos-duration="500" data-aos-delay="0" data-aos-anchor-placement="top-center"><?php echo $_smarty_tpl->tpl_vars['standard_data']->value['category_name'];?>
</h1>
        <div class="heading-effect d-flex justify-content-center" data-aos="aos-heading" data-aos-offset="-100" data-aos-once="false" data-aos-duration="300" data-aos-delay="200" data-aos-anchor-placement="top-center"><span data-aos="aos-heading-dot" data-aos-offset="-100" data-aos-once="false" data-aos-duration="300" data-aos-delay="0" data-aos-anchor-placement="top-center"><p>•</p></span>
        </div>
    </div>
  </div><!-- heading row-->

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
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articles_row_'.($_smarty_tpl->tpl_vars['subcategory']->value)]->value, 'value', false, 'key', 'counter', array (
  'first' => true,
  'last' => true,
  'index' => true,
  'iteration' => true,
  'total' => true,
));
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_counter']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_counter']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_counter']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_counter']->value['index'];
$_smarty_tpl->tpl_vars['__smarty_foreach_counter']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_counter']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_counter']->value['total'];
?>
    <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_counter']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_counter']->value['first'] : null)) {?>
  <div class="row gx-3 cat-row position-relative mb-5 px-3">
    <?php }?>
        <div clss="col-12">
      <div class="row g-0" data-aos="aos-shadow" data-aos-offset="0" data-aos-once="false" data-aos-duration="300" data-aos-delay="100" data-aos-anchor-placement="top-center">

          <div class="col-md-6 h-100 index-article-image d-flex align-items-center <?php echo smarty_function_cycle(array('values'=>$_smarty_tpl->tpl_vars['image_cycle']->value),$_smarty_tpl);?>
"  data-aos="aos-shadow" data-aos-offset="50" data-aos-once="false" data-aos-duration="300" data-aos-delay="250" data-aos-anchor-placement="top-center">
              <picture>
                <source srcset="<?php echo $_smarty_tpl->tpl_vars['standard_data']->value['image_path'];
echo $_smarty_tpl->tpl_vars['value']->value['image_index'];?>
" media="(min-width:992px)" type="image/svg+xml">
                <img src="<?php echo $_smarty_tpl->tpl_vars['standard_data']->value['image_path'];
echo $_smarty_tpl->tpl_vars['value']->value['index_mobile_image'];?>
" class="img-fluid" alt="<?php echo $_smarty_tpl->tpl_vars['value']->value['image_index_alt'];?>
">
              </picture>

          </div><!-- .col-md-6-->

          <div class="col-md-6 index-article-content px-4 py-3 d-flex flex-column justify-content-center <?php echo smarty_function_cycle(array('values'=>$_smarty_tpl->tpl_vars['content_cycle']->value),$_smarty_tpl);?>
">
          <h2><?php echo $_smarty_tpl->tpl_vars['value']->value['header'];?>
</h2>
          <h4><?php echo $_smarty_tpl->tpl_vars['value']->value['subheader'];?>
</h4>
              <?php echo $_smarty_tpl->tpl_vars['value']->value['short_content'];?>


          </div><!-- .col-md-6-->

      </div>
    </div>


    
    <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_counter']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_counter']->value['last'] : null)) {?>
    <?php $_smarty_tpl->_assignInScope('last_key', $_smarty_tpl->tpl_vars['key']->value);?>
    <?php if ($_smarty_tpl->tpl_vars['all_articles_count_'.($_smarty_tpl->tpl_vars['subcategory']->value)]->value > $_smarty_tpl->tpl_vars['articles_count_'.($_smarty_tpl->tpl_vars['subcategory']->value)]->value) {?>
    <?php if ($_smarty_tpl->tpl_vars['standard_data']->value['subcategorized'] == '') {?>
    <?php $_smarty_tpl->_assignInScope('subcategory', '');?>
    <?php }?>

  <div class="col-12 more-button text-center mt-3 mt-lg-4">
    <a href="<?php echo humanize_category($_smarty_tpl->tpl_vars['standard_data']->value['category']);?>
/<?php echo humanize_category($_smarty_tpl->tpl_vars['subcategory']->value);?>
" class="btn btn-outline-danger">więcej</a>
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
