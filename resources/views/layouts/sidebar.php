<?php

use app\models\Menu;
use app\models\SubMenu;
use app\models\CollapseMenu;

?>

<nav class="_2y2g9 _3t701 nC_1t _2d_xR _1h67L">
  <ul id="accordionSidebar" class="_1DuA9">

    <a href="<?= LINK ?>" class="_12B-6 _1wHD0 _1uVtA _3Yl2j">
      <h4 class="_38Rsr _3BjGC _2nCCi _1kqFz _3MkHC"><?= APP_NAME ?></h4>
    </a>
    <hr class="s-tTc" />

    <?php $sideCollapse = 0; ?>
    <?php foreach (Menu::findAll(['isActive' => 1]) as $key => $menu) : ?>
      <?php if (in_array($user->role, json_decode($menu['other'], true)['access'])) : ?>
        <div class="_253ES"><?= $menu['menu'] ?></div>
        <?php foreach (SubMenu::findAll([SubMenu::AND(['menuId' => $menu['id'], 'isActive' => 1])]) as $key => $submenu) : ?>
          <?php if (in_array($user->role, json_decode($submenu['other'], true)['access'])) : ?>
            <li class="<?= $title == $submenu['title'] ? '_1ptY3' : '' ?>  _3vfit">
              <?php foreach (CollapseMenu::findAll([CollapseMenu::AND(['subMenuId' => $submenu['id'], 'isActive' => 1])]) as $key => $collapsemenu) : ?>
                <?php if (in_array($user->role, json_decode($collapsemenu['other'], true)['access'])) : ?>
                  <?php if ($sideCollapse == 0) : ?>
                    <a href="#" data-toggle="collapse" data-target="#collapse<?= $submenu['id'] ?>" aria-expanded="true" aria-controls="collapse<?= $submenu['id'] ?>" class="_1qyzj _3osu5 kXggt">
                      <svg width="16" height="16" fill="currentColor" class="_2mXhC">
                        <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#<?= $submenu['icon'] ?>" />
                      </svg>
                      <span><?= $submenu['title'] ?></span>
                    </a>
                    <div id="collapse<?= $submenu['id'] ?>" aria-labelledby="heading<?= $submenu['id'] ?>" data-parent="#accordionSidebar" class="GxLGv">
                      <div class="_2iS7c rMpMO _39hdG _1_acL">
                        <h6 class="_1GYjH"><?= $submenu['title'] ?> :</h6>
                        <?php foreach (CollapseMenu::findAll([CollapseMenu::AND(['subMenuId' => $submenu['id'], 'isActive' => 1])]) as $key => $collapsemenu) : ?>
                          <?php if (in_array($user->role, json_decode($collapsemenu['other'], true)['access'])) : ?>
                            <a href="<?= LINK ?><?= $collapsemenu['url'] ?>" class="_2Mzmy"><?= $collapsemenu['title'] ?></a>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      </div>
                    </div>
                    <?php $sideCollapse++; ?>
                  <?php endif; ?>
                <?php endif; ?>
              <?php endforeach; ?>
              <?php if ($sideCollapse == 0) : ?>
                <a href="<?= LINK ?><?= $submenu['url'] ?>" class="_1qyzj _3osu5">
                  <svg width="16" height="16" fill="currentColor" class="_2mXhC">
                    <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#<?= $submenu['icon'] ?>" />
                  </svg>
                  <span><?= $submenu['title'] ?></span>
                </a>
              <?php endif; ?>
              <?php $sideCollapse = 0; ?>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>
        <hr class="s-tTc _2WrBi" />
      <?php endif; ?>
    <?php endforeach; ?>

  </ul>
</nav>