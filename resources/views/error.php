<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div id="app" class="Brylan_497">
  <?php include VIEW_DIR . "/layouts/navbar.php"; ?>
  <div class="Karlee_636 Zephyr_231 Micaiah_457">
    <div class="Karlee_303 Annaleah_193 Brylan_497">
      <div class="Aylin_367">
      </div>
    </div>
    <div class="Karlee_303 Annaleah_193">
      <div class="Haydee_599 Emmarose_194">
        <div class="Faizan_466 Romy_293 Amelie_298 Kendon_195 Xochitl_197 Brooke_245 Brantly_247">
          <div data-text="<?= $error['status'] ?? 404 ?>" class="Mauro_226 Aylee_306"><?= $error['status'] ?? 404 ?>
          </div>
          <div class="Jayvon_146 Faizan_466 Jermani_171">
            <span><svg width="16" height="16" fill="currentColor">
                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#bug-fill" />
              </svg> <?= $error['message'] ?></span>
          </div>
          <div class="Asmaa_380">
            <pre class="Aalyah_176"><?= $error['stack'] ?></pre>
          </div>
          <a href="<?= LINK ?>/" class="Zakai_128 Zeppelin_413 Isabella_429 Jewels_189">&larr; Back to Timeline</a>
          <?php if (!$error['stack']) : ?>
            <div class="Karlee_303 Aren_140"></div>
            <div class="Karlee_303 Aren_140"></div>
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