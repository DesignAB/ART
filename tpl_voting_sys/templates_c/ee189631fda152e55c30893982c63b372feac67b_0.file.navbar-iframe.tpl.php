<?php
/* Smarty version 4.2.1, created on 2023-01-18 12:56:46
  from '/var/www/vhosts/34art.pl/nowa34art/public/tpl_voting_sys/templates/navbar-iframe.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63c7de7e783540_90969789',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ee189631fda152e55c30893982c63b372feac67b' => 
    array (
      0 => '/var/www/vhosts/34art.pl/nowa34art/public/tpl_voting_sys/templates/navbar-iframe.tpl',
      1 => 1674043001,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63c7de7e783540_90969789 (Smarty_Internal_Template $_smarty_tpl) {
?>
<nav id="navbar1" class="navbar sticky-top bg-blue main-navi shadow-sm" style="transition: all 1s;">

  <div class="container-fluid text-center">

    <a class="navbar-brand" href="">
      <img src="<?php echo IMGFOLDER;?>
logo-white.png" alt="">
    </a>
    <h5 class="text-white">Jesteście Państwo na stronie naszego Partnera</h5>
<button class="navbar-toggler hamburger hamburger--collapse ms-0" type="button"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
  <span class="hamburger-box">
    <span class="hamburger-inner"></span>
  </span>
</button>


    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" data-bs-backdrop="false">

      <div class="offcanvas-header px-0"> <!-- added px-0-->
        <h5 class="offcanvas-title ps-4" id="offcanvasNavbarLabel">MENU</h5>
        <button type="button" class="btn-close text-reset me-2" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>


      <div class="offcanvas-body menu px-0 text-start"> <!-- added px-0-->
        <ul class="navbar-nav justify-content-end flex-grow-1"> <!--  removed pe-3-->
   <?php if (!empty(CAT_DATA)) {?>
     <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, CAT_DATA, 'value', false, 'key', 'offcancas_navi', array (
));
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
      <?php if ($_smarty_tpl->tpl_vars['value']->value['menuable'] == 'on') {?>
        <?php if (empty($_smarty_tpl->tpl_vars['value']->value['subcategory'])) {?>
          <li class="nav-item mt-1 px-4" style="position: relative;">
            <a class="nav-link effect" href="/<?php echo $_smarty_tpl->tpl_vars['value']->value['category'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['display_name'];?>
</a>
          </li>
          <?php } else { ?>
                    <li class="drop nav-item mt-1 px-4 position-relative ">
            <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $_smarty_tpl->tpl_vars['value']->value['display_name'];?>

            </a>
            <ul class="dropdown-menu border-0 rounded-0 position-relative">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, SUBCAT_DATA, 'subvalue', false, 'subkey', 'offcancas_navi_sub', array (
));
$_smarty_tpl->tpl_vars['subvalue']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['subkey']->value => $_smarty_tpl->tpl_vars['subvalue']->value) {
$_smarty_tpl->tpl_vars['subvalue']->do_else = false;
?>
            <?php if ($_smarty_tpl->tpl_vars['subvalue']->value['category'] == $_smarty_tpl->tpl_vars['value']->value['category']) {?>
            <?php if ($_smarty_tpl->tpl_vars['subvalue']->value['menuable'] == 'on') {?>
              <li class="mb-2"><a class="drop-link" href="/<?php echo $_smarty_tpl->tpl_vars['value']->value['category'];?>
/<?php echo $_smarty_tpl->tpl_vars['subvalue']->value['subcategory'];?>
"><?php echo $_smarty_tpl->tpl_vars['subvalue']->value['subcategory_display'];?>
</a></li>
            <?php }?>
            <?php }?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
          </li>
          

          <?php }?> 
      <?php }?>      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php }?>
        </ul>
      </div> <!-- offcanvas body-->


    </div><!-- offcanvas -->

  </div> <!-- container-fluid-->
</nav><?php }
}
