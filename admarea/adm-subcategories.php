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
<link rel="stylesheet" href="admarea/assets/css/croppie.css">

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

          <?php
            if (empty($data['subcategory_id'])) {
              $this->admInclude("/adm_views/subcategorylist.viev.php", $data);
            } else{
            $this->admInclude("/adm_views/subcategorysingle.viev.php", $data);

            }

          ?>




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

<?php if (empty($data['subcategory_id'])):?>


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
<?php if (!empty($data['subcategory_id'])):?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="admarea/assets/js/croppie.js"></script>

<?php endif;?>

<?php
if (!empty($data['subcategory_id'])) {
  // main image
  $data['image_height'] = 500;
  $data['image_width'] = 500;
  $data['prefix'] = 'image';
  $data['image_q'] = '.9';
  $this->admInclude("/assets/admin-croopie-model-script.php", $data);
  // main image
  }
?>

  </body>
</html>
