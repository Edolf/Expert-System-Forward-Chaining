<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="_1FInK">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="_2h7iG _1dTWr _3oq1Z vSOIt">
    <div class="F2040 _1PITf">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="_22DlN _3PDUl">
        <div class="_3Sail gqtmr">
          <div class="zhLxC">
            <h3 class="_1m-Fh">Profile</h3>
            <h6 class="_1PITf">Your personal information</h6>
          </div>
          <div class="zhLxC _18uPx _1PGjf">
            <h3 class="_1m-Fh _1PITf">Profile Picture</h3>
            <div style="background-image: url('<?= $user->image ? 'data:image/jpg/jpeg/png/bmp; base64,' . $user->image: '' ?>')" class="_3x26m _2S6Up Z2yax VwXPH">
            </div>
            <form id="pictUploadForm" method="POST" action="<?= LINK ?>/members/account/upload?_csrf=<?= $csrfToken ?>&_method=PUT" enctype="multipart/form-data">
              <div class="_3Sail _2E95Y _2kea1">
                <div class="_36eYI">
                  <div class="_1HJlD _2E95Y">
                    <input type="file" name="userprofile" id="userprofile" multiple="" />
                    <div class="_3aQe7">
                      <input type="text" class="<?= $flash->getFlash('upload')['class'] ?? '' ?> _1G5zC _1GV_i _8y6Bn _38102" placeholder="<?= $flash->getFlash('upload')['message'][0]['msg'] ?? 'Click Here to Change' ?>" value="<?= $flash->getFlash('upload')['message'][0]['msg'] ?? 'Click Here to Change' ?>" />
                    </div>
                  </div>
                </div>
                <div style="z-index: 3" class="GMc5i">
                  <button type="submit" class="_2niE6 Bdn6B">
                    <svg width="24" height="24" fill="currentColor" class="_1dYc3">
                      <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#upload" />
                    </svg>
                  </button>
                </div>
              </div>
              <div class="_3znGg _3pDOt _1CMvd">
                <small><i>Image size: Max. 300 KB | Format: [.jpg .jpeg .png .bmp]</i></small>
              </div>
            </form>
          </div>
          <div class="zhLxC _3HVzZ">
            <div class="_3Sail gqtmr">
              <h3 class="_1m-Fh _1PITf">Basic Information</h3>
              <table class="_12PUq -tn6h">
                <tr>
                  <td scope="col">Full Name</td>
                  <td scope="col">
                    <strong css-module=""><?= $user->name ?></strong>
                    <form method="POST" id="newfullnameForm" onsubmit="changeForm({this:this,event:event,link:'<?= LINK ?>/members/account/name',method:'PUT'})" class="_14vxW">
                      <div class="_3Sail _2E95Y _3znGg _10lSW">
                        <div class="EbIZP _27Ucp">
                          <div class="_2E95Y _10fYj">
                            <input id="newfullname" name="newfullname" value="<?= $user->name ?>" default="Null" type="text" data-length="30" class="_27Ucp _6Mx4t _3x5Rf _1GV_i _1y8Oi" />
                            <span data-error="" data-success="" class="_25Y7w"></span>
                          </div>
                        </div>
                        <div class="_2B8xl _27Ucp">
                          <button data-toggle="modal" data-target="#confirmModal" type="submit" class="_2zhDk _8y6Bn _3H127 _27Ucp">
                            <svg width="24" height="24" fill="currentColor">
                              <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#check" />
                            </svg>
                          </button>
                        </div>
                      </div>
                    </form>
                  </td>
                  <td scope="col">
                    <button type="button" onclick="noneBlock({
                  this:this})" class="_2zhDk _8y6Bn _27Ucp kDz7L">Edit
                    </button>
                    <button type="button" onclick="noneBlock({
                  this:this})" class="_2zhDk _8y6Bn _27Ucp _14vxW">
                      <svg width="24" height="24" fill="currentColor">
                        <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#x" />
                      </svg>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td scope="col">Username</td>
                  <td scope="col">
                    <strong><?= $user->username != null ? $user->username : 'NULL' ?></strong>
                    <form method="POST" id="newusernameForm" onsubmit="changeForm({this:this,event:event,link:'<?= LINK ?>/members/account/username',method:'PUT'})" class="_14vxW">
                      <div class="_3Sail _2E95Y _3znGg _10lSW">
                        <div class="EbIZP _27Ucp">
                          <div class="_2E95Y _10fYj">
                            <input id="newusername" name="newusername" value="<?= $user->username ?>" type="text" data-length="30" class="_27Ucp _6Mx4t _3x5Rf _1GV_i _1y8Oi" />
                            <span data-error="" data-success="" class="_25Y7w"></span>
                          </div>
                        </div>
                        <div class="_2B8xl _27Ucp">
                          <button data-toggle="modal" data-target="#confirmModal" type="submit" class="_2zhDk _8y6Bn _3H127 _27Ucp">
                            <svg width="24" height="24" fill="currentColor">
                              <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#check" />
                            </svg>
                          </button>
                        </div>
                      </div>
                    </form>
                  </td>
                  <td scope="col">
                    <button type="button" onclick="noneBlock({
                    this:this})" class="_2zhDk _8y6Bn _27Ucp kDz7L">Edit
                    </button>
                    <button type="button" onclick="noneBlock({
                  this:this})" class="_2zhDk _8y6Bn _27Ucp _14vxW">
                      <svg width="24" height="24" fill="currentColor">
                        <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#x" />
                      </svg>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td scope="col">E-mail</td>
                  <td scope="col">
                    <strong>
                      <?= $user->email != null ? $user->email : 'NULL' ?><small class="<?= $user->role == 'unverified' ? '_2ivdp' : '_1y8Oi' ?> _1MoWO"><?= $user->role == 'unverified' ? '(unverified)' : '(verified)' ?></small>
                    </strong>
                    <form method="POST" id="newemailForm" onsubmit="changeForm({this:this,event:event,link:'<?= LINK ?>/members/account/email',method:'PUT'})" class="_14vxW">
                      <div class="_3Sail _2E95Y _3znGg _10lSW">
                        <div class="EbIZP _27Ucp">
                          <div class="_2E95Y _10fYj">
                            <input id="newemail" name="newemail" value="<?= $user->email ?>" type="email" data-length="30" class="_27Ucp _6Mx4t _3x5Rf _1GV_i _1y8Oi" />
                            <span data-error="" data-success="" class="_25Y7w"></span>
                          </div>
                        </div>
                        <div class="_2B8xl _27Ucp">
                          <button data-toggle="modal" data-target="#confirmModal" type="submit" class="_2zhDk _8y6Bn _3H127 _27Ucp">
                            <svg width="24" height="24" fill="currentColor">
                              <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#check" />
                            </svg>
                          </button>
                        </div>
                      </div>
                    </form>
                  </td>
                  <td scope="col">
                    <button data-name="email" data-value="<?= $user->email ?>" type="button" onclick="noneBlock({
                    this:this})" class="_2zhDk _8y6Bn _27Ucp kDz7L">Edit
                    </button>
                    <button type="button" onclick="noneBlock({
                  this:this})" class="_2zhDk _8y6Bn _27Ucp _14vxW">
                      <svg width="24" height="24" fill="currentColor">
                        <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#x" />
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
                    <button type="button" data-toggle="modal" data-target="#confirmPassModal" class="_2zhDk _8y6Bn _2uJhx _27Ucp kDz7L">Edit
                    </button>
                  </td>
                </tr>
              </table>
            </div>
            <div class="_3Sail">
              <h3 class="_1m-Fh gqtmr">Connected Accounts</h3>
              <div class="_1XFt9 VwXPH">
                <h5><strong>Google+</strong></h5>
                <small>You can log in to <span class="_2M3Kx"><?= APP_NAME ?></span> with Google+</small>
              </div>
              <div class="_1Y89l VwXPH">
                <?php if (json_decode($user->other, true)['googleId'] != null) { ?>
                  <form method="POST" id="dcGplusForm">
                    <button type="button" class="_2zhDk _3znGg _3dCeC">(disconnect)</button>
                  </form>
                <?php } else { ?>
                  <!-- Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a> -->
                  <a href="<?= LINK ?>/auth/gplus" class="_2zhDk _1cIPx _15dvq _1m-Fh _1dTWr _2kea1 _3c1f_ _1mvwU">
                    <small><b>Connect to</b></small>
                    <svg width="16" height="16" fill="currentColor" class="_1x6Xu">
                      <use xlink:href="<?= ROOT ?>/assets/svg/google.svg#Layer_1" />
                    </svg>
                  </a>
                <?php } ?>
              </div>
              <hr class="_3qGFe" />
            </div>
          </div>
        </div>
        <div class="_3Sail">
          <div class="zhLxC">
            <h3 class="_1m-Fh">Danger zone</h3>
            <h6 class="gqtmr">Irreversible and destructive actions</h6>
          </div>
          <div class="zhLxC _3BRUK">
            <div class="_1aMCn s0VLt _3YofF VwXPH">
              <div class="_1LFTg cnWz7 _1dYc3">Delete user</div>
              <div class="_199pu">
                <h5 class="_3oNh9">Be Careful</h5>
                <p class="e2Sjh">Once you delete your user, there is no going back. Please be certain.</p>
                <button data-toggle="modal" data-target="#dropAccountModal" class="_2niE6 cnWz7">Delete
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