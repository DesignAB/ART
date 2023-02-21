<div class="container-lg px-0 mb-5 standard-big-text">
  
  <div class="row heading-row my-3 position-relative">
    <div class="col-12 text-left heading-row-content position-relative" style="">
      <h1 data-aos="test" data-aos-offset="0" data-aos-once="false" data-aos-duration="800" data-aos-delay="0" data-aos-anchor-placement="top-center"
 class="light-heading mb-0 position-relative d-inline animated-header">{$standard_data['category_name']}</h1>
      <h2 class="light-heading mt-0 mb-0 position-relative bg-secondary">{$standard_data['category_sub_name']}</h2>
    </div>
  </div>

  {foreach from=$standard_data['subcategories'] key=key item=subcategory name=counter}
    {if $standard_data['subcategorized'] == 'on'}

  <div class="row subheading-row my-3 position-relative">
    <div class="col-12 text-center heading-row-content" style="">
      <h3 class="light-heading mb-0 ">{$subcat_heading_{$subcategory}}</h3>
      <h4 class="light-heading mt-0 mb-0">{$subcat_subheading_{$subcategory}}</h4>
    </div>
  </div>
  {/if}


  
  {foreach from=$articles_row_{$subcategory} key=k item=value name=counter}
    {if $smarty.foreach.counter.first}

  <div class="row g-0 cat-row  position-relative mb-5">
    {/if}
      <div class="col-12 p-0 content position-relative card shadow mb-3  {cycle name=first values='even,odd'} ">
        <div class="center-stripe bg-03 {$value.overlay_color}"></div>
        <div class="side-stripe bg-01 {$value.overlay_color}"></div>
    <div class="row g-0 standard-big-text-row position-relative d-flex align-items-center p-5 {cycle name=second values='even,odd'}">

        <!-- content-col -->
        <div class="col-md-7 mb-3 mb-md-0 content-col p-lg-5 shadow {cycle name=third values='order-md-0 order-0, order-md-1 order-0'} bg-white position-relative"
          >
          <div class="text-container p-md-5 p-3 {$value.text_color}">
              <h3 class="dark_heading_color {$value.heading_color}">{$value.header}</h3>
              <h4 class="dark_heading_color {$value.heading_color}">{$value.subheader}</h4>
              {$value.short_content}

              {if !empty($value.content)} 
              <a href="{$standard_data['category']|humanize_category}/{$subcategory_{$subcategory}|humanize_category}{$value.header|createLinkForMe}/{$value.id}" class="btn btn-sm {$value.button_kind} mt-3 dark_heading_color" aria-label="Przeczytaj więcej o {$value.header}">więcej</a>
              {/if}

          </div>
        </div>
        <!-- content-col -->
      <!-- image-col -->
      <div class="col-md-5 image-col {cycle name=fourtth values='order-md-1 order-1, order-md-0 order-1'} position-relative shadow mb-3" 
        data-aos="just-fade-in" data-aos-offset="0" data-aos-once="false" data-aos-duration="800" data-aos-delay="0" data-aos-anchor-placement="top-center"
>
      <div class="picture-underlay shadow bg-02 {$value.overlay_color}"></div>
        <picture class="position-relative p-0">
          <source media="(min-width:500px)" srcset="{$standard_data.image_path}{$value.image_index}">
          <img src="{$standard_data.image_path}{$value.index_mobile_image}" class="img-fluid shadow" alt="{$value.image_index_alt}" style="object-fit: cover; display: block;">
        </picture>
        <div class="square-1 bg-01"></div>
        <div class="square-2 bg-02"></div>
        <div class="square-3 bg-03"></div>

      </div>
      <!-- image-col -->

</div>

      </div> <!-- content in row col-12 -->

    {if $smarty.foreach.counter.last}
    {if $all_articles_count_{$subcategory}>$articles_count_{$subcategory}}
    {if $standard_data['subcategorized'] == ''}
    {$subcategory=''}
    {/if}

  <div class="col-12 more-button text-center">
    <a href="{$standard_data['category']|humanize_category}/{$subcategory|humanize_category}" class="btn btn-01 mt-3">zobacz wszystkie</a>
  </div>

    {/if}
  </div><!-- cat-row standard-big-text -->


    {/if}


  {/foreach}
  {* from=$standard_data['subcategories'] *}













  {/foreach}{*from=$standard_data['subcategories']*}




</div>