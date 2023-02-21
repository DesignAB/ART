
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
  <div class="row standard-big-text template-row overflow-hidden">
    <div class="col-12 p-0 content-column position-relative card shadow mb-3  {cycle name=first values='even,odd'} ">
      {* decoration stripes*}
      <div class="center-stripe bg-03 {$data['overlay_color']} d-none"></div>
      <div class="side-stripe bg-01 {$data['overlay_color']}"></div>
      {* decoration stripes*}



      <div id="{$value.header}aos" class="row g-0 standard-big-text-row position-relative d-flex align-items-center p-5 {cycle name=second values='even,odd'} overflow-hidden">

        <!-- content-col -->
        <div class="col-md-7 mb-3 mb-md-0 content-col p-lg-5 shadow {cycle name=third values='order-md-0 order-0,order-md-1 order-0'} bg-white position-relative">
          <div class="text-container p-md-5 p-3 {$value.text_color}">
              <h3 class="dark_heading_color {$value.heading_color}">{$value.header}</h3>
              <h4 class="dark_heading_color {$value.heading_color}">{$value.subheader}</h4>
              {$value.short_content}
              {if !empty($value.content)}
              <a href="{$data['before_link']}{$value.header|createLinkForMe}/{$value.id}" class="btn btn-sm btn-01 {$value.button_kind} mt-3 dark_heading_color">czytaj to!</a>
              {/if}
          </div>
        </div>
        <!-- content-col -->

        <!-- image-col -->
        <div class="col-md-5 image-col {cycle name=fourth values='order-md-1 order-1,order-md-0 order-1 '} position-relative shadow mb-3"  
        data-aos="just-fade-in" data-aos-offset="0" data-aos-once="false" data-aos-duration="1200" data-aos-delay="0" data-aos-anchor-placement="top-center">
        <div class="picture-underlay shadow bg-02 {$value.overlay_color}"></div>
          <picture class="position-relative p-0">
            <source media="(min-width:500px)" srcset="{$IMAGEFOLDER}{$data['catinfo'].category}/{$value.image_index}">
            <img src="{$IMAGEFOLDER}{$data['catinfo'].category}/{$value.index_mobile_image}" class="img-fluid shadow" alt="{$value.image_index_alt}" style="object-fit: cover; display: block;">
          </picture>
          <div class="square-1 bg-01"></div>
          <div class="square-2 bg-02"></div>
          <div class="square-3 bg-03"></div>

        </div>
        <!-- image-col -->
      <div class="general-overlay bg-03 {$data['overlay_color']} cpv-1-3-1"   
        data-aos="to-top" data-aos-offset="0" data-aos-once="false" data-aos-duration="800" data-aos-delay="0" data-aos-anchor-placement="top-center"></div>

      <div class="general-overlay bg-03 {$data['overlay_color']} cpv-1-3-2"   
        data-aos="to-bottom" data-aos-offset="0" data-aos-once="false" data-aos-duration="800" data-aos-delay="0" data-aos-anchor-placement="top-center"></div>

      <div class="general-overlay bg-03 {$data['overlay_color']} cpv-1-3-3"   
        data-aos="to-top" data-aos-offset="0" data-aos-once="false" data-aos-duration="800" data-aos-delay="0" data-aos-anchor-placement="top-center"></div>




      </div><!-- row in content-column-->
    </div><!-- content-column-->
  </div>
  {/foreach}
</div><!-- main container ends -->

{if $data['pagination'] == 'on'}
{include file='standard-paginator.tpl' title='Newest links' pages=$data}
{/if}



