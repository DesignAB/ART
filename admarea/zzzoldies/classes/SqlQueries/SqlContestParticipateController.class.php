<?php
namespace SqlQueries;
class SqlContestParticipateController extends SqlContestParticipate{
  public $result;

    private $id;
    private $contest_u_id;
    private $contest_max_photos;
    private $u_id;
    public function __construct($id, $contest_u_id, $contest_max_photos, $u_id){
      $this->id = $id;
      $this->contest_u_id = $contest_u_id;
      $this->contest_max_photos = $contest_max_photos;
      $this->u_id = $u_id;
    }






    public function doOneContestMaxPhotos(){
      $max_photo_check = $this->checkOneContestMaxPhotos($this->contest_u_id, $this->contest_max_photos, $this->u_id);
      switch ($max_photo_check['error']) {
        case false:
          $message = <<<HTML
          <p class="text-danger lead">Niestety nie możesz dodać więcej zdjęć</p>
HTML;
          $result = array(
            "error" => false,
            "message" => $message
          );
          break;
        
        default:
          $photos_left = $this->contest_max_photos - $max_photo_check['row_count'];
          $message = <<<HTML
          <p class="text-success lead">Liczba zdjęć do dodania: $photos_left</p>
HTML;
          $result = array(
            "error" => true,
            "message" => $message
          );

          break;
      }
      return $result;

    }
    // doOneContestMaxPhotos










}// class ends
