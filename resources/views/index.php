<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div id="app" class="Brylan_497">
  <?php include VIEW_DIR . "/layouts/navbar.php"; ?>
  <div class="Karlee_636 Zephyr_231 Micaiah_457">
    <div class="Karlee_303 Annaleah_193 Brylan_497">
      <div class="Aylin_367">
      </div>
    </div>

    <div class="Karlee_636 Zephyr_231 Micaiah_457">
      <div class="Karlee_303 Tayler_170 Jewels_189 Brantly_247">
        <div class="Yovani_551">
          <div class="Calen_148 Aren_140">
            <div class="Alisa_321 Jermani_171">
              <h1 class="Mykel_383 Ariana_Dora_191">Lorem Ipsum</h1>
              <h4 class="Tayler_170">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil totam repudiandae sunt. Quo unde
                iste
                voluptates vero earum nesciunt autem laboriosam voluptatem a voluptatibus? Nobis fuga quia quidem. Ea, autem.
              </h4>
              <?php if ($user) : ?>
                <a href="<?= LINK ?>/consultation" style="max-width: fit-content" class="Zephyr_231 Preston_343 Kepler_347 Zeppelin_413 Lamonte_490 Isabella_429">
                  <h4 class="William_145 Raena_142"><strong class="Dariah_515">Start Consultation</strong></h4>
                </a>
              <?php else : ?>
                <button type="button" data-toggle="modal" data-target="#authModal" class="Kepler_347 Zeppelin_413 Lamonte_490 Isabella_429">
                  <h4 class="William_145 Raena_142"><strong class="Dariah_515">Get Started</strong></h4>
                </button>
              <?php endif; ?>
            </div>
            <div class="Ann_319">
              <?php include VIEW_DIR . "/nurse.php"; ?>
            </div>
          </div>
        </div>
      </div>

      <div class="Karlee_303 Annaleah_193 Brylan_497">
        <div class="Yovani_551">
          <div class="Calen_148 Aren_140">
            <div class="Sufyan_297 Montana_404 Aren_140 Faizan_466">
              <h1 class="Jenelle_387 Ariana_Dora_191">About Us</h1>
              <h4 class="Tayler_170">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil totam repudiandae sunt. Quo unde
                iste
                voluptates vero earum nesciunt autem laboriosam voluptatem a voluptatibus? Nobis fuga quia quidem. Ea, autem.
              </h4>
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