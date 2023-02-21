<?php
  $messages = $this->loadAdmModel("admmessenger");
  $data['messenger'] = $messages;
  $article = $data['article'];

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

        <div class="col-12 py-3 px-3 mt-4 text-center">
          <a href="adm_carousels" class="btn btn-success btn-sm mb-3">wróć</a>

          </div>

        <div class="col-12 mb-3 shadow py-md-5 " >
          <div class="row g-0">
        <?php $adm_message = $data['messenger']->admMessage();?>
          <!-- heading-->
          <div class="col-12 border border-success py-3 px-3 mb-2">
            <h5><?=$article['header'];?></h5>
            <h6><?=$article['subheader'];?></h6>




          </div>
          <!-- heading-->




          <!-- options form -->
          <div class="col-12 border border-danger py-3 px-3">
          <h5 class="ps-1 mb-3">Opcje</h5>
            <form method="POST" enctype="multipart/form-data" class="row g-2 custom-form"  id="register-form" >
                <input type="hidden" class="form-control" value="<?=$article['id'];?>" name="id">
                <input type="hidden" class="form-control" name="options_update" value="options_update">

                  <div class="col-md-2 d-flex align-items-end justify-content-start">
                  <div class="form-check form-switch">
                    <input onChange='submit();' class="form-check-input" type="checkbox" id="active" name="active" <?=$data['article_active'];?>>
                    <label class="form-check-label" for="active">Aktywny</label>
                  </div>
                  </div>

                  <div class="col-md-2 d-flex align-items-end justify-content-start">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="has_image" name="has_image" <?=$data['article_image'];?>>
                    <label class="form-check-label" for="has_image">Zdjęcie</label>
                  </div>
                  </div>

                  <div class="col-md-2 d-flex align-items-end justify-content-start">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="has_link" name="has_link" <?=$data['article_link'];?>>
                    <label class="form-check-label" for="link">link</label>
                  </div>
                  </div>


                  <div class="col-12 separator">
                    
                  </div>



                  <div class="col-12 d-flex align-items-end justify-content-end">
                    <button id="register-button" class="btn btn-sm btn-danger register-button">zmień opcje</button>
                  </div>


            </form>
          </div>
          <!-- options form -->

          <!-- linking form -->
          <?php if($article['has_link'] == 'on'):?>
          <div class="col-12 border border-success py-3 px-3 mt-3">
          <h5 class="ps-1 mb-3">Link</h5>
          <?php if(!empty($article['link'])):?>
          <h5 class="ps-1 mb-3">Twój link: <span class="text-danger"><?=$article['link'];?></span></h5>
          <?php endif;?>
            <form method="POST" enctype="multipart/form-data" class="row g-2 custom-form"  id="register-form" >
                <input type="hidden" class="form-control" value="<?=$article['id'];?>" name="id">
                <input type="hidden" class="form-control" name="link_me" value="link_me">


                  <div class="col-md-2 d-flex align-items-end justify-content-start">
                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="link_to" id="inlineRadio1" value="external_link" <?=$data['external_checked'];?> >
                        <label class="form-check-label" for="inlineRadio1">zewnętrzny</label>
                      </div>
                  </div>


                  <div class="col-md-2 d-flex align-items-end justify-content-start">
                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="link_to" id="inlineRadio2" value="category_link" <?=$data['category_checked'];?>>
                        <label class="form-check-label" for="inlineRadio2">Kategoria</label>
                      </div>
                  </div>

                  <div class="col-md-2 d-flex align-items-end justify-content-start">
                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="link_to" id="module_link" value="module_link" <?=$data['module_checked'];?>>
                        <label class="form-check-label" for="module_link">Moduł</label>
                      </div>
                  </div>


                  <div class="col-12 separator">
                    
                  </div>

            </form><!-- link kind -->
            <?php if(!empty($data['external_checked'])):?>
          <!-- external form form -->
          <h5 class="ps-1 my-3">Adres</h5>

                <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                  <input type="hidden" id="id" class="form-control form-control-sm" name="id" value="<?=$article['id'];?>">
                  <input type="hidden" id="id" class="form-control form-control-sm" name="set_link" value="set_link">


                  <!-- name and surname -->
                  <!-- headers -->
                  <div class="col-md-12">
                    <label for="contest_name" class="form-label w-100 ps-1">adres www
                    </label>
                    <textarea type="text" name="link" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$article['link'];?></textarea>
                  </div>
                  <!-- headers -->
                  <div class="col-12 text-md-end text-center ">
                    <button id="register-button" class="btn btn-sm btn-success register-button">zmień</button>
                  </div>

                </form>
          <!-- external form form -->
            <?php endif;?>


          <!-- module linking -->
            <?php if(!empty($data['module_checked'])):?>
          <div class="row">

          <!-- module form -->
            <div class="col-md-4">
              <h5 class="ps-1 my-3">Moduł</h5>
                <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="module-form" >
                  <input type="hidden" id="id" class="form-control form-control-sm" name="id" value="<?=$article['id'];?>">


                  <input type="hidden" id="id" class="form-control form-control-sm" name="set_link_category" value="set_link_category">
                  <!-- name and surname -->
                  <!-- headers -->
                  <div class="col-md-12">
                    <select onChange='submit();' class="form-select form-select-sm" aria-label=".form-select-sm example" name="link">
                    <?php if(!empty($data['modules'])):?>
                      <?php if(empty($article['link_category'])):?>
                      <option value="">wybierz</option>
                      <?php endif;?>
                    <?php foreach ($data['modules'] as $key => $value):?>
                      <?php if($value['category'] == $article['link_category']):?>
                      <option value="<?=$value['category'];?>" selected><?=$value['display_name'];?></option>
                      <?php endif;?>
                      <?php if($value['category'] <> $article['link_category']):?>
                      <option value="<?=$value['category'];?>"><?=$value['display_name'];?></option>
                      <?php endif;?>
                    <?php endforeach;?>
                    <?php endif;?>
                    </select>
                  </div>
                  <!-- headers -->
                </form>
              </div>
          <!-- module form -->

          <!-- module article-->
          <?php if (!empty($article['link_category']) && $article['link_category'] == 'events' ):?>


            <div class="col-md-4">
          <h5 class="ps-1 my-3">Artykuły</h5>
                <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                  <input type="hidden" id="id" class="form-control form-control-sm" name="id" value="<?=$article['id'];?>">
                  <input type="hidden" id="link_category" class="form-control form-control-sm" name="link_category" value="<?=$article['link_category'];?>">

                  <input type="hidden" id="id" class="form-control form-control-sm" name="set_event_link" value="set_event_link">
                  <!-- name and surname -->
                  <!-- headers -->
                  <div class="col-md-12">
                    <select onChange='submit();' class="form-select form-select-sm" aria-label=".form-select-sm example" name="link_article">

                      <?php if(empty($article['link_article'])):?>
                      <option value="">wybierz</option>
                      <?php endif;?>

                    <?php foreach ($data['link_articles'] as $key => $value):?>
                      <?php if($value['event_id'] == $article['link_article']):?>
                      <option value="<?=$value['event_id'];?>" selected><?=$value['header'];?></option>
                      <?php endif;?>
                      <?php if($value['event_id'] <> $article['link_article']):?>
                      <option value="<?=$value['event_id'].'|'.$value['header'];?>"><?=$value['header'];?></option>
                      <?php endif;?>
                    <?php endforeach;?>
                      <option value="">wyczyść</option>
                    </select>
                  </div>
                  <!-- headers -->


                </form>
              </div>




          <?php endif;?>
          <!-- module article-->

        </div><!-- row for form -->
            <?php endif;?>
          <!-- module linking -->

            <?php if(!empty($data['category_checked'])):?>
          <!-- category form -->
          <div class="row">
            <div class="col-md-4">
          <h5 class="ps-1 my-3">Kategoria</h5>
                <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                  <input type="hidden" id="id" class="form-control form-control-sm" name="id" value="<?=$article['id'];?>">
                  <input type="hidden" id="id" class="form-control form-control-sm" name="set_link_category" value="set_link_category">
                  <!-- name and surname -->
                  <!-- headers -->
                  <div class="col-md-12">
                    <select onChange='submit();' class="form-select form-select-sm" aria-label=".form-select-sm example" name="link">
                    <?php if(!empty(CAT_DATA)):?>
                      <?php if(empty($article['link_category'])):?>
                      <option value="">wybierz</option>
                      <?php endif;?>
                    <?php foreach (CAT_DATA as $key => $value):?>
                      <?php if($value['category'] == $article['link_category']):?>
                      <option value="<?=$value['category'];?>" selected><?=$value['display_name'];?></option>
                      <?php endif;?>
                      <?php if($value['category'] <> $article['link_category'] && $value['modular'] ==  'standard'):?>
                      <option value="<?=$value['category'];?>"><?=$value['display_name'];?></option>
                      <?php endif;?>
                    <?php endforeach;?>
                    <?php endif;?>
                    </select>
                  </div>
                  <!-- headers -->
                </form>
              </div>
          <!-- category form -->
          <!-- subcategory form -->
            <?php if(!empty($data['subcat_data'])):?>
            <div class="col-md-4">
          <h5 class="ps-1 my-3">Podkategoria</h5>
                <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                  <input type="hidden" id="id" class="form-control form-control-sm" name="id" value="<?=$article['id'];?>">
                  <input type="hidden" id="link_category" class="form-control form-control-sm" name="link_category" value="<?=$article['link_category'];?>">
                  <input type="hidden" id="id" class="form-control form-control-sm" name="set_link_subcategory" value="set_link_subcategory">
                  <!-- name and surname -->
                  <!-- headers -->
                  <div class="col-md-12">
                    <select onChange='submit();' class="form-select form-select-sm" aria-label=".form-select-sm example" name="link_subcategory">

                      <?php if(empty($article['link_subcategory'])):?>
                      <option value="">wybierz</option>
                      <?php endif;?>

                    <?php foreach ($data['subcat_data'] as $key => $value):?>
                      <?php if($value['subcategory'] == $article['link_subcategory']):?>
                      <option value="<?=$value['subcategory'];?>" selected><?=$value['subcategory_display'];?></option>
                      <?php endif;?>
                      <?php if($value['subcategory'] <> $article['link_subcategory']):?>
                      <option value="<?=$value['subcategory'];?>"><?=$value['subcategory_display'];?></option>
                      <?php endif;?>
                    <?php endforeach;?>
                      <option value="">wyczyść</option>
                    </select>
                  </div>
                  <!-- headers -->


                </form>
              </div>



            <?php endif;//!empty($data['subcat_data']?>
          <!-- subcategory form -->

          <!-- articles form category -->
          <?php if(!empty($article['link_category']) && empty($data['subcat_data'])):?>

            <?php if(!empty($data['link_articles'])):?>
            <div class="col-md-4">
          <h5 class="ps-1 my-3">Artykuły</h5>
                <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                  <input type="hidden" id="id" class="form-control form-control-sm" name="id" value="<?=$article['id'];?>">
                  <input type="hidden" id="link_category" class="form-control form-control-sm" name="link_category" value="<?=$article['link_category'];?>">
                  <input type="hidden" id="link_subcategory" class="form-control form-control-sm" name="link_subcategory" value="<?=$article['link_subcategory'];?>">
                  <input type="hidden" id="id" class="form-control form-control-sm" name="set_link_article" value="set_link_article">
                  <!-- name and surname -->
                  <!-- headers -->
                  <div class="col-md-12">
                    <select onChange='submit();' class="form-select form-select-sm" aria-label=".form-select-sm example" name="link_article">

                      <?php if(empty($article['link_article'])):?>
                      <option value="">wybierz</option>
                      <?php endif;?>

                    <?php foreach ($data['link_articles'] as $key => $value):?>
                      <?php if($value['id'] == $article['link_article']):?>
                      <option value="<?=$value['id'];?>" selected><?=$value['header'];?></option>
                      <?php endif;?>
                      <?php if($value['id'] <> $article['link_article']):?>
                      <option value="<?=$value['id'].' '.$value['header'];?>"><?=$value['header'];?></option>
                      <?php endif;?>
                    <?php endforeach;?>
                      <option value="">wyczyść</option>
                    </select>
                  </div>
                  <!-- headers -->


                </form>
              </div>



            <?php endif;//!empty($data['link_articles']?>


          <?php endif;?>
          <!-- articles form category -->
          <!-- articles form subcategory -->
          <?php if(!empty($article['link_category']) && !empty($article['link_subcategory'])):?>
          
            <?php if(!empty($data['link_articles'])):?>
            <div class="col-md-4">
          <h5 class="ps-1 my-3">Artykuły</h5>
                <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                  <input type="hidden" id="id" class="form-control form-control-sm" name="id" value="<?=$article['id'];?>">
                  <input type="hidden" id="link_category" class="form-control form-control-sm" name="link_category" value="<?=$article['link_category'];?>">
                  <input type="hidden" id="link_subcategory" class="form-control form-control-sm" name="link_subcategory" value="<?=$article['link_subcategory'];?>">
                  <input type="hidden" id="id" class="form-control form-control-sm" name="set_link_article" value="set_link_article">
                  <!-- name and surname -->
                  <!-- headers -->
                  <div class="col-md-12">
                    <select onChange='submit();' class="form-select form-select-sm" aria-label=".form-select-sm example" name="link_article">

                      <?php if(empty($article['link_article'])):?>
                      <option value="">wybierz</option>
                      <?php endif;?>

                    <?php foreach ($data['link_articles'] as $key => $value):?>
                      <?php if($value['id'] == $article['link_article']):?>
                      <option value="<?=$value['id'];?>" selected><?=$value['header'];?></option>
                      <?php endif;?>
                      <?php if($value['id'] <> $article['link_article']):?>
                      <option value="<?=$value['id'].' '.$value['header'];?>"><?=$value['header'];?></option>
                      <?php endif;?>
                    <?php endforeach;?>
                      <option value="">wyczyść</option>
                    </select>
                  </div>
                  <!-- headers -->


                </form>
              </div>



            <?php endif;//!empty($data['link_articles']?>
           <?php endif;?>
          <!-- articles form subcategory -->

          </div> <!-- row -->

          <?php endif;//!empty($data['category_checked']?>            
          </div>
          <?php endif;?>     
          <!-- linking form -->


