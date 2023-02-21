<?php
namespace LanguageRelated;

class LoadFiles{
  public $file;
  public $folder;

  public function __construct($file){
    $this->file = $file;
    $this->folder =  WebsiteLanguage;
    }

  public function loadFileFromIncludes($file){
    if (file_exists(WebsiteLanguage.$file)) {
    include (WebsiteLanguage.$file);
  } else{
    include ('pl'.$file);
    echo <<<HTML
    <!-- 
<div class="offcanvas offcanvas-bottom show" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title text-danger" id="offcanvasBottomLabel">BŁĄD</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body small">
    plik: $this->folder.$file nie istnieje
  </div>
</div>-->
HTML;
  }

  }// setUser ends





} //class ends
