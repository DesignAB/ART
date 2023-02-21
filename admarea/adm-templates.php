<?php
  $messages = $this->loadAdmModel("admmessenger");
  $data['messenger'] = $messages;
?>
<!DOCTYPE html>

<html lang="pl">
  <head>
    <!-- Bootstrap CSS -->

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


        <?php if (empty($data["a"])):?>
        <div class="col-4 text-center">
        <a href="/adm_templates/templates" class="btn btn-primary btn-sm shadow-sm">templatki</a>
          </div>
          <div class="col-4 text-center ">
        <a href="/adm_templates/index_templates" class="btn btn-primary btn-sm shadow-sm">templatki index</a>
          </div>
          <div class="col-4 text-center ">
        <a href="/adm_templates/carousel_templates" class="btn btn-primary btn-sm shadow-sm">templatki carousel</a>
          </div>
        <?php endif;?>


        <?php if (!empty($data["a"])):?>
            <div class="col-12 p-3 my-2 text-center">
                    <button type="button" class="btn btn-success btn-sm"   data-bs-toggle="modal" data-bs-target="#exampleModal">dodaj nową</button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dodajesz templatkę</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                          <form action="" method="POST">
                            <input type="hidden" name="create_me">
                            <input type="hidden" name="template_kind" value="<?=$data['a'];?>">
                            <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Nazwa pliku</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" name="filename" required>
                            </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">zamknij</button>
                    <button type="submit" class="btn btn-success">dodaj</button>
                  </div>
                          </form>


                </div>
              </div>
            </div>

            <!-- modal-->

        <?php endif;?>

          <?php if (!empty($data['templates_listing'])):?>



          <?php foreach ($data['templates_listing'] as $key => $value):?>
            <div class="col-12 border p-3 my-2 shadow-sm">
          <!-- there goes form -->
              <form action="" method="POST"  class="row">
                <input type="hidden" name="id" value="<?=$value['id'];?>">
                <input type="hidden" name="update_me">

                    <div class="col-md-6 d-flex align-items-center">
                      <h5>
                        <?=$value['name'];?>
                      </h5>
                    </div>

                    <div class="col-md-6">
                      <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Nazwa wyświetlana</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" name="display_name" value="<?=$value['display_name'];?>">
                      </div>
                    </div>
                    <div class="col-12 separator">
                      <hr>
                    </div>

                    <div class="col-md-2">
                      <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">image_height</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" name="image_height" value="<?=$value['image_height'];?>">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">image_width</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" name="image_width" value="<?=$value['image_width'];?>">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">mobile_height</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" name="mobile_image_height" value="<?=$value['mobile_image_height'];?>">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">mobile_width</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" name="mobile_image_width" value="<?=$value['mobile_image_width'];?>">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">kompresja</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" name="image_compression" value="<?=$value['image_compression'];?>">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">kompresja mob</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" name="mobile_image_compression" value="<?=$value['mobile_image_compression'];?>">
                      </div>
                    </div>

                    <div class="col-12 text-end">
                    <button type="submit" class="btn btn-sm btn-success ms-2">zmień</button>
                    </div>


              </form>
          </div>
          <?php endforeach;?>
          <?php endif;?>



          </div>
        </div>
      </div>
    </div>

<?php
$this->admInclude("/adm_views/adminfooter.view.php", $navbar_categories);
?>

<?php
    include ('assets/js/essential-js.php');

?>


  </body>
</html>
