<div id="main-page-carousel" class="carousel slide mb-3 mb-lg-5" data-bs-ride="carousel" style="height:100vh;">
	<!-- .carousel-indicators-->
	  <div class="carousel-indicators">
	    <div class="indicators-container d-none d-lg-block">
	{foreach from=$standard_data['carousels'] key=key item=indicatorvalue name=indicators}

    <button type="button" data-bs-target="#main-page-carousel" data-bs-slide-to="{$key}" class="active" aria-current="true" aria-label="Slide {$key}"></button>
	{/foreach}
	    </div>
	  </div>
	<!-- .carousel-indicators-->


	<div class="carousel-inner" style="height: 100vh;">

  {foreach from=$standard_data['carousels'] key=key item=value name=counter}
	{assign "active" ""}
	{if $key==0}
	{assign "active" "active"}
	{/if}

	<!-- .carousel-item-->
    <div class="carousel-item {$active} bg1" data-bs-interval="4000" style="height: 100vh;">
      <div class="carousel-image-container">

        <picture>
          <source srcset="{IMGFOLDER}carousels/{$value.image}" media="(min-width:992px)" type="image/svg+xml">
          <img src="{IMGFOLDER}carousels/{$value.image_mobile}" class="img-fluid" alt="{$value.image_alt}" style="object-position: center center; object-fit: cover; height: 100vh; width: 100%;">
        </picture>

        <div class="carousel-image-overlay d-flex align-items-center justify-content-center flex-column py-5 py-lg-0" style="">
        	<div class="bg2 {$value.overlay_color}" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; content: ''; opacity: {$value.overlay_opacity};">
        	</div>

        	<div class="corousel-overlay-content text-center position-relative">
	          <h1 class="text-center px-lg-5">{$value.header}</h1>
	          <h2 class="text-center px-lg-5 ">{$value.subheader}</h2>
	          <p>{$value.content}</p>
				{if !empty({$value.link})}
				<a href="{$value.link}" class="btn btn-outline-light mt-2 mt-lg-3 stretched-link">zobacz</a>
				{/if}
			</div>
        </div><!--.carousel-image-overlay-->
		

      </div><!--.carousel-image-container-->
    </div><!-- .carousel-item-->
	{/foreach}

	</div><!-- carousel inner-->

  <button class="carousel-control-prev $d_indicators" type="button" data-bs-target="#main-page-carousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next $d_indicators" type="button" data-bs-target="#main-page-carousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>


</div><!-- main page carousel ends-->