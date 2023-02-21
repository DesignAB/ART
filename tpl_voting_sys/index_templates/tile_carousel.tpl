<div class="container-fluid carousel_tile  p-0">


  <!-- row-->
  <div class="row g-0 carousel_tile_row">
  {foreach from=$standard_data['carousels'] key=key item=value name=counter}
{counter assign='pos'}
    <div class="col-md-4" style="perspective: 1000px;">

      <div class="card carousel-tile-card name{$pos} bg-transparent h-100">
              {if !empty($value.link)}
              <a href="{$value.link}" class="stretched-link"></a>
              {/if}

      <picture>
          <source media="(min-width:768px)" srcset="{$standard_data['image_path']}{$value.image}">

        <img src="{$standard_data['image_path']}{$value.image_mobile}" class="d-block w-100 shadow" alt="...">
      </picture>


        <div class="card-body pt-0 pb-0 px-4">

          <div class="body-content w-100 h-100 p-md-4 px-md-5 text-white {$value.text_color} position-relative d-flex flex-column row shadow">
            <div class="body-content-overlay {$value.overlay_color}" style="opacity: {$value.overlay_opacity}">
            </div>
            <div class="col-12">
          <h4 class="card-title position-relative">{$value.header}!</h4>
            {$value.content}
          </div>

            {if !empty($value.link)}
            <div class="col-12 mt-auto">
              <a href="{$value.link}" class="mt-auto btn btn-sm position-relative {$value.button_kind} dark_heading_color stretched-link">czytaj to!</a>
            </div>
              {/if}

          </div><!-- body-content-->
        </div><!-- card body-->


      </div>

    </div><!-- col ends-->


  {/foreach}

  </div>
  <!-- row-->




</div>