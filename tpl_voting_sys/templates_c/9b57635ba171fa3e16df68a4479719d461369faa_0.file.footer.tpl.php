<?php
/* Smarty version 4.2.1, created on 2022-12-06 17:16:57
  from '/home/server645914/ftp/with_counter/public/tpl_voting_sys/templates/footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_638f6af9343e56_32209481',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9b57635ba171fa3e16df68a4479719d461369faa' => 
    array (
      0 => '/home/server645914/ftp/with_counter/public/tpl_voting_sys/templates/footer.tpl',
      1 => 1670338515,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_638f6af9343e56_32209481 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="container-fluid mt-5 main-footer overflow-hidden" >
  <div class="row gx-5 bg-dark py-5" style="min-height: 45vh;">

    <div class="col-md-4 p-5">

        <h2 class="art34-col">Pozostańmy w kontakcie</h2>

<!-- form -->
  <form method="POST" action="email" enctype="multipart/form-data" class=" bg-transparent">
              <input type="hidden" class="form-control transparent-input" name="footer_mail">

      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Twoje imię" name="newsletter_name">
      </div>
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Twój email" aria-label="Recipient's username" aria-describedby="button-addon2" name="newsletter_email">
        <button class="btn footer-button" type="submit" id="button-addon2" disabled>WYŚLIJ</button>
      </div>

      <div class="col-12 custom-control custom-switch mt-lg-3">
        <input required type="checkbox" class="custom-checkbox custom-control-input me-1 " id="agree_two">

        <!-- <label class="custom-control-label text-white" for="agree_two">Prosimy o wyrażenie zgody</label> -->
        
      </div>
      <div class="col-12 text-white">
        <p><small>
        Wysyłając do nas email akceptuję: 
        <a href="/cookies" target="_blank" class="ps-1 p-link">polityka prywatności 34art.pl</a></small>
        </p>
      </div>


</form>
<!-- form -->
<div class="footer-divider mt-5"><hr></div>
        <h4 class="art34-col">Karta stałego klienta</h4>
        <p class="art34-white">
Karta, która uprawnia Cię do wejścia na każde nasze wydarzenie z 10% zniżką.Dołacz do grona naszych szczególnych klientów!
</p>
        <p class="art34-white p-link" style="position: relative;">Dowiedz się więcej <a class="stretched-link" href="/karta"></a></p>


    </div><!-- first col-->

    <div class="col-md-4 py-5 text-center">

        <h2 class="art34-col">kup bilet</h2>
        <p class="art34-white p-link" style="position: relative;">Zobacz co gramy <a class="stretched-link" href="/events"></a></p>
        <div class="footer-divider mt-5"><hr></div>

        <h2 class="art34-col">nasz adres email:</h2>
        <p class="art34-white p-link" style="position: relative;">kontakt@34art.pl <a class="stretched-link" href="mailto:kontakt@34art.pl"></a></p>
        <div class="footer-divider mt-3"><hr></div>
        <div class="socials d-flex flex-row align-items-center justify-content-center">
          <div class="text-center mx-1 socials-item">
        <img src="<?php echo $_smarty_tpl->tpl_vars['IMAGEFOLDER']->value;?>
/socials/facebook.png" alt="..." style="">
        <a class="stretched-link" href="https://www.facebook.com/34artpl" target="blank"></a>
          </div>
          <div class=" text-center mx-1 socials-item">
        <img src="<?php echo $_smarty_tpl->tpl_vars['IMAGEFOLDER']->value;?>
/socials/yt.png" alt="..." style="">
        <a class="stretched-link" href="https://www.youtube.com/channel/UCITCWXwG_S9MSa1pswKaQWg?" target="blank"></a>
          </div>
          <div class=" text-center mx-1 socials-item">
        <img src="<?php echo $_smarty_tpl->tpl_vars['IMAGEFOLDER']->value;?>
/socials/instagram.png" alt="..." style="">
        <a class="stretched-link" href="https://www.instagram.com/34artpl/" target="blank"></a>
          </div>


        </div><!-- socials row-->


    </div><!-- 2nd col-->


    <div class="col-md-4 text-white d-flex align-items-center justify-content-center p-5 ">
      <div class="text-lg-left px-5">
        <h2 class="art34-col">DANE FIRMY:</h2>
        <p class="art34-white">
          Impresariat 34art.pl-spółka cywilna<br>
          NIP: 9571066801<br>
          REGON: 21768282<br>
          Adres: ul. Romańska 28 80-253 Gdańsk
        </p>
        <img src="<?php echo $_smarty_tpl->tpl_vars['IMAGEFOLDER']->value;?>
/logo-white.png" class="card-img rounded-0 mt-lg-3" alt="..." style="height:50%; width: 50%;">
        <h4 class=" mt-lg-4" style="position: relative;">POLITYKA PRYWATNOŚCI<a class="stretched-link" href="/cookies"></a></h4>
        <h4 class=" mt-lg-4" style="position: relative;">FAQ<a class="stretched-link" href="/faq"></a></h4>

      </div>

    </div><!-- 3rd col-->


  </div>
</div>
<?php }
}
