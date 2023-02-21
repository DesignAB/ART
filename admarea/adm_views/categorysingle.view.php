          <div class="col-12 my-3 text-center">
            <a href="adm_categories" class="btn btn-success btn-sm mb-3">wróć do kategorii</a>
              <h5>edytujesz kategorię: <?=$data['category_row']['display_name']?></h5>
          </div>
    <form action="" method="POST"  class="row">
      <input type="hidden" name="update_options" value="update_options">

            <div class="col-12 border p-3 my-3">
              <div class="row px-3">

                <div class="form-check form-switch col-6 col-md-3 col-lg-2">
                  <span>
                  <label class="form-label" for="active">aktywna?</label>
                  <input name="active" class="form-check-input d-block"  type="checkbox" role="switch" id="active" <?=$data['category_active']?> >
                </span>
                </div>
                <div class="form-check form-switch col-6 col-md-3 col-lg-2">
                  <label class="form-label p-0" for="menuable">menuable</label>
                  <input name="menuable" class="form-check-input d-block"  type="checkbox" role="switch" id="menuable" <?=$data['menuable_active']?> >
                </div>
                <div class="form-check form-switch col-6 col-md-3 col-lg-2">
                  <label class="form-label p-0" for="indexable">indexable</label>
                  <input name="indexable" class="form-check-input d-block"  type="checkbox" role="switch" id="indexable" <?=$data['indexable_active']?> >
                </div>

                <div class="form-check form-switch col-6 col-md-3 col-lg-2 d-none">
                  <label class="form-label p-0" for="footerable">footerable</label>
                  <input name="footerable" class="form-check-input d-block"  type="checkbox" role="switch" id="footerable" <?=$data['footerable_active']?> >
                </div>
                
                <div class="form-check form-switch col-6 col-md-3 col-lg-2">
                  <label class="form-label p-0" for="first_image">first_image</label>
                  <input name="first_image" class="form-check-input d-block"  type="checkbox" role="switch" id="first_image" <?=$data['first_image_active']?> >
                </div>


                <?php if ($data['category_row']['modular'] == 'standard'):?>
                <div class="form-check form-switch col-6 col-md-3 col-lg-2 d-none">
                  <label class="form-label p-0" for="subcategory">podkategorie</label>
                  <input name="subcategory" class="form-check-input d-block"  type="checkbox" role="switch" id="subcategory" <?=$data['subcategory_active']?> >
                </div>
                <?php endif;?>
              </div>
            </div>

            <div class="col-12 my-3">
              <div class="row">

                <div class="col-12 text-end">
                  <button type="submit" class="btn btn-success btn-sm">zmień opcje</button>

                </div>


              </div>
            </div>
    </form>

    <form action="" method="POST"  class="row">
      <input type="hidden" name="update_me" value="update_me">

            <div class="col-12 border p-3 my-3">
              <div class="row px-3">

                <div class="col-md-6">
                <label for="display_name" class="form-label">Nazwa</label>
                <textarea type="text" name="display_name" class="form-control" aria-label="With textarea" rows="1" ><?=$data['category_row']['display_name']?></textarea>
                </div>

                <div class="col-md-6">
                <label for="sub_display_name" class="form-label">Rozwinięcie</label>
                <textarea type="text" name="sub_display_name" class="form-control" aria-label="With textarea" rows="1" ><?=$data['category_row']['sub_display_name']?></textarea>
                </div>

              </div>
            </div>
            <div class="col-12 border p-3 my-3">
              <div class="row px-3">
                <div class="col-12">
                  <h5>limity</h5>
                </div>

                <div class="col-md-6">
                <label for="display_limit" class="form-label">display_limit</label>
                <textarea type="text" name="display_limit" class="form-control" aria-label="With textarea" rows="1" ><?=$data['category_row']['display_limit']?></textarea>
                </div>

                <div class="col-md-6">
                <label for="display_limit_index" class="form-label">display_limit_index</label>
                <textarea type="text" name="display_limit_index" class="form-control" aria-label="With textarea" rows="1" ><?=$data['category_row']['display_limit_index']?></textarea>
                </div>


              </div>
            </div>


            <div class="col-12 border p-3 my-3">
              <div class="row px-3">
                <div class="col-12">
                  <h5>seo</h5>
                </div>

                <div class="col-md-6">
                <label for="og_title_custom_content" class="form-label">og_title_custom_content</label>
                <textarea type="text" name="og_title_custom_content" class="form-control" aria-label="With textarea" rows="1" ><?=$data['category_row']['og_title_custom_content']?></textarea>
                </div>

                <div class="col-md-6">
                <label for="og_desc_custom_content" class="form-label">og_desc_custom_content</label>
                <textarea type="text" name="og_desc_custom_content" class="form-control" aria-label="With textarea" rows="1" ><?=$data['category_row']['og_desc_custom_content']?></textarea>
                </div>


              </div>
            </div>

            <div class="col-12 border p-3 my-3">
              <div class="row px-3">
                <div class="col-12">
                  <h5>templating</h5>
                </div>
                <div class="col-md-6">
                <label for="og_title_custom_content" class="form-label">template</label>
                    <select class="form-select" aria-label="Default select example" name="template">
                      <?php foreach ($data['templates_row'] as $key => $value):?>
                      <?php if ($value['name'] == $data['category_row']['template']):?>
                      <option value="<?=$value['name']?>" selected><?=$value['display_name']?>
</option>
                      <?php endif;?>  
                      <?php if ($value['name'] <> $data['category_row']['template']):?>
                      <option value="<?=$value['name']?>"><?=$value['display_name']?></option>
                      <?php endif;?>  
                      <?php endforeach;?>
                    </select>

                </div>

                <div class="col-md-6">
                <label for="og_title_custom_content" class="form-label">index template</label>
                    <select class="form-select" aria-label="Default select example" name="index_template">
                      <?php foreach ($data['index_templates_row'] as $key => $value):?>
                      <?php if ($value['name'] == $data['category_row']['index_template']):?>
                      <option value="<?=$value['name']?>" selected><?=$value['display_name']?></option>
                      <?php endif;?>  
                      <?php if ($value['name'] <> $data['category_row']['index_template']):?>
                      <option value="<?=$value['name']?>"><?=$value['display_name']?></option>
                      <?php endif;?>  
                      <?php endforeach;?>
                    </select>
                </div>
              </div>
            </div>


            <div class="col-12 my-3">
              <div class="row">

                <div class="col-12 text-end">
                  <button type="submit" class="btn btn-success btn-sm">zmień</button>

                </div>


              </div>
            </div>
    </form>


              <!-- image upload form-->
          <?php
          $data['old_image'] = $data['category_row']['image'];
          $data['prefix'] = 'image';
          $data['form_title'] = 'og_image CATEGORY';
          $data['table'] = 'meta_images'; // path to image in upload form
          $this->admInclude("/adm_views/adm-upload-form.php", $data);
          ?>
          <!-- image upload form-->
