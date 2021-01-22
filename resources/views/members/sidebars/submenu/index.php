<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="Avalyn_309">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="Karlee_636 Zephyr_231 Micaiah_457 Brylan_497">
    <div class="Karlee_303 Tayler_170">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="Aylin_367 Aren_140">
        <div class="Calen_148 Jermani_171">

          <?php $flashSelected = 'submenu';
          include VIEW_DIR . "/layouts/flash.php"; ?>

          <div class="Zephyr_231 Preston_343 Zhuri_391 Annaleah_193">
            <h1 class="Wilfredo_102 Aalyah_176"><?= $title ?></h1>
            <button type="button" data-toggle="modal" data-target="#addSubMenuModal" class="Zakai_128 Zeppelin_413 Isabella_429">Add
              New Menu</button>
          </div>

          <div class="Nirvaan_380">
            <div class="Renata_565 Jermani_171">
              <table class="Jedidiah_192 Eily_440 Alexander_523 Brantly_247">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Menu ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Url</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Is Active</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($submenus as $key => $submenu) : ?>
                    <tr>
                      <th class="Beauregard_450"><?= $key + 1 ?></th>
                      <td class="Beauregard_450"><?= $submenu['menuId'] ?></td>
                      <td class="Beauregard_450"><?= $submenu['title'] ?></td>
                      <td class="Beauregard_450"><?= $submenu['url'] ?></td>
                      <td class="Beauregard_450">
                        <svg width="15" height="15" fill="currentColor" class="Atalia_258 Meika_185">
                          <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#<?= $submenu['icon'] ?>" />
                        </svg>
                        <?= $submenu['icon'] ?>
                      </td>
                      <td class="Beauregard_450"><?= $submenu['isActive'] == 1 ? 'true' : 'false' ?></td>
                      <td class="Beauregard_450"><?= implode(',', json_decode($submenu['other'], true)['access']) ?></td>
                      <td class="Beauregard_450">
                        <nav class="Lucero_238">
                          <div>
                            <button type="button" data-target="menu-<?= $key ?>" data-alignment="right" class="Olivia_315 Kepler_480 Echo_Brodie_673 Ulisses_424">
                              <svg width="15" height="15" fill="currentColor" class="Atalia_258">
                                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#three-dots-vertical" />
                              </svg>
                            </button>
                            <ul id="menu-<?= $key ?>" class="Kepler_680 Jaedon_572 Melody_575">
                              <li>
                                <button onclick="setModalValue({editMenuId:'<?= $submenu['menuId'] ?>',editMenuIcon:'<?= $submenu['icon'] ?>',editMenuTitle:'<?= $submenu['title'] ?>',editMenuUrl:'<?= $submenu['url'] ?>',isMenuActiveEdit :'<?= $submenu['isActive'] == 1 ? 'true' : 'false' ?>',editRole:'<?= implode(',', json_decode($submenu['other'], true)['access']) ?>'},document.querySelector(`#updateMenuForm`));document.querySelector(`#updateMenuForm`).action = '<?= LINK ?>/members/sidemenu/menu?id=<?= $submenu['id'] ?>&_csrf=<?= $csrfToken ?>'" data-toggle="modal" data-target="#editSubMenuModal" class="Zakai_128 Paris_402 Scottlyn_277">Edit</button>
                              </li>
                              <li>
                                <form method="post" action="<?= LINK ?>/members/sidemenu/menu?id=<?= $submenu['id'] ?>&title=<?= $submenu['title'] ?>&_csrf=<?= $csrfToken ?>&_method=DELETE">
                                  <button onclick="return confirm('Are you sure you want to Delete it ?')" class="Zakai_128 Hutton_326 Scottlyn_277">Delete</button>
                                </form>
                              </li>
                            </ul>
                          </div>
                        </nav>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include VIEW_DIR . "/members/sidebars/submenu/addsubmenumodal.php"; ?>
    <?php include VIEW_DIR . "/members/sidebars/submenu/editsubmenumodal.php"; ?>
    <?php include VIEW_DIR . "/layouts/footbar.php"; ?>
  </div>
</div>
<?php include VIEW_DIR . "/auths/authmodal.php"; ?>
<?php include VIEW_DIR . "/auths/forgot/forgotmodal.php"; ?>
<?php include VIEW_DIR . "/auths/verify/verifymodal.php"; ?>
<?php include VIEW_DIR . "/auths/logoutmodal.php"; ?>
<?php include VIEW_DIR . "/layouts/gotop.php"; ?>
<?php include VIEW_DIR . "/layouts/footer.php"; ?>