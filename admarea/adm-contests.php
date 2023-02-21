<?php
  $messages = $this->loadAdmModel("admmessenger");
  $data['messenger'] = $messages;

  $timecontroller = $data['timecontroller'];
?>
<!DOCTYPE html>

<html lang="pl">
  <head>
    <!-- Bootstrap CSS -->
<?php
// $load_me->loadFileFromIncludes('_includes/all-meta.php');

?>

<?php
include ('adm_includes/all_meta.php');
include ('assets/css/all-css.php');
?>
    <title><?=$data['page_title']?></title>
  </head>
  <body>
<?php
$this->admInclude("/adm_views/admnavi.view.php", $data);


?>
    <div class="container-lg px-4" style="min-height: 100vh;">
      <div class="row align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 mb-3 shadow py-md-5 " >
          <div class="row g-0">
        <?php $adm_message = $data['messenger']->admMessage();?>
              <div class="col-6 px-3">
                <div class="border border-light py-3 shadow-sm text-center">

                  <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                  <input type="hidden" name="create_contest" value="create_contest">
                    <div class="col-12 text-center">
                      <button id="register-button" class="btn btn-sm btn-danger shadow-sm">Dodaj nowy konkurs </button>
                    </div>
                  </form>
                </div>
              </div><!-- .col-6-->

              <div class="col-6 mb-3 px-3">
                <div class="border border-light py-3 shadow-sm text-center">
                  <a class="btn btn-sm btn-success shadow-sm" href="/adm_contests_sponsors">sponsorzy</a>
                </div>

              </div><!-- .col-6-->

        
          <?php if (!empty($data['all_contests'])):?>
          <?php 
          $counter = 0;
          foreach ($data['all_contests'] as $key => $value):
          ?>
              <!-- content cols-->

              <div class="col-12 border border-light mb-3 shadow-sm">
                <div class="row p-3">


                  <div class="col-md-3 headings d-flex flex-column align-items-start justify-content-md-center">
                    <h6><?=$value['contest_name'];?></h5>
                    <h6><?=$value['contest_sub_name'];?></h5>
                  </div>

                  <div class="col-6 col-md-2 d-flex flex-row align-items-center">
                    <p><i class="bi bi-sunrise lead text-success"> </i><?=$value['start_date'];?></p>
                  </div>
                  <div class="col-6 col-md-2 d-flex flex-row align-items-center">
                    <p class="text-muted"><i class="bi bi-sunset lead text-secondary"> </i><?=$value['end_date'];?></p>
                  </div>
                  <div class="col-md-5 d-flex flex-row align-items-center justify-content-md-end">
                  <span class="badge <?=$timecontroller[$counter]['time_color'];?> rounded-pill p-2 me-1"><?=$timecontroller[$counter]['time_message'];?></span>

                    <a href="/adm_contests/single/<?=$value['id'];?>" class="btn btn-sm btn-outline-success me-1">edytuj</a>
                    <a href="/adm_contest_photos/<?=$value['contest_u_id'];?>" class="btn btn-sm btn-outline-success">pokaż zdjęcia</a>

                    <button type="button" class="ms-1 btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal_<?=$value['id'];?>">
                      usuń
                    </button>


                  </div>



                </div>
              </div>
              <!-- content cols-->
              <!-- Modal -->
<div class="modal fade" id="deleteModal_<?=$value['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">USUWASZ: <?=$value['contest_u_id'];?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

        <form  method="POST" enctype="multipart/form-data" >
          <input type="hidden" name="delete_contest" value="delete_contest">
          <input type="hidden" name="contest_u_id" value="<?=$value['contest_u_id'];?>">
          <input type="hidden" name="id" value="<?=$value['id'];?>">
          <input type="text" name="contest_photo_image" value="<?=$value['contest_photo_image'];?>">
          <input type="text" name="contest_award_photo" value="<?=$value['contest_award_photo'];?>">

            <div class="modal-body">
              <h3 class="text-danger">UWAGA!</h3>

            </div>


            <div class="modal-footer">
              <button type="submit" class="btn btn-sm btn-danger">USUŃ</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Jednak nie</button>
            </div>
        </form>


    </div>
  </div>
</div>
<!-- delete modal -->

          <?php $counter++; endforeach;?>
          <?php endif;?>


          </div>
        </div>
      </div>
    </div>

<?php
$this->admInclude("/adm_views/adminfooter.view.php", $data);
?>

<?php
    include ('assets/js/essential-js.php');

?>
<?php if (empty($data['category_id'])):?>


<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(function() {
    $('#sortable').sortable({
              // placeholder: 'ui-state-highlight',
        stop: function(event, ui) {
            $(this).find('.new-sorted .the_one').each(function(i, el){
                var humanNum = + i + 1;
                if(humanNum.toString().length < 2)
                  // humanNum= "0"+humanNum;
                $(this).attr('value', (humanNum + ''));
                            // aaa
            // var button_1 = document.getElementById("the-button1");
            // button_1.classList.remove("d-none");
            //aa

            });



            $(this).find('.new-sorted .new_position').each(function(i, el){
                var humanNum = + i + 1;
                if(humanNum.toString().length < 2)
                  // humanNum= "0"+humanNum;
                $(this).text("| nowa pozycja: " + humanNum + '');
            // aaa
            // var button_2 = document.getElementById("the-button2");
            // button_2.classList.remove("d-none");
            //aa

            });

            // $(this).find('.new-sorted .prev_pos').each(function(i, el){
            //     var humanNum = + i + 1;
            //     if(humanNum.toString().length < 2)
            //       // humanNum= "0"+humanNum;
            //     $(this).text("poprzednia pozycja: ");

            // });




        }


    });

    $('#sortable').disableSelection();
}); 

</script>

<?php endif;?>


  </body>
</html>
