<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="Avalyn_309">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="Karlee_636 Zephyr_231 Micaiah_457 Brylan_497">
    <div class="Karlee_303 Tayler_170">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="Aylin_367 Aren_140">
        <div class="Calen_148 Jermani_171">
          <div class="Leander_448">
            <h3 class="Zianna_371">Profile</h3>
            <h6 class="Tayler_170">Your personal information</h6>
          </div>
          <div class="Leander_448 Izzabella_317 Slate_295">
            <h3 class="Zianna_371 Tayler_170">Profile Picture</h3>
            <div style="background-image: url('<?= $user->image ? 'data:image/jpg/jpeg/png/bmp; base64,' . $user->image : '' ?>')" class="Hillary_Emmalyn_504 Scottlyn_277 Iyla_521 Nachman_169">
            </div>
            <form id="pictUploadForm" method="POST" action="<?= LINK ?>/members/account/upload?_csrf=<?= $csrfToken ?>&_method=PUT" enctype="multipart/form-data">
              <div class="Calen_148 Mariano_448 Preston_343">
                <div class="Johan_218">
                  <div class="Nallely_372 Mariano_448">
                    <input type="file" name="userprofile" id="userprofile" multiple="" />
                    <div class="Adelynn_682">
                      <input type="text" class="<?= $flash->getFlash('upload')['class'] ?? '' ?> Adelynn_345 Simcha_314 Ulisses_424 Kerrington_563" placeholder="<?= $flash->getFlash('upload')['message'][0]['msg'] ?? 'Click Here to Change' ?>" value="<?= $flash->getFlash('upload')['message'][0]['msg'] ?? 'Click Here to Change' ?>" />
                    </div>
                  </div>
                </div>
                <div style="z-index: 3" class="Maliha_212">
                  <button type="submit" class="Zakai_128 Zeppelin_413">
                    <svg width="24" height="24" fill="currentColor" class="Isabella_429">
                      <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#upload" />
                    </svg>
                  </button>
                </div>
              </div>
              <div class="Faizan_466 Emmarose_194 Ammon_304">
                <small><i>Image size: Max. 300 KB | Format: [.jpg .jpeg .png .bmp]</i></small>
              </div>
            </form>
          </div>
          <div class="Leander_448 Ann_319">
            <div class="Calen_148 Jermani_171">
              <h3 class="Zianna_371 Tayler_170">Basic Information</h3>
              <table class="Jedidiah_192 Eily_440">
                <tr>
                  <td scope="col">Full Name</td>
                  <td scope="col">
                    <strong><?= $user->name ?></strong>
                    <form method="POST" id="newfullnameForm" onsubmit="changeForm({this:this,event:event,link:'<?= LINK ?>/members/account/name',method:'PUT'})" class="Jana_232">
                      <div class="Calen_148 Mariano_448 Faizan_466 Raena_142">
                        <div class="Raegyn_275 William_145">
                          <div class="Mariano_448 Chrisette_199">
                            <input id="newfullname" name="newfullname" value="<?= $user->name ?>" default="Null" type="text" data-length="30" class="William_145 Rishi_194 Zavian_198 Simcha_314 Amen_518" />
                            <span data-error="" data-success="" class="Adeleine_465"></span>
                          </div>
                        </div>
                        <div class="Kaleigh_211 William_145">
                          <button data-toggle="modal" data-target="#confirmModal" type="submit" class="Olivia_315 Ulisses_424 Nana_Sam_274 William_145">
                            <svg width="24" height="24" fill="currentColor">
                              <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#check" />
                            </svg>
                          </button>
                        </div>
                      </div>
                    </form>
                  </td>
                  <td scope="col">
                    <button type="button" onclick="noneBlock({
                  this:this})" class="Olivia_315 Ulisses_424 William_145 Lily_328">Edit
                    </button>
                    <button type="button" onclick="noneBlock({
                  this:this})" class="Olivia_315 Ulisses_424 William_145 Jana_232">
                      <svg width="24" height="24" fill="currentColor">
                        <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#x" />
                      </svg>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td scope="col">Username</td>
                  <td scope="col">
                    <strong><?= $user->username != null ? $user->username : 'NULL' ?></strong>
                    <form method="POST" id="newusernameForm" onsubmit="changeForm({this:this,event:event,link:'<?= LINK ?>/members/account/username',method:'PUT'})" class="Jana_232">
                      <div class="Calen_148 Mariano_448 Faizan_466 Raena_142">
                        <div class="Raegyn_275 William_145">
                          <div class="Mariano_448 Chrisette_199">
                            <input id="newusername" name="newusername" value="<?= $user->username ?>" type="text" data-length="30" class="William_145 Rishi_194 Zavian_198 Simcha_314 Amen_518" />
                            <span data-error="" data-success="" class="Adeleine_465"></span>
                          </div>
                        </div>
                        <div class="Kaleigh_211 William_145">
                          <button data-toggle="modal" data-target="#confirmModal" type="submit" class="Olivia_315 Ulisses_424 Nana_Sam_274 William_145">
                            <svg width="24" height="24" fill="currentColor">
                              <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#check" />
                            </svg>
                          </button>
                        </div>
                      </div>
                    </form>
                  </td>
                  <td scope="col">
                    <button type="button" onclick="noneBlock({
                    this:this})" class="Olivia_315 Ulisses_424 William_145 Lily_328">Edit
                    </button>
                    <button type="button" onclick="noneBlock({
                  this:this})" class="Olivia_315 Ulisses_424 William_145 Jana_232">
                      <svg width="24" height="24" fill="currentColor">
                        <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#x" />
                      </svg>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td scope="col">E-mail</td>
                  <td scope="col">
                    <strong>
                      <?= $user->email != null ? $user->email : 'NULL' ?><small class="<?= $user->role == 'unverified' ? 'Dariah_515' : 'Amen_518' ?> Aleyda_179"><?= $user->role == 'unverified' ? '(unverified)' : '(verified)' ?></small>
                    </strong>
                    <form method="POST" id="newemailForm" onsubmit="changeForm({this:this,event:event,link:'<?= LINK ?>/members/account/email',method:'PUT'})" class="Jana_232">
                      <div class="Calen_148 Mariano_448 Faizan_466 Raena_142">
                        <div class="Raegyn_275 William_145">
                          <div class="Mariano_448 Chrisette_199">
                            <input id="newemail" name="newemail" value="<?= $user->email ?>" type="email" data-length="30" class="William_145 Rishi_194 Zavian_198 Simcha_314 Amen_518" />
                            <span data-error="" data-success="" class="Adeleine_465"></span>
                          </div>
                        </div>
                        <div class="Kaleigh_211 William_145">
                          <button data-toggle="modal" data-target="#confirmModal" type="submit" class="Olivia_315 Ulisses_424 Nana_Sam_274 William_145">
                            <svg width="24" height="24" fill="currentColor">
                              <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#check" />
                            </svg>
                          </button>
                        </div>
                      </div>
                    </form>
                  </td>
                  <td scope="col">
                    <button data-name="email" data-value="<?= $user->email ?>" type="button" onclick="noneBlock({
                    this:this})" class="Olivia_315 Ulisses_424 William_145 Lily_328">Edit
                    </button>
                    <button type="button" onclick="noneBlock({
                  this:this})" class="Olivia_315 Ulisses_424 William_145 Jana_232">
                      <svg width="24" height="24" fill="currentColor">
                        <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#x" />
                      </svg>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td scope="col">Password</td>
                  <td scope="col">
                    <strong>
                      <?php if ($user->password != null) {
                        for ($i = 0; $i < 8; $i++) { ?>*<?php }
                                                    } else { ?>NULL<?php } ?>
                    </strong>
                  </td>
                  <td scope="col">
                    <button type="button" data-toggle="modal" data-target="#confirmPassModal" class="Olivia_315 Ulisses_424 Janeth_450 William_145 Lily_328">Edit
                    </button>
                  </td>
                </tr>
              </table>
            </div>
            <div class="Calen_148">
              <h3 class="Zianna_371 Jermani_171">Connected Accounts</h3>
              <div class="Zarya_217 Nachman_169">
                <h5><strong>Google+</strong></h5>
                <small>You can log in to <span class="Ariana_Dora_191"><?= APP_NAME ?></span> with Google+</small>
              </div>
              <div class="Mazie_213 Nachman_169">
                <?php if (json_decode($user->other, true)['googleId'] != null) { ?>
                  <form method="POST" id="dcGplusForm">
                    <button type="button" class="Olivia_315 Faizan_466 Ever_450">(disconnect)</button>
                  </form>
                <?php } else { ?>
                  <!-- Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a> -->
                  <a href="<?= LINK ?>/auth/gplus" class="Olivia_315 Cathryn_314 Jayden_370 Zianna_371 Zephyr_231 Preston_343 Anyiah_194 Karsyn_610">
                    <small><b>Connect to</b></small>
                    <svg width="16" height="16" fill="currentColor" class="Gotham_178">
                      <use xlink:href="<?= ROOT ?>/assets/svg/google.svg#Layer_1" />
                    </svg>
                  </a>
                <?php } ?>
              </div>
              <hr class="Williams_300" />
            </div>
          </div>
        </div>
        <div class="Calen_148">
          <div class="Leander_448">
            <h3 class="Zianna_371">Danger zone</h3>
            <h6 class="Jermani_171">Irreversible and destructive actions</h6>
          </div>
          <div class="Leander_448 Mayer_323">
            <div class="Zaydee_150 Brantly_247 Linkin_321 Nachman_169">
              <div class="Gil_399 Hutton_326 Isabella_429">Delete user</div>
              <div class="Rory_340">
                <h5 class="Brileigh_396">Be Careful</h5>
                <p class="Harmonie_363">Once you delete your user, there is no going back. Please be certain.</p>
                <button data-toggle="modal" data-target="#dropAccountModal" class="Zakai_128 Hutton_326">Delete
                  User</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include VIEW_DIR . "/members/users/confirmmodal.php"; ?>
    <?php include VIEW_DIR . "/members/users/confirmpassmodal.php"; ?>
    <?php include VIEW_DIR . "/members/users/dropaccountmodal.php"; ?>
    <?php include VIEW_DIR . "/layouts/footbar.php"; ?>
  </div>
</div>
<?php include VIEW_DIR . "/auths/authmodal.php"; ?>
<?php include VIEW_DIR . "/auths/forgot/forgotmodal.php"; ?>
<?php include VIEW_DIR . "/auths/verify/verifymodal.php"; ?>
<?php include VIEW_DIR . "/auths/logoutmodal.php"; ?>
<?php include VIEW_DIR . "/layouts/gotop.php"; ?>
<?php include VIEW_DIR . "/layouts/footer.php"; ?>