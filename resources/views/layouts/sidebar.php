<?php

use app\models\Menu;
use app\models\SubMenu;
use app\models\CollapseMenu;

?>

<nav class="_1dCwc _2RO8G Kvgsw _3PquE _2spFz">
  <ul id="accordionSidebar" class="ZaWkV">

    <a href="<?= LINK ?>" class="_1kLjS _1dTWr _2kea1 _3x-l5">
      <h4 class="kBo2_ _2M3Kx _38102 _27Ucp _10lSW"><?= APP_NAME ?></h4>
    </a>
    <hr class="_2xBDc" />

    <?php $sideCollapse = 0; ?>
    <?php foreach (Menu::findAll(['isActive' => 1]) as $key => $menu) : ?>
      <?php if (in_array($user->role, json_decode($menu['other'], true)['access'])) : ?>
        <div class="X7lSl"><?= $menu['menu'] ?></div>
        <?php foreach (SubMenu::findAll([SubMenu::AND(['menuId' => $menu['id'], 'isActive' => 1])]) as $key => $submenu) : ?>
          <?php if (in_array($user->role, json_decode($submenu['other'], true)['access'])) : ?>
            <li class="<?= $title == $submenu['title'] ? '_1-LYA' : '' ?>  _3TL4E">
              <?php foreach (CollapseMenu::findAll([CollapseMenu::AND(['subMenuId' => $submenu['id'], 'isActive' => 1])]) as $key => $collapsemenu) : ?>
                <?php if (in_array($user->role, json_decode($collapsemenu['other'], true)['access'])) : ?>
                  <?php if ($sideCollapse == 0) : ?>
                    <a href="#" data-toggle="collapse" data-target="#collapse<?= $submenu['id'] ?>" aria-expanded="true" aria-controls="collapse<?= $submenu['id'] ?>" class="_39_OB _3T_Cz _3Q81d">
                      <svg width="16" height="16" fill="currentColor" class="_2i-WK">
                        <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#<?= $submenu['icon'] ?>" />
                      </svg>
                      <span><?= $submenu['title'] ?></span>
                    </a>
                    <div id="collapse<?= $submenu['id'] ?>" aria-labelledby="heading<?= $submenu['id'] ?>" data-parent="#accordionSidebar" class="_20Ibn">
                      <div class="_1cIPx _34jZf _8n4hB _3jFF_">
                        <h6 class="YFx2t"><?= $submenu['title'] ?> :</h6>
                        <?php foreach (CollapseMenu::findAll([CollapseMenu::AND(['subMenuId' => $submenu['id'], 'isActive' => 1])]) as $key => $collapsemenu) : ?>
                          <?php if (in_array($user->role, json_decode($collapsemenu['other'], true)['access'])) : ?>
                            <a href="<?= LINK ?><?= $collapsemenu['url'] ?>" class="_2UyGw"><?= $collapsemenu['title'] ?></a>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      </div>
                    </div>
                    <?php $sideCollapse++; ?>
                  <?php endif; ?>
                <?php endif; ?>
              <?php endforeach; ?>
              <?php if ($sideCollapse == 0) : ?>
                <a href="<?= LINK ?><?= $submenu['url'] ?>" class="_39_OB _3T_Cz">
                  <svg width="16" height="16" fill="currentColor" class="_2i-WK">
                    <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#<?= $submenu['icon'] ?>" />
                  </svg>
                  <span><?= $submenu['title'] ?></span>
                </a>
              <?php endif; ?>
              <?php $sideCollapse = 0; ?>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>
        <hr class="_2xBDc _1HqFl" />
      <?php endif; ?>
    <?php endforeach; ?>

  </ul>
</nav>