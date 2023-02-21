<?php
/* Smarty version 4.2.1, created on 2022-11-25 16:25:00
  from '/home/server645914/ftp/smartyart/public/tpl_voting_sys/templates/partners.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6380de4c28f589_92363922',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '87f78fddbfb499eac18d9da7b63a6710a4d2f2cb' => 
    array (
      0 => '/home/server645914/ftp/smartyart/public/tpl_voting_sys/templates/partners.tpl',
      1 => 1669389897,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6380de4c28f589_92363922 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="partnerzy" class="container partners">
  <div class="row g-0">
    </div>
    <!-- heading-->
    <div class="col-12 text-center d-flex flex-column align-items-center justify-content-center heading mb-md-5 pb-3 aos-animate">
      <h1 data-aos="aos-heading-h1" data-aos-offset="0" data-aos-once="false" data-aos-duration="500" data-aos-delay="0" data-aos-anchor-placement="top-center">Nasi partnerzy</h1>
      <div class="heading-effect d-flex justify-content-center" data-aos="aos-heading" data-aos-offset="-100" data-aos-once="false" data-aos-duration="300" data-aos-delay="200" data-aos-anchor-placement="top-center"><span data-aos="aos-heading-dot" data-aos-offset="-100" data-aos-once="false" data-aos-duration="300" data-aos-delay="0" data-aos-anchor-placement="top-center"><p>•</p></span>
      </div>
    </div>
    <!-- heading-->


    <div class="col-12">
      <div class="container-fluid mt-lg-2 pb-5">
        <div class="row for-similar-cards row-cols-1 row-cols-md-3 row-cols-lg-5 g-4 mt-2">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['standard_data']->value['partners_row'], 'value', false, 'key', 'counter', array (
));
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
          <div class="col">
            <div class="card similar-card h-100 border-0 d-flex align-items-center justify-content-center"  data-aos="aos-shadow" data-aos-offset="-200" data-aos-once="false" data-aos-duration="300" data-aos-delay="" data-aos-anchor-placement="top-center">
              <img src="<?php echo $_smarty_tpl->tpl_vars['standard_data']->value['image_path'];
echo $_smarty_tpl->tpl_vars['value']->value['image'];?>
" class="card-img p-2" alt="..." style="max-width: 200px;">
              <?php if (!empty($_smarty_tpl->tpl_vars['value']->value['link'])) {?>
              <a href="<?php echo $_smarty_tpl->tpl_vars['value']->value['link'];?>
" class="stretched-link"  aria-label="Nasz partner <?php echo $_smarty_tpl->tpl_vars['value']->value['header'];?>
"></a>      
              <?php }?>
            </div>

          </div>  <!-- .col for-similar-cards-->

    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
      </div>
    </div>


  </div><!-- partners row-->
</div><!-- container ends-->


<?php }
}
