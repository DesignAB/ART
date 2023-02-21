<?php
namespace admCreate;
class CreateContestController extends CreateContest{
    public $result = array();
    public $unique_id;
    public $contest_author;
    public $photo_table;
    public $photo_folder;
    public function __construct($contest_author){
        $this->unique_id = substr(md5(time()), 0, 10);
        $this->contest_author = $contest_author;
        $this->photo_table = 'contests_photos_'.$this->unique_id;
        $this->photo_folder = '../../'.IMGFOLDER.'contests/contests_photos_'.$this->unique_id;
    }
    public function createContest(){
        switch (false) {

            case $this->CreatePhotoTable():
            $this->result = array("error"=>false, "message"=>"Przepraszamy, wkradł się błąd.<br>Tabela o takim ID istnieje. Spróbuj jeszcze raz");
                break;

            case $this->ContestExists():
            $this->result = array("error"=>false, "message"=>"Przepraszamy, wkradł się błąd.<br>Konkurs o takim ID istnieje. Nieststy stworzyliśmy nową tabelę<br><strong>Skontaktuj się z administratorem serwisu!</strong>");
                break;
            case $this->FolderCreate():
            $this->result = array("error"=>false, "message"=>"Przepraszamy, nie udało się stworzyć folderu do zdjęć. Folder o takiej samej nazwie już istnieje.<br><strong>Skontaktuj się z administratorem serwisu!</strong>");
                break;

            case $this->InsertContest():
            $this->result = array("error"=>false, "message"=>"Przepraszamy, BŁĄD BAZY DANYCH podczas tworzenia konkursu.<br><strong>Skontaktuj się z administratorem serwisu!</strong>");
                break;

            default:
            $this->result = array("error"=>true, "message"=>"Sukces!<br>Stworzyliśmy nowy konkurs.");
                break;
        }
      return $result;
    }// createContest




    private function CreatePhotoTable(){
      if (!$this->checkCreatePhotoTable($this->unique_id)) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;
    }// ContestExists
    private function ContestExists(){
      if (!$this->checkContestExists($this->unique_id)) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;
    }// ContestExists
    private function FolderCreate(){
      if (!$this->checkFolderCreate($this->photo_folder)) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;
    }// ContestExists
    private function InsertContest(){
      if (!$this->checkInsertContest($this->unique_id)) {
        $result = false;
      } else{
        $result = true;
      }
      return $result;
    }// ContestExists




}// class ends






