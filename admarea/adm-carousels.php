<?php
  $messages = $this->loadAdmModel("admmessenger");
  $data['messenger'] = $messages;


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
        <div class="col-12 text-center">
          <form method="POST">
            <input type="hidden" name="table" value="categories">
            <input type="hidden" name="add_me">
              <button type="submit" class="btn btn-success btn-sm">dodaj</button>
          </form>
      </div>
    
    <form action="" method="POST"  class="row">
      <input type="hidden" name="table" value="<?=$data['table']?>">
      <input type="hidden" name="order_us">
      <div class="col-12 text-center mb-3">
      </div>


          <?php if (!empty($data['articles'])):?>
            <?php 
            ?>
          <div id="sortable">
          <?php foreach ($data['articles'] as $key => $value):?>
          <?php
          $is_active = 'text-success';
          if (empty($value['active'])) {
          $is_active = 'text-danger';
          }

          ?>

            <div class="new-sorted ui-state-default">
            <input class="the_one" type="hidden" name="the_order[<?=$value['id']?>]" value="<?=$value['id']?>">
            <div class="col-12 border p-3 my-3">
              <div class="d-flex flex-row">
                <div class="pe-3">
                    <h5 class="m-0"><?=$value['header']?></h5>
                </div>
                <div class="">
                    <p class="m-0 pe-3">pozycja: <?=$value['custom_order']?> <span class="text-danger new_position"></span></p>
                </div>
                <div class="flex-grow-1">
                    <p class="m-0">aktywny: <i class="bi bi-circle-fill <?=$is_active?>"></i></p>
                </div>
                <div class="">
                      <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete_<?=$value['id'];?>_modal">
                        usuń
                      </button>
                  <a href="/adm_carousels/<?=$value['id']?>" class="btn btn-primary btn-sm">edytuj</a>
                </div>

              </div>
            </div>
        </div>


          <?php endforeach;?>
        </div><!-- sortable ends-->

      <div class="col-12 text-center">
      <button type="submit" class="btn btn-secondary btn-sm">zmień kolejność</button>
      </div>
          <?php endif;?>

    </form>


          </div>
        </div>
      </div>
    </div>
    <?php foreach ($data['articles'] as $key => $value):?>
<!-- modal to delete-->
<div class="modal fade" id="delete_<?=$value['id'];?>_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?=$value['id'];?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="" method="POST"  class="row">
            <input type="text" name="id" value="<?=$value['id']?>">
            <input type="text" name="image" value="<?=$value['image']?>">
            <input type="text" name="image_mobile" value="<?=$value['image_mobile']?>">
            <input type="text" name="image_index" value="<?=$value['image_index']?>">
            <input type="text" name="image_mobile_index" value="<?=$value['image_mobile_index']?>">
            <input type="hidden" name="delete_me">
      </div>


      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">usuń</button>
        <button type="button" class="btn btn-primary"  data-bs-dismiss="modal">jednak nie</button>
      </div>
          </form>


    </div>
  </div>
</div>

<!-- modal to delete-->
    <?php endforeach;?>



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
