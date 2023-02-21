<?php
/* Smarty version 4.2.1, created on 2022-11-23 16:08:10
  from '/home/server645914/ftp/smartyart/public/tpl_voting_sys/templates/events.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_637e375a5039e0_00744885',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b5aa69998ea51d653d3790c8c67c093030507997' => 
    array (
      0 => '/home/server645914/ftp/smartyart/public/tpl_voting_sys/templates/events.tpl',
      1 => 1669216087,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_637e375a5039e0_00744885 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/server645914/ftp/smartyart/app/Smarty/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<div class="container-lg">
    <div class="row">

        <div class="col-12">
            <h1>Nasze wydarzenia</h1>
        </div>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['events']->value, 'value', false, 'key', 'counter', array (
));
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>

    <div class="card mb-3 shadow">
        <div class="row px-0">

            <div class="col-md-2 px-0 d-flex align-items-center">
            <img src="<?php echo $_smarty_tpl->tpl_vars['IMAGEFOLDER']->value;?>
/events/<?php echo $_smarty_tpl->tpl_vars['value']->value['uploaded_image'];?>
" class="img-fluid shadow-sm" alt="...">
            </div>

            <div class="col-md-10 d-flex align-items-center ps-md-5">
                <div class="card-body">
                    <div class="row in-card-body">
                        <div class="col-md-6">
                        <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['value']->value['artist_name'];?>
</h5>
                        <h6 class="card-title "><?php echo $_smarty_tpl->tpl_vars['value']->value['hall_full_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['value']->value['custom_event_date'];?>
</h6>
                        </div>
                        <div class="col-md-6">
                            <a href="https://bilety.34art.pl/event/view/id/<?php echo $_smarty_tpl->tpl_vars['value']->value['event_id'];?>
" class="btn btn-sm btn-01 mt-3 dark_heading_color">kup <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['value']->value['custom_event_time'],"%H:%M");?>
</a>
                                <?php if (!empty($_smarty_tpl->tpl_vars['value']->value['parent_to'])) {?>
                                <a href="https://bilety.34art.pl/event/view/id/<?php echo $_smarty_tpl->tpl_vars['value']->value['parent_to'];?>
" class="btn btn-sm btn-01 mt-3 dark_heading_color">kup <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['value']->value['custom_event_time'],"%H:%M");?>
</a>
                                <?php }?>


                            <button class="btn btn-sm btn-01 mt-3 dark_heading_color" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $_smarty_tpl->tpl_vars['value']->value['event_id'];?>
" aria-expanded="true" aria-controls="collapseOne">szczegóły</button>
                        </div>
                        <div class="col-12">
                            <!-- accordion for description -->
                                    <div class="accordion-item">

                                        <div id="collapse<?php echo $_smarty_tpl->tpl_vars['value']->value['event_id'];?>
" class="accordion-collapse collapse" aria-labelledby="headingOne">
                                        <div class="accordion-body">
                                        <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['value']->value['artist_description'];?>
</p>
                                        </div>
                                        </div>
                                    </div>

                            <!-- accordion for description -->
                        </div>
                    </div><!-- row in-card-body -->

                </div><!-- card-body ends-->
            </div>


        </div>
    </div><!-- card ends -->

<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    </div>
</div><?php }
}
