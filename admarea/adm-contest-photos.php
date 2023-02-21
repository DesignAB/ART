<?php
  $messages = $this->loadAdmModel("admmessenger");
  $data['messenger'] = $messages;
  $timecontroller = $data['timecontroller'];


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

<link rel="stylesheet" href="admarea/assets/css/croppie.css">
<link rel="stylesheet" href="admarea/assets/css/trumbowyg.css">

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
        <?php foreach ($data['all-photos'] as $key => $value):?>
        <?php
          $d_block_text = 'zablokuj';
          $d_block_color = 'btn-danger';
          $block_value = 'block';
          if (empty($value['photo_active'])) {
          $d_block_text = 'odblokuj';
          $d_block_color = 'btn-success';
          $block_value = 'unblock';
          }
        ?>

            <div class="col-md-3 px-2">
              <div class="card">

                <img src="<?=IMGFOLDER.'contests/contests_photos_'.$data['a'].'/'.$value['photo_portrait'];?>"class="card-img-top" alt="...">
                <div class="card-body">
                  <h6 class="card-title"><?=$value['photo_title'];?></h6>
                  <p class=""><?=$value['photo_description'];?></p>
                  <p class=" text-muted">autor: <?=$value['photo_author_f_name'].' '.$value['photo_author_l_name'];?></p>

                </div>
                <div class="card-footer text-muted">
                    <form method="POST" enctype="multipart/form-data" class="float-end">
                    <input type="hidden" name="id" value="<?=$value['id']?>">
                    <input type="hidden" name="<?=$block_value?>" value="<?=$block_value?>">
                      <button type="submit" class="btn btn-sm <?=$d_block_color;?>"><?=$d_block_text;?></button>
                    </form>
                      <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete_<?=$value['id']?>">
                      usuń
                    </button>
                </div><!-- cart footer-->


              </div><!-- card -->


                    <!-- Modal -->
                    <div class="modal fade" id="delete_<?=$value['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">USUŃ: <?=$value['photo_title'];?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Usuwasz zdjęcie bezpowrotnie
                          </div>
                          <div class="modal-footer">
                              <form method="POST" enctype="multipart/form-data" class="float-end">
                              <input type="text" name="photo_portrait" value="<?=$value['photo_portrait']?>">
                              <input type="hidden" name="id" value="<?=$value['id']?>">
                              <input type="hidden" name="delete">
                              <button type="submit" class="btn btn-sm btn-danger">usuwam</button>
                              </form>
                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">jednak nie</button>

                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Modal -->

            </div><!-- col-->

        <?php endforeach;?>

          </div>
        </div>
      </div>
    </div>

<?php
$this->admInclude("/adm_views/adminfooter.view.php", $navbar_categories);
?>

<?php
    include ('assets/js/essential-js.php');
// admInclude("/assets/js/trumbowyg.js", $data);
?>




  </body>
</html>