<?php if (in_array('full', $data['adm_rights']) OR in_array('advanced', $data['adm_rights']) ):?>
          <!-- design form -->
        <div class="col-12 border border-success py-3 px-3 mt-3">
          <h5 class="ps-1 mb-3">overlay</h5>

            <form method="POST" enctype="multipart/form-data" class="row g-2 custom-form"  id="register-form" >
                <input type="hidden" class="form-control" value="<?=$article['id'];?>" name="id">
                <input type="hidden" class="form-control" name="design_me" value="design_me">
                <div class="col-12 <?=$article['overlay_color'];?>" style="height:30px; opacity: <?=$article['overlay_opacity'];?>;"></div>

<!-- backgrounds-->
                <!-- one color -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                    <i class="bi-circle-fill me-2" style="color: rgba(var(--lead-color-1), 1);"></i>
                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="overlay_color" id="bg-01" value="bg-01" <?=$data['bg1_checked'];?> >
                        <label class="form-check-label" for="bg-01">bg-01</label>
                      </div>
                  </div>
                <!-- one color -->
                <!-- one color -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                    <i class="bi-circle-fill me-2" style="color: rgba(var(--lead-color-2), 1);"></i>
                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="overlay_color" id="bg-02" value="bg-02" <?=$data['bg2_checked'];?> >
                        <label class="form-check-label" for="bg-02">bg-02</label>
                      </div>
                  </div>
                <!-- one color -->
                <!-- one color -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                    <i class="bi-circle-fill me-2" style="color: rgba(var(--lead-color-3), 1);"></i>
                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="overlay_color" id="bg-03" value="bg-03" <?=$data['bg3_checked'];?> >
                        <label class="form-check-label" for="bg-03">bg-03</label>
                      </div>
                  </div>
                <!-- one color -->
                <!-- one color -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                    <i class="bi-circle-fill me-2" style="color: rgba(var(--lead-color-4), 1);"></i>
                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="overlay_color" id="bg-04" value="bg-04" <?=$data['bg4_checked'];?> >
                        <label class="form-check-label" for="bg-04">bg-04</label>
                      </div>
                  </div>
                <!-- one color -->
                <!-- range -->
                  <div class="col-md-4 d-flex align-items-center justify-content-start">
                    <label for="customRange3" class="form-label">opacity</label>
                    <input onChange='submit();' type="range" class="form-range" min="0" max="1" step="0.1" id="customRange3" name="overlay_opacity" value="<?=$article['overlay_opacity'];?>">

                  </div>
                <!-- range -->
