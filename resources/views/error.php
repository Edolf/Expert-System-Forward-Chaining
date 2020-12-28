<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div id="app" class="vSOIt">
  <?php include VIEW_DIR . "/layouts/navbar.php"; ?>
  <div class="_2h7iG _1dTWr _3oq1Z">
    <div class="F2040 TidTZ vSOIt">
      <div class="_22DlN">
      </div>
    </div>

    <div class="F2040 TidTZ">
      <div class="_2yRov _3pDOt">
        <div class="_3znGg _3jFF_ _3yKo2 _3R3Fe _2DN6r _3ur6_ s0VLt">
          <div data-text="<?= $error['status'] ?? 404 ?>" class="_3EmbM _23T99"><?= $error['status'] ?? 404 ?>
          </div>
          <div class="_3VSyI _3znGg gqtmr">
            <span><svg width="16" height="16" fill="currentColor">
                <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#bug-fill" /></svg> <?= $error['message'] ?></span>
          </div>
          <div class="Oi41b">
            <pre class="_2gyiY"><?= $error['stack'] ?></pre>
          </div>
          <a href="<?= LINK ?>/" class="_2niE6 Bdn6B _1dYc3 _1vA3K">&larr; Back to Timeline</a>
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