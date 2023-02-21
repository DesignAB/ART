

          <div class="row g-0 login-form">
            <div class="col-12">
            <?php $error_message = $data['messenger']->errorUserMessage();?>
              <div class="card-body">


                <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form "  id="register-form" >
              <input type="hidden" id="important" class="form-control form-control-sm" name="contest_u_id" value="<?=$_SESSION[WEBSITE_NAME.'_u_id']?>">
              <input type="hidden"class="form-control form-control-sm" name="password_change">
                  <!-- previous password -->
                  <div class="col-lg-6">
                    <label for="inputEmail" class="form-label large-label d-block text-center text-lg-start">Poprzednie hasło!
                    </label>
                    <input type="previous_password" class="form-control form-control" id="previous_password" name="previous_password" required>

                  </div>

                  <!-- previous password -->
                  <div class="col-12 form-divider">
                  </div>


                  <!-- password -->
                  <div class="col-md-6">
                    <label for="password" class="form-label large-label">Hasło!</label>
                    <input type="password" class="form-control form-control-sm" id="password" name="password" required>
                    <label id="password-error" for="password_repeat" class="form-label small-label">&nbsp;</label>
                  </div>

                  <div class="col-md-6">
                    <label for="password_repeat" class="form-label large-label">Potwierdź hasło</label>
                    <input type="password" class="form-control form-control-sm" id="password_repeat" name="password_repeat" required>
                    <label id="password-match" for="password_repeat" class="form-label small-label">&nbsp;</label>
                  </div>
                  <!-- password -->



                  <div class="col-12 text-center text-lg-start">
                    <button id="register-button" class="btn btn-sm btn-primary register-button">zmień hasło</button>
                  </div>

                </form>

               




              </div>
            </div>
          </div>
