<?php
$back = $_SERVER['REQUEST_URI'];
?>

<!-- cookies Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg mt-0">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Pliki cookies</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>
Strona korzysta z plików cookie. Naszą politykę cookies znajdziesz <a href="/cookies" target="blank"> tutaj</a>. Możesz wyłączyć lub określić warunki korzystania z cookie w Twojej przeglądarce lub konfiguracji usługi.




        </p>
            <form action="/cookiesaccept" method="POST" class="row g-3">
            <input type="hidden" name="back" value="<?=$back?>">


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

              <div class="col-12 text-end">
                <button type="button" class="btn btn-sm btn-primary mb-3" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Dopasuj</button>
                <button type="submit" class="btn btn-sm btn-primary mb-3">Zaakceptuj</button>
              </div>



            </form>


      </div><!-- modal body-->
      <div class="modal-footer">

<!--         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
 -->        
      </div><!-- modal footer -->
    </div>
  </div>
</div>
