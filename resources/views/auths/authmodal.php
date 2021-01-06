<!-- Modal -->
<div id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true" class="_2yvo3 _3F0Yh">
  <div class="EGnm1 _4GJxo">
    <div class="xo4Q- _3Znxg _1Mqcp _3W_HJ _2W81z">
      <div class="_3BAVP _1FnTW">
        <button type="button" data-dismiss="modal" aria-label="Close" class="_2MKOU"></button>
        <div id="carouselAuth" data-ride="carousel" data-interval="false" data-wrap="false" class="_1TXlW ZXtfC">
          <div class="_1YLKn">
            <div class="K7T-G _1ptY3">
              <div class="_1wHD0 _3Yl2j _34J9b">
                <h5 id="authModalLabel" class="_1XL6n">Login to <span class="_3BjGC"><?= APP_NAME ?></span></h5>
              </div>
              <form method="POST" id="loginForm" onsubmit="sulaiForm({this:this,event:event,link:'<?= LINK ?>/auth',method:'POST'})">
                <div class="_36R48 DLDJz">
                  <svg width="32" height="32" fill="currentColor" class="_2mXhC">
                    <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#at" />
                  </svg>
                  <input id="user" name="user" type="text" class="_21QBy _2fCo5" />
                  <label for="user">E-mail / Username</label>
                  <span data-error="" data-success="" class="_3jmDY"></span>
                </div>
                <div class="_36R48 DLDJz">
                  <svg width="32" height="32" fill="currentColor" class="_2mXhC">
                    <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#key" />
                  </svg>
                  <input id="password" name="password" type="password" class="_21QBy" />
                  <label for="password">Password</label>
                  <span data-error="" data-success="" class="_3jmDY"></span>
                </div>
                <div class="SiBSM _3Yl2j _1sNoa">
                  <div class="_3s_H5 _3g8ld _2WCXA">
                    <div class="_1wHD0 _3Yl2j">
                      <label>
                        <input type="checkbox" checked="checked" name="rememberme" id="rememberme" />
                        <span class="zCP3X _3_mW1"><small>Remember Me</small></span>
                      </label>
                    </div>
                  </div>
                  <div class="_3lwaw">
                    <div class="HyKq7 rCKpP _13CtA"></div>
                  </div>
                  <div class="_3s_H5 _3g8ld _1wHD0 _3Yl2j _1sNoa _1WmuJ">
                    <button type="submit" class="_2HPko _3XagE BoWE6 vhjC9 _1wHD0 _1uVtA _3Yl2j">
                      <span style="width: 1rem; height: 1rem" role="status" class="_2_2xs _2uMGw rCKpP"></span>
                      <span>Login</span>
                    </button>
                  </div>
                </div>
              </form>
              <div class="SiBSM _3Yl2j _3H4vP">
                <div class="SSDpf _1wHD0 _3Yl2j">
                  <button type="button" data-toggle="modal" data-target="#forgotModal" class="USCBs _2XuUU">
                    Forgot Password ?
                  </button>
                </div>
              </div>
              <hr class="_3-_HB" />
              <div class="SiBSM _3Yl2j _1re0U">
                <div class="SSDpf _1wHD0 _3Yl2j">
                  <!-- Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a> -->
                  <a href="<?= LINK ?>/auth/gplus" class="_2HPko _3XagE _2iS7c BoWE6 zCP3X _3phrn _1wHD0 _3Yl2j _1uVtA sHcZn">
                    <svg width="16" height="16" fill="currentColor" class="_2uMGw">
                      <use xlink:href="<?= ROOT ?>/assets/svg/google.svg#Layer_1" />
                    </svg>
                    <strong>Login With Google+</strong>
                  </a>
                </div>
              </div>
            </div>
            <div class="K7T-G">
              <div class="_1wHD0 _3Yl2j">
                <h5 id="authModalLabel" class="_1XL6n">or <span class="_3BjGC">Create
                    One</span></h5>
              </div>
              <form method="POST" id="regisForm" onsubmit="sulaiForm({this:this,event:event,link:'<?= LINK ?>/auth/join',method:'POST'})">
                <div class="_36R48 DLDJz">
                  <svg width="32" height="32" fill="currentColor" class="_2mXhC">
                    <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#file-person-fill" />
                  </svg>
                  <input id="fullname" name="fullname" type="text" data-length="30" class="_21QBy _2fCo5" />
                  <label for="fullname">Full name</label>
                  <span data-error="" data-success="" class="_3jmDY"></span>
                </div>

                <div class="_36R48 DLDJz">
                  <svg width="32" height="32" fill="currentColor" class="_2mXhC">
                    <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#sunglasses" />
                  </svg>
                  <input id="username" name="username" type="text" data-length="30" class="_21QBy _2fCo5" />
                  <label for="username">Username</label>
                  <span data-error="" data-success="" class="_3jmDY"></span>
                </div>

                <div class="_36R48 DLDJz">
                  <svg width="32" height="32" fill="currentColor" class="_2mXhC">
                    <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#at" />
                  </svg>
                  <input id="email" name="email" type="email" class="_21QBy _2fCo5" />
                  <label for="email">Email</label>
                  <span data-error="" data-success="" class="_3jmDY"></span>
                </div>

                <div class="SiBSM _3Yl2j">

                  <div class="_1yUFw">
                    <div class="_36R48 DLDJz">
                      <svg width="32" height="32" fill="currentColor" class="_2mXhC">
                        <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#key" />
                      </svg>
                      <input id="getpassword" name="getpassword" type="password" data-length="30" class="_21QBy _2fCo5" />
                      <label for="getpassword">Password</label>
                      <span data-error="" data-success="" class="_3jmDY"></span>
                    </div>
                  </div>

                  <div class="_1yUFw">
                    <div class="_36R48 DLDJz">
                      <svg width="32" height="32" fill="currentColor" class="_2mXhC">
                        <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#key-fill" />
                      </svg>
                      <input id="repassword" name="repassword" type="password" class="_21QBy _2fCo5" />
                      <label for="repassword">Retype Password</label>
                      <span data-error="" data-success="" class="_3jmDY"></span>
                    </div>
                  </div>
                </div>
                <div class="_1wHD0 _3Yl2j _1sNoa _1re0U">
                  <button type="submit" class="_2HPko _3XagE BoWE6 vhjC9 _1wHD0 _1uVtA _3Yl2j">
                    <span style="width: 1rem; height: 1rem" role="status" class="_2_2xs _2uMGw rCKpP"></span>
                    <span>Create</span>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <a style="left: -3%" class="_3MY7v">
          <svg width="24" height="24" fill="currentColor" class="zCP3X">
            <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#chevron-double-left" />
          </svg>
        </a>
        <a style="right: -3%" class="_3dwPx">
          <svg width="24" height="24" fill="currentColor" class="zCP3X">
            <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#chevron-double-right" />
          </svg>
        </a>
      </div>
    </div>
  </div>
</div>