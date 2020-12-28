<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div id="app" class="vSOIt">
  <?php include VIEW_DIR . "/layouts/navbar.php"; ?>
  <div class="_2h7iG _1dTWr _3oq1Z">
    <div class="F2040 TidTZ vSOIt">
      <div class="_22DlN">
      </div>
    </div>
    <div class="F2040 TidTZ vSOIt mFoGj o6VYZ _37akz">
      <div class="_2yRov _3pDOt _1jkJg">
        <div class="_1aMCn s0VLt _3znGg">
          <div class="_199pu _2DN6r">
            <h3 class="_3oNh9">Congratulations</h3>
            <p class="e2Sjh">Your Email <%= email %> Has Been Verified</p>
          </div>
          <div class="_2xrM7 _1jl8t s0VLt">
            <a href="<?= LINK ?>/" class="_2niE6 Bdn6B">&larr; Back to
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