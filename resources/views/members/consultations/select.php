<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="Avalyn_309">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="Karlee_636 Zephyr_231 Micaiah_457 Brylan_497">
    <div class="Karlee_303 Tayler_170">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="Aylin_367 Aren_140">
        <div class="Calen_148 Jermani_171">

          <div class="Zephyr_231 Preston_343 Zhuri_391 Annaleah_193">
            <h1 class="Wilfredo_102 Aalyah_176"><?= $title ?></h1>
          </div>

          <?php foreach ($expertsystems::findAll() as $key => $ExpertSystem) : ?>
            <div style="width: 18rem" class="Zaydee_150 Faizan_466 Brantly_247 Terron_136">
              <div style="height: 23rem" class="Rory_340">
                <h4 class="Brileigh_396 Annaleah_193"><b><?= $ExpertSystem['problem'] ?></b></h4>
                <div class="Renata_565 Jarred_201">
                  <p class="Harmonie_363"><?= $ExpertSystem['desc'] ?></p>
                </div>
                <a href="<?= LINK ?>/members/consultation/<?= $ExpertSystem['id'] ?>" class="Zakai_128 Zeppelin_413 Isabella_429 Annaleah_193">Try This One</a>
              </div>
            </div>
          <?php endforeach; ?>

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