<!-- backgrounds-->

<?php if (in_array('full', $data['adm_rights'])):?>

<!-- buttons -->
                  <div class="col-12 separator">
                  <h5 class="ps-1 mb-3 mt-5">btn color </h5>
                  </div>

                <!-- one btn -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="button_kind" id="btn-01" value="btn-01" <?=$data['btn_01_checked'];?> >
                        <label class="form-check-label" for="btn-01">btn-01</label>
                      </div>
                  </div>
                <!-- one btn -->
                <!-- one btn -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="button_kind" id="btn-02" value="btn-02" <?=$data['btn_02_checked'];?> >
                        <label class="form-check-label" for="btn-02">btn-02</label>
                      </div>
                  </div>
                <!-- one btn -->
                <!-- one btn -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="button_kind" id="btn-03" value="btn-03" <?=$data['btn_03_checked'];?> >
                        <label class="form-check-label" for="btn-03">btn-03</label>
                      </div>
                  </div>
                <!-- one btn -->
                <!-- one btn -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="button_kind" id="btn-04" value="btn-04" <?=$data['btn_04_checked'];?> >
                        <label class="form-check-label" for="btn-04">btn-04</label>
                      </div>
                  </div>
                <!-- one btn -->
<!-- buttons -->


<!-- text color -->
                  <div class="col-12 separator">
                  <h5 class="ps-1 mb-3 mt-5">text color</h5>
                  </div>

                <!-- one color -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                  <i class="bi-circle-fill me-2" style="color: rgba(var(--lead-color-1), 1);"></i>

                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="text_color" id="color-01" value="color-01" <?=$data['color_01_checked'];?> >
                        <label class="form-check-label" for="color-01">color-01</label>
                      </div>
                  </div>
                <!-- one color -->
                <!-- one color -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                     <i class="bi-circle-fill me-2" style="color: rgba(var(--lead-color-2), 1);"></i>
                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="text_color" id="color-02" value="color-02" <?=$data['color_02_checked'];?> >
                        <label class="form-check-label" for="color-02">color-02</label>
                      </div>
                  </div>
                <!-- one color -->
                <!-- one color -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                     <i class="bi-circle-fill me-2" style="color: rgba(var(--lead-color-3), 1);"></i>
                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="text_color" id="color-03" value="color-03" <?=$data['color_03_checked'];?> >
                        <label class="form-check-label" for="color-03">color-03</label>
                      </div>
                  </div>
                <!-- one color -->
                <!-- one color -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                     <i class="bi-circle-fill me-2" style="color: rgba(var(--lead-color-4), 1);"></i>
                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="text_color" id="color-04" value="color-04" <?=$data['color_04_checked'];?> >
                        <label class="form-check-label" for="color-04">color-04</label>
                      </div>
                  </div>
                <!-- one color -->
                <!-- one color -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                  <i class="bi-circle-fill me-2 text-white"></i>

                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="text_color" id="color-reset" value="" <?=$data['color_reset_checked'];?> >
                        <label class="form-check-label" for="color-reset">white</label>
                      </div>
                  </div>
                <!-- one color -->
