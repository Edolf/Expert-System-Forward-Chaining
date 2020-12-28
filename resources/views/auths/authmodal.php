<!-- Modal -->
<div id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true" class="_31P-8 _3bCgx">
  <div class="_28U8K XdziU">
    <div class="_2M5QZ _1wCNj _3LA0v _1HTfk s0VLt">
      <div class="_3tByX _3PDUl">
        <button type="button" data-dismiss="modal" aria-label="Close" class="_2yuh-"></button>
        <div id="carouselAuth" data-ride="carousel" data-interval="false" data-wrap="false" class="_2qzlW kEW7A">
          <div class="_29diV">
            <div class="_1wlhj _1-LYA">
              <div class="_1dTWr _3x-l5 gqtmr">
                <h5 id="authModalLabel" class="_2NT6A">Login to <span class="_2M3Kx"><?= APP_NAME ?></span></h5>
              </div>
              <form method="POST" id="loginForm" onsubmit="sulaiForm({this:this,event:event,link:'<?= LINK ?>/auth',method:'POST'})">
                <div class="_2E95Y riVBJ">
                  <svg width="32" height="32" fill="currentColor" class="_2i-WK">
                    <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#at" />
                  </svg>
                  <input id="user" name="user" type="text" class="_1y8Oi _1GV_i" />
                  <label for="user">E-mail / Username</label>
                  <span data-error="" data-success="" class="_25Y7w"></span>
                </div>
                <div class="_2E95Y riVBJ">
                  <svg width="32" height="32" fill="currentColor" class="_2i-WK">
                    <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#key" />
                  </svg>
                  <input id="password" name="password" type="password" class="_1y8Oi" />
                  <label for="password">Password</label>
                  <span data-error="" data-success="" class="_25Y7w"></span>
                </div>
                <div class="_3Sail _3x-l5 _1vA3K">
                  <div class="_3H5vK _3qPKF _2d3TN">
                    <div class="_1dTWr _3x-l5">
                      <label>
                        <input type="checkbox" checked="checked" name="rememberme" id="rememberme" />
                        <span class="_1m-Fh _3H3LR"><small>Remember Me</small></span>
                      </label>
                    </div>
                  </div>
                  <div class="_2x-fa">
                    <div class="_2xumt _14vxW _2GwUX"></div>
                  </div>
                  <div class="_3H5vK _3qPKF _1dTWr _3x-l5 _1vA3K _137Vi">
                    <button type="submit" class="_2niE6 _2-EzS _2S6Up Bdn6B _1dTWr _2kea1 _3x-l5">
                      <span style="width: 1rem; height: 1rem" role="status" class="_8sneY _2f2YP _14vxW"></span>
                      <span>Login</span>
                    </button>
                  </div>
                </div>
              </form>
              <div class="_3Sail _3x-l5 TidTZ">
                <div class="EbIZP _1dTWr _3x-l5">
                  <button type="button" data-toggle="modal" data-target="#forgotModal" class="_2zhDk _8y6Bn">
                    Forgot Password ?
                  </button>
                </div>
              </div>
              <hr class="_1T_p3" />
              <div class="_3Sail _3x-l5 _1PITf">
                <div class="EbIZP _1dTWr _3x-l5">
                  <!-- Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a> -->
                  <a href="<?= LINK ?>/auth/gplus" class="_2niE6 _2-EzS _1cIPx _2S6Up _1m-Fh _15dvq _1dTWr _3x-l5 _2kea1 _3GpXu">
                    <svg width="16" height="16" fill="currentColor" class="_2f2YP">
                      <use xlink:href="<?= ROOT ?>/assets/svg/google.svg#Layer_1" />
                    </svg>
                    <strong>Login With Google+</strong>
                  </a>
                </div>
              </div>
            </div>
            <div class="_1wlhj">
              <div class="_1dTWr _3x-l5">
                <h5 id="authModalLabel" class="_2NT6A">or <span class="_2M3Kx">Create
                    One</span></h5>
              </div>
              <form method="POST" id="regisForm" onsubmit="sulaiForm({this:this,event:event,link:'<?= LINK ?>/auth/join',method:'POST'})">
                <div class="_2E95Y riVBJ">
                  <svg width="32" height="32" fill="currentColor" class="_2i-WK">
                    <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#file-person-fill" />
                  </svg>
                  <input id="fullname" name="fullname" type="text" data-length="30" class="_1y8Oi _1GV_i" />
                  <label for="fullname">Full name</label>
                  <span data-error="" data-success="" class="_25Y7w"></span>
                </div>

                <div class="_2E95Y riVBJ">
                  <svg width="32" height="32" fill="currentColor" class="_2i-WK">
                    <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#sunglasses" />
                  </svg>
                  <input id="username" name="username" type="text" data-length="30" class="_1y8Oi _1GV_i" />
                  <label for="username">Username</label>
                  <span data-error="" data-success="" class="_25Y7w"></span>
                </div>

                <div class="_2E95Y riVBJ">
                  <svg width="32" height="32" fill="currentColor" class="_2i-WK">
                    <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#at" />
                  </svg>
                  <input id="email" name="email" type="email" class="_1y8Oi _1GV_i" />
                  <label for="email">Email</label>
                  <span data-error="" data-success="" class="_25Y7w"></span>
                </div>

                <div class="_3Sail _3x-l5">

                  <div class="_1s9b_">
                    <div class="_2E95Y riVBJ">
                      <svg width="32" height="32" fill="currentColor" class="_2i-WK">
                        <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#key" />
                      </svg>
                      <input id="getpassword" name="getpassword" type="password" data-length="30" class="_1y8Oi _1GV_i" />
                      <label for="getpassword">Password</label>
                      <span data-error="" data-success="" class="_25Y7w"></span>
                    </div>
                  </div>

                  <div class="_1s9b_">
                    <div class="_2E95Y riVBJ">
                      <svg width="32" height="32" fill="currentColor" class="_2i-WK">
                        <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#key-fill" />
                      </svg>
                      <input id="repassword" name="repassword" type="password" class="_1y8Oi _1GV_i" />
                      <label for="repassword">Retype Password</label>
                      <span data-error="" data-success="" class="_25Y7w"></span>
                    </div>
                  </div>
                </div>
                <div class="_1dTWr _3x-l5 _1vA3K _1PITf">
                  <button type="submit" class="_2niE6 _2-EzS _2S6Up Bdn6B _1dTWr _2kea1 _3x-l5">
                    <span style="width: 1rem; height: 1rem" role="status" class="_8sneY _2f2YP _14vxW"></span>
                    <span>Create</span>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <a style="left: -3%" class="_3QEPX">
          <svg width="24" height="24" fill="currentColor" class="_1m-Fh">
            <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#chevron-double-left" />
          </svg>
        </a>
        <a style="right: -3%" class="_1voHE">
          <svg width="24" height="24" fill="currentColor" class="_1m-Fh">
            <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#chevron-double-right" />
          </svg>
        </a>
      </div>
    </div>
  </div>
</div>
