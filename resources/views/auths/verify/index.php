<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div id="app" class="_2fCJU">
  <?php include VIEW_DIR . "/layouts/navbar.php"; ?>
  <div class="_3hy0- _1wHD0 _6Eppu">
    <div class="_24Rxj _3H4vP _2fCJU">
      <div class="_16ASu">
      </div>
    </div>
    <div class="_24Rxj _3H4vP _2fCJU iJDxc _2HYhx cd6iS">
      <div class="_321tY KTZ2J _3TCQr">
        <div class="_3zcKU _2W81z RogPM">
          <div class="xilMu _32W6N">
            <h3 class="_15Jmj">Congratulations</h3>
            <p class="zEqNx">Your Email <%= email %> Has Been Verified</p>
          </div>
          <div class="_2O4o7 _33nLS _2W81z">
            <a href="<?= LINK ?>/" class="_2HPko vhjC9">&larr; Back to
              Timeline</a>
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