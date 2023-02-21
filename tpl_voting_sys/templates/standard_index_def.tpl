<div class="container-fluid px-0 my-5 pb-4 standard">
  
  <div class="row heading-row my-3 position-relative">
    <div class="col-12 text-center d-flex flex-column align-items-center justify-content-center heading mb-md-5 pb-3 aos-animate">
      <h1 data-aos="aos-heading-h1" data-aos-offset="0" data-aos-once="false" data-aos-duration="500" data-aos-delay="0" data-aos-anchor-placement="top-center">{$standard_data['category_name']}</h1>
        <div class="heading-effect d-flex justify-content-center" data-aos="aos-heading" data-aos-offset="-100" data-aos-once="false" data-aos-duration="300" data-aos-delay="200" data-aos-anchor-placement="top-center"><span data-aos="aos-heading-dot" data-aos-offset="-100" data-aos-once="false" data-aos-duration="300" data-aos-delay="0" data-aos-anchor-placement="top-center"><p>•</p></span>
        </div>
    </div>
  </div><!-- heading row-->

  {foreach from=$standard_data['subcategories'] key=key item=subcategory name=counter}
    {if $standard_data['subcategorized'] == 'on'}

  <div class="row subheading-row my-3 position-relative">
    <div class="col-12 text-center heading-row-content" style="">
      <h3 class="light-heading mb-0 ">{$subcat_heading_{$subcategory}}</h3>
      <h4 class="light-heading mt-0 mb-0">{$subcat_subheading_{$subcategory}}</h4>
    </div>
  </div>


  {/if}


  
  {foreach from=$articles_row_{$subcategory} key=key item=value name=counter}
    {if $smarty.foreach.counter.first}
  <div class="row gx-3 cat-row position-relative mb-5 px-3">
    {/if}
    {*template content starts*}
    <div clss="col-12">
      <div class="row g-0" data-aos="aos-shadow" data-aos-offset="0" data-aos-once="false" data-aos-duration="300" data-aos-delay="100" data-aos-anchor-placement="top-center">

          <div class="col-md-6 h-100 index-article-image d-flex align-items-center {cycle values=$image_cycle}"  data-aos="aos-shadow" data-aos-offset="50" data-aos-once="false" data-aos-duration="300" data-aos-delay="250" data-aos-anchor-placement="top-center">
              <picture>
                <source srcset="{$standard_data.image_path}{$value.image_index}" media="(min-width:992px)" type="image/svg+xml">
                <img src="{$standard_data.image_path}{$value.index_mobile_image}" class="img-fluid" alt="{$value.image_index_alt}">
              </picture>

          </div><!-- .col-md-6-->

          <div class="col-md-6 index-article-content px-4 py-3 d-flex flex-column justify-content-center {cycle values=$content_cycle}">
          <h2>{$value.header}</h2>
          <h4>{$value.subheader}</h4>
              {$value.short_content}

          </div><!-- .col-md-6-->

      </div>
    </div>


    {*template content ends*}

    {if $smarty.foreach.counter.last}
    {assign 'last_key' $key}
    {if $all_articles_count_{$subcategory}>$articles_count_{$subcategory}}
    {if $standard_data['subcategorized'] == ''}
    {$subcategory=''}
    {/if}

  <div class="col-12 more-button text-center mt-3 mt-lg-4">
    <a href="{$standard_data['category']|humanize_category}/{$subcategory|humanize_category}" class="btn btn-outline-danger">więcej</a>
  </div>

    {/if}
  </div><!-- cat-row standard-big-text -->


    {/if}


  {/foreach}
  {* from=$standard_data['subcategories'] *}


  {/foreach}{*from=$standard_data['subcategories']*}




</div>