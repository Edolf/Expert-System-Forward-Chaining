<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div id="app" class="_2fCJU">
  <?php include VIEW_DIR . "/layouts/navbar.php"; ?>
  <div class="_3hy0- _1wHD0 _6Eppu">
    <div class="_24Rxj _3H4vP _2fCJU">
      <div class="_16ASu">
      </div>
    </div>
    <div class="_24Rxj _3H4vP">
      <div class="_16ASu KTZ2J">
        <div class="SiBSM _3Yl2j">
          <div class="_2IUtP _30EOh _32W6N _9z3Wc _2W81z D-vG5">
            <div class="_1wHD0 _3Yl2j">
              <h5 class="RogPM">Please Renew Your <strong>Password</strong></h5>
            </div>
            <form method="POST" id="resetForm" onsubmit="sulaiForm({this:this,event:event,link:'<?= LINK ?>/auth/forgot/reset?signature=<?= $signature ?>&token=<?= $token ?>&_method=PUT',method:'POST'})" class="_1FnTW">
              <div class="_36R48 DLDJz">
                <input id="newpassword" name="newpassword" type="password" class="_21QBy _2fCo5" />
                <label for="newpassword">New Password</label>
                <span data-error="" data-success="" class="_3jmDY"></span>
              </div>
              <div class="_36R48 DLDJz">
                <input id="confirmpassword" name="confirmpassword" type="password" class="_21QBy _2fCo5" />
                <label for="confirmpassword">Confirm Password</label>
                <span data-error="" data-success="" class="_3jmDY"></span>
              </div>
              <div class="SiBSM _1wHD0 _3Yl2j _1sNoa">
                <div class="_1SQGt">
                  <button type="submit" class="_2HPko _3-WY3 _1kT0z _3LEsR _1wHD0 _1uVtA _3Yl2j">
                    <span style="width: 1rem; height: 1rem" role="status" class="_2_2xs _2uMGw rCKpP"></span>
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