<!-- text color -->



<?php if ($data['template_name'] !== 'tile_carousel'): ?>
<!-- indicators_color -->
                  <div class="col-12 separator">
                  <h5 class="ps-1 mb-3 mt-5">indicators color</h5>
                  </div>

                <!-- one color -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                  <i class="bi-circle-fill me-2" style="color: rgba(var(--lead-color-1), 1);"></i>

                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="indicators_color" id="color-01" value="color-01" <?=$data['indicators_01_checked'];?> >
                        <label class="form-check-label" for="color-01">color-01</label>
                      </div>
                  </div>
                <!-- one color -->
                <!-- one color -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                     <i class="bi-circle-fill me-2" style="color: rgba(var(--lead-color-2), 1);"></i>
                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="indicators_color" id="color-02" value="color-02" <?=$data['indicators_02_checked'];?> >
                        <label class="form-check-label" for="color-02">color-02</label>
                      </div>
                  </div>
                <!-- one color -->
                <!-- one color -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                     <i class="bi-circle-fill me-2" style="color: rgba(var(--lead-color-3), 1);"></i>
                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="indicators_color" id="color-03" value="color-03" <?=$data['indicators_03_checked'];?> >
                        <label class="form-check-label" for="color-03">color-03</label>
                      </div>
                  </div>
                <!-- one color -->
                <!-- one color -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                     <i class="bi-circle-fill me-2" style="color: rgba(var(--lead-color-4), 1);"></i>
                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="indicators_color" id="color-04" value="color-04" <?=$data['indicators_04_checked'];?> >
                        <label class="form-check-label" for="color-04">color-04</label>
                      </div>
                  </div>
                <!-- one color -->
                <!-- one color -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                  <i class="bi-circle-fill me-2 text-white"></i>

                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="indicators_color" id="color-reset" value="" <?=$data['indicators_reset_checked'];?> >
                        <label class="form-check-label" for="color-reset">white</label>
                      </div>
                  </div>
                <!-- one color -->
