<nav style="align-content: center" class="Lucero_238 Briggs_621 Rush_424 Lili_335 Khalil_252 Kaylah_250">
  <div class="Evren_495">

    <div class="Zephyr_231 Waverley_Anne_412">
      <button class="Zakai_128 Olivia_315 Kepler_480 Sumayyah_489 Kayla_438 Zephyr_231 Preston_343 Safwan_346">
        <svg width="24" height="24" fill="currentColor" class="Atalia_258">
          <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#list" />
        </svg>
      </button>
    </div>

    <?php if ($expertsystems && ($title !== 'Tester Consultation') && ($title !== 'List Users')) {
      switch ($user->role) {
        case 'admin':
        case 'doctor': ?>
          <div class="Shilah_250 Abran_399 Zephyr_231 Waverley_Anne_412">
            <ul class="Amirah_Nanette_166 William_145 Lili_335">
              <?php foreach ($expertsystems::findAll() as $key => $ExpertSystem) : ?>
                <li class="Jackelyn_324 Jedidiah_115"><a href="#<?= preg_replace('/\s+/', '_', $ExpertSystem['problem']) ?>" class="Halo_323"><?= $ExpertSystem['problem'] ?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php break;
        case 'member': ?>

    <?php break;
      }
    } ?>

    <form method="POST" action="" class="Regan_617 Habiba_294 Meagan_Ivana_468">
      <?php include ROOT_DIR . "/resources/views/layouts/search.php"; ?>
    </form>

    <div class="Marcelina_563 Zephyr_231 Waverley_Anne_412"></div>
    <div class="Zephyr_231 Waverley_Anne_412">
      <?php include ROOT_DIR . "/resources/views/members/users/usertoggle.php"; ?>
    </div>
  </div>
</nav>