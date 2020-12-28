<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="_1FInK">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="_2h7iG _1dTWr _3oq1Z vSOIt">
    <div class="F2040 _1PITf">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="_22DlN _3PDUl">
        <div class="_3Sail gqtmr">

          <?php $flashSelected = 'menu';
          include VIEW_DIR . "/layouts/flash.php"; ?>

          <div class="_1dTWr _2kea1 njVXK TidTZ">
            <h1 class="_3vE3C _2gyiY"><?= $title ?></h1>
            <button type="button" data-toggle="modal" data-target="#addMenuModal" class="_2niE6 Bdn6B">Add
              New
              Sidemenu</button>
          </div>

          <div class="_1s9b_">
            <div class="_3JfU8 gqtmr">
              <table class="_12PUq -tn6h _6uPk6 s0VLt">
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
                      <th class="khrLL"><?= $key + 1 ?></th>
                      <td class="khrLL"><?= $menu['menu'] ?></td>
                      <td class="khrLL"><?= $menu['isActive'] == 1 ? 'true' : 'false' ?></td>
                      <td class="khrLL"><?= implode(",", json_decode($menu['other'], true)['access']) ?></td>
                      <td class="khrLL">
                        <nav class="_4m9J6">
                          <div>
                            <button type="button" data-target="sidemenu-<?= $key ?>" data-alignment="right" class="_2zhDk _2QgNG _3VHKy _8y6Bn">
                              <svg width="15" height="15" fill="currentColor" class="_2i-WK">
                                <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#three-dots-vertical" />
                              </svg>
                            </button>
                            <ul id="sidemenu-<?= $key ?>" class="EYW33 _2dgNq _5OpzR">
                              <li><button onclick="setModalValue({menu:'<?= $menu['menu'] ?>',isSideMenuEditActive :'<?= $menu['isActive'] == 1 ? 'true' : 'false' ?>',role:'<?= implode(',', json_decode($menu['other'], true)['access']) ?>'},document.querySelector(`#updateSideMenuForm`));document.querySelector(`#updateSideMenuForm`).action = '<?= LINK ?>/members/sidemenu?id=<?= $menu['id'] ?>&_csrf=<?= $csrfToken ?>'" data-toggle="modal" data-target="#editMenuModal" class="_2niE6 _222Gi _2S6Up">Edit</button>
                              </li>
                              <li>
                                <form action="<?= LINK ?>/members/sidemenu?id=<?= $menu['id'] ?>&title=<?= $menu['menu'] ?>&_csrf=<?= $csrfToken ?>&_method=DELETE" method="post">
                                  <button onclick="return confirm('Are you sure you want to Delete it ?')" class="_2niE6 cnWz7 _2S6Up">Delete</button>
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