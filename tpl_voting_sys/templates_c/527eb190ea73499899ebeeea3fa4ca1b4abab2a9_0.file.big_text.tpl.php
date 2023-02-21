<?php
/* Smarty version 4.2.1, created on 2022-11-21 13:03:23
  from '/home/server645914/ftp/smartytozobacz/public/tpl_voting_sys/templates/big_text.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_637b690b98d380_97478406',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '527eb190ea73499899ebeeea3fa4ca1b4abab2a9' => 
    array (
      0 => '/home/server645914/ftp/smartytozobacz/public/tpl_voting_sys/templates/big_text.tpl',
      1 => 1669032202,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:standard-paginator.tpl' => 1,
  ),
),false)) {
function content_637b690b98d380_97478406 (Smarty_Internal_Template $_smarty_tpl) {
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
  <div class="row standard-big-text template-row overflow-hidden">
    <div class="col-12 p-0 content-column position-relative card shadow mb-3  <?php echo smarty_function_cycle(array('name'=>'first','values'=>'even,odd'),$_smarty_tpl);?>
 ">
            <div class="center-stripe bg-03 <?php echo $_smarty_tpl->tpl_vars['data']->value['overlay_color'];?>
 d-none"></div>
      <div class="side-stripe bg-01 <?php echo $_smarty_tpl->tpl_vars['data']->value['overlay_color'];?>
"></div>
      


      <div id="<?php echo $_smarty_tpl->tpl_vars['value']->value['header'];?>
aos" class="row g-0 standard-big-text-row position-relative d-flex align-items-center p-5 <?php echo smarty_function_cycle(array('name'=>'second','values'=>'even,odd'),$_smarty_tpl);?>
 overflow-hidden">

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

              <?php if (!empty($_smarty_tpl->tpl_vars['value']->value['content'])) {?>
              <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['before_link'];
echo createLinkForMe($_smarty_tpl->tpl_vars['value']->value['header']);?>
/<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="btn btn-sm btn-01 <?php echo $_smarty_tpl->tpl_vars['value']->value['button_kind'];?>
 mt-3 dark_heading_color">czytaj to!</a>
              <?php }?>
          </div>
        </div>
        <!-- content-col -->

        <!-- image-col -->
        <div class="col-md-5 image-col <?php echo smarty_function_cycle(array('name'=>'fourth','values'=>'order-md-1 order-1,order-md-0 order-1 '),$_smarty_tpl);?>
 position-relative shadow mb-3"  
        data-aos="just-fade-in" data-aos-offset="0" data-aos-once="false" data-aos-duration="1200" data-aos-delay="0" data-aos-anchor-placement="top-center">
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
" class="img-fluid shadow" alt="<?php echo $_smarty_tpl->tpl_vars['value']->value['image_index_alt'];?>
" style="object-fit: cover; display: block;">
          </picture>
          <div class="square-1 bg-01"></div>
          <div class="square-2 bg-02"></div>
          <div class="square-3 bg-03"></div>

        </div>
        <!-- image-col -->
      <div class="general-overlay bg-03 <?php echo $_smarty_tpl->tpl_vars['data']->value['overlay_color'];?>
 cpv-1-3-1"   
        data-aos="to-top" data-aos-offset="0" data-aos-once="false" data-aos-duration="800" data-aos-delay="0" data-aos-anchor-placement="top-center"></div>

      <div class="general-overlay bg-03 <?php echo $_smarty_tpl->tpl_vars['data']->value['overlay_color'];?>
 cpv-1-3-2"   
        data-aos="to-bottom" data-aos-offset="0" data-aos-once="false" data-aos-duration="800" data-aos-delay="0" data-aos-anchor-placement="top-center"></div>

      <div class="general-overlay bg-03 <?php echo $_smarty_tpl->tpl_vars['data']->value['overlay_color'];?>
 cpv-1-3-3"   
        data-aos="to-top" data-aos-offset="0" data-aos-once="false" data-aos-duration="800" data-aos-delay="0" data-aos-anchor-placement="top-center"></div>




      </div><!-- row in content-column-->
    </div><!-- content-column-->
  </div>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div><!-- main container ends -->

<?php if ($_smarty_tpl->tpl_vars['data']->value['pagination'] == 'on') {
$_smarty_tpl->_subTemplateRender('file:standard-paginator.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'Newest links','pages'=>$_smarty_tpl->tpl_vars['data']->value), 0, false);
}?>



<?php }
}
