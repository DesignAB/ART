<?php

?>

<div class="container-fluid">

  <div class="row heading-row mb-3 position-relative">
    <div class="col-12 text-center heading-row-content" style="">
      <h1 class="light-heading mb-0">{$category_display}</h1>
      <h2 class="light-heading mt-0 mb-0">{$category_sub_display}</h2>
    </div>
  </div>



  <div class="row gx-3 cat-row" data-masonry='{$data_masonry}'>
  {foreach from=$events key=k item=value}
    <div class="col-md-4 col-lg-3 mb-4 ">

      <div class="card mb-3 shadow h-100">
      <img src="{$image_path}{$value.uploaded_image}" class="card-img-top" alt="...">
        <div class="card-body">

          <h5 class="card-title dark_heading_color color-01">{$value.artist_name}</h5>
          <h6 class="card-title dark_heading_color color-01">{$value.custom_event_date}</h6>
          
          <a href="events/{$value.artist_name|createLinkForMe}/{$value.event_id}" class="btn btn-sm btn-01 mt-3 dark_heading_color">więcej</a>
        <a href="https://bilety.34art.pl/event/view/id/{$value.event_id}" class="btn btn-sm btn-01 mt-3 dark_heading_color">kup {$value.custom_event_time|date_format:"%H:%M" }</a>


          {if !empty($value.parent_to)}
          <a href="https://bilety.34art.pl/event/view/id/{$value.parent_to}" class="btn btn-sm btn-01 mt-3 dark_heading_color">kup {$value.child_hour|date_format:"%H:%M" }</a>

          {/if}
        </div><!-- card body ends-->
      </div><!-- card ends -->

    </div>
  {/foreach}


  </div><!-- cat row-->

  <!-- more button -->
  {if $all_articles_count>$articles_count}
    <div class="row gx-3 more-button-row standard-big-text">

    <div class="col-12 more-button text-center">
      <a href="events" class="btn btn-01 mt-3">zobacz wszystkie</a>
    </div>
    </div><!--more-button-row-->
  {/if}
  <!-- more button -->


</div><!-- container ends-->

