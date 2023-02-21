<?php
/* Smarty version 4.2.1, created on 2022-11-14 13:23:31
  from '/home/server645914/ftp/smartytozobacz/public/tpl_voting_sys/templates/standard-paginator.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_637233436a8781_67969908',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '35c612f740c09de410853248ca78306022183066' => 
    array (
      0 => '/home/server645914/ftp/smartytozobacz/public/tpl_voting_sys/templates/standard-paginator.tpl',
      1 => 1668428609,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_637233436a8781_67969908 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container-lg mt-3">
	<div class="row">
		<div class="col-12 d-flex flex-row justify-content-center custom-pagination">


<?php
$_smarty_tpl->tpl_vars['x'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['x']->step = 1;$_smarty_tpl->tpl_vars['x']->total = (int) ceil(($_smarty_tpl->tpl_vars['x']->step > 0 ? $_smarty_tpl->tpl_vars['data']->value['all_pages']+1 - (1) : 1-($_smarty_tpl->tpl_vars['data']->value['all_pages'])+1)/abs($_smarty_tpl->tpl_vars['x']->step));
if ($_smarty_tpl->tpl_vars['x']->total > 0) {
for ($_smarty_tpl->tpl_vars['x']->value = 1, $_smarty_tpl->tpl_vars['x']->iteration = 1;$_smarty_tpl->tpl_vars['x']->iteration <= $_smarty_tpl->tpl_vars['x']->total;$_smarty_tpl->tpl_vars['x']->value += $_smarty_tpl->tpl_vars['x']->step, $_smarty_tpl->tpl_vars['x']->iteration++) {
$_smarty_tpl->tpl_vars['x']->first = $_smarty_tpl->tpl_vars['x']->iteration === 1;$_smarty_tpl->tpl_vars['x']->last = $_smarty_tpl->tpl_vars['x']->iteration === $_smarty_tpl->tpl_vars['x']->total;?>

<?php if ($_smarty_tpl->tpl_vars['data']->value['page'] == $_smarty_tpl->tpl_vars['x']->value) {?>
			<div class="pagin-box shadow active bg-01 text-white">
		      <span class="pagin-link"><?php echo $_smarty_tpl->tpl_vars['x']->value;?>
</span>
		    </div>  
<?php } else { ?>
			<div class="pagin-box shadow-sm position-relative">
		    <a class="pagin-link color-01 stretched-link" href="<?php echo $_smarty_tpl->tpl_vars['data']->value['pagelink'];
echo $_smarty_tpl->tpl_vars['x']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['x']->value;?>
</a>
		    </div>  

<?php }?>


<?php }
}
?>
		</div><!-- pagination col ends-->
		
	</div><!-- row ends -->
</div><!-- container ends -->

<?php }
}
