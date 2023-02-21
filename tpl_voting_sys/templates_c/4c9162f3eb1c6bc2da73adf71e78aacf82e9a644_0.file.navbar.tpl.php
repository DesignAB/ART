<?php
/* Smarty version 4.2.1, created on 2022-12-06 16:00:48
  from '/home/server645914/ftp/with_counter/public/tpl_voting_sys/templates/navbar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_638f592037d661_85876915',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c9162f3eb1c6bc2da73adf71e78aacf82e9a644' => 
    array (
      0 => '/home/server645914/ftp/with_counter/public/tpl_voting_sys/templates/navbar.tpl',
      1 => 1670338514,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_638f592037d661_85876915 (Smarty_Internal_Template $_smarty_tpl) {
?>
<nav id="navbar1" class="navbar fixed-top bg-blue main-navi shadow-sm" style="transition: all 1s;">

  <div class="container-fluid text-right">

    <a class="navbar-brand" href="">
      <img src="<?php echo IMGFOLDER;?>
logo-white.png" alt="">
    </a>

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


      <div class="offcanvas-body menu px-0"> <!-- added px-0-->
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
          <li class="nav-item mt-1 px-4" style="position: relative;">
            <a class="nav-link effect" href="/<?php echo $_smarty_tpl->tpl_vars['value']->value['category'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['display_name'];?>
</a>
          </li>

      <?php }?>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php }?>
        </ul>
      </div> <!-- offcanvas body-->


    </div><!-- offcanvas -->

  </div> <!-- container-fluid-->
</nav><?php }
}
