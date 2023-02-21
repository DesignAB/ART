<div id="partnerzy" class="container partners">
  <div class="row g-0">
    </div>
    <!-- heading-->
    <div class="col-12 text-center d-flex flex-column align-items-center justify-content-center heading mb-md-5 pb-3 aos-animate">
      <h1 data-aos="aos-heading-h1" data-aos-offset="0" data-aos-once="false" data-aos-duration="500" data-aos-delay="0" data-aos-anchor-placement="top-center">Nasi partnerzy</h1>
      <div class="heading-effect d-flex justify-content-center" data-aos="aos-heading" data-aos-offset="-100" data-aos-once="false" data-aos-duration="300" data-aos-delay="200" data-aos-anchor-placement="top-center"><span data-aos="aos-heading-dot" data-aos-offset="-100" data-aos-once="false" data-aos-duration="300" data-aos-delay="0" data-aos-anchor-placement="top-center"><p>•</p></span>
      </div>
    </div>
    <!-- heading-->


    <div class="col-12">
      <div class="container-fluid mt-lg-2 pb-5">
        <div class="row for-similar-cards row-cols-1 row-cols-md-3 row-cols-lg-5 g-4 mt-2">
    {foreach from=$standard_data['partners_row'] key=key item=value name=counter}
          <div class="col">
            <div class="card similar-card h-100 border-0 d-flex align-items-center justify-content-center"  data-aos="aos-shadow" data-aos-offset="-200" data-aos-once="false" data-aos-duration="300" data-aos-delay="" data-aos-anchor-placement="top-center">
              <img src="{$standard_data.image_path}{$value.image}" class="card-img p-2" alt="..." style="max-width: 200px;">
              {if !empty($value.link)}
              <a href="{$value.link}" class="stretched-link"  aria-label="Nasz partner {$value.header}"></a>      
              {/if}
            </div>

          </div>  <!-- .col for-similar-cards-->

    {/foreach}
        </div>
      </div>
    </div>


  </div><!-- partners row-->
</div><!-- container ends-->


