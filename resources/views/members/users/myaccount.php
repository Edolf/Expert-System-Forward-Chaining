<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="wrapper">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="content-wrapper d-flex flex-column bg-background">
    <div class="content mb-4">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="container p-5">
        <div class="row mb-5">
          <div class="offset-md-1">
            <h3 class="text-dark">Profile</h3>
            <h6 class="mb-4">Your personal information</h6>
          </div>
          <div class="offset-md-1 col-md-3 pr-md-5">
            <h3 class="text-dark mb-4">Profile Picture</h3>
            <div class="user-profile w-100 img-thumbnail mb-3" style="background-image: url('<?= $user->image ? 'data:image/jpg/jpeg/png/bmp;base64,' . $user->image : '' ?>');">
            </div>
            <form id="pictUploadForm" method="POST" action="<?= LINK ?>/members/account/upload?_csrf=<?= $csrfToken ?>&_method=PUT" enctype="multipart/form-data">
              <div class="row input-field ai-center">
                <div class="col-9">
                  <div class="file-field input-field">
                    <input type="file" name="userprofile" id="userprofile" multiple>
                    <div class="file-path-wrapper">
                      <input type="text" class="file-path validate text-theme text-truncate" class="<?= $flash->getFlash('upload')['class'] ?? ''  ?>" placeholder="<?= $flash->getFlash('upload')['message'][0]['msg'] ?? 'Click Here to Change' ?>" value="<?= $flash->getFlash('upload')['message'][0]['msg'] ?? 'Click Here to Change' ?>">
                    </div>
                  </div>
                </div>
                <div class="col-3" style="z-index: 3">
                  <button type="submit" class="btn bg-primary">
                    <svg class="text-light" width="24" height="24" fill="currentColor">
                      <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#upload" />
                    </svg>
                  </button>
                </div>
              </div>
              <div class="text-center my-5 my-md-0">
                <small><i>Image size: Max. 300 KB | Format: [.jpg .jpeg .png .bmp]</i></small>
              </div>
            </form>
          </div>
          <div class="offset-md-1 col-md-5">
            <div class="row mb-5">
              <h3 class="text-dark mb-4">Basic Information</h3>
              <table class="table table-hover">
                <tr>
                  <td scope="col">Full Name</td>
                  <td scope="col">
                    <strong><?= $user->name ?></strong>
                    <form method="POST" id="newfullnameForm" class="d-none" onsubmit="changeForm({this:this,event:event,link:'<?= LINK ?>/members/account/name',method:'PUT'})">
                      <div class="row input-field text-center m-0">
                        <div class="col-10 p-0">
                          <div class="input-field my-0">
                            <input id="newfullname" name="newfullname" value="<?= $user->name ?>" default="Null" type="text" class="p-0 mt-0 mx-0 validate text-success" data-length="30">
                            <span class="helper-text" data-error="" data-success=""></span>
                          </div>
                        </div>
                        <div class="col-2 p-0">
                          <button data-toggle="modal" data-target="#confirmModal" type="submit" class="btn-flat text-theme loading p-0">
                            <svg width="24" height="24" fill="currentColor">
                              <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#check" />
                            </svg>
                          </button>
                        </div>
                      </div>
                    </form>
                  </td>
                  <td scope="col">
                    <button class="btn-flat text-theme p-0 p-static" type="button" onclick="noneBlock({
                  this:this})">Edit
                    </button>
                    <button type="button" class="btn-flat text-theme p-0 d-none" onclick="noneBlock({
                  this:this})">
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
                    <form method="POST" id="newusernameForm" class="d-none" onsubmit="changeForm({this:this,event:event,link:'<?= LINK ?>/members/account/username',method:'PUT'})">
                      <div class="row input-field text-center m-0">
                        <div class="col-10 p-0">
                          <div class="input-field my-0">
                            <input id="newusername" name="newusername" value="<?= $user->username ?>" type="text" class="p-0 mt-0 mx-0 validate text-success" data-length="30">
                            <span class="helper-text" data-error="" data-success=""></span>
                          </div>
                        </div>
                        <div class="col-2 p-0">
                          <button data-toggle="modal" data-target="#confirmModal" type="submit" class="btn-flat text-theme loading p-0">
                            <svg width="24" height="24" fill="currentColor">
                              <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#check" />
                            </svg>
                          </button>
                        </div>
                      </div>
                    </form>
                  </td>
                  <td scope="col">
                    <button class="btn-flat text-theme p-0 p-static" type="button" onclick="noneBlock({
                    this:this})">Edit
                    </button>
                    <button type="button" class="btn-flat text-theme p-0 d-none" onclick="noneBlock({
                  this:this})">
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
                      <?= $user->email != null ? $user->email : 'NULL' ?><small class="ml-3" class="<?= $user->role == 'unverified' ? 'Dariah_515' : 'Amen_518' ?>"><?= $user->role == 'unverified' ? '(unverified)' : '(verified)' ?></small>
                    </strong>
                    <form method="POST" id="newemailForm" class="d-none" onsubmit="changeForm({this:this,event:event,link:'<?= LINK ?>/members/account/email',method:'PUT'})">
                      <div class="row input-field text-center m-0">
                        <div class="col-10 p-0">
                          <div class="input-field my-0">
                            <input id="newemail" name="newemail" value="<?= $user->email ?>" type="email" class="p-0 mt-0 mx-0 validate text-success" data-length="30">
                            <span class="helper-text" data-error="" data-success=""></span>
                          </div>
                        </div>
                        <div class="col-2 p-0">
                          <button data-toggle="modal" data-target="#confirmModal" type="submit" class="btn-flat text-theme loading p-0">
                            <svg width="24" height="24" fill="currentColor">
                              <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#check" />
                            </svg>
                          </button>
                        </div>
                      </div>
                    </form>
                  </td>
                  <td scope="col">
                    <button data-name="email" data-value="<?= $user->email ?>" class="btn-flat text-theme p-0 p-static" type="button" onclick="noneBlock({
                    this:this})">Edit
                    </button>
                    <button type="button" class="btn-flat text-theme p-0 d-none" onclick="noneBlock({
                  this:this})">
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
                    <button class="btn-flat text-theme shadow-none p-0 p-static" type="button" data-toggle="modal" data-target="#confirmPassModal">Edit
                    </button>
                  </td>
                </tr>
              </table>
            </div>
            <div class="row">
              <h3 class="text-dark mb-5">Connected Accounts</h3>
              <div class="col-8 mb-3">
                <h5><strong>Google+</strong></h5>
                <small>You can log in to <span class="brand"><?= APP_NAME ?></span> with Google+</small>
              </div>
              <div class="col-4 mb-3">
                <?php if (json_decode($user->other, true)['googleId'] != null) { ?>
                  <form method="POST" id="dcGplusForm">
                    <button type="button" class="btn-flat text-center text-danger">(disconnect)</button>
                  </form>
                <?php } else { ?>
                  <!-- Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a> -->
                  <a href="<?= LINK ?>/auth/gplus" class="btn-flat bg-white shadow-sm text-dark d-flex ai-center px-3 text-decor-none">
                    <small><b>Connect to</b></small>
                    <svg class="ml-2" width="16" height="16" fill="currentColor">
                      <use xlink:href="<?= ROOT ?>/assets/svg/google.svg#Layer_1" />
                    </svg>
                  </a>
                <?php } ?>
              </div>
              <hr class="bb-light">
            </div>
          </div>
        </div>
        <div class="row ">
          <div class="offset-md-1">
            <h3 class="text-dark">Danger zone</h3>
            <h6 class="mb-5">Irreversible and destructive actions</h6>
          </div>
          <div class="offset-md-1 col-md-9">
            <div class="card bg-card bb-danger mb-3">
              <div class="card-header bg-danger text-light">Delete user</div>
              <div class="card-body">
                <h5 class="card-title">Be Careful</h5>
                <p class="card-text">Once you delete your user, there is no going back. Please be certain.</p>
                <button class="btn bg-danger" data-toggle="modal" data-target="#dropAccountModal">Delete
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