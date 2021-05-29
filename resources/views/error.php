<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div id="app" class="bg-background">
  <?php include VIEW_DIR . "/layouts/navbar.php"; ?>
  <div class="content-wrapper d-flex flex-column">
    <div class="content my-4 bg-background">
      <div class="container">
      </div>
    </div>
    <div class="content my-4">
      <div class="container-fluid my-5">
        <div class="text-center rounded mx-md-5 px-4 py-5 p-md-5 bg-card">
          <div class="error mx-auto" data-text="<?= $error['status'] ?? 404 ?>"><?= $error['status'] ?? 404 ?>
          </div>
          <div class="lead text-center mb-5">
            <span><svg width="16" height="16" fill="currentColor">
                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#bug-fill" />
              </svg> <?= $error['message'] ?></span>
          </div>
          <div class="text-left">
            <pre class="mb-0"><?= $error['stack'] ?></pre>
          </div>
          <a href="<?= LINK ?>/" class="btn bg-primary text-light mt-5">&larr; Back to Timeline</a>
          <?php if (!$error['stack']) : ?>
            <div class="content p-5"></div>
            <div class="content p-5"></div>
          <?php endif; ?>
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