
<div class="container-lg px-0 mb-5 standard-big-text">
  <div class="row g-0 cat-row standard-big-text position-relative mb-3">
    {if !empty($data['catinfo'])}
      <div class="col-12">
        <h1>{$data['catinfo'].display_name}</h1>
        <h1>{$data['catinfo'].sub_display_name}</h1>
      </div>
    {/if}
    {if !empty($data['subcatinfo'])}
      <div class="col-12">
        <h1>{$data['subcatinfo'].subcategory_display}</h1>
        <h1>{$data['subcatinfo'].subcategory_subdisplay}</h1>
      </div>
    {/if}

  </div> <!-- heading row ends-->



  {foreach from=$data['articles_row'] key=key item=value name=counter}
  <div class="row standard-big-text template-row">
    <div class="col-12 p-0 content-column position-relative card shadow mb-3  {cycle name=first values='even,odd'} ">
      {* decoration stripes*}
      <div class="center-stripe bg-03 {$data['overlay_color']}"></div>
      <div class="side-stripe bg-01 {$data['overlay_color']}"></div>
      {* decoration stripes*}
      <div class="row g-0 standard-big-text-row position-relative d-flex align-items-center p-5 {cycle name=second values='even,odd'}">

        <!-- content-col -->
        <div class="col-md-7 mb-3 mb-md-0 content-col p-lg-5 shadow {cycle name=third values='order-md-0 order-0,order-md-1 order-0'} bg-white position-relative">
          <div class="text-container p-md-5 p-3 {$value.text_color}">
              <h3 class="dark_heading_color {$value.heading_color}">{$value.header}</h3>
              <h4 class="dark_heading_color {$value.heading_color}">{$value.subheader}</h4>
              {$value.short_content}
              <br>
              {* $value.author|firstWord this shows only first name*}
              {$value.author}
          </div>
        </div>
        <!-- content-col -->

        <!-- image-col -->
        <div class="col-md-5 image-col {cycle name=fourth values='order-md-1 order-1,order-md-0 order-1 '} position-relative shadow mb-3">
        <div class="picture-underlay shadow bg-02 {$value.overlay_color}"></div>
          <picture class="position-relative p-0">
            <source media="(min-width:500px)" srcset="{$IMAGEFOLDER}{$data['catinfo'].category}/{$value.image_index}">
            <img src="{$IMAGEFOLDER}{$data['catinfo'].category}/{$value.index_mobile_image}" class="img-fluid shadow" alt="{$value.image_alt}" style="object-fit: cover; display: block;">
          </picture>
          <div class="square-1 bg-01"></div>
          <div class="square-2 bg-02"></div>
          <div class="square-3 bg-03"></div>

        </div>
        <!-- image-col -->

    <!-- ext content-col -->
    <div class="col-md-7 mt-3 mt-md-5 content-col p-lg-5 shadow order-last bg-white position-relative {cycle name=fifth values='order-md-3 order-2, order-md-2 order-2'} ">
      <div class="text-container p-md-5 p-3 {$value.text_color}">
          {$value.content}


      </div>
    </div>
    <!-- ext content-col -->

      <!-- ext_image-col -->
      <div class="col-md-5 {cycle name=sixth values='order-md-2 order-3,order-md-3 order-3'}  ext-image-col position-relative shadow mb-3">
      <div class="picture-underlay shadow bg-02 {$value.overlay_color}"></div>
        <picture class="position-relative p-0">
          <source media="(min-width:500px)" srcset="{$IMAGEFOLDER}{$data['catinfo'].category}/{$value.image}">
          <img src="{$IMAGEFOLDER}{$data['catinfo'].category}/{$value.image_mobile}" class="img-fluid shadow" alt="{$value.image_alt}" style="object-fit: cover; display: block;">
        </picture>
        <div class="square-1 bg-01"></div>
        <div class="square-2 bg-02"></div>
        <div class="square-3 bg-03"></div>

      </div>
      <!-- ext_image-col -->


      </div><!-- row in content-column-->
    </div><!-- content-column-->


  </div>
  {/foreach}
</div><!-- main container ends -->




