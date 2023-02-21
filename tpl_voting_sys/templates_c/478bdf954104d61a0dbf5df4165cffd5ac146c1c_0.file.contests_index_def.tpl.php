<?php
/* Smarty version 4.2.1, created on 2022-11-15 13:28:26
  from '/home/server645914/ftp/smartytozobacz/public/tpl_voting_sys/templates/contests_index_def.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_637385eae12ca3_41862907',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '478bdf954104d61a0dbf5df4165cffd5ac146c1c' => 
    array (
      0 => '/home/server645914/ftp/smartytozobacz/public/tpl_voting_sys/templates/contests_index_def.tpl',
      1 => 1668515293,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_637385eae12ca3_41862907 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/server645914/ftp/smartytozobacz/app/Smarty/plugins/function.cycle.php','function'=>'smarty_function_cycle',),1=>array('file'=>'/home/server645914/ftp/smartytozobacz/app/Smarty/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<div class="container-lg mb-5">
  <div class="row heading-row my-3 position-relative">
    <div class="col-12 text-center heading-row-content" style="">
      <h1 class="light-heading mb-0"><?php echo $_smarty_tpl->tpl_vars['data']->value['category_display'];?>
</h1>
      <h2 class="light-heading mt-0 mb-0"><?php echo $_smarty_tpl->tpl_vars['data']->value['category_sub_display'];?>
</h2>
    </div>
  </div>

  <div class="row contests-row">
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['contests']->value, 'value', false, 'key', 'contestsforeach', array (
));
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
    <div class="col-12 shadow-sm mb-4 bg-white">
      <div class="row">
        <!-- image-->
        <div class="col-md-5  px-0 position-relative <?php echo smarty_function_cycle(array('name'=>'first','values'=>'order-md-1, order-md-0'),$_smarty_tpl);?>
">
          <img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['image_path'];
echo $_smarty_tpl->tpl_vars['value']->value['contest_photo_image'];?>
" class="img-fluid" alt="...">

          <div class="square-1 bg-01">
          </div>
          <div class="square-2 bg-02">
          </div>
          <div class="square-3 bg-03">
          </div>
        </div>
        <!-- image-->
        <!-- content-->
        <div class="col-md-7  d-flex align-items-center dark-text">
          <div class="contest-column-padding p-lg-5 w-100">

            <h3 class="dark-heading mb-1"><?php echo $_smarty_tpl->tpl_vars['value']->value['contest_name'];?>
</h3>
            <?php if (!empty($_smarty_tpl->tpl_vars['value']->value['contest_sub_name'])) {?>
            <h4 class="dark-heading"><?php echo $_smarty_tpl->tpl_vars['value']->value['contest_sub_name'];?>
</h4>
            <?php }?>
            <p class="dark-heading"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['value']->value['full_start'],"%d-%m-%G");?>
</p>
            <p class="dark-heading"><?php echo $_smarty_tpl->tpl_vars['value']->value['full_end'];?>
</p>
            <?php echo $_smarty_tpl->tpl_vars['value']->value['contest_short_description'];?>

              <div class="contest-links">
                <a href="contestdetails/<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="btn btn-sm btn-01">Szczegóły</a>
                <a href="contestphotos/<?php echo $_smarty_tpl->tpl_vars['value']->value['contest_u_id'];?>
" class="btn btn-sm btn-01">zdjęcia</a>
                <a href="/userupload/<?php echo $_smarty_tpl->tpl_vars['value']->value['contest_u_id'];?>
" class="btn btn-sm btn-01">dodaj zdjęcie!</a>
              </div><!-- contest-links -->
              <!-- sponsors-->
              <?php if (count($_smarty_tpl->tpl_vars['sponsors_of_'.($_smarty_tpl->tpl_vars['value']->value['id'])]->value) > 0) {?>
              <div class="contest-sponsors mt-4">
                  <h5 class="card-title mb-3"><?php echo $_smarty_tpl->tpl_vars['d_sponsor_'.($_smarty_tpl->tpl_vars['value']->value['id'])]->value;?>
</h5>
                  <div class="row d-flex flex-row">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sponsors_of_'.($_smarty_tpl->tpl_vars['value']->value['id'])]->value, 'sponsor_value', false, 'key');
$_smarty_tpl->tpl_vars['sponsor_value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['sponsor_value']->value) {
$_smarty_tpl->tpl_vars['sponsor_value']->do_else = false;
?>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['sponsor_value']->value['sponsor_website'];?>
" target="blank" class="col-md-3" aria-label="Nasz sponsor <?php echo $_smarty_tpl->tpl_vars['sponsor_value']->value['sponsor_name'];?>
">
                        <img alt="<?php echo $_smarty_tpl->tpl_vars['sponsor_value']->value['sponsor_name'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['IMAGEFOLDER']->value;?>
/sponsors/<?php echo $_smarty_tpl->tpl_vars['sponsor_value']->value['sponsor_logo'];?>
" class="img-fluid" >
                      </a>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                  </div>
              </div>
              <?php }?>
              <!-- sponsors-->




          </div><!-- content column padding-->
        </div>
        <!-- content-->


      </div>
    </div>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </div><!-- contests row-->
</div><?php }
}
