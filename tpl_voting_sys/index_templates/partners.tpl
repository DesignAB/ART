<div class="container-fluid py-3 partners">

  <div class="row heading-row mb-3 position-relative">
    <div class="col-12 text-center heading-row-content" style="">
      <h1 class="light-heading mb-0">Nasi Partnerzy</h1>
    </div>
  </div>

  <div class="row cat-row mb-3 d-flex justify-content-center">
  {foreach from=$standard_data['partners_row'] key=key item=value name=counter}
    <div class="col-md-2 mb-3 standard-index-def partners-col">
      <div class="card h-100 text-center shadow">
            <img src="{$standard_data.image_path}{$value.image}" class="card-img-top partners-image">
            {if !empty($value.link)}
            <a href="{$value.link}" class="stretched-link"></a>      
            {/if}
<!--         <div class="card-body">
          <h4 class="card-title dark-heading">{$value.header}</h4>
        </div>
 -->
      </div>

    </div>
  {/foreach}




  </div><!-- cat row-->


</div><!-- container ends-->


