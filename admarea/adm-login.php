<?php
  $messages = $this->loadAdmModel("admmessenger");
  $data['messenger'] = $messages;

  $admin = $this->loadAdmModel("admin");
  if (isset($_POST['email']) && isset($_POST['password'])) {
  $admin_login = $admin->adminLogin($POST);
  }
?>
<!DOCTYPE html>

<html lang="pl">
  <head>
<?php
include ('adm_includes/all_meta.php');
include ('assets/css/all-css.php');

?>

    <title><?=$data['page_title']?></title>
  </head>
  <body>
<?php
?>
    <div class="container-lg px-4">
      <div class="row align-items-center justify-content-center" style="min-height: 100vh">
        <div class="col-12 mb-3 shadow py-md-5">
          <div class="row g-0">
        <?php $adm_message = $data['messenger']->admMessage();?>

<?php
if (!isset($_COOKIE[CookiesAdmPrefix])) {
$this->admInclude("/adm_views/loginform.view.php", $data);
}
?>





          </div>
        </div>
      </div>
    </div>

<?php
    // $load_me->loadFileFromIncludes('_includes/footer.view.php');
?>



<?php
    include ('assets/js/essential-js.php');

?>
    <script src="admarea/assets/js/user-login.js"></script>

  </body>
</html>
