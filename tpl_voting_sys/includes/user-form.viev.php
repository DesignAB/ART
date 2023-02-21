

          <div class="row g-0 login-form">
            <div class="col-12">
            <?php $error_message = $data['messenger']->errorUserMessage();?>
              <div class="card-body">
                <!-- accordion-->

<div class="accordion " id="accordionExample">
  <!-- accrdion one-->
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Moje dane
      </button>
    </h2>

    <!-- collapse in one-->
    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body ">

             <form method="POST" action="/userdashboard" enctype="multipart/form-data" class="bg-white">
              <input name="user_data_update" type="hidden">

                <div class="form-check form-switch">
              <input name="u_newsletter" class="form-check-input d-block"  type="checkbox" role="switch" id="u_newsletter" <?=$data['u_newsletter_checked']?>>

                  <label class="form-check-label" for="u_newsletter">newsletter
                  </label>
                </div>

              <div class="row form-group">


                <div class="col-12 form-separator my-3"></div>

               
                <div class="col-md-6">
                  <label class="text-danger" for="email">alternatywny E-mail</label> 
                  <input tabindex="1" type="email" id="u_alt_email" class="form-control" name="u_alt_email" value="<?=$data['u_alt_email']?>">
                   <span class="email-field-error msg success text-danger d-none">Invalid email address!</span>
                </div>

                <div class="col-md-6">
                  <label class="text-dark" for="email_confirm">potwierdź adres email</label> 
                  <input  tabindex="2" type="email" id="confirm_email" class="form-control email_confirm" name="confirm_email" required  disabled onkeyup='check();'>
                    <span id='message'></span>
                </div>
                
                <div class="col-12 form-separator my-3"></div>

                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-dark" for="u_tel_number_01">Telefon</label>
                  <input type="text" minlength="9" maxlength="12" id="u_tel_number_01" class="form-control" name="u_tel_number_01" value="<?=$data['u_tel_number_01']?>" onkeyup="nospaces(this)">
                  <span class="text-danger">&nbsp;</span>
                </div>
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-dark" for="u_tel_number_02">Telefon 2</label>
                  <input type="text" id="u_tel_number_02" class="form-control" name="u_tel_number_02" value="<?=$data['u_tel_number_02']?>">
                </div>

                <div class="col-12 form-separator"></div>

              </div><!-- row form-group -->
              <!-- company -->
                <div class="form-check form-switch">
              <input name="u_is_company" class="form-check-input d-block"  type="checkbox" role="switch" id="u_is_company" <?=$data['u_is_company_checked']?>>
                  <label class="form-check-label" for="u_is_company">Firma</label>
                </div>

              <div class="row form-group company <?=$data['d_company']?> mt-3">

                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-dark" for="u_company">Firma</label>
                  <input type="text" id="u_company" class="form-control" name="u_company" value="<?=$data['u_company']?>">
                </div>

                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-dark" for="u_company_NIP">NIP</label>
                  <input type="text" id="u_company_NIP" class="form-control" name="u_company_NIP"  value="<?=$data['u_company_NIP']?>">
                </div>

              </div>
              <!-- company -->

                <div class="col-12 form-separator my-5"></div>

              <!-- address -->

              <div class="row form-group mt-3">
                <div class = "col-12">
                <h4 class="my-3">Adres</h4>
                </div>

                <div class="col-lg-8 mb-3 mb-md-0">
                  <label class="text-dark" for="u_city">Miasto</label>
                  <input type="text" id="u_city" class="form-control" name="u_city" value="<?=$data['u_city']?>">
                </div>

                <div class="col-lg-4 mb-3 mb-md-0">
                  <label class="text-dark" for="u_postal">Kod pocztowy</label>
                  <div class="input-group mb-3">

                    <input type="text" class="form-control u_postal_1 me-3" name="u_postal_1" maxlength="2" value="<?=$data['u_postal_1']?>">
                    <span class="input-group-text border-0 bg-transparent">-</span>
                    <input type="text" class="form-control u_postal_2 text-center" name="u_postal_2" maxlength="3" value="<?=$data['u_postal_2']?>">

                  </div>
                </div>
                <div class="col-12 form-separator my-3"></div>

                <div class="col-lg-8 mb-3 mb-md-0">
                  <label class="text-dark" for="u_city">Ulica</label>
                  <input type="text" id="u_street" class="form-control" name="u_street" value="<?=$data['u_street']?>">
                </div>
                <div class="col-lg-2 mb-3 mb-md-0">
                  <label class="text-dark" for="u_building">Numer domu</label>
                  <input type="text" id="u_building" class="form-control" name="u_building" value="<?=$data['u_building']?>">
                </div>

                <div class="col-lg-2 mb-3 mb-md-0">
                  <label class="text-dark" for="u_flat">Numer lokalu</label>
                  <input type="text" id="u_flat" class="form-control" name="u_flat" value="<?=$data['u_flat']?>">
                </div>





              </div>
              <!-- address -->


                <div class="col-12 form-separator my-5"></div>

                <div class="form-check form-switch">
              <input name="u_alt_address" class="form-check-input d-block"  type="checkbox" role="switch" id="u_alt_address" <?=$data['u_alt_address_is_checked']?>>

                  <label class="form-check-label" for="u_alt_address">Inny adres do korespondencji</label>
                </div>

              <!-- alt address -->

              <div class="row form-group mt-3 u_alt_address_row <?=$data['d_alt_address']?>">
                <div class = "col-12">
                <h4 class="my-3">Adres do korespondencji</h4>
                </div>

                <div class="col-lg-8 mb-3 mb-md-0 ">
                  <label class="text-dark" for="u_city">Miasto</label>
                  <input type="text" id="u_alt_city" class="form-control" name="u_alt_city" value="<?=$data['u_alt_city']?>">
                </div>

                <div class="col-lg-4 mb-3 mb-md-0">
                  <label class="text-dark" for="u_postal">Kod pocztowy</label>
                  <div class="input-group mb-3">

                    <input type="text" class="form-control u_alt_postal_1 me-3" name="u_alt_postal_1" maxlength="2" value="<?=$data['u_alt_postal_1']?>">
                    <span class="input-group-text border-0 bg-transparent">-</span>
                    <input type="text" class="form-control u_alt_postal_2 text-center" name="u_alt_postal_2" maxlength="3" value="<?=$data['u_alt_postal_2']?>">

                  </div>
                </div>
                <div class="col-12 form-separator my-3"></div>

                <div class="col-lg-8 mb-3 mb-md-0">
                  <label class="text-dark" for="u_city">Ulica</label>
                  <input type="text" id="u_alt_street" class="form-control" name="u_alt_street" value="<?=$data['u_alt_street']?>">
                </div>
                <div class="col-lg-2 mb-3 mb-md-0">
                  <label class="text-dark" for="u_city">Numer domu</label>
                  <input type="text" id="u_alt_building" class="form-control" name="u_alt_building" value="<?=$data['u_alt_building']?>">
                </div>

                <div class="col-lg-2 mb-3 mb-md-0">
                  <label class="text-dark" for="u_city">Numer lokalu</label>
                  <input type="text" id="u_alt_flat" class="form-control" name="u_alt_flat" value="<?=$data['u_alt_flat']?>">
                </div>





              </div>
              <!-- alt address -->

 
              <div class="row form-group mt-5">
                <div class="col-md-12 text-right">
                  <input type="submit" name="login-submit" value="zmień" class="mailer-button btn btn-success text-white">
                </div>

              </div>



  
            </form>

      </div><!-- .accordion-body -->
    </div>
    <!-- collapse in one-->

  </div>
  <!-- accrdion one-->


  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Moje hasło
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
             <form method="POST" action="" enctype="multipart/form-data" class=" bg-white row">
              <input name="password_change" type="hidden">

                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-dark" for="fname">Hasło użyte przy logowaniu*</label>
                  <input tabindex="3" type="text" id="previous_password" class="form-control previous_password" name="previous_password" required>
                </div>
                <div class="col-12 my-3"></div>
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-dark" for="fname">Nowe hasło!*<small id="show-password" class="text-danger">pokaż</small></label>
                  <input tabindex="3" type="password" id="password" class="form-control password" name="u_password" required>
                </div>

                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-dark" for="fname">Powtórz hasło</label>
                  <input tabindex="4" type="password" id="password_repeat" class="form-control password_repeat" name="password_repeat" required>
                  <span id='pwd_match'></span>
                </div>
                <div class="col-md-12 text-right mt-5">
                  <input type="submit" name="login-submit" value="zmień" class="mailer-button btn btn-success text-white">
                </div>


              </form>

      </div><!-- .accordion-body -->
    </div>
  </div>


  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Accordion Item #2
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>


</div>

                <!-- accordion-->





               




              </div>
            </div>
          </div>
