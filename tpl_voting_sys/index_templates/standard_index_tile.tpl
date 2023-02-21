<div class="container-lg px-0 mb-5 standard-big-text">
  
  <div class="row heading-row my-3 position-relative">
    <div class="col-12 text-center heading-row-content" style="">
      <h1 class="light-heading mb-0">{$standard_data['category_name']}</h1>
      <h2 class="light-heading mt-0 mb-0">{$standard_data['category_sub_name']}</h2>
    </div>
  </div>

  {foreach from=$standard_data['subcategories'] key=key item=subcategory name=counter}
    {if $standard_data['subcategorized'] == 'on'}

  <div class="row subheading-row my-3 position-relative">
    <div class="col-12 text-center heading-row-content" style="">
      <h3 class="light-heading mb-0">{$subcat_heading_{$subcategory}}</h3>
      <h2 class="light-heading mt-0 mb-0">{$subcat_subheading_{$subcategory}}</h2>
    </div>
  </div>
  {/if}


  
  {foreach from=$articles_row_{$subcategory} key=k item=value name=counter}
  {* this is template row*}
    {if $smarty.foreach.counter.first}
    <div class="row g-0 cat-row standard-tile position-relative mb-5">
    {/if}
  {* this is template row*}

  {* this is template content*}
      <div class="col-md-4 p-0 content position-relative card shadow">

            <picture>
              <source media="(min-width:500px)" srcset="{$standard_data.image_path}{$value.image_index}">
              <img src="{$standard_data.image_path}{$value.index_mobile_image}" class="img-fluid" alt="{$value.image_index_alt}">
            </picture>


            <div class="tilecaption-heading">
              <div class="tilecaption-content-heading position-relative">
                <div class="tilecaption-overlay-heading bg-01">
                </div>
                <div class="tilecaption-text-heading position-relative text-center">
                  <h4 class="light-heading {$value.heading_color} m-0 py-3">{$value.header}</h4>
                </div><!-- tilecaption-text -->
              </div><!-- tilecaption-content -->
            </div><!-- tilecaption-->

            <div class="tilecaption">
              <div class="tilecaption-content position-relative h-100 d-flex align-items-center justify-content-center">
                <div class="tilecaption-overlay bg-01">
                </div>
                <div class="tilecaption-text position-relative text-center light-text px-3">
                  <h4 class="light-heading {$value.heading_color}">{$value.header}</h4>
                  <h4 class="light-heading {$value.heading_color}">{$value.subheader}</h4>
                    {$value.short_content}
                    {if !empty($value.content)} 
                      <a href="{$standard_data['category']|humanize_category}/{$value.header|createLinkForMe}/{$value.id}" class="btn btn-02 {$value.button_kind} mt-2">przeczytaj</a>
                    {/if}
                </div><!-- tilecaption-text -->
              </div><!-- tilecaption-content -->
            </div><!-- tilecaption-->


      </div>



  {* this is template content*}

    {if $smarty.foreach.counter.last}
    {if $all_articles_count_{$subcategory}>$articles_count_{$subcategory}}
    {if $standard_data['subcategorized'] == ''}
    {$subcategory=''}
    {/if}

  <div class="col-12 more-button text-center">
    <a href="{$standard_data['category']}/{$subcategory}" class="btn btn-01 mt-3">zobacz wszystkie</a>
  </div>

    {/if}
  </div><!-- cat-row standard-big-text -->


    {/if}


  {/foreach}
  {* from=$standard_data['subcategories'] *}













  {/foreach}{*from=$standard_data['subcategories']*}




</div>