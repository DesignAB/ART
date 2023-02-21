<?php
namespace Cookies;
class CheckVisitorCookiesController {

      public $back;
      public $all_cookies;
      public $marketing_cookies;
      public $other_cookies;
      public $badly_needed;
      public $token;
      public $expire;

    public function __construct(){
      $this->back = $_SERVER['REQUEST_URI'];
      $this->all_cookies = $_POST['all_cookies'];
      $this->marketing_cookies = $_POST['marketing_cookies'];
      $this->other_cookies = $_POST['other_cookies'];
      $this->badly_needed = $_POST['badly_needed'];
      $this->token = substr(md5(time()), 0, 10);;
      $this->expire =  strtotime('+1 month', strtotime(date('Y-m-d H:i:s')));

    }



    public function checkVisitorCookies(){
      switch (true) {
        case $this->IsVisitorCookieSet():
          break;


        default:
echo<<<HTML
<div class="container-lg">
  <div class="row">
        <div class="offcanvas offcanvas-bottom show h-auto" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel" data-bs-backdrop="false" >
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasBottomLabel">Pliki cookies</h5>

          </div>
          <div class="offcanvas-body">
            <form action="pl_includes/cookies-accept.inc.php" method="POST" class="row g-3">
            <input type="text" name="back" value="$this->back">

              <div class="col-12">
                <div class="form-check form-switch form-check-inline">
                  <input id="all_cookies"  class="form-check-input " type="checkbox" id="all_cookies" name="all_cookies" checked>
                  <label class="form-check-label" for="all_cookies">wszystkie ciasteczka</label>
                </div>


              </div>
              <div class="collapse col-12" id="collapseExample">

                <div class="form-check form-switch form-check-inline">
                  <input class="form-check-input" type="checkbox" id="badly_needed" name="badly_needed" checked onclick="return false;">
                  <label class="form-check-label" for="badly_needed">niezbędne</label>
                </div>

                <div class="form-check form-switch form-check-inline">
                  <input class="form-check-input" type="checkbox" id="marketing_cookies" name="marketing_cookies" checked>
                  <label class="form-check-label" for="marketing_cookies">ciasteczka marketingowe</label>
                </div>

                <div class="form-check form-switch form-check-inline">
                  <input id="other_cookies" class="form-check-input" type="checkbox" id="other_cookies" name="other_cookies" checked>
                  <label class="form-check-label" for="other_cookies">inne ciasteczka</label>
                </div>


              </div>

              <div class="col-12">
                <button type="button" class="btn btn-sm btn-primary mb-3" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Dopasuj</button>
                <button type="submit" class="btn btn-sm btn-primary mb-3">Zaakceptuj</button>
              </div>



            </form>

          </div>
        </div>
  </div>
</div>

HTML;
          break;
      }
    }// doVisitorCookies



    private function IsVisitorCookieSet(){
      if(isset($_COOKIE[CookiesVisitorPrefix])){
        $result = true;
      }
        else{
          $result = false;
        }
        return $result;
    }// IsCookieSet


    public function setVisitorCookies(){
      switch (true) {
       case $this->all_cookies == 'on':
       //set all cookies
       setcookie(CookiesVisitorPrefix, $this->token, $this->expire, "/");// this is badly needed
        setcookie(CookiesVisitorPrefix.'marketing', $this->token, $this->expire, "/");
        setcookie(CookiesVisitorPrefix.'other', $this->token, $this->expire, "/");

         break;
        
       case $this->marketing_cookies == 'on':
       //set badly needed and marketing
       setcookie(CookiesVisitorPrefix, $this->token, $this->expire, "/");// this is badly needed
       setcookie(CookiesVisitorPrefix.'_marketing', $this->token, $this->expire, "/");
         break;

       case $this->other_cookies == 'on':
       //set badly needed and other
       setcookie(CookiesVisitorPrefix, $this->token, $this->expire, "/");// this is badly needed
       setcookie(CookiesVisitorPrefix.'_other', $this->token, $this->expire, "/");
         break;
        
       default:
         // set only badly needed
       setcookie(CookiesVisitorPrefix, $this->token, $this->expire, "/");// this is badly needed
         break;
      }


    }// IsCookieSet





}// class ends
