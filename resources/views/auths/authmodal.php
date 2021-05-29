<!-- Modal -->
<div class="modal fade modal-static" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content shadow-lg bl-primary br-primary bg-card">
      <div class="modal-body p-5">
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        <div id="carouselAuth" class="carousel slide" data-ride="carousel" data-interval="false" data-wrap="false">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="d-flex jc-center mb-5">
                <h5 class="modal-title" id="authModalLabel">Login to <span class="brand"><?= APP_NAME ?></span></h5>
              </div>
              <form method="POST" id="loginForm" onsubmit="sulaiForm({this:this,event:event,link:'<?= LINK ?>/auth',method:'POST'})">
                <div class="input-field mt-4">
                  <svg class="prefix" width="32" height="32" fill="currentColor">
                    <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#at" />
                  </svg>
                  <input id="user" name="user" type="text" class="text-success validate">
                  <label for="user">E-mail / Username</label>
                  <span class="helper-text" data-error="" data-success=""></span>
                </div>
                <div class="input-field mt-4">
                  <svg class="prefix" width="32" height="32" fill="currentColor">
                    <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#key" />
                  </svg>
                  <input id="password" name="password" type="password" class="text-success">
                  <label for="password">Password</label>
                  <span class="helper-text" data-error="" data-success=""></span>
                </div>
                <div class="row jc-center mt-5">
                  <div class="col col-md-4 as-center">
                    <div class="d-flex jc-center">
                      <label>
                        <input type="checkbox" checked="checked" name="rememberme" id="rememberme" />
                        <span class="text-dark text-nowrap"><small>Remember Me</small></span>
                      </label>
                    </div>
                  </div>
                  <div class="col-md-auto">
                    <div class="vertical-divider d-none d-md-block"></div>
                  </div>
                  <div class="col col-md-4 d-flex jc-center mt-5 mt-md-0">
                    <button type="submit" class="btn btn-small w-100 bg-primary d-flex ai-center jc-center">
                      <span class="spinner-border mr-2 d-none" style="width: 1rem; height: 1rem;" role="status"></span>
                      <span>Login</span>
                    </button>
                  </div>
                </div>
              </form>
              <div class="row jc-center my-4">
                <div class="col-10 d-flex jc-center">
                  <button type="button" class="btn-flat text-theme" data-toggle="modal" data-target="#forgotModal">
                    Forgot Password ?
                  </button>
                </div>
              </div>
              <hr class="m-4">
              <div class="row jc-center mb-4">
                <div class="col-10 d-flex jc-center">
                  <!-- Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a> -->
                  <a href="<?= LINK ?>/auth/gplus" class="btn btn-small bg-white w-100 text-dark shadow-sm d-flex jc-center ai-center py-3">
                    <svg class="mr-2" width="16" height="16" fill="currentColor">
                      <use xlink:href="<?= ROOT ?>/assets/svg/google.svg#Layer_1" />
                    </svg>
                    <strong>Login With Google+</strong>
                  </a>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="d-flex jc-center">
                <h5 class="modal-title" id="authModalLabel">or <span class="brand">Create
                    One</span></h5>
              </div>
              <form method="POST" id="regisForm" onsubmit="sulaiForm({this:this,event:event,link:'<?= LINK ?>/auth/join',method:'POST'})">
                <div class="input-field mt-4">
                  <svg class="prefix" width="32" height="32" fill="currentColor">
                    <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#file-person-fill" />
                  </svg>
                  <input id="fullname" name="fullname" type="text" class="text-success validate" data-length="30">
                  <label for="fullname">Full name</label>
                  <span class="helper-text" data-error="" data-success=""></span>
                </div>

                <div class="input-field mt-4">
                  <svg class="prefix" width="32" height="32" fill="currentColor">
                    <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#sunglasses" />
                  </svg>
                  <input id="username" name="username" type="text" class="text-success validate" data-length="30">
                  <label for="username">Username</label>
                  <span class="helper-text" data-error="" data-success=""></span>
                </div>

                <div class="input-field mt-4">
                  <svg class="prefix" width="32" height="32" fill="currentColor">
                    <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#at" />
                  </svg>
                  <input id="email" name="email" type="email" class="text-success validate">
                  <label for="email">Email</label>
                  <span class="helper-text" data-error="" data-success=""></span>
                </div>

                <div class="row jc-center">

                  <div class="col-md-6">
                    <div class="input-field mt-4">
                      <svg class="prefix" width="32" height="32" fill="currentColor">
                        <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#key" />
                      </svg>
                      <input id="getpassword" name="getpassword" type="password" class="text-success validate" data-length="30">
                      <label for="getpassword">Password</label>
                      <span class="helper-text" data-error="" data-success=""></span>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="input-field mt-4">
                      <svg class="prefix" width="32" height="32" fill="currentColor">
                        <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#key-fill" />
                      </svg>
                      <input id="repassword" name="repassword" type="password" class="text-success validate">
                      <label for="repassword">Retype Password</label>
                      <span class="helper-text" data-error="" data-success=""></span>
                    </div>
                  </div>
                </div>
                <div class="d-flex jc-center mt-5 mb-4">
                  <button type="submit" class="btn btn-small w-100 bg-primary d-flex ai-center jc-center">
                    <span class="spinner-border mr-2 d-none" style="width: 1rem; height: 1rem;" role="status"></span>
                    <span>Create</span>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" style="left: -3%">
          <svg class="text-dark" width="24" height="24" fill="currentColor">
            <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#chevron-double-left" />
          </svg>
        </a>
        <a class="carousel-control-next" style="right: -3%">
          <svg class="text-dark" width="24" height="24" fill="currentColor">
            <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#chevron-double-right" />
          </svg>
        </a>
      </div>
    </div>
  </div>
</div>
</div>