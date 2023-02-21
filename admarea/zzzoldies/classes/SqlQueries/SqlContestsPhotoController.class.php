<?php
namespace SqlQueries;
class SqlContestsPhotoController extends SqlContestPhotos{
  public $result;

    private $contest_u_id;
    public function __construct($contest_u_id){
      $this->contest_u_id = $contest_u_id;
    }


    public function doAllContestPhotos(){
     $result = $this->checkAllContestPhotos($this->contest_u_id );
     return $result;     
    }// doAllContests
    public function doAllActiveContestPhotos(){
     $result = $this->checkAllActiveContestPhotos($this->contest_u_id );
     return $result;     
    }// doAllContests




}// class ends
