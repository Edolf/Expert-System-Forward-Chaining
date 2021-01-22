<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="Avalyn_309">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="Karlee_636 Zephyr_231 Micaiah_457 Brylan_497">
    <div class="Karlee_303 Tayler_170">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="Aylin_367 Aren_140">
        <div class="Calen_148 Jermani_171">

          <?php $flashSelected = 'menu';
          include VIEW_DIR . "/layouts/flash.php"; ?>

          <div class="Zephyr_231 Preston_343 Zhuri_391 Annaleah_193">
            <h1 class="Wilfredo_102 Aalyah_176"><?= $title ?></h1>
            <button type="button" data-toggle="modal" data-target="#addMenuModal" class="Zakai_128 Zeppelin_413">Add
              New
              Sidemenu</button>
          </div>

          <div class="Finlay_320">
            <div class="Renata_565 Jermani_171">
              <table class="Jedidiah_192 Eily_440 Alexander_523 Brantly_247">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Is Active</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($menus as $key => $menu) : ?>
                    <tr>
                      <th class="Beauregard_450"><?= $key + 1 ?></th>
                      <td class="Beauregard_450"><?= $menu['menu'] ?></td>
                      <td class="Beauregard_450"><?= $menu['isActive'] == 1 ? 'true' : 'false' ?></td>
                      <td class="Beauregard_450"><?= implode(",", json_decode($menu['other'], true)['access']) ?></td>
                      <td class="Beauregard_450">
                        <nav class="Lucero_238">
                          <div>
                            <button type="button" data-target="sidemenu-<?= $key ?>" data-alignment="right" class="Olivia_315 Kepler_480 Echo_Brodie_673 Ulisses_424">
                              <svg width="15" height="15" fill="currentColor" class="Atalia_258">
                                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#three-dots-vertical" />
                              </svg>
                            </button>
                            <ul id="sidemenu-<?= $key ?>" class="Kepler_680 Jaedon_572 Melody_575">
                              <li><button onclick="setModalValue({menu:'<?= $menu['menu'] ?>',isSideMenuEditActive :'<?= $menu['isActive'] == 1 ? 'true' : 'false' ?>',role:'<?= implode(',', json_decode($menu['other'], true)['access']) ?>'},document.querySelector(`#updateSideMenuForm`));document.querySelector(`#updateSideMenuForm`).action = '<?= LINK ?>/members/sidemenu?id=<?= $menu['id'] ?>&_csrf=<?= $csrfToken ?>'" data-toggle="modal" data-target="#editMenuModal" class="Zakai_128 Paris_402 Scottlyn_277">Edit</button>
                              </li>
                              <li>
                                <form action="<?= LINK ?>/members/sidemenu?id=<?= $menu['id'] ?>&title=<?= $menu['menu'] ?>&_csrf=<?= $csrfToken ?>&_method=DELETE" method="post">
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
    <?php include VIEW_DIR . "/members/sidebars/menu/addmenumodal.php"; ?>
    <?php include VIEW_DIR . "/members/sidebars/menu/editmenumodal.php"; ?>
    <?php include VIEW_DIR . "/layouts/footbar.php"; ?>
  </div>
</div>
<?php include VIEW_DIR . "/auths/authmodal.php"; ?>
<?php include VIEW_DIR . "/auths/forgot/forgotmodal.php"; ?>
<?php include VIEW_DIR . "/auths/verify/verifymodal.php"; ?>
<?php include VIEW_DIR . "/auths/logoutmodal.php"; ?>
<?php include VIEW_DIR . "/layouts/gotop.php"; ?>
<?php include VIEW_DIR . "/layouts/footer.php"; ?>