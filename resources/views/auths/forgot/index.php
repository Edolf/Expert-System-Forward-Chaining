<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div id="app" class="vSOIt">
  <?php include VIEW_DIR . "/layouts/navbar.php"; ?>
  <div class="_2h7iG _1dTWr _3oq1Z">
    <div class="F2040 TidTZ vSOIt">
      <div class="_22DlN">
      </div>
    </div>
    <div class="F2040 TidTZ">
      <div class="_22DlN _3pDOt">
        <div class="_3Sail _3x-l5">
          <div class="_3HVzZ _27IzI _2DN6r _3ur6_ s0VLt _2du30">
            <div class="_1dTWr _3x-l5">
              <h5 class="_3znGg">Please Renew Your <strong>Password</strong></h5>
            </div>
            <form method="POST" id="resetForm" onsubmit="sulaiForm({this:this,event:event,link:'<?= LINK ?>/auth/forgot/reset?signature=<?= $signature ?>&token=<?= $token ?>&_method=PUT',method:'POST'})" class="_3PDUl">
              <div class="_2E95Y riVBJ">
                <input id="newpassword" name="newpassword" type="password" class="_1y8Oi _1GV_i" />
                <label for="newpassword">New Password</label>
                <span data-error="" data-success="" class="_25Y7w"></span>
              </div>
              <div class="_2E95Y riVBJ">
                <input id="confirmpassword" name="confirmpassword" type="password" class="_1y8Oi _1GV_i" />
                <label for="confirmpassword">Confirm Password</label>
                <span data-error="" data-success="" class="_25Y7w"></span>
              </div>
              <div class="_3Sail _1dTWr _3x-l5 _1vA3K">
                <div class="_-1QSV">
                  <button type="submit" class="_2niE6 _222Gi _1kTcN _1P4IV _1dTWr _2kea1 _3x-l5">
                    <span style="width: 1rem; height: 1rem" role="status" class="_8sneY _2f2YP _14vxW"></span>
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