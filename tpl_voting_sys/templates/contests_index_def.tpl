<div class="container-lg mb-5">
  <div class="row heading-row my-3 position-relative">
    <div class="col-12 text-center heading-row-content" style="">
      <h1 class="light-heading mb-0">{$data.category_display}</h1>
      <h2 class="light-heading mt-0 mb-0">{$data.category_sub_display}</h2>
    </div>
  </div>

  <div class="row contests-row">
  {foreach from=$contests key=key item=value name=contestsforeach}
    <div class="col-12 shadow-sm mb-4 bg-white">
      <div class="row">
        <!-- image-->
        <div class="col-md-5  px-0 position-relative {cycle name=first values='order-md-1, order-md-0'}">
          <img src="{$data.image_path}{$value.contest_photo_image}" class="img-fluid" alt="...">

          <div class="square-1 bg-01">
          </div>
          <div class="square-2 bg-02">
          </div>
          <div class="square-3 bg-03">
          </div>
        </div>
        <!-- image-->
        <!-- content-->
        <div class="col-md-7  d-flex align-items-center dark-text">
          <div class="contest-column-padding p-lg-5 w-100">

            <h3 class="dark-heading mb-1">{$value.contest_name}</h3>
            {if !empty($value.contest_sub_name)}
            <h4 class="dark-heading">{$value.contest_sub_name}</h4>
            {/if}
            <p class="dark-heading">{$value.full_start|date_format: "%d-%m-%G"}</p>
            <p class="dark-heading">{$value.full_end}</p>
            {$value.contest_short_description}
              <div class="contest-links">
                <a href="contestdetails/{$value.id}" class="btn btn-sm btn-01">Szczegóły</a>
                <a href="contestphotos/{$value.contest_u_id}" class="btn btn-sm btn-01">zdjęcia</a>
                <a href="/userupload/{$value.contest_u_id}" class="btn btn-sm btn-01">dodaj zdjęcie!</a>
              </div><!-- contest-links -->
              <!-- sponsors-->
              {if $sponsors_of_{$value.id}|count >0}
              <div class="contest-sponsors mt-4">
                  <h5 class="card-title mb-3">{$d_sponsor_{$value.id}}</h5>
                  <div class="row d-flex flex-row">
                    {foreach from=$sponsors_of_{$value.id} key=key item=sponsor_value}
                    <a href="{$sponsor_value.sponsor_website}" target="blank" class="col-md-3" aria-label="Nasz sponsor {$sponsor_value.sponsor_name}">
                        <img alt="{$sponsor_value.sponsor_name}" src="{$IMAGEFOLDER}/sponsors/{$sponsor_value.sponsor_logo}" class="img-fluid" >
                      </a>
                    {/foreach}

                  </div>
              </div>
              {/if}
              <!-- sponsors-->




          </div><!-- content column padding-->
        </div>
        <!-- content-->


      </div>
    </div>
  {/foreach}
  </div><!-- contests row-->
</div>