<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div id="app" class="Brylan_497">
  <?php include VIEW_DIR . "/layouts/navbar.php"; ?>
  <div class="Karlee_636 Zephyr_231 Micaiah_457">
    <div class="Karlee_303 Annaleah_193 Brylan_497">
      <div class="Aylin_367">
      </div>
    </div>
    <div class="Karlee_303 Annaleah_193">
      <div class="Aylin_367 Emmarose_194">
        <div class="Calen_148 Safwan_346">
          <div class="Ann_319 Aamira_138 Xochitl_197 Brooke_245 Brantly_247 Bruce_417">
            <div class="Zephyr_231 Safwan_346">
              <h5 class="Faizan_466">Please Renew Your <strong>Password</strong></h5>
            </div>
            <form method="POST" id="resetForm" onsubmit="sulaiForm({this:this,event:event,link:'<?= LINK ?>/auth/forgot/reset?signature=<?= $signature ?>&token=<?= $token ?>&_method=PUT',method:'POST'})" class="Aren_140">
              <div class="Mariano_448 Mckenzie_188">
                <input id="newpassword" name="newpassword" type="password" class="Amen_518 Simcha_314" />
                <label for="newpassword">New Password</label>
                <span data-error="" data-success="" class="Adeleine_465"></span>
              </div>
              <div class="Mariano_448 Mckenzie_188">
                <input id="confirmpassword" name="confirmpassword" type="password" class="Amen_518 Simcha_314" />
                <label for="confirmpassword">Confirm Password</label>
                <span data-error="" data-success="" class="Adeleine_465"></span>
              </div>
              <div class="Calen_148 Zephyr_231 Safwan_346 Jewels_189">
                <div class="Gaston_216">
                  <button type="submit" class="Zakai_128 Paris_402 Kayla_438 Imelda_Katharine_347 Zephyr_231 Preston_343 Safwan_346">
                    <span style="width: 1rem; height: 1rem" role="status" class="Zayne_577 Annsley_184 Jana_232"></span>
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