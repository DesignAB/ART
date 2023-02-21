<?php
// vars definitions
$contests = $data['contests_row'];
?>


<div class="container-lg mb-5">
  <div class="row heading-row my-3 position-relative">
    <div class="col-12 text-center heading-row-content" style="">
      <h1 class="light-heading mb-0"><?= $data['category_display'];?></h1>
      <h2 class="light-heading mt-0 mb-0"><?= $data['category_sub_display'];?></h2>
    </div>
  </div>



  <div class="row">
<!-- there goes design -->
          <!-- contests go here -->
      <?php if (!empty($data['contests_row'])):?>
          <?php $counter=1; foreach ($data['contests_row'] as $key ):
          if ($counter % 2 == 0) {
            $even = 'order-md-1';
            $odd = 'order-md-0';
          } else{
            $even = 'order-md-0';
            $odd = 'order-md-1';
          }

          ?>
    <!-- content-->
    <div class="col-12 shadow-sm mb-4 bg-white">
      <div class="row">
        <!-- image-->
        <div class="col-md-5 <?=$even?> px-0 position-relative">
          <img src="<?=IMGFOLDER?>contests/<?=$key['contest_photo_image']?>" class="img-fluid" alt="...">

          <div class="square-1 bg-01">
          </div>
          <div class="square-2 bg-02">
          </div>
          <div class="square-3 bg-03">
          </div>


        </div>

        <div class="col-md-7  d-flex align-items-center dark-text <?=$odd?>">
          <div class="contest-column-padding p-lg-5 w-100">
            <h3 class="dark-heading mb-1"><?=$key['contest_name']?>!</h3>
            <?php if (!empty($key['contest_sub_name'])):?>
            <h4 class="dark-heading"><?=$key['contest_sub_name']?></h4>
            <?php endif;?>
            <p class="dark-heading"><?=$key['full_start']?></p>
            <p class="dark-heading"><?=$data['now']?></p>

            <?=$key['contest_short_description']?>
              <div class="contest-links">
                <a href="contestdetails/<?=$key['id']?>" class="btn btn-sm btn-01">Szczegóły</a>
                <a href="contestphotos/<?=$key['contest_u_id']?>" class="btn btn-sm btn-01">zdjęcia</a>
                <a href="/userupload/<?=$key['contest_u_id']?>" class="btn btn-sm btn-01">dodaj zdjęcie!</a>
              </div><!-- contest-links -->
              <div class="contest-sponsors mt-4">
                  <!-- sponsors-->
                <?php if ($key['contest_sponsor'] == 'on' && !empty($key['contest_sponsors_list'])):
                  $sponsors_count = count(explode(' ', $key['contest_sponsors_list']));
                    $d_sponsors = 'Sponsor';
                  if ($sponsors_count>1) {
                    $d_sponsors = 'Sponsorzy';
                  }
                  $query_fields = array("id");
                  $query_params = explode(' ', $key['contest_sponsors_list']);
                  $query_rules = '';
                  $table = 'sponsors';
                  $sponsors_row = $data['sponsors']->searchSponsors($table, $query_params, $query_fields, $query_rules);

                  ?>
                  <h5 class="card-title mb-3"><?=$d_sponsors?></h5>
                    <div class="row d-flex flex-row">
                    <?php foreach ($sponsors_row as $key => $value):
                    ?>
                    <a href="<?=$value['sponsor_website']?>" target="blank" class="col-md-3">
                        <img src="<?=IMGFOLDER?>sponsors/<?=$value['sponsor_logo']?>" class="img-fluid" alt="...">
                      </a>

                    <?php endforeach;?>
                    </div>
                <?php endif;?>
                  <!-- sponsors-->

              </div><!-- contest-sponsors-->

          </div>
        </div>

      </div>
    </div>
    <!-- content-->




          <?php $counter++; endforeach; ?>
          <?php endif; ?>
          <!-- contests go here -->
<!-- there goes design -->







  <!-- more button -->
  <?php if ($data['all_articles_count'] > $data['articles_count']): // limitter button?>
  <div class="col-12 more-button text-center">
    <a href="contests" class="btn btn-01 mt-3">zobacz wszystkie</a>
  </div>
  <?php endif; // limitter button ends?>

  <!-- more button -->







  </div><!-- cat row-->
</div><!-- container ends-->

