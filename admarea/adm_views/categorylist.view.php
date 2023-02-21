    
        <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasTopLabel">Offcanvas top</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <form action="" method="POST">
              <input type="hidden" name="add_me" value="add_me">
                <div class="col-md-12 px-5 text-center mb-3">
                <label for="display_name" class="form-label">Nazwa</label>
                <textarea type="text" name="name" class="form-control" aria-label="With textarea" rows="1" required></textarea>
                </div>
              <div class="col-12 text-center">
              <button type="submit" class="btn btn-secondary btn-sm">dodaj</button>
              </div>
            </form>

          </div>
        </div>


    <form action="" method="POST"  class="row">
      <input type="hidden" name="table" value="categories">
      <input type="hidden" name="order_us">
      <div class="col-12 text-center mb-3">
      <button type="button" class="btn btn-success btn-sm"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">dodaj nową</button>
      </div>


          <?php if (!empty($data['category_arr'])):?>
          <div id="sortable">
          <?php foreach ($data['category_arr'] as $key => $value):?>
            <div class="new-sorted ui-state-default">
            <input class="the_one" type="hidden" name="the_order[<?=$value['cat_id']?>]" value="<?=$value['cat_id']?>">
            <div class="col-12 border p-3 my-3">
              <div class="d-flex flex-row">
                <div class="pe-3">
                    <h5 class="m-0"><?=$value['display_name']?></h5>
                </div>
                <div class="">
                    <p class="m-0 pe-3">pozycja: <?=$value['custom_order']?> <span class="text-danger new_position"></span></p>
                </div>
                <div class="flex-grow-1"> 
                    <p class="m-0">aktywna: <i class="bi bi-circle-fill <?=$value['is_active']?>"></i></p>
                </div>
                <div class="me-3 <?=$value['d_subcategory']?> ">
                  <a href="/adm_subcategories/<?=$value['category']?>" class="btn btn-primary btn-sm">podkategorie</a>
                </div>
                <div class="">
                  <?php if($value['modular'] !== 'module' && $value['d_subcategory'] == 'd-none'):?>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#_delete<?=$value['cat_id']?>">
                      usuń
                    </button>

                  <?php endif;?>
                  <a href="/adm_categories/<?=$value['cat_id']?>" class="btn btn-primary btn-sm">edytuj</a>
                </div>

              </div>
            </div>
        </div>
 


          <?php endforeach;?>
        </div><!-- sortable ends-->

      <div class="col-12 text-center">
      <button type="submit" class="btn btn-secondary btn-sm">zmień kolejność</button>
      </div>
          <?php endif;?>

    </form>


          <?php if (!empty($data['category_arr'])):?>
          <?php foreach ($data['category_arr'] as $key => $modal_value):?>
         <!-- deleteModal -->
          <div class="modal fade" id="_delete<?=$modal_value['cat_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Usuwasz kategorię</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                      <form action="" method="POST"  class="row">
                        <input type="text" name="category_id" value="<?=$modal_value['cat_id']?>">
                        <input type="text" name="category" value="<?=$modal_value['category']?>">
                        <input type="hidden" name="delete_category">
                  <button type="submit" class="btn btn-danger">usuń</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">jednak nie</button>
                      </form>
                </div>
                <div class="modal-footer">
                </div>
              </div>
            </div>
          </div>
          <!-- deleteModal -->
          <?php endforeach;?>
          <?php endif;?>
