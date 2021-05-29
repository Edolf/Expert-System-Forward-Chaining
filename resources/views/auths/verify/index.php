<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div id="app" class="bg-background">
  <?php include VIEW_DIR . "/layouts/navbar.php"; ?>
  <div class="content-wrapper d-flex flex-column">
    <div class="content my-4 bg-background">
      <div class="container">
      </div>
    </div>
    <div class="content my-4 bg-background px-md-5 pb-5 pt-0">
      <div class="container-fluid my-5 px-5">
        <div class="card bg-card text-center">
          <div class="card-body py-5">
            <h3 class="card-title">Congratulations</h3>
            <p class="card-text">Your Email <%= email %> Has Been Verified</p>
          </div>
          <div class="card-footer text-muted bg-card">
            <a href="<?= LINK ?>/" class="btn bg-primary">&larr; Back to
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