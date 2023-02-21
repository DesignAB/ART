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
              <div class="col-12 border border-light mb-3 py-3 shadow-sm">
                <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                <input type="hidden" name="create_sponsor" value="create_sponsor">
                  <div class="col-12 text-center">
                    <button id="register-button" class="btn btn-sm btn-danger register-button">Dodaj nowy</button>
                  </div>


                </form>
              </div>

        
          <?php if (!empty($data['all_sponsors'])):?>
          <?php 
          $counter = 0;
          foreach ($data['all_sponsors'] as $key => $value):
          ?>
              <!-- content cols-->

              <div class="col-12 border border-light mb-3 shadow-sm">
                <div class="row p-3">


                  <div class="col-md-7 headings d-flex flex-column align-items-start justify-content-md-center">
                    <h6><?=$value['sponsor_name'];?></h6>
                    <h6><?=$value['sponsor_sub_name'];?></h6>
                    <?php if (empty($value['sponsor_logo'])):?>
                    <p class="text-danger">BRAK LOGOTYPU</p>
                    <?php endif;?>
                  </div>


                  <div class="col-md-5 d-flex flex-row align-items-center justify-content-md-end">
                    <a href="/adm_contests_sponsors/single/<?=$value['id'];?>" class="btn btn-sm btn-outline-success me-1">edytuj</a>
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
        <h5 class="modal-title" id="exampleModalLabel">USUWASZ: <?=$value['sponsor_name'];?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

        <form  method="POST" enctype="multipart/form-data" >
          <input type="hidden" name="delete_sponsor" value="delete_sponsor">
          <input type="text" name="id" value="<?=$value['id'];?>">
          <input type="text" name="sponsor_logo" value="<?=$value['sponsor_logo'];?>">

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
$this->admInclude("/adm_views/adminfooter.view.php", $navbar_categories);
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
