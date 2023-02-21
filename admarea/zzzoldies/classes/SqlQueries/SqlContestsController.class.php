<?php
namespace SqlQueries;
class SqlContestsController extends SqlContests{
  public $result;

    private $id;
    private $active;
    private $datetime;
    private $orderBy;
    private $contest_u_id;    
    public function __construct($id, $datetime, $orderBy){
      $this->id = $id;
      $this->contest_u_id = $id;
      $this->datetime = $datetime;
      $this->orderBy = $orderBy;
    }

    public function doUserContests(){
     $result = $this->checkUserContests($this->id);
     return $result;     
    }// doOneContest

    public function doAllContests(){
     $result = $this->checkAllContests();
     return $result;     
    }// doAllContests
    public function doOneContest(){
     $result = $this->checkOneContest($this->id);
     return $result;     
    }// doOneContest
    public function doOneContestByUid(){
     $result = $this->checkOneContestByUid($this->contest_u_id);
     return $result;     
    }// doOneContest
    public function doActiveContests(){
     $result = $this->checkActiveContests();
     return $result;     
    }// doActiveContests
    public function doInactiveContests(){
     $result = $this->checkInactiveContests();
     return $result;     
    }// doInactiveContests
    public function doInTimeContests(){
     $result = $this->checkInTimeContests();
     return $result;     
    }// doInactiveContests
    public function doPlannedContests(){
     $result = $this->checkPlannedContests();
     return $result;     
    }// doInactiveContests
    public function doEndedContests(){
     $result = $this->checkEndedContests();
     return $result;     
    }// doInactiveContests

    public function doFeaturedContests(){
     $result = $this->checkFeaturedContests();
     return $result;     
    }// doInactiveContests

    // defaullt only for visitors
    public function doActiveInTimeContests(){
     $result = $this->checkActiveInTimeContests();
     return $result;     
    }// doInactiveContests







}// class ends
