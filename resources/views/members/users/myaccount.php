<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="_2pyK2">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="_3hy0- _1wHD0 _6Eppu _2fCJU">
    <div class="_24Rxj _1re0U">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="_16ASu _1FnTW">
        <div class="SiBSM _34J9b">
          <div class="_1bEqb">
            <h3 class="zCP3X">Profile</h3>
            <h6 class="_1re0U">Your personal information</h6>
          </div>
          <div class="_1bEqb _1Nnzl _2iFV7">
            <h3 class="zCP3X _1re0U">Profile Picture</h3>
            <div style="background-image: url('<?= $user->image ? 'data:image/jpg/jpeg/png/bmp; base64,' . $user->image : '' ?>')" class="tRmbN BoWE6 _3-lYj _14WVS">
            </div>
            <form id="pictUploadForm" method="POST" action="<?= LINK ?>/members/account/upload?_csrf=<?= $csrfToken ?>&_method=PUT" enctype="multipart/form-data">
              <div class="SiBSM _36R48 _1uVtA">
                <div class="_1SzXv">
                  <div class="_1d2i1 _36R48">
                    <input type="file" name="userprofile" id="userprofile" multiple="" />
                    <div class="_1NsyA">
                      <input type="text" class="<?= $flash->getFlash('upload')['class'] ?? '' ?> _3naIJ _2fCo5 _2XuUU _2nCCi" placeholder="<?= $flash->getFlash('upload')['message'][0]['msg'] ?? 'Click Here to Change' ?>" value="<?= $flash->getFlash('upload')['message'][0]['msg'] ?? 'Click Here to Change' ?>" />
                    </div>
                  </div>
                </div>
                <div style="z-index: 3" class="_3iupC">
                  <button type="submit" class="_2HPko vhjC9">
                    <svg width="24" height="24" fill="currentColor" class="lJhPB">
                      <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#upload" />
                    </svg>
                  </button>
                </div>
              </div>
              <div class="RogPM KTZ2J p6Nye">
                <small><i>Image size: Max. 300 KB | Format: [.jpg .jpeg .png .bmp]</i></small>
              </div>
            </form>
          </div>
          <div class="_1bEqb _2IUtP">
            <div class="SiBSM _34J9b">
              <h3 class="zCP3X _1re0U">Basic Information</h3>
              <table class="_3bYJs _3Lvqy">
                <tr>
                  <td scope="col">Full Name</td>
                  <td scope="col">
                    <strong><?= $user->name ?></strong>
                    <form method="POST" id="newfullnameForm" onsubmit="changeForm({this:this,event:event,link:'<?= LINK ?>/members/account/name',method:'PUT'})" class="rCKpP">
                      <div class="SiBSM _36R48 RogPM _3MkHC">
                        <div class="SSDpf _1kqFz">
                          <div class="_36R48 _3KNOZ">
                            <input id="newfullname" name="newfullname" value="<?= $user->name ?>" default="Null" type="text" data-length="30" class="_1kqFz _1tBU4 _1YUah _2fCo5 _21QBy" />
                            <span data-error="" data-success="" class="_3jmDY"></span>
                          </div>
                        </div>
                        <div class="_32Qas _1kqFz">
                          <button data-toggle="modal" data-target="#confirmModal" type="submit" class="USCBs _2XuUU _15buw _1kqFz">
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
                  this:this})" class="USCBs _2XuUU _1kqFz _2KdlA">Edit
                    </button>
                    <button type="button" onclick="noneBlock({
                  this:this})" class="USCBs _2XuUU _1kqFz rCKpP">
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
                    <form method="POST" id="newusernameForm" onsubmit="changeForm({this:this,event:event,link:'<?= LINK ?>/members/account/username',method:'PUT'})" class="rCKpP">
                      <div class="SiBSM _36R48 RogPM _3MkHC">
                        <div class="SSDpf _1kqFz">
                          <div class="_36R48 _3KNOZ">
                            <input id="newusername" name="newusername" value="<?= $user->username ?>" type="text" data-length="30" class="_1kqFz _1tBU4 _1YUah _2fCo5 _21QBy" />
                            <span data-error="" data-success="" class="_3jmDY"></span>
                          </div>
                        </div>
                        <div class="_32Qas _1kqFz">
                          <button data-toggle="modal" data-target="#confirmModal" type="submit" class="USCBs _2XuUU _15buw _1kqFz">
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
                    this:this})" class="USCBs _2XuUU _1kqFz _2KdlA">Edit
                    </button>
                    <button type="button" onclick="noneBlock({
                  this:this})" class="USCBs _2XuUU _1kqFz rCKpP">
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
                      <?= $user->email != null ? $user->email : 'NULL' ?><small class="<?= $user->role == 'unverified' ? 'UG45_' : '_21QBy' ?> _282Xl"><?= $user->role == 'unverified' ? '(unverified)' : '(verified)' ?></small>
                    </strong>
                    <form method="POST" id="newemailForm" onsubmit="changeForm({this:this,event:event,link:'<?= LINK ?>/members/account/email',method:'PUT'})" class="rCKpP">
                      <div class="SiBSM _36R48 RogPM _3MkHC">
                        <div class="SSDpf _1kqFz">
                          <div class="_36R48 _3KNOZ">
                            <input id="newemail" name="newemail" value="<?= $user->email ?>" type="email" data-length="30" class="_1kqFz _1tBU4 _1YUah _2fCo5 _21QBy" />
                            <span data-error="" data-success="" class="_3jmDY"></span>
                          </div>
                        </div>
                        <div class="_32Qas _1kqFz">
                          <button data-toggle="modal" data-target="#confirmModal" type="submit" class="USCBs _2XuUU _15buw _1kqFz">
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
                    this:this})" class="USCBs _2XuUU _1kqFz _2KdlA">Edit
                    </button>
                    <button type="button" onclick="noneBlock({
                  this:this})" class="USCBs _2XuUU _1kqFz rCKpP">
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
                    <button type="button" data-toggle="modal" data-target="#confirmPassModal" class="USCBs _2XuUU _2lx-7 _1kqFz _2KdlA">Edit
                    </button>
                  </td>
                </tr>
              </table>
            </div>
            <div class="SiBSM">
              <h3 class="zCP3X _34J9b">Connected Accounts</h3>
              <div class="_3zrDI _14WVS">
                <h5><strong>Google+</strong></h5>
                <small>You can log in to <span class="_3BjGC"><?= APP_NAME ?></span> with Google+</small>
              </div>
              <div class="_24icR _14WVS">
                <?php if (json_decode($user->other, true)['googleId'] != null) { ?>
                  <form method="POST" id="dcGplusForm">
                    <button type="button" class="USCBs RogPM _1x8PB">(disconnect)</button>
                  </form>
                <?php } else { ?>
                  <!-- Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a> -->
                  <a href="<?= LINK ?>/auth/gplus" class="USCBs _2iS7c _3phrn zCP3X _1wHD0 _1uVtA _2N7Mo _2h8rF">
                    <small><b>Connect to</b></small>
                    <svg width="16" height="16" fill="currentColor" class="_23PWi">
                      <use xlink:href="<?= ROOT ?>/assets/svg/google.svg#Layer_1" />
                    </svg>
                  </a>
                <?php } ?>
              </div>
              <hr class="_3ZWkC" />
            </div>
          </div>
        </div>
        <div class="SiBSM">
          <div class="_1bEqb">
            <h3 class="zCP3X">Danger zone</h3>
            <h6 class="_34J9b">Irreversible and destructive actions</h6>
          </div>
          <div class="_1bEqb _20qFt">
            <div class="_3zcKU _2W81z _3VdNp _14WVS">
              <div class="BI-8i _2rGfb lJhPB">Delete user</div>
              <div class="xilMu">
                <h5 class="_15Jmj">Be Careful</h5>
                <p class="zEqNx">Once you delete your user, there is no going back. Please be certain.</p>
                <button data-toggle="modal" data-target="#dropAccountModal" class="_2HPko _2rGfb">Delete
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