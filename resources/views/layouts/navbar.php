<nav class="Lucero_238 Briggs_621 Rush_424 Lili_335 Cloe_Ophelia_466 Cali_Queenie_430 Khalil_252 Everardo_367 Kaylah_250">
  <div class="Yovani_551 Zelie_201">
    <button type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation" role="switch" class="Olivia_315 Eva_562 Judah_300 Zephyr_231 Channing_337 Alecia_131 Janeth_450 Waverley_Anne_412">
      <span></span>
      <span></span>
      <span></span>
    </button>

    <a href="<?= LINK ?>/" class="Shlomo_457 Ariana_Dora_191 Aylee_306 Zephyr_231 Waverley_Anne_412 Kenner_297"><?= APP_NAME ?></a>
    <div class="Marcelina_563 Jana_232 Kyrin_368"></div>
    <div id="navbarContent" class="Abriella_323 Lamiyah_589 Lili_335 Kenner_297">
      <div class="Calen_148 Aurora_187 Anyiah_194 Lebron_195 Channing_337">
        <div class="Amyrah_215 Zephyr_231 Preston_343">
          <h5 class="William_145 Raena_142 Kayla_438 Ariana_Dora_191"><?= APP_NAME ?></h5>
        </div>
        <div class="Amyrah_215 Harriet_412">
          <div>
            <?php include ROOT_DIR . "/resources/views/members/users/usertoggle.php"; ?>
          </div>
        </div>
      </div>
      <ul class="Abran_399 Judah_300">
        <?php if (!empty($navbars)) : ?>
          <?php foreach ($navbars as $key => $value) : ?>
            <li class="Jackelyn_324">
              <a href="<?= LINK ?><?= $value['url'] ?>" aria-current="page" class="Halo_323 Safwan_346"><?= $value['name'] ?></a>
            </li>
          <?php endforeach; ?>
        <?php endif; ?>
      </ul>
      <div class="Abran_399">
        <div class="Jackelyn_324">
          <button type="button" data-target="categories" data-cover-trigger="false" class="Halo_323 Safwan_346 Olivia_315 Scottlyn_277 Echo_Brodie_673">
            Category
          </button>
          <ul id="categories" class="Kepler_680 Jaedon_572">
            <?php if (!empty($categories)) : ?>
              <?php foreach ($categories as $key => $value) : ?>
                <li><a href="<?= LINK ?><?= $value['url'] ?>" class="Karsyn_610"><small><b><?= $value['name'] ?></b></small></a></li>
              <?php endforeach; ?>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </div>
    <form method="POST" action="" class="Regan_617 Habiba_294 Meagan_Ivana_468">
      <?php include ROOT_DIR . "/resources/views/layouts/search.php"; ?>
    </form>
    <div class="Marcelina_563 Jana_232 Kyrin_368"></div>
    <div class="Jana_232 Kyrin_368">
      <?php include ROOT_DIR . "/resources/views/members/users/usertoggle.php"; ?>
    </div>
  </div>
</nav>