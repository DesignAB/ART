
<div id="kontakt" class="container-fluid mb-md-3">
  <!-- heading-->
  <div class="row g-0">
      <div class="col-12" style="height: 100px;">
    </div>

    <div class="col-12 text-center d-flex flex-column align-items-center justify-content-center heading mb-md-5 pb-3 aos-animate">
      <h1 data-aos="aos-heading-h1" data-aos-offset="0" data-aos-once="false" data-aos-duration="500" data-aos-delay="0" data-aos-anchor-placement="top-center">{$standard_data['category_name']}</h1>
        <div class="heading-effect d-flex justify-content-center" data-aos="aos-heading" data-aos-offset="-100" data-aos-once="false" data-aos-duration="300" data-aos-delay="200" data-aos-anchor-placement="top-center"><span data-aos="aos-heading-dot" data-aos-offset="-100" data-aos-once="false" data-aos-duration="300" data-aos-delay="0" data-aos-anchor-placement="top-center"><p>•</p></span>
        </div>
    </div>


  </div>


  <div class="row row-cols-1 row-cols-md-2 g-3">

    <div class="col ">
      <div class="card p-5 h-100 border-0 bg-light d-flex justify-content-center" data-aos="aos-shadow" data-aos-offset="0" data-aos-once="false" data-aos-duration="300" data-aos-delay="100" data-aos-anchor-placement="top-center">
        <div class="card-body ">

      <h6>NASZ ADRES</h6>
      <p>ul. Zabytkowa 4/3, 80-253 Gdańsk</p>
      <h6>ZADZWOŃ</h6>
      <p>731-323-364</p>
      <h6>ZAMÓWIENIA GRUPOWE</h6>
      <p>881-202-796</p>
      <h6>NUMER KONTA BANKOWEGO</h6>
      <p>52 1140 2017 0000 4302 1296 6722</p>


        </div>
      </div>
    </div>


    <div class="col">
      <div class="card p-5 h-100 border-0 bg-light"  data-aos="aos-shadow" data-aos-offset="0" data-aos-once="false" data-aos-duration="300" data-aos-delay="200" data-aos-anchor-placement="top-center">
        <div class="card-body">

          <form method="POST" action="email" enctype="multipart/form-data" class=" bg-transparent">
              <input type="hidden" class="form-control transparent-input" name="contact_us">

                <div class="col-md-12 mb-0 mb-md-0 req">
                  <label class=" mb-2" for="important">your_type</label>
                  <input type="text" id="important" class="form-control transparent-input" name="your_type">
                </div>

              <div class="row form-group">

                <div class="col-md-6">
                  <label class="text-dark mb-2" for="email">Twój e-mail</label>
                  <input type="email" id="email" class="form-control bg-transparent py-3 email-class tomato-color" name="contact_email" required >
                   <span class="email-field-error msg success tomato-color d-none">Niepoprawny adres email!</span>
                </div>

                <div class="col-md-6">
                  <label class="text-dark mb-2" for="email">Twoje imię i nazwisko</label>
                  <input type="text" class="form-control bg-transparent py-3" id="basic-url" name="name">
                </div>

              </div>

              <div class="row form-group mt-3">

                <div class="col-12">
                  <label class="text-dark mb-2" for="email">Twoja wiadomość</label>
                  <textarea class="form-control bg-transparent py-3" aria-label="With textarea" name="message" rows="3"></textarea>
                </div>


              </div>


          <div class="row form-group">

              <div class="col-12 custom-control custom-switch mt-lg-3">
                <input required type="checkbox" class="custom-checkbox custom-control-input " id="agree_one">
                <!-- <label class="custom-control-label" for="agree_one">Prosimy o wyrażenie zgody</label> -->
              </div>


              <div class="col-12 text-dark">
                <p><small>


                Wysyłając do nas email akceptuję:
                <a href="/cookies" target="_blank">polityka prywatności 34art.pl</a></small>
                </p>
              </div>

            <div class="col-md-12 text-end">
              <input type="submit" name="login-submit" value="wyślij" class="mailer-button btn btn-outline-danger" disabled>
            </div>

          </div>




          </form>



        </div>
      </div>
    </div>



  </div>
</div>