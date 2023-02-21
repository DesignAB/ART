<?php
  $messages = $this->loadAdmModel("admmessenger");
  $data['messenger'] = $messages;

?>
<!DOCTYPE html>

<html lang="pl">
  <head>
    <!-- Bootstrap CSS -->
<?php
// $load_me->loadFileFromIncludes('_includes/all-meta.php');

?>

<?php
include ('adm_includes/all_meta.php');
include ('assets/css/all-css.php');
?>
    <title><?=$data['page_title']?></title>
  </head>
  <body>
<?php

$this->admInclude("/adm_views/admnavi.view.php", $data);


?>
    <div class="container-lg px-4" style="min-height: 100vh;">
      <div class="row align-items-center justify-content-center" style="min-height: 100vh;">

        <div class="col-12 mb-3 shadow py-md-5 " >
          <div class="row g-0">
        <?php $adm_message = $data['messenger']->admMessage();?>
          <div class="col-12 alert alert-success mb-3" role="alert">
            <?=$data['adm_f_name'];?>!<br>Witaj w panelu administracyjnym!<br>
          </div>

              <div class="col-md-3">
                <div class=" p-3 m-3 text-center border border-success position-relative">
                    <i class="bi bi-grip-horizontal text-success" style="font-size: 3rem;"></i>
                    <br>
                  <a class="btn btn-success btn-sm stretched-link" href="/adm_carousels">karuzela</a>
                </div>
              </div>

          <?php if (!empty($data['admin_modules'])):?>  
          <?php foreach ($data['admin_modules'] as $key => $value):?>

              <div class="col-md-3">
                <div class=" p-3 m-3 text-center border border-success position-relative">
                    <i class="bi bi-grip-horizontal text-success" style="font-size: 3rem;"></i>
                    <br>
                  <a class="btn btn-success btn-sm stretched-link" href="/<?= 'adm_'.$value['category'];?>"><?= $value['display_name'];?></a>
                </div>
              </div>


          <?php endforeach;?>
          <?php endif;?>
          <div class="col-12 separator">
            <hr>
          </div>
              <!-- ••••••••• categories •••••• -->
          <?php if (in_array('advanced', $data['adm_rights'])):?>
              <div class="col-md-3">
                <div class=" p-3 m-3 text-center border border-danger position-relative">
                    <i class="bi bi-grip-horizontal text-danger" style="font-size: 3rem;"></i>
                    <br>
                  <a class="btn btn-danger btn-sm stretched-link" href="/adm_categories">kategorie</a>
                </div>
              </div>
          <?php endif;?>
              <!-- ••••••••• categories •••••• -->

              <!-- ••••••••• seo •••••• -->
          <?php if (in_array('advanced', $data['adm_rights']) && in_array('seo', $data['adm_rights'])):?>
              <div class="col-md-3">
                <div class=" p-3 m-3 text-center border border-danger position-relative">
                    <i class="bi bi-grip-horizontal text-danger" style="font-size: 3rem;"></i>
                    <br>
                  <a class="btn btn-danger btn-sm stretched-link" href="/adm_seo">seo</a>
                </div>
              </div>
          <?php endif;?>
              <!-- ••••••••• seo •••••• -->



          </div>


        </div>
      </div>
    </div>

<?php
$this->admInclude("/adm_views/adminfooter.view.php", $data);
?>

<?php
    include ('assets/js/essential-js.php');

?>

  </body>
</html>
