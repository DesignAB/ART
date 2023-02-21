<?php
/* Smarty version 4.2.1, created on 2022-11-15 13:37:58
  from '/home/server645914/ftp/smartytozobacz/public/tpl_voting_sys/templates/partners.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63738826aac3c2_89114031',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd9d243ce9fac5d9a630584b8a8e333a084f4d394' => 
    array (
      0 => '/home/server645914/ftp/smartytozobacz/public/tpl_voting_sys/templates/partners.tpl',
      1 => 1668515873,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63738826aac3c2_89114031 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container-fluid py-3 partners">

  <div class="row heading-row mb-3 position-relative">
    <div class="col-12 text-center heading-row-content" style="">
      <h1 class="light-heading mb-0">Nasi Partnerzy</h1>
    </div>
  </div>

  <div class="row cat-row mb-3 d-flex justify-content-center">
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['standard_data']->value['partners_row'], 'value', false, 'key', 'counter', array (
));
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
    <div class="col-md-2 mb-3 standard-index-def partners-col">
      <div class="card h-100 text-center shadow">
            <img alt="<?php echo $_smarty_tpl->tpl_vars['value']->value['header'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['standard_data']->value['image_path'];
echo $_smarty_tpl->tpl_vars['value']->value['image'];?>
" class="card-img-top partners-image">
            <?php if (!empty($_smarty_tpl->tpl_vars['value']->value['link'])) {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['value']->value['link'];?>
" class="stretched-link"  aria-label="Nasz partner <?php echo $_smarty_tpl->tpl_vars['value']->value['header'];?>
"></a>      
            <?php }?>
<!--         <div class="card-body">
          <h4 class="card-title dark-heading"><?php echo $_smarty_tpl->tpl_vars['value']->value['header'];?>
</h4>
        </div>
 -->
      </div>

    </div>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>




  </div><!-- cat row-->


</div><!-- container ends-->


<?php }
}