<!-- indicators_color -->

<!-- overlay position-->

                  <div class="col-12 separator">
                  <h5 class="ps-1 mb-3 mt-5">overlay position</h5>
                  </div>

                <!-- one position -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="overlay_position" id="bottom" value="bottom" <?=$data['bottom_checked'];?> >
                        <label class="form-check-label" for="bottom">bottom</label>
                      </div>
                  </div>
                <!-- one position -->
                <!-- one position -->
                  <div class="col-md-2 d-flex align-items-center justify-content-start">
                      <div class="form-check form-check-inline">
                        <input onChange='submit();' class="form-check-input" type="radio" name="overlay_position" id="top" value="top" <?=$data['top_checked'];?> >
                        <label class="form-check-label" for="top">top</label>
                      </div>
                  </div>
                <!-- one position -->
<!-- overlay position-->
<?php endif;?>


<?php endif;?>
            </form>
        </div>
            <!-- design form -->
<?php endif;?>

          <!-- content form -->
          <div class="col-12 border py-3 px-3 mt-4">
          <h5 class="ps-1 mb-3">Treść</h5>

                <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                  <input type="hidden" id="id" class="form-control form-control-sm" name="id" value="<?=$article['id'];?>">
                  <input type="hidden" id="id" class="form-control form-control-sm" name="update_content" value="update_content">


                  <!-- name and surname -->
                  <!-- headers -->
                  <div class="col-md-6">
                    <label for="contest_name" class="form-label w-100 ps-1">Nagłówek
                    </label>
                    <textarea type="text" name="header" class="form-control ps-1" aria-label="With textarea" rows="1" required><?=$article['header'];?></textarea>
                  </div>
                  <div class="col-md-6">
                    <label for="contest_sub_name" class="form-label w-100 ps-1">2 Nagłówek
                    </label>
                    <textarea type="text" name="subheader" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$article['subheader'];?></textarea>
                  </div>
                  <!-- headers -->

                  <div class="col-md-12">
                    <label for="content" class="form-label w-100 ps-1">Opis
                    </label>
                    <textarea type="text" name="content" class="form-control ps-1 trumbowyg-with-list" aria-label="With textarea"><?=$article['content'];?></textarea>
                  </div>




                  <div class="col-12 text-md-end text-center ">
                    <button id="register-button" class="btn btn-sm btn-success register-button">zmień treść</button>
                  </div>

                </form>
          </div><!-- col 12-->
          <!-- content form -->



          <!-- image upload form-->
          <?php if ($article['has_image'] == 'on'):
            $data['table'] = 'carousels';
          $data['old_image'] = $article['image'];
          $data['prefix'] = 'image';
          $data['form_title'] = 'Zdjęcie';
          $this->admInclude("/adm_views/adm-upload-form.php", $data);

          $data['old_image'] = $article['image_mobile'];
          $data['prefix'] = 'image_mobile';
          $data['form_title'] = 'Zdjęcie mobilne';
          $this->admInclude("/adm_views/adm-upload-form.php", $data);

          ?>
          <!-- content form -->
          <div class="col-12 border py-3 px-3 mt-4">
          <h5 class="ps-1 mb-3">Alt images SEO</h5>

                <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                  <input type="hidden" id="id" class="form-control form-control-sm" name="id" value="<?=$article['id'];?>">
                  <input type="hidden" id="id" class="form-control form-control-sm" name="update_seo" value="update_seo">


                  <!-- name and surname -->
                  <!-- headers -->
                  <div class="col-md-6">
                    <label for="contest_name" class="form-label w-100 ps-1">image_alt
                    </label>
                    <textarea type="text" name="image_alt" class="form-control ps-1" aria-label="With textarea" rows="1" required><?=$article['image_alt'];?></textarea>
                  </div>
                  <div class="col-md-6 d-none">
                    <label for="image_mobile_alt" class="form-label w-100 ps-1">image_mobile_alt
                    </label>
                    <textarea type="text" name="image_mobile_alt" class="form-control ps-1" aria-label="With textarea" rows="1" ><?=$article['image_mobile_alt'];?></textarea>
                  </div>
                  <!-- headers -->

                  <div class="col-12 text-md-end text-center ">
                    <button id="register-button" class="btn btn-sm btn-success register-button">zmień</button>
                  </div>

                </form>
          </div><!-- col 12-->
          <!-- content form -->


          <?php endif;?>
          <!-- image upload form-->



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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')
    </script>
  <script src="admarea/assets/js/croppie.js"></script>

