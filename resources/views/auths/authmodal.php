<!-- Modal -->
<div id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true" class="Judd_197 Avery_140 Garrison_477">
  <div class="Merry_453 Caylin_795">
    <div class="Kayce_528 Dezmond_357 Aylan_418 Alexei_424 Brantly_247">
      <div class="Daiana_395 Aren_140">
        <button type="button" data-dismiss="modal" aria-label="Close" class="Zakai_358"></button>
        <div id="carouselAuth" data-ride="carousel" data-interval="false" data-wrap="false" class="Luz_334 Blessing_Camryn_201">
          <div class="Huxton_574">
            <div class="Glendon_533 Elyzabeth_240">
              <div class="Zephyr_231 Safwan_346 Jermani_171">
                <h5 id="authModalLabel" class="Malayna_443">Login to <span class="Ariana_Dora_191"><?= APP_NAME ?></span></h5>
              </div>
              <form method="POST" id="loginForm" onsubmit="sulaiForm({this:this,event:event,link:'<?= LINK ?>/auth',method:'POST'})">
                <div class="Mariano_448 Mckenzie_188">
                  <svg width="32" height="32" fill="currentColor" class="Atalia_258">
                    <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#at" />
                  </svg>
                  <input id="user" name="user" type="text" class="Amen_518 Simcha_314" />
                  <label for="user">E-mail / Username</label>
                  <span data-error="" data-success="" class="Adeleine_465"></span>
                </div>
                <div class="Mariano_448 Mckenzie_188">
                  <svg width="32" height="32" fill="currentColor" class="Atalia_258">
                    <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#key" />
                  </svg>
                  <input id="password" name="password" type="password" class="Amen_518" />
                  <label for="password">Password</label>
                  <span data-error="" data-success="" class="Adeleine_465"></span>
                </div>
                <div class="Calen_148 Safwan_346 Jewels_189">
                  <div class="Diego_122 Ekaterina_318 Coltan_353">
                    <div class="Zephyr_231 Safwan_346">
                      <label>
                        <input type="checkbox" checked="checked" name="rememberme" id="rememberme" />
                        <span class="Zianna_371 Virat_488"><small>Remember Me</small></span>
                      </label>
                    </div>
                  </div>
                  <div class="Jasleen_436">
                    <div class="Zelda_Dakota_641 Jana_232 Kyrin_368"></div>
                  </div>
                  <div class="Diego_122 Ekaterina_318 Zephyr_231 Safwan_346 Jewels_189 Juliann_299">
                    <button type="submit" class="Zakai_128 Kepler_361 Scottlyn_277 Zeppelin_413 Zephyr_231 Preston_343 Safwan_346">
                      <span style="width: 1rem; height: 1rem" role="status" class="Zayne_577 Annsley_184 Jana_232"></span>
                      <span>Login</span>
                    </button>
                  </div>
                </div>
              </form>
              <div class="Calen_148 Safwan_346 Annaleah_193">
                <div class="Raegyn_275 Zephyr_231 Safwan_346">
                  <button type="button" data-toggle="modal" data-target="#forgotModal" class="Olivia_315 Ulisses_424">
                    Forgot Password ?
                  </button>
                </div>
              </div>
              <hr class="Terron_136" />
              <div class="Calen_148 Safwan_346 Tayler_170">
                <div class="Raegyn_275 Zephyr_231 Safwan_346">
                  <!-- Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a> -->
                  <a href="<?= LINK ?>/auth/gplus" class="Zakai_128 Kepler_361 Cathryn_314 Scottlyn_277 Zianna_371 Jayden_370 Zephyr_231 Safwan_346 Preston_343 Lebron_195">
                    <svg width="16" height="16" fill="currentColor" class="Annsley_184">
                      <use xlink:href="<?= ROOT ?>/assets/svg/google.svg#Layer_1" />
                    </svg>
                    <strong>Login With Google+</strong>
                  </a>
                </div>
              </div>
            </div>
            <div class="Glendon_533">
              <div class="Zephyr_231 Safwan_346">
                <h5 id="authModalLabel" class="Malayna_443">or <span class="Ariana_Dora_191">Create
                    One</span></h5>
              </div>
              <form method="POST" id="regisForm" onsubmit="sulaiForm({this:this,event:event,link:'<?= LINK ?>/auth/join',method:'POST'})">
                <div class="Mariano_448 Mckenzie_188">
                  <svg width="32" height="32" fill="currentColor" class="Atalia_258">
                    <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#file-person-fill" />
                  </svg>
                  <input id="fullname" name="fullname" type="text" data-length="30" class="Amen_518 Simcha_314" />
                  <label for="fullname">Full name</label>
                  <span data-error="" data-success="" class="Adeleine_465"></span>
                </div>

                <div class="Mariano_448 Mckenzie_188">
                  <svg width="32" height="32" fill="currentColor" class="Atalia_258">
                    <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#sunglasses" />
                  </svg>
                  <input id="username" name="username" type="text" data-length="30" class="Amen_518 Simcha_314" />
                  <label for="username">Username</label>
                  <span data-error="" data-success="" class="Adeleine_465"></span>
                </div>

                <div class="Mariano_448 Mckenzie_188">
                  <svg width="32" height="32" fill="currentColor" class="Atalia_258">
                    <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#at" />
                  </svg>
                  <input id="email" name="email" type="email" class="Amen_518 Simcha_314" />
                  <label for="email">Email</label>
                  <span data-error="" data-success="" class="Adeleine_465"></span>
                </div>

                <div class="Calen_148 Safwan_346">

                  <div class="Finlay_320">
                    <div class="Mariano_448 Mckenzie_188">
                      <svg width="32" height="32" fill="currentColor" class="Atalia_258">
                        <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#key" />
                      </svg>
                      <input id="getpassword" name="getpassword" type="password" data-length="30" class="Amen_518 Simcha_314" />
                      <label for="getpassword">Password</label>
                      <span data-error="" data-success="" class="Adeleine_465"></span>
                    </div>
                  </div>

                  <div class="Finlay_320">
                    <div class="Mariano_448 Mckenzie_188">
                      <svg width="32" height="32" fill="currentColor" class="Atalia_258">
                        <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#key-fill" />
                      </svg>
                      <input id="repassword" name="repassword" type="password" class="Amen_518 Simcha_314" />
                      <label for="repassword">Retype Password</label>
                      <span data-error="" data-success="" class="Adeleine_465"></span>
                    </div>
                  </div>
                </div>
                <div class="Zephyr_231 Safwan_346 Jewels_189 Tayler_170">
                  <button type="submit" class="Zakai_128 Kepler_361 Scottlyn_277 Zeppelin_413 Zephyr_231 Preston_343 Safwan_346">
                    <span style="width: 1rem; height: 1rem" role="status" class="Zayne_577 Annsley_184 Jana_232"></span>
                    <span>Create</span>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <a style="left: -3%" class="Draya_880">
          <svg width="24" height="24" fill="currentColor" class="Zianna_371">
            <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#chevron-double-left" />
          </svg>
        </a>
        <a style="right: -3%" class="Ysabella_882">
          <svg width="24" height="24" fill="currentColor" class="Zianna_371">
            <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#chevron-double-right" />
          </svg>
        </a>
      </div>
    </div>
  </div>
</div>