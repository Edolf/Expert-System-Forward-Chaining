<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div id="app" class="Brylan_497">
  <?php include VIEW_DIR . "/layouts/navbar.php"; ?>
  <div class="Karlee_636 Zephyr_231 Micaiah_457">
    <div class="Karlee_303 Annaleah_193 Brylan_497">
      <div class="Aylin_367">
      </div>
    </div>

    <div class="Karlee_636 Zephyr_231 Micaiah_457">

      <div class="Karlee_303 Emmarose_194 Brantly_247">
        <div class="Yovani_551">
          <div class="Calen_148 Aren_140">
            <div class="Alisa_321 Jermani_171">
              <div class="Calen_148">
                <?php foreach ($expertsystems::findAll() as $key => $ExpertSystem) : ?>
                  <div id="<?= preg_replace('/\s+/', '_', $ExpertSystem['problem']) ?>" class="Finlay_320 Jermani_171">
                    <div style="width: 18rem" class="Zaydee_150 Faizan_466 Lili_335">
                      <div class="Rory_340">
                        <h4 class="Brileigh_396 Annaleah_193 Isabella_429"><b><?= $ExpertSystem['problem'] ?></b></h4>
                        <p class="Harmonie_363 Isabella_429"><?= $ExpertSystem['desc'] ?></p>
                        <a href="<?= LINK ?>/consultation/<?= $ExpertSystem['id'] ?>" class="Zakai_128 Zeppelin_413 Isabella_429">Try This One</a>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
            <div class="Ann_319">
              <?php include VIEW_DIR . "/nurse.php"; ?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <?php include VIEW_DIR . "/layouts/footbar.php"; ?>
</div>

<?php include VIEW_DIR . "/auths/authmodal.php"; ?>
<?php include VIEW_DIR . "/auths/forgot/forgotmodal.php"; ?>
<?php include VIEW_DIR . "/auths/verify/verifymodal.php"; ?>
<?php include VIEW_DIR . "/auths/logoutmodal.php"; ?>
<?php include VIEW_DIR . "/layouts/gotop.php"; ?>
<?php include VIEW_DIR . "/layouts/footer.php"; ?>