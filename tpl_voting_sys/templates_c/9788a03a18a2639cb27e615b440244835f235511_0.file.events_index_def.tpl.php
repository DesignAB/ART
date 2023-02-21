<?php
/* Smarty version 4.2.1, created on 2022-11-30 12:18:36
  from '/home/server645914/ftp/smartyart/public/tpl_voting_sys/templates/events_index_def.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63873c0cd9abf5_21645919',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9788a03a18a2639cb27e615b440244835f235511' => 
    array (
      0 => '/home/server645914/ftp/smartyart/public/tpl_voting_sys/templates/events_index_def.tpl',
      1 => 1669807115,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63873c0cd9abf5_21645919 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/server645914/ftp/smartyart/app/Smarty/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>

<div class="sortable container-fluid" id="events">

  <div class="col-12 separator <?php echo $_smarty_tpl->tpl_vars['separator_display']->value;?>
" style="height: 100px;"></div>

  <div class="row sortable-row">
<?php if (empty($_smarty_tpl->tpl_vars['events']->value)) {?>
    <div class="col-12 text-center d-flex flex-column align-items-center justify-content-center heading mb-md-5 pb-3 aos-animate mt-md-5">
      <h1 data-aos="aos-heading-h1" data-aos-offset="0" data-aos-once="false" data-aos-duration="500" data-aos-delay="0" data-aos-anchor-placement="top-center">Nie dodano wydarzeń</h1>
      <div class="heading-effect d-flex justify-content-center" data-aos="aos-heading" data-aos-offset="-100" data-aos-once="false" data-aos-duration="300" data-aos-delay="200" data-aos-anchor-placement="top-center"><span data-aos="aos-heading-dot" data-aos-offset="-100" data-aos-once="false" data-aos-duration="300" data-aos-delay="0" data-aos-anchor-placement="top-center"><p>•</p></span>
      </div>
    </div>

<?php }?>

<?php if (!empty($_smarty_tpl->tpl_vars['events']->value)) {?>
    <div class="col-12 text-center d-flex flex-column align-items-center justify-content-center heading mb-md-5 pb-3 aos-animate">
      <h1 data-aos="aos-heading-h1" data-aos-offset="0" data-aos-once="false" data-aos-duration="500" data-aos-delay="0" data-aos-anchor-placement="top-center">Nasze wydarzenia</h1>
      <div class="heading-effect d-flex justify-content-center" data-aos="aos-heading" data-aos-offset="-100" data-aos-once="false" data-aos-duration="300" data-aos-delay="200" data-aos-anchor-placement="top-center"><span data-aos="aos-heading-dot" data-aos-offset="-100" data-aos-once="false" data-aos-duration="300" data-aos-delay="0" data-aos-anchor-placement="top-center"><p>•</p></span>
      </div>
    </div>



<!-- portfolio navi-->
          <div class="col-12 text-center">
            <div id="filters" class="filters text-center">
              <ul class="sortable__nav nav "> 
                <li>
                  <a href="#" data-filter="*" class="active nav__link">wszystkie</a>
                </li>
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['event_dates']->value, 'filter_value', false, 'key');
$_smarty_tpl->tpl_vars['filter_value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['filter_value']->value) {
$_smarty_tpl->tpl_vars['filter_value']->do_else = false;
?>
                  <?php if (smarty_modifier_date_format(time(),"%G") != smarty_modifier_date_format($_smarty_tpl->tpl_vars['filter_value']->value,"%G")) {?>
                  <?php $_smarty_tpl->_assignInScope('yearDisplay', smarty_modifier_date_format($_smarty_tpl->tpl_vars['filter_value']->value,"%G"));?>
                  <?php }?>
                  <?php $_smarty_tpl->_assignInScope('filter', smarty_modifier_date_format($_smarty_tpl->tpl_vars['filter_value']->value,"%G_%m"));?>
                  <?php $_smarty_tpl->_assignInScope('filterDisplay', smarty_modifier_date_format($_smarty_tpl->tpl_vars['filter_value']->value,"%m"));?>

                  <li>
                    <a href="#" data-filter=".<?php echo $_smarty_tpl->tpl_vars['filter_value']->value;?>
" class="nav__link"><?php echo monthNamePl($_smarty_tpl->tpl_vars['filterDisplay']->value);?>
 <?php echo $_smarty_tpl->tpl_vars['yearDisplay']->value;?>
</a>

                  </li>
                  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

              </ul>
            </div>
          </div>
<!-- portfolio navi ends-->

    <div class="col-12 col-for-isotope">
      <div id="portfolio-grid" class="row no-gutter"  data-masonry='<?php echo $_smarty_tpl->tpl_vars['data_masonry']->value;?>
'>

          <!-- element -->
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['events']->value, 'value', false, 'k');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
      <?php $_smarty_tpl->_assignInScope('itemfilter', smarty_modifier_date_format($_smarty_tpl->tpl_vars['value']->value['custom_event_date'],"%G-%m"));?>

          <div class="item <?php echo $_smarty_tpl->tpl_vars['itemfilter']->value;?>
  col-lg-4  col-xl-3 mb-4">

            <div class="card index-card text-white overflow-hidden shadow">
              <img src="<?php echo $_smarty_tpl->tpl_vars['image_path']->value;
echo $_smarty_tpl->tpl_vars['value']->value['uploaded_image'];?>
" class="card-img rounded-0" alt="...">

              <div class="custom-card-img-overlay">
                <h6 class="card-title"><?php echo $_smarty_tpl->tpl_vars['value']->value['artist_name'];?>
</h6>
              </div>

              <div class="custom-card-img-overlay-full">
                <h6 class="card-title mb-0"><?php echo $_smarty_tpl->tpl_vars['value']->value['artist_name'];?>
</h6>
                <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['value']->value['custom_event_date'];?>
  <?php echo $_smarty_tpl->tpl_vars['value']->value['hall_city'];?>
<br><?php echo $_smarty_tpl->tpl_vars['value']->value['hall_full_name'];?>
</p>

                <a href="https://bilety.34art.pl/event/view/id/<?php echo $_smarty_tpl->tpl_vars['value']->value['event_id'];?>
" class="btn btn-danger btn-sm">kup bilet <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['value']->value['custom_event_time'],"%H:%M");?>
</a>

                <?php if (!empty($_smarty_tpl->tpl_vars['value']->value['parent_to'])) {?>
                <a href="https://bilety.34art.pl/event/view/id/<?php echo $_smarty_tpl->tpl_vars['value']->value['parent_to'];?>
" class="btn btn-danger btn-sm">kup bilet 20:30</a>
                <?php }?>

                <a href="event/<?php echo createLinkForMe($_smarty_tpl->tpl_vars['value']->value['artist_name']);?>
/<?php echo $_smarty_tpl->tpl_vars['value']->value['event_id'];?>
" class="btn btn-danger btn-sm">więcej</a>
              </div>



            </div><!-- card-->

          </div> <!-- item -->

           <!-- element-->
           <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


      </div>    </div>

<?php }?>


  </div>
</div><?php }
}