<script src="admarea/assets/js/trumbowyg.js"></script>

<script>

$.trumbowyg.svgPath = 'admarea/assets/css/icons.svg'; 

$('.trumbowyg-with-list').trumbowyg({
  
btns: [['bold'], ['h4'], ['h5'], ['p'], ['unorderedList'], ['removeformat'], ['viewHTML'], ['link']],
tagsToRemove: ['table', 'td', 'tr']


}); 
$('.trumbowyg-simple').trumbowyg({
  
btns: [['bold'], ['p'], ['removeformat'], ['viewHTML'], ['em']],
tagsToRemove: ['table', 'td', 'tr']

}); 



</script>
<?php
if ($article['has_image'] == 'on') {
  $max_image_viever = 550;
  // main image
  $data['image_height'] = $data['template_image_height'];
  $data['image_width'] = $data['template_image_width'];
  $data['prefix'] = 'image';
  $data['image_q'] = $data['image_compression'];

  $vieport_height = $data['image_height'];
  $vieport_width = $data['image_width'];
  $boundary_height = $data['image_height'];
  $boundary_width = $data['image_width'];
      if ($data['image_width']>=$max_image_viever) {
      $vieport_height = round($data['image_height'] / 4,0,PHP_ROUND_HALF_UP) ;
      $vieport_width = round($data['image_width'] / 4,0,PHP_ROUND_HALF_UP);
      $boundary_height = round($data['image_height'] / 2.4,0,PHP_ROUND_HALF_UP) ;
      $boundary_width = round($data['image_width']/ 4 ,0,PHP_ROUND_HALF_UP);
      }
      $data['vieport_height'] = $vieport_height;
      $data['vieport_width'] = $vieport_width;
      $data['boundary_height'] = $boundary_height;
      $data['boundary_width'] = $boundary_width;

  $this->admInclude("/assets/new-admin-croopie-model-script.php", $data);
  // main image


  // main image
  $data['image_height'] = $data['template_mobile_image_height'];
  $data['image_width'] = $data['template_mobile_image_width'];
  $data['prefix'] = 'image_mobile';
  $data['image_q'] = $data['mobile_image_compression'];

  $vieport_height = $data['image_height'];
  $vieport_width = $data['image_width'];
  $boundary_height = $data['image_height'];
  $boundary_width = $data['image_width'];
      if ($data['image_width']>=$max_image_viever) {
      $vieport_height = round($data['image_height'],0,PHP_ROUND_HALF_UP) / 2;
      $vieport_width = round($data['image_width'],0,PHP_ROUND_HALF_UP) / 2;
      $boundary_height = round($data['image_height'],0,PHP_ROUND_HALF_UP) / 2;
      $boundary_width = round($data['image_width'],0,PHP_ROUND_HALF_UP) / 2;
      }
      $data['vieport_height'] = $vieport_height;
      $data['vieport_width'] = $vieport_width;
      $data['boundary_height'] = $boundary_height;
      $data['boundary_width'] = $boundary_width;

  $this->admInclude("/assets/new-admin-croopie-model-script.php", $data);
  // main image




  }
      



?>


  </body>
</html>
