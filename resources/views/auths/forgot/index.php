<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div id="app" class="bg-background">
  <?php include VIEW_DIR . "/layouts/navbar.php"; ?>
  <div class="content-wrapper d-flex flex-column">
    <div class="content my-4 bg-background">
      <div class="container">
      </div>
    </div>
    <div class="content my-4">
      <div class="container my-5">
        <div class="row jc-center">
          <div class="col-md-5 p-3 py-5 p-md-5 bg-card rounded-sm">
            <div class="d-flex jc-center">
              <h5 class="text-center">Please Renew Your <strong>Password</strong></h5>
            </div>
            <form method="POST" id="resetForm" onsubmit="sulaiForm({this:this,event:event,link:'<?= LINK ?>/auth/forgot/reset?signature=<?= $signature ?>&token=<?= $token ?>&_method=PUT',method:'POST'})" class="p-5">
              <div class="input-field mt-4">
                <input id="newpassword" name="newpassword" type="password" class="text-success validate">
                <label for="newpassword">New Password</label>
                <span class="helper-text" data-error="" data-success=""></span>
              </div>
              <div class="input-field mt-4">
                <input id="confirmpassword" name="confirmpassword" type="password" class="text-success validate">
                <label for="confirmpassword">Confirm Password</label>
                <span class="helper-text" data-error="" data-success=""></span>
              </div>
              <div class="row d-flex jc-center mt-5">
                <div class="col-7">
                  <button type="submit" class="btn bg-success text-white btn-block d-flex ai-center jc-center">
                    <span class="spinner-border mr-2 d-none" style="width: 1rem; height: 1rem;" role="status"></span>
                    <span>Reset Password</span>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php include VIEW_DIR . "/layouts/footbar.php"; ?>
  </div>
</div>
<?php include VIEW_DIR . "/auths/authmodal.php"; ?>
<?php include VIEW_DIR . "/auths/forgot/forgotmodal.php"; ?>
<?php include VIEW_DIR . "/auths/verify/verifymodal.php"; ?>
<?php include VIEW_DIR . "/auths/logoutmodal.php"; ?>
<?php include VIEW_DIR . "/layouts/gotop.php"; ?>
<?php include VIEW_DIR . "/layouts/footer.php"; ?>