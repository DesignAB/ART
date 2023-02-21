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


        <?php if(empty(API_ID) OR empty(API_URL) OR empty(API_KEY)):?>
        <div class="col-12 shadow bg-danger p-3 mb-3 text-center">
          <h5 class="text-white">Błąd konfigiracji integracyjnej z biletyna.pl</h5>
        <?php if(empty(API_ID)):?>
          <h6 class="text-white">Brak API_ID</h6>
        <?php endif;?>
        <?php if(empty(API_URL)):?>
          <h6 class="text-white">Brak API_URL</h6>
        <?php endif;?>
        <?php if(empty(API_KEY)):?>
          <h6 class="text-white">Brak API_KEY</h6>
        <?php endif; //empty(biletyna_id) OR empty(API_URL) OR empty(API_KEY))?>


        </div>
        <?php endif;?>

        <?php if(!empty(API_ID) AND !empty(API_URL) AND !empty(API_KEY)):?>
        
              <?php if (in_array('full', $data['adm_rights'])):?>
                <!-- Modal -->
                <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-fullscreen">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title fs-5 text-danger" id="exampleModalLabel">Usuwam wszystko</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <h4 class="text-danger">
                          Naprawdę wiesz co robisz?
                        </h4>
                        <p class="text-danger">
                        Wykonując to polecenie, usuniesz wszystkie wydarzenia z własnej bazy danych.<br>Nie ma to wpływu na wydarzenia zapisane w bazie biletyna.pl<br>
                        Stracisz wszystkie wydarzenia archiwalne.
                        <br>
                        Usunięte zostaną wszystkie grafiki, oraz własne, przesłane przez Ciebie zdjęcia.
                        </p>

                        <p class="text-success">
                          Po wykonaniu tego zadania, możesz przywrócić aktualne wydarzenia wykonując zadanie <span class="text-danger">"pobierz nowe"</span>.

                        </p>

                      </div>
                      <div class="modal-footer">

                        <form method="POST" enctype="multipart/form-data" class=" custom-form"  id="delete-all-form" >
                        <input type="hidden" name="delete_all" value="delete_all">
                          <div class="col-12 text-center">
                            <button id="delete-all-button" class="btn btn-sm btn-danger shadow-sm">usuń wszystkie</button>
                          </div>
                        </form>


                        <button type="button" class="btn btn-sm btn-success" data-bs-dismiss="modal">jednak nie</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal -->



              <div class="col-3 px-3">
                <div class="border border-light py-3 shadow-sm text-center">

                    <button class="btn btn-sm btn-danger shadow-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                      usuń wszystkie
                    </button>

                  <div class="collapse" id="collapseExample">
                    <div class="card card-body border-0">
                      <p class="text-danger">
                      UWAGA
                    </p>
                      <p class="text-danger small">
                      Wykonując to polecenie, usuniesz wszystkie wydarzenia z własnej bazy danych.<br> Nie ma to wpływu na wydarzenia zapisane w bazie biletyna.pl
                    </p>

                      <button type="button" class="btn btn-sm btn-danger shadow-sm" data-bs-toggle="modal" data-bs-target="#DeleteModal">
                        wiem co robię
                      </button>

                    </div><!-- card-body -->
                  </div>



                </div>
              </div><!-- .col-4-->
              <?php endif;?>


              <div class="col-3 px-3">
                <div class="border border-light py-3 shadow-sm text-center">
                  <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                  <input type="hidden" name="insert_new" value="insert_new">
                    <div class="col-12 text-center">
                      <button id="register-button" class="btn btn-sm btn-success shadow-sm">Pobierz nowe z biletyna.pl </button>
                    </div>
                  </form>
                </div>
              </div><!-- .col-4-->

              <div class="col-3 mb-3 px-3">
                <div class="border border-light py-3 shadow-sm text-center">
                  <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                  <input type="hidden" name="update_records" value="update_records">
                    <div class="col-12 text-center">
                      <button id="register-button" class="btn btn-sm btn-success shadow-sm">Uaktualnij wydarzenia</button>
                    </div>
                  </form>
                </div>

              </div><!-- .col-4-->
              <?php if (isset($_POST['inactive_only'])):?>
              <div class="col-3 mb-3 px-3">
                <div class="border border-light py-3 shadow-sm text-center">
                  <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                  <input type="hidden" name="inactive_only" value="inactive_only">
                    <div class="col-12 text-center">
                      <a href="adm_events" id="register-button" class="btn btn-sm btn-success shadow-sm">Pokaż aktualne</a>
                    </div>
                  </form>
                </div>
              </div><!-- .col-4-->

              <?php endif; //isset($_POST['inactive_only'])?>
              <?php if (!isset($_POST['inactive_only'])):?>
              <div class="col-3 mb-3 px-3">
                <div class="border border-light py-3 shadow-sm text-center">
                  <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                  <input type="hidden" name="inactive_only" value="inactive_only">
                    <div class="col-12 text-center">
                      <button id="register-button" class="btn btn-sm btn-secondary shadow-sm">Pokaż archiwalne</button>
                    </div>
                  </form>
                </div>
              </div><!-- .col-4-->

              <?php endif; //!isset($_POST['inactive_only']?>

        <?php endif; //!empty(biletyna_id) AND !empty(biletyna_url) AND !empty(biletyna_key)?>


        
          <?php if (!empty($data['biletyna_row'])):?>
          <?php 
          $counter = 0;
          foreach ($data['biletyna_row'] as $key => $value):
          ?>
              <!-- content cols-->

              <div class="col-12 border border-light mb-3 shadow-sm">
                <div class="row p-3">


                  <div class="col-md-3 headings d-flex flex-column align-items-start justify-content-md-center">
                    <h6><?=$value['artist_name'];?></h5>
                    <h6><?=$value['event_date'];?></h5>
                  </div>

                  <div class="col-6 col-md-2 d-flex flex-row align-items-center">
                    <p><i class="bi bi-sunrise lead text-success"> </i><?=$value['start_date'];?></p>
                  </div>
                  <div class="col-6 col-md-2 d-flex flex-row align-items-center">
                    <p class="text-muted"><i class="bi bi-sunset lead text-secondary"> </i><?=$value['end_date'];?></p>
                  </div>
                  <div class="col-md-5 d-flex flex-row align-items-center justify-content-md-end">
                  <span class="badge <?=$timecontroller[$counter]['time_color'];?> rounded-pill p-2 me-1"><?=$timecontroller[$counter]['time_message'];?></span>

                    <a href="/adm_event/<?=$value['event_id'];?>" class="btn btn-sm btn-outline-success me-1">edytuj <?=$value['event_id'];?></a>



                  </div>



                </div>
              </div>
              <!-- content cols-->


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

  </body>
</html>
