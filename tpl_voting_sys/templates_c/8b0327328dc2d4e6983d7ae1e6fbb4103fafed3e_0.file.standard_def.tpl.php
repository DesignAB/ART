<?php
/* Smarty version 4.2.1, created on 2022-12-06 17:58:48
  from '/home/server645914/ftp/with_counter/public/tpl_voting_sys/templates/standard_def.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_638f74c8ed6c75_96448693',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b0327328dc2d4e6983d7ae1e6fbb4103fafed3e' => 
    array (
      0 => '/home/server645914/ftp/with_counter/public/tpl_voting_sys/templates/standard_def.tpl',
      1 => 1670338515,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:standard-paginator.tpl' => 1,
  ),
),false)) {
function content_638f74c8ed6c75_96448693 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/server645914/ftp/with_counter/app/Smarty/plugins/function.cycle.php','function'=>'smarty_function_cycle',),));
?>

<div style="height: 120px;"></div>

<div class="container-fluid mb-md-5 content">
  <div class="row g-0">
    <?php if (!empty($_smarty_tpl->tpl_vars['data']->value['catinfo'])) {?>
  <!-- heading-->
    <div class="col-12 text-center d-flex flex-column align-items-center justify-content-center heading mb-md-5 pb-3 aos-animate">
      <h1 data-aos="aos-heading-h1" data-aos-offset="200" data-aos-once="false" data-aos-duration="500" data-aos-delay="800" data-aos-anchor-placement="top-center"><?php echo $_smarty_tpl->tpl_vars['data']->value['catinfo']['display_name'];?>
</h1>
      <div class="heading-effect d-flex justify-content-center" data-aos="aos-heading" data-aos-offset="-100" data-aos-once="false" data-aos-duration="300" data-aos-delay="1000" data-aos-anchor-placement="top-center"><span data-aos="aos-heading-dot" data-aos-offset="-100" data-aos-once="false" data-aos-duration="300" data-aos-delay="800" data-aos-anchor-placement="top-center"><p>•</p></span>
      </div>
    </div>
  <!-- heading-->
    <?php }?>

    <?php if (!empty($_smarty_tpl->tpl_vars['data']->value['subcatinfo'])) {?>
      <div class="col-12">
        <h1><?php echo $_smarty_tpl->tpl_vars['data']->value['subcatinfo']['subcategory_display'];?>
</h1>
        <h1><?php echo $_smarty_tpl->tpl_vars['data']->value['subcatinfo']['subcategory_subdisplay'];?>
</h1>
      </div>
    <?php }?>
  </div><!-- heading row ends-->

  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['articles_row'], 'value', false, 'key', 'counter', array (
));
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
  <div class="row g-0">
    <?php $_smarty_tpl->_assignInScope('content_col', "col-12 mt-md-5");?>
    <?php if (!empty($_smarty_tpl->tpl_vars['value']->value['image'])) {?>
    <?php $_smarty_tpl->_assignInScope('content_col', "col-md-6");?>

        <div class="col-md-6 h-100 index-article-image <?php echo smarty_function_cycle(array('name'=>'first','values'=>'order-0, order-1'),$_smarty_tpl);?>
"  data-aos="aos-shadow" data-aos-offset="0" data-aos-once="false" data-aos-duration="300" data-aos-delay="100" data-aos-anchor-placement="top-center">
            <picture>
              <source srcset="<?php echo $_smarty_tpl->tpl_vars['IMAGEFOLDER']->value;
echo $_smarty_tpl->tpl_vars['data']->value['catinfo']['category'];?>
/<?php echo $_smarty_tpl->tpl_vars['value']->value['image'];?>
" media="(min-width:992px)" type="image/svg+xml">
              <img src="<?php echo $_smarty_tpl->tpl_vars['IMAGEFOLDER']->value;
echo $_smarty_tpl->tpl_vars['data']->value['catinfo']['category'];?>
/<?php echo $_smarty_tpl->tpl_vars['value']->value['image_mobile'];?>
" class="img-fluid" alt="...">
            </picture>
        </div><!-- .col-md-6-->

    <?php }?>
          <div class="<?php echo $_smarty_tpl->tpl_vars['content_col']->value;?>
 index-article-content px-4 py-3 d-flex flex-column justify-content-center <?php echo smarty_function_cycle(array('name'=>'second','values'=>'order-1, order-0'),$_smarty_tpl);?>
">
          <h2><?php echo $_smarty_tpl->tpl_vars['value']->value['header'];?>
</h2>
          <h3><?php echo $_smarty_tpl->tpl_vars['value']->value['subheader'];?>
</h3>
          <?php echo $_smarty_tpl->tpl_vars['value']->value['short_content'];?>

          <?php echo $_smarty_tpl->tpl_vars['value']->value['content'];?>

          </div><!-- .col-md-6-->



  </div><!-- content row ends-->
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

  <!-- footing-->
  <div class="row">
    <div class="col-12 text-center d-flex flex-column align-items-center justify-content-center heading  my-5 mb-md-5 mt-md-5 py-5 aos-animate">
      <div class="heading-effect d-flex justify-content-center" data-aos="aos-heading" data-aos-offset="-100" data-aos-once="false" data-aos-duration="300" data-aos-delay="200" data-aos-anchor-placement="top-center"><span data-aos="aos-heading-dot" data-aos-offset="-100" data-aos-once="false" data-aos-duration="300" data-aos-delay="0" data-aos-anchor-placement="top-center"><p>•</p></span>
      </div>
    </div>
  </div>
  <!-- footing-->


</div><!-- main container ends -->

<?php if ($_smarty_tpl->tpl_vars['data']->value['pagination'] == 'on') {
$_smarty_tpl->_subTemplateRender('file:standard-paginator.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'Newest links','pages'=>$_smarty_tpl->tpl_vars['data']->value), 0, false);
}?>



<?php }
}
