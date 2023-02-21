<div class="container-lg">
    <div class="row">

        <div class="col-12">
            <h1>Nasze wydarzenia</h1>
        </div>
{if !empty($events)}
{foreach from=$events key=key item=value name=counter}
{* IMAGEFOLDER *}

    <div class="card mb-3 shadow">
        <div class="row px-0">

            <div class="col-md-2 px-0 d-flex align-items-center">
            <img src="{$IMAGEFOLDER}/events/{$value['uploaded_image']}" class="img-fluid shadow-sm" alt="...">
            </div>

            <div class="col-md-10 d-flex align-items-center ps-md-5">
                <div class="card-body">
                    <div class="row in-card-body">
                        <div class="col-md-6">
                        <h5 class="card-title">{$value['artist_name']}</h5>
                        <h6 class="card-title ">{$value['hall_full_name'] } {$value['custom_event_date']}</h6>
                        </div>
                        <div class="col-md-6">
                            <a href="https://bilety.34art.pl/event/view/id/{$value['event_id']}" class="btn btn-sm btn-01 mt-3 dark_heading_color" target="_blank">kup {$value.custom_event_time|date_format:"%H:%M"}</a>
                                {if !empty($value.parent_to)}
                                <a href="https://bilety.34art.pl/event/view/id/{$value['parent_to']}" class="btn btn-sm btn-01 mt-3 dark_heading_color" target="_blank">kup {$value.custom_event_time|date_format:"%H:%M"}</a>
                                {/if}


                            <button class="btn btn-sm btn-01 mt-3 dark_heading_color" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{$value['event_id']}" aria-expanded="true" aria-controls="collapseOne">szczegóły</button>
                        </div>
                        <div class="col-12">
                            <!-- accordion for description -->
                                    <div class="accordion-item">

                                        <div id="collapse{$value['event_id']}" class="accordion-collapse collapse" aria-labelledby="headingOne">
                                        <div class="accordion-body">
                                        <p class="card-text">{$value['artist_description']}</p>
                                        </div>
                                        </div>
                                    </div>

                            <!-- accordion for description -->
                        </div>
                    </div><!-- row in-card-body -->

                </div><!-- card-body ends-->
            </div>


        </div>
    </div><!-- card ends -->

{/foreach}
{/if}
    </div>
}
</div>