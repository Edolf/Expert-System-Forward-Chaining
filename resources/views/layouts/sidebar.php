<?php

use app\models\Menu;
use app\models\SubMenu;
use app\models\CollapseMenu;

?>

<nav class="Rush_424 Weslyn_270 Khadija_371 Cali_Queenie_430 Ashten_350">
  <ul id="accordionSidebar" class="Abran_399">

    <a href="<?= LINK ?>" class="Malky_489 Zephyr_231 Preston_343 Safwan_346">
      <h4 class="Shlomo_457 Ariana_Dora_191 Kerrington_563 William_145 Raena_142"><?= APP_NAME ?></h4>
    </a>
    <hr class="Aneesh_577" />

    <?php $sideCollapse = 0; ?>
    <?php foreach (Menu::findAll(['isActive' => 1]) as $key => $menu) : ?>
      <?php if (in_array($user->role, json_decode($menu['other'], true)['access'])) : ?>
        <div class="Weslyn_554"><?= $menu['menu'] ?></div>
        <?php foreach (SubMenu::findAll([SubMenu::AND(['menuId' => $menu['id'], 'isActive' => 1])]) as $key => $submenu) : ?>
          <?php if (in_array($user->role, json_decode($submenu['other'], true)['access'])) : ?>
            <li class="<?= $title == $submenu['title'] ? 'Elyzabeth_240' : '' ?>  Jackelyn_324">
              <?php foreach (CollapseMenu::findAll([CollapseMenu::AND(['subMenuId' => $submenu['id'], 'isActive' => 1])]) as $key => $collapsemenu) : ?>
                <?php if (in_array($user->role, json_decode($collapsemenu['other'], true)['access'])) : ?>
                  <?php if ($sideCollapse == 0) : ?>
                    <a href="#" data-toggle="collapse" data-target="#collapse<?= $submenu['id'] ?>" aria-expanded="true" aria-controls="collapse<?= $submenu['id'] ?>" class="Halo_323 Melannie_193 Cayson_355">
                      <svg width="16" height="16" fill="currentColor" class="Atalia_258">
                        <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#<?= $submenu['icon'] ?>" />
                      </svg>
                      <span><?= $submenu['title'] ?></span>
                    </a>
                    <div id="collapse<?= $submenu['id'] ?>" aria-labelledby="heading<?= $submenu['id'] ?>" data-parent="#accordionSidebar" class="Abriella_323">
                      <div class="Cathryn_314 Efraim_194 Maja_563 Romy_293">
                        <h6 class="Connie_572"><?= $submenu['title'] ?> :</h6>
                        <?php foreach (CollapseMenu::findAll([CollapseMenu::AND(['subMenuId' => $submenu['id'], 'isActive' => 1])]) as $key => $collapsemenu) : ?>
                          <?php if (in_array($user->role, json_decode($collapsemenu['other'], true)['access'])) : ?>
                            <a href="<?= LINK ?><?= $collapsemenu['url'] ?>" class="Hansel_522"><?= $collapsemenu['title'] ?></a>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      </div>
                    </div>
                    <?php $sideCollapse++; ?>
                  <?php endif; ?>
                <?php endif; ?>
              <?php endforeach; ?>
              <?php if ($sideCollapse == 0) : ?>
                <a href="<?= LINK ?><?= $submenu['url'] ?>" class="Halo_323 Melannie_193">
                  <svg width="16" height="16" fill="currentColor" class="Atalia_258">
                    <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#<?= $submenu['icon'] ?>" />
                  </svg>
                  <span><?= $submenu['title'] ?></span>
                </a>
              <?php endif; ?>
              <?php $sideCollapse = 0; ?>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>
        <hr class="Aneesh_577 Aurora_187" />
      <?php endif; ?>
    <?php endforeach; ?>

  </ul>
</nav>