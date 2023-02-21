<?php
/* Smarty version 4.2.1, created on 2022-11-15 13:26:55
  from '/home/server645914/ftp/smartytozobacz/public/tpl_voting_sys/templates/offcanvas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6373858f1b8da7_85597055',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '159886ab4979790f6775220f94da3711850919af' => 
    array (
      0 => '/home/server645914/ftp/smartytozobacz/public/tpl_voting_sys/templates/offcanvas.tpl',
      1 => 1668515211,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6373858f1b8da7_85597055 (Smarty_Internal_Template $_smarty_tpl) {
?><nav class="navbar navbar-position pb-4 pb-md-2 offcanvas-menu">
  <div class="navbar-overlay navbar-bg d-md-none"></div>

  <div class="container-fluid" style="z-index: 2;">
    <a class="navbar-brand ms-md-3" href="/">
    <img src="<?php echo IMGFOLDER;?>
brand.jpg" class="navbar-brand-image shadow" alt="...">
    </a>

    <?php echo '<?php'; ?>
 if (isset($_SESSION[WEBSITE_NAME.'_u_id'])):<?php echo '?>'; ?>

      <span class="navbar-text ms-auto px-2">
        <a href="/userdashboard" aria-label="Strefa użytkownika">
        <?php echo '<?'; ?>
='HELLO '.$_SESSION[WEBSITE_NAME.'_user_name']<?php echo '?>'; ?>

        </a>
      </span>
    <?php echo '<?php'; ?>
 endif;<?php echo '?>'; ?>

        
    <button class="navbar-toggler navbar-bg border-0" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">

<i class="bi bi-dash-lg my-0 py-0" style="line-height: .3rem;"></i>
<p class="my-0 py-0">MENU</p>

    </button>

    <div class="offcanvas offcanvas-bg offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" data-bs-backdrop="false" data-bs-scroll="true">

      <div class="offcanvas-header order-1 order-lg-0">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">MENU</h5>
        <button type="button" class="navbar-toggler border-0" data-bs-dismiss="offcanvas" aria-label="Close"><i class="bi bi-x-circle"></i>
        </button>
      </div>

      <div class="offcanvas-body d-flex align-items-end align-items-md-start order-0 order-lg-1">

      <ul class="navbar-nav ms-auto me-md-5 text-center text-md-start w-100">

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
        <li class="nav-item py-">
          <a class="nav-link main py-0 pb-1" aria-current="page" href="/<?php echo $_smarty_tpl->tpl_vars['value']->value['category'];?>
"><span class="mb-1 p-0"><?php echo $_smarty_tpl->tpl_vars['value']->value['display_name'];?>
</span></a>
        </li>
        <?php }?>

          <?php if ($_smarty_tpl->tpl_vars['value']->value['subcategory'] == 'on') {?>
          <?php $_smarty_tpl->_assignInScope('leave', leaveSubcategory($_smarty_tpl->tpl_vars['value']->value['category']));?>
          <li class="nav-item py-">
            <p class="nav-link main py-0 pb-1" aria-current="page" ><span class="mb-1 p-0"><?php echo $_smarty_tpl->tpl_vars['value']->value['display_name'];?>
</span></p>
          </li>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['leave']->value, 'sub_value', false, 'subkey', 'suboffcancas_navi', array (
));
$_smarty_tpl->tpl_vars['sub_value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['subkey']->value => $_smarty_tpl->tpl_vars['sub_value']->value) {
$_smarty_tpl->tpl_vars['sub_value']->do_else = false;
?>
              <?php if ($_smarty_tpl->tpl_vars['sub_value']->value['menuable'] == 'on') {?>
                <li class="nav-item my-0 py-1 ">
                  <a class="nav-link sub py-0" aria-current="page" href="/<?php echo $_smarty_tpl->tpl_vars['sub_value']->value['category'];?>
/<?php echo $_smarty_tpl->tpl_vars['sub_value']->value['subcategory'];?>
"><?php echo $_smarty_tpl->tpl_vars['sub_value']->value['subcategory_display'];?>
</a>
                </li>
              <?php }?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


          <?php }?>

          <hr>



      <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  <?php }?>

    <?php if (empty($_SESSION[$_smarty_tpl->tpl_vars['user_session']->value])) {?>
        <li class="nav-item">
          <a class="nav-link" href="userregister">zarejestruj się</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="userlogin">zaloguj</a>
        </li>
    <?php }?>

    <?php if (!empty($_SESSION[$_smarty_tpl->tpl_vars['user_session']->value])) {?>

        <li class="nav-item">
      <form method="POST" enctype="multipart/form-data">
        <input type="hidden" id="important" class="form-control form-control-sm" name="log_out">
        <button id="" class="no-button">wyloguj</button>
      </form>

        </li>
    <?php }?>



<!--         <li class="nav-item">
          <a class="nav-link language" href="#" lang="en">eng</a>
        </li>
        <li class="nav-item">
          <a class="nav-link language" href="#" lang="pl">pl</a>
        </li>
 -->
      </ul>


      </div><!-- offcanvas body-->



        <div class="offcanvas-overlay offcanvas-bg" style="z-index: -1;"></div>

    </div>


  </div>
</nav>
<div class="bottom-navbar-margin d-none d-md-block"></div><?php }
}
