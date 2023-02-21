<?php
  $footer_data = $this->loadModel("footer");
  $footer_row = $footer_data->footerData();

  if (isset($_POST['footer_message'])) {
    $data['email_body'] = 'Treść wiadomości:<br>'.$_POST['message'].'<br>Przesłana przez:<br>'.$_POST['f_name'].' '.$_POST['l_name'].' '.$_POST['email'];

    $data['email_subject'] = 'Wiadomość od:'.$_POST['f_name'].' '.$_POST['l_name'];
    $data['footer_form_email'] = $footer_row['footer_form_email'];
      $footer_email = $this->loadModel("emails");
      $footer_email_send = $footer_email->footerEmail($POST, $data);

  }

?>

<div class="container-fluid footer position-relative mt-md-5 pt-3 footer-text">
  <div class="row footer-row px-5 footer-bg">
    <!-- form -->
    <div class="col-md-6 footer-form-col">
      <div class="p-3 footer-form-col-content">
      <h4><?=$footer_row['form_heading'];?></h4>

      <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="email-form" >
        <input type="hidden" name="footer_message">

        <div class="col-md-12 mb-3 mb-md-0 req" style="height: 0px; opacity:0;">
          <label class="text-danger" for="important">your_type</label>
          <input type="text" id="important" class="form-control form-control-sm" name="your_type">
        </div>
        <!-- name and surname -->
        <div class="col-md-6">
          <label for="input_u_f_name" class="form-label">Imię</label>
          <input type="text" class="form-control form-control-sm" id="input_u_f_name" name="f_name" required>
        </div>

        <div class="col-md-6">
          <label for="input_u_l_name" class="form-label">Nazwisko</label>
          <input type="text" class="form-control form-control-sm" id="input_u_l_name" name="l_name" required>
        </div>
        <!-- name and surname -->
        <!-- email -->
        <div class="col-md-12">
          <label for="u_email" class="form-label">Email
          </label>
          <input type="email" class="form-control form-control-sm" id="u_email" name="email" required>
          <label id="email-error" class="email-field-error msg success text-danger d-none">Niepoprawny email!</label>

        </div>

        <!-- email -->
        <!-- message -->
        <div class="col-md-12">
          <label for="message" class="form-label">Twoja wiadomość
          </label>
          <textarea id="message" class="form-control"  style="height: 100px" name="message"></textarea>
        </div>
        <!-- message -->



        <div class="col-12 footer-agreements">

        <?php if (!empty($footer_row['agreement_heading_1']) && !empty($footer_row['agreement_content_1'])):?>
        <!-- 1st agreement -->
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="footer-agreement" required>
            <label class="form-check-label" for="footer-agreement">
              <?=$footer_row['agreement_heading_1']?>
            </label>
              <?=$footer_row['agreement_content_1']?>
          </div>
        <!-- 1st agreement -->
        <?php endif;?>

        <?php if (!empty($footer_row['agreement_heading_2']) && !empty($footer_row['agreement_content_2'])):?>
        <!-- 2nd agreement -->
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="footer-agreement2" required>
            <label class="form-check-label" for="footer-agreement2">
              <?=$footer_row['agreement_heading_2']?>
            </label>
              <?=$footer_row['agreement_content_2']?>
          </div>
        <!-- 2nd agreement -->
        <?php endif;?>

        </div>

        <div class="col-12">
          <button id="footer-button" class="btn btn-02 footer-button mb-3 md-md-0" >Wyślij</button>
        </div>

      </form>
      </div><!-- col padding-->
    </div><!-- col-->
<!-- form-->


    <div class="col-md-6 footer-content-col">
      <div class="p-3 footer-content-col-content">
        <div class="row  g-3 ">
          <div class="col-12">

          <h4><?=$footer_row['footer_heading']?></h4>
          </div>
          <div class="col-md-6">
            <p>
            <strong class="d-flex flex-row align-items-center">
              <?=$footer_row['footer_tel_1_desc']?>
            <i class="bi bi-telephone ms-1 phone-map-icon"></i>
            </strong>
            <?=$footer_row['footer_tel_1']?>
            </p>
          </div>


          <div class="col-md-6">
            <p>
            <strong class="d-flex flex-row align-items-center">
            <?=$footer_row['footer_tel_2_desc']?>
            <i class="bi bi-telephone ms-1 phone-map-icon"></i>
            </strong>
            <?=$footer_row['footer_tel_2']?>
            </p>
          </div>

          <div class="col-md-6">
            <?=$footer_row['footer_address_1']?>
          </div>

          <?php if ($footer_row['footer_map'] == 'on'):?>
          <!-- map icon-->
          <div class="col-md-6 position-relative">
            <a class="stretched-link" href="<?=$footer_row['footer_map_content']?>" aria-label="Wyznacz trasę"></a>
            <i class="bi bi-geo-alt-fill footer-map-icon"></i>
            <p>wyznacz trasę</p>
          </div>
          <!-- map icon-->
        <?php endif;?>

          <!-- socials col -->
          <div class="col-12 position-relative footer-socials">
            <div class="position-relative footer-social-icon float-start me-3">
            <a class="stretched-link" href="<?=$footer_row['footer_insta']?>" aria-label="Nasz instagram"></a>
            <i class="bi bi-instagram"></i>
            </div>

            <div class="position-relative footer-social-icon float-start">
              <a class="stretched-link" href="<?=$footer_row['footer_fb']?>" aria-label="Nasz facebook"></a>
            <i class="bi bi-facebook"></i>
            </div>

          </div>
          <!-- socials col -->

        </div>
      </div>
    </div>





<!-- extra bottom margin div-->
<div class="col-12 py-5 d-md-none"></div>

<!-- extra bottom margin div-->


  </div><!-- row-->

</div>