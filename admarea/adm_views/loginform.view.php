
            <div class="col-md-4 d-flex align-items-center justify-content-center">
                <i id="the-icon" class="bi bi-key-fill" style="font-size: 8rem; color: tomato;"></i>
            </div><!-- col-md-4-->

            <div class="col-md-8">
              <div class="card-body">
                <form method="POST" enctype="multipart/form-data" class="row g-3 custom-form"  id="register-form" >
                  <div class="col-md-12 mb-3 mb-md-0 req" style="height: 0px; opacity:0;">
                    <label class="text-danger" for="important">your_type</label>
                    <input type="text" id="important" class="form-control form-control-sm" name="your_type">
                  </div>
                  <!-- email -->
                  <div class="col-md-6">
                    <label for="inputEmail" class="form-label">Email
                    </label>
                    <input type="email" class="form-control form-control-sm" id="u_email" name="email" $email_field_behaviour>
                  </div>
                  <!-- email -->

                  <!-- password -->
                  <div class="col-md-6">
                    <label for="password" class="form-label">Hasło</label>
                      <div class="input-group input-group-sm mb-3">
                      <input type="password" class="form-control form-control-sm" id="password" name="password" required>
                      <span class="input-group-text input-group-text-sm" id="show-password"><i id="password-icon" class="bi-eye text-primary"></i></span>
                    </div>
                  </div>
                  <!-- password -->
                  <div class="col-12">
                    <button id="register-button" class="btn btn-sm btn-primary register-button">zaloguj</button>
                  </div>
                </form>
              </div>
            </div>