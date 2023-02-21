<?php
/* Smarty version 4.2.1, created on 2022-11-15 12:45:23
  from '/home/server645914/ftp/smartytozobacz/public/tpl_voting_sys/templates/events_index_def.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63737bd3e757c9_60977788',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '95b427b818124dbaa6e601531ca6a9ed367369a7' => 
    array (
      0 => '/home/server645914/ftp/smartytozobacz/public/tpl_voting_sys/templates/events_index_def.tpl',
      1 => 1668511795,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63737bd3e757c9_60977788 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/server645914/ftp/smartytozobacz/app/Smarty/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
echo '<?php'; ?>


<?php echo '?>'; ?>


<div class="container-fluid">

  <div class="row heading-row mb-3 position-relative">
    <div class="col-12 text-center heading-row-content" style="">
      <h1 class="light-heading mb-0"><?php echo $_smarty_tpl->tpl_vars['category_display']->value;?>
</h1>
      <h2 class="light-heading mt-0 mb-0"><?php echo $_smarty_tpl->tpl_vars['category_sub_display']->value;?>
</h2>
    </div>
  </div>



  <div class="row gx-3 cat-row" data-masonry='<?php echo $_smarty_tpl->tpl_vars['data_masonry']->value;?>
'>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['events']->value, 'value', false, 'k');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
    <div class="col-md-4 col-lg-3 mb-4 ">

      <div class="card mb-3 shadow h-100">
      <img src="<?php echo $_smarty_tpl->tpl_vars['image_path']->value;
echo $_smarty_tpl->tpl_vars['value']->value['uploaded_image'];?>
" class="card-img-top" alt="<?php echo $_smarty_tpl->tpl_vars['value']->value['artist_name'];?>
">
        <div class="card-body">

          <h6 class="card-title dark_heading_color color-01"><?php echo $_smarty_tpl->tpl_vars['value']->value['artist_name'];?>
</h6>
          <h6 class="card-title dark_heading_color color-01"><?php echo $_smarty_tpl->tpl_vars['value']->value['custom_event_date'];?>
</h6>
          
          <a href="events/<?php echo createLinkForMe($_smarty_tpl->tpl_vars['value']->value['artist_name']);?>
/<?php echo $_smarty_tpl->tpl_vars['value']->value['event_id'];?>
" class="btn btn-sm btn-01 mt-3 dark_heading_color" aria-label="Przeczytaj więcej o <?php echo $_smarty_tpl->tpl_vars['value']->value['artist_name'];?>
">więcej</a>
        <a href="https://bilety.34art.pl/event/view/id/<?php echo $_smarty_tpl->tpl_vars['value']->value['event_id'];?>
" class="btn btn-sm btn-01 mt-3 dark_heading_color" aria-label="Kup bilet <?php echo $_smarty_tpl->tpl_vars['value']->value['artist_name'];?>
">kup <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['value']->value['custom_event_time'],"%H:%M");?>
</a>


          <?php if (!empty($_smarty_tpl->tpl_vars['value']->value['parent_to'])) {?>
          <a href="https://bilety.34art.pl/event/view/id/<?php echo $_smarty_tpl->tpl_vars['value']->value['parent_to'];?>
" class="btn btn-sm btn-01 mt-3 dark_heading_color" aria-label="Przeczytaj więcej o <?php echo $_smarty_tpl->tpl_vars['value']->value['artist_name'];?>
">kup <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['value']->value['child_hour'],"%H:%M");?>
</a>

          <?php }?>
        </div><!-- card body ends-->
      </div><!-- card ends -->

    </div>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


  </div><!-- cat row-->

  <!-- more button -->
  <?php if ($_smarty_tpl->tpl_vars['all_articles_count']->value > $_smarty_tpl->tpl_vars['articles_count']->value) {?>
    <div class="row gx-3 more-button-row standard-big-text">

    <div class="col-12 more-button text-center">
      <a href="events" class="btn btn-01 mt-3">zobacz wszystkie</a>
    </div>
    </div><!--more-button-row-->
  <?php }?>
  <!-- more button -->


</div><!-- container ends-->

<?php }
}
