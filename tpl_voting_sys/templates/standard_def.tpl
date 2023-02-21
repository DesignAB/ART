
<div style="height: 120px;"></div>

<div class="container-fluid mb-md-5 content">
  <div class="row g-0">
    {if !empty($data['catinfo'])}
  <!-- heading-->
    <div class="col-12 text-center d-flex flex-column align-items-center justify-content-center heading mb-md-5 pb-3 aos-animate">
      <h1 data-aos="aos-heading-h1" data-aos-offset="200" data-aos-once="false" data-aos-duration="500" data-aos-delay="800" data-aos-anchor-placement="top-center">{$data['catinfo'].display_name}</h1>
      <div class="heading-effect d-flex justify-content-center" data-aos="aos-heading" data-aos-offset="-100" data-aos-once="false" data-aos-duration="300" data-aos-delay="1000" data-aos-anchor-placement="top-center"><span data-aos="aos-heading-dot" data-aos-offset="-100" data-aos-once="false" data-aos-duration="300" data-aos-delay="800" data-aos-anchor-placement="top-center"><p>•</p></span>
      </div>
    </div>
  <!-- heading-->
    {/if}

    {if !empty($data['subcatinfo'])}
      <div class="col-12">
        <h1>{$data['subcatinfo'].subcategory_display}</h1>
        <h1>{$data['subcatinfo'].subcategory_subdisplay}</h1>
      </div>
    {/if}
  </div><!-- heading row ends-->

  {foreach from=$data['articles_row'] key=key item=value name=counter}
  <div class="row g-0">
    {assign "content_col" "col-12 mt-md-5"}
    {if !empty($value.image)}
    {$content_col = "col-md-6"}

        <div class="col-md-6 h-100 index-article-image {cycle name=first values='order-0, order-1'}"  data-aos="aos-shadow" data-aos-offset="0" data-aos-once="false" data-aos-duration="300" data-aos-delay="100" data-aos-anchor-placement="top-center">
            <picture>
              <source srcset="{$IMAGEFOLDER}{$data['catinfo'].category}/{$value.image}" media="(min-width:992px)" type="image/svg+xml">
              <img src="{$IMAGEFOLDER}{$data['catinfo'].category}/{$value.image_mobile}" class="img-fluid" alt="...">
            </picture>
        </div><!-- .col-md-6-->

    {/if}{*!empty($value.image)*}

          <div class="{$content_col} index-article-content px-4 py-3 d-flex flex-column justify-content-center {cycle name=second values='order-1, order-0'}">
          <h2>{$value.header}</h2>
          <h3>{$value.subheader}</h3>
          {$value.short_content}
          {$value.content}
          </div><!-- .col-md-6-->



  </div><!-- content row ends-->
  {/foreach}

  <!-- footing-->
  <div class="row">
    <div class="col-12 text-center d-flex flex-column align-items-center justify-content-center heading  my-5 mb-md-5 mt-md-5 py-5 aos-animate">
      <div class="heading-effect d-flex justify-content-center" data-aos="aos-heading" data-aos-offset="-100" data-aos-once="false" data-aos-duration="300" data-aos-delay="200" data-aos-anchor-placement="top-center"><span data-aos="aos-heading-dot" data-aos-offset="-100" data-aos-once="false" data-aos-duration="300" data-aos-delay="0" data-aos-anchor-placement="top-center"><p>•</p></span>
      </div>
    </div>
  </div>
  <!-- footing-->


</div><!-- main container ends -->

{if $data['pagination'] == 'on'}
{include file='standard-paginator.tpl' title='Newest links' pages=$data}
{/if}



