<?php
namespace Voting;
class VotingController extends Voting{
  public $vote_result = array();

  private $photo_u_id;
  private $contest_u_id;
  private $contest_max_votes;
  private $contest_max_votes_per_photo;
  private $photo_title;
  private $photo_votes;
  private $expire;

    public function __construct($photo_u_id, $contest_u_id, $contest_max_votes, $contest_max_votes_per_photo, $photo_title, $photo_votes){
      $this->photo_u_id = $photo_u_id;
      $this->contest_u_id = $contest_u_id;
      $this->contest_max_votes = $contest_max_votes;
      $this->contest_max_votes_per_photo = $contest_max_votes_per_photo;
      $this->photo_title = $photo_title;
      $this->photo_votes = $photo_votes;
      $this->expire = strtotime('+1year', time());
    }

    public function voteMe(){
      switch (false) {
        case $this->checkVotingCookies():
            // errors
            switch (false) {
              case $this->checkVotingContest():
                $vote_result = array("error"=>"error", "message"=>"Licba głosów, jaką można oddać w tym konkursie: ".$this->contest_max_votes);

                break;

              case $this->checkVotingPhoto():
                $vote_result = array("error"=>"error", "message"=>"Licba głosów, jaką można oddać na jedno zdjęcie: ".$this->contest_max_votes_per_photo);
                break;
              
              default:
                // do update and set cookies
                switch (false) {
                  case $this->UpdatePhotoVotes():
                   $vote_result = array("error"=>"error", "message"=>"DB updating phototable error");
                    break;
                  
                  default:
                    // set cookies to do
                    $contest_vote = $_COOKIE[VotingPrefix.$this->contest_u_id] + 1;
                    $photo_vote = $_COOKIE[VotingPrefix.$this->contest_u_id.'_'.$this->photo_u_id] + 1;
                      setcookie(VotingPrefix.$this->contest_u_id, $contest_vote, $this->expire, "/");
                      setcookie(VotingPrefix.$this->contest_u_id.'_'.$this->photo_u_id, $photo_vote, $this->expire, "/");
                    // set cookies to do
                    $vote_result = array("error"=>"", "message"=>"Głos oddany na: ".$this->photo_title);
                    break;
                }
                // do update and set cookies

                break;
            }
            // errors
          break;
        
        default:
                // do update and set cookies
                switch (false) {
                  case $this->UpdatePhotoVotes():
                   $vote_result = array("error"=>"error", "message"=>"DB updating phototable error");
                    break;
                  
                  default:
                    // set cookies to do
                    $contest_vote = 1;
                    $photo_vote = 1;
                      setcookie(VotingPrefix.$this->contest_u_id, $contest_vote, $this->expire, "/");
                      setcookie(VotingPrefix.$this->contest_u_id.'_'.$this->photo_u_id, $photo_vote, $this->expire, "/");
                    // set cookies to do
                    $vote_result = array("error"=>"", "message"=>"Głos oddany na: ".$this->photo_title);
                    break;
                }
                // do update and set cookies
          break;
      }
      //errors
      //errors ends
      return $vote_result;
    }// signpUser ends



    private function checkVotingCookies(){
      $result;
      if (!isset($_COOKIE[VotingPrefix.$this->contest_u_id])) {
        $result = true; //let me vote
      } else{
        $result = false;
      }
    return $result;

    }// checkVotingCookies

    private function checkVotingContest(){
      $result = true;
      if ($_COOKIE[VotingPrefix.$this->contest_u_id] == $this->contest_max_votes) {
        $result = false;
      }

    return $result;

    }// checkVotingContest

    private function checkVotingPhoto(){
      $result = true;
      if ($_COOKIE[VotingPrefix.$this->contest_u_id.'_'.$this->photo_u_id] == $this->contest_max_votes_per_photo) {
        $result = false;
      }

    return $result;

    }// checkVotingPhoto

    private function UpdatePhotoVotes(){
      $result = true;
      if (!$this->checkUpdatePhotoVotes($this->contest_u_id, $this->photo_u_id, $this->photo_votes)) {
        $result = false;
      }

    return $result;

    }// checkVotingPhoto





}// class ends
