<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div id="app" class="_2fCJU">
  <?php include VIEW_DIR . "/layouts/navbar.php"; ?>
  <div class="_3hy0- _1wHD0 _6Eppu">
    <div class="_24Rxj _3H4vP _2fCJU">
      <div class="_16ASu">
      </div>
    </div>

    <div class="_24Rxj _3H4vP">
      <div class="_321tY KTZ2J">
        <div class="RogPM _1_acL _3XE-8 _3V3Do _32W6N _9z3Wc _2W81z">
          <div data-text="<?= $error['status'] ?? 404 ?>" class="_1dBmu _32J_2"><?= $error['status'] ?? 404 ?>
          </div>
          <div class="_1EF4I RogPM _34J9b">
            <span><svg width="16" height="16" fill="currentColor">
                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#bug-fill" />
              </svg> <?= $error['message'] ?></span>
          </div>
          <div class="_13NC0">
            <pre class="_1aegJ"><?= $error['stack'] ?></pre>
          </div>
          <a href="<?= LINK ?>/" class="_2HPko vhjC9 lJhPB _1sNoa">&larr; Back to Timeline</a>
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