<?php

use app\models\Menu;
use app\models\SubMenu;
use app\models\CollapseMenu;

?>

<nav class="navbar-dark sidebar bg-sidebar bf-blur-10 accordion">
  <ul class="navbar-nav" id="accordionSidebar">

    <a class="sidebar-brand d-flex ai-center jc-center" href="<?= LINK ?>">
      <h4 class="navbar-brand brand text-truncate p-0 m-0"><?= APP_NAME ?></h4>
    </a>
    <hr class="sidebar-divider">

    <?php $sideCollapse = 0; ?>
    <?php foreach (Menu::findAll(['isActive' => 1]) as $key => $menu) : ?>
      <?php if (in_array($user->role, json_decode($menu['other'], true)['access'])) : ?>
        <div class="sidebar-heading"><?= $menu['menu'] ?></div>
        <?php foreach (SubMenu::findAll([SubMenu::AND(['menuId' => $menu['id'], 'isActive' => 1])]) as $key => $submenu) : ?>
          <?php if (in_array($user->role, json_decode($submenu['other'], true)['access'])) : ?>
            <li class="nav-item" class="<?= $title == $submenu['title'] ? 'Elyzabeth_240' : '' ?> ">
              <?php foreach (CollapseMenu::findAll([CollapseMenu::AND(['subMenuId' => $submenu['id'], 'isActive' => 1])]) as $key => $collapsemenu) : ?>
                <?php if (in_array($user->role, json_decode($collapsemenu['other'], true)['access'])) : ?>
                  <?php if ($sideCollapse == 0) : ?>
                    <a class="nav-link py-1 collapsed" href="#" data-toggle="collapse" data-target="#collapse<?= $submenu['id'] ?>" aria-expanded="true" aria-controls="collapse<?= $submenu['id'] ?>">
                      <svg class="prefix" width="16" height="16" fill="currentColor">
                        <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#<?= $submenu['icon'] ?>" />
                      </svg>
                      <span><?= $submenu['title'] ?></span>
                    </a>
                    <div id="collapse<?= $submenu['id'] ?>" class="collapse" aria-labelledby="heading<?= $submenu['id'] ?>" data-parent="#accordionSidebar">
                      <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"><?= $submenu['title'] ?> :</h6>
                        <?php foreach (CollapseMenu::findAll([CollapseMenu::AND(['subMenuId' => $submenu['id'], 'isActive' => 1])]) as $key => $collapsemenu) : ?>
                          <?php if (in_array($user->role, json_decode($collapsemenu['other'], true)['access'])) : ?>
                            <a class="collapse-item" href="<?= LINK ?><?= $collapsemenu['url'] ?>"><?= $collapsemenu['title'] ?></a>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      </div>
                    </div>
                    <?php $sideCollapse++; ?>
                  <?php endif; ?>
                <?php endif; ?>
              <?php endforeach; ?>
              <?php if ($sideCollapse == 0) : ?>
                <a class="nav-link py-1" href="<?= LINK ?><?= $submenu['url'] ?>">
                  <svg class="prefix" width="16" height="16" fill="currentColor">
                    <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#<?= $submenu['icon'] ?>" />
                  </svg>
                  <span><?= $submenu['title'] ?></span>
                </a>
              <?php endif; ?>
              <?php $sideCollapse = 0; ?>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>
        <hr class="sidebar-divider mt-3">
      <?php endif; ?>
    <?php endforeach; ?>

  </ul>
</nav>