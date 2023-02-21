
<div class="sortable container-fluid" id="events">

  <div class="col-12 separator {$separator_display}" style="height: 100px;"></div>

  <div class="row sortable-row">
{if empty($events)}
    <div class="col-12 text-center d-flex flex-column align-items-center justify-content-center heading mb-md-5 pb-3 aos-animate mt-md-5">
      <h1 data-aos="aos-heading-h1" data-aos-offset="0" data-aos-once="false" data-aos-duration="500" data-aos-delay="0" data-aos-anchor-placement="top-center">Nie dodano wydarzeń</h1>
      <div class="heading-effect d-flex justify-content-center" data-aos="aos-heading" data-aos-offset="-100" data-aos-once="false" data-aos-duration="300" data-aos-delay="200" data-aos-anchor-placement="top-center"><span data-aos="aos-heading-dot" data-aos-offset="-100" data-aos-once="false" data-aos-duration="300" data-aos-delay="0" data-aos-anchor-placement="top-center"><p>•</p></span>
      </div>
    </div>

{/if}

{if !empty($events)}
    <div class="col-12 text-center d-flex flex-column align-items-center justify-content-center heading mb-md-5 pb-3 aos-animate">
      <h1 data-aos="aos-heading-h1" data-aos-offset="0" data-aos-once="false" data-aos-duration="500" data-aos-delay="0" data-aos-anchor-placement="top-center">{$category_display}</h1>
        <div class="heading-effect d-flex justify-content-center" data-aos="aos-heading" data-aos-offset="-100" data-aos-once="false" data-aos-duration="300" data-aos-delay="200" data-aos-anchor-placement="top-center"><span data-aos="aos-heading-dot" data-aos-offset="-100" data-aos-once="false" data-aos-duration="300" data-aos-delay="0" data-aos-anchor-placement="top-center"><p>•</p></span>
        </div>
        {if !empty($category_sub_display)}
        <h3 class="mt-3" data-aos="aos-heading-h1" data-aos-offset="0" data-aos-once="false" data-aos-duration="500" data-aos-delay="450" data-aos-anchor-placement="top-center">{$category_sub_display}</h3>
        {/if}

    </div>



<!-- portfolio navi-->
          <div class="col-12 text-center">
            <div id="filters" class="filters text-center">
              <ul class="sortable__nav nav "> 
                <li class="sort">
                  <a href="#" data-filter="*" class="active nav__link">wydarzenia w trójmieście</a>
                </li>
                <li >
                  <a href="https://34art.pl/adriaart" class=" nav__link" target="_blank">wydarzenia z Polski</a>
                </li>
              </ul>


              <ul class="sortable__nav nav "> 
                  {foreach from=$event_dates key=key item=filter_value}
                  {assign "filterDisplay" $filter_value|date_format:"%m" }

                  <li class="sort">
                    <a href="#" data-filter=".{$filter_value}" class="nav__link">{$filterDisplay|monthNamePl} '{$filter_value|substr:2:2}</a>
                  </li>
                  {/foreach}

              </ul>
            </div>
          </div>
<!-- portfolio navi ends-->

    <div class="col-12 col-for-isotope">
      <div id="portfolio-grid" class="row no-gutter"  data-masonry='{$data_masonry}'>

          <!-- element -->
      {foreach from=$events key=k item=value}
      {assign "itemfilter" $value.custom_event_date|date_format:"%G-%m"}
      {assign "image" $value.uploaded_image}
      {if !empty($value.custom_event_image)}
      {assign "image" $value.custom_event_image}
      {/if}

          <div class="item {$itemfilter}  col-lg-4  col-xl-3 mb-4">

            <div class="card index-card text-white overflow-hidden shadow">
              <img src="{$image_path}{$image}" class="card-img rounded-0" alt="...">

              <div class="custom-card-img-overlay">
                <h6 class="card-title">{$value.artist_name}</h6>
              </div>

              <div class="custom-card-img-overlay-full">
                <h6 class="card-title mb-0">{$value.artist_name}</h6>
                <p class="card-text">{$value.custom_event_date}  {$value.hall_city}<br>{$value.hall_full_name}</p>

                <a href="https://bilety.34art.pl/event/view/id/{$value.event_id}" target="_blank" class="btn btn-danger btn-sm">kup bilet {$value.custom_event_time|date_format:"%H:%M"}</a>

                {if !empty($value.parent_to)}
                <a href="https://bilety.34art.pl/event/view/id/{$value.parent_to}" target="_blank" class="btn btn-danger btn-sm">kup bilet {$value.child_hour|date_format:"%H:%M"}</a>
                {/if}

                <a href="event/{$value.artist_name|createLinkForMe}/{$value.event_id}" class="btn btn-danger btn-sm">więcej</a>
              </div>



            </div><!-- card-->

          </div> <!-- item -->

           <!-- element-->
           {/foreach}


      </div>{* portfolio grid *}
    </div>{* col for isotope *}


{/if}
{* !empty($events) *}


  </div>
</div>