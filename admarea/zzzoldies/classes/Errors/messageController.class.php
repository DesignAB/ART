<?php
namespace Errors;
class messageController{
    public $message;
    public $error;
    public function __construct(){
        $this->message = $_GET['message'];
        $this->error = $_GET['error'];
    }

    public function doAdmMessage(){
      if (!empty($this->error)) {
        $bg_color='danger';
      } else{
        $bg_color='success';
      }
if (!empty($this->message)) {
echo <<<HTML
      <div class="offcanvas offcanvas-top show" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
        <div class="offcanvas-header text-$bg_color">
          <h5 id="offcanvasTopLabel">Wiadomość!</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          $this->message
        </div>
      </div>
HTML;
}


    } //doAdmMessage
    public function doUserMessage(){
      if (!empty($this->error)) {
        $bg_color='danger';
      } else{
        $bg_color='success';
      }
if (!empty($this->message)) {
echo <<<HTML
      <div class="offcanvas offcanvas-top show" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
        <div class="offcanvas-header text-$bg_color">
          <h5 id="offcanvasTopLabel">Wiadomość!</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          $this->message
        </div>
      </div>
HTML;
}


    } //doAdmMessage

}// class ends
