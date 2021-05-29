<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="wrapper">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="content-wrapper d-flex flex-column bg-background">
    <div class="content mb-4">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="container p-5">
        <div class="row mb-5">

          <?php $flashSelected = 'menu';
          include VIEW_DIR . "/layouts/flash.php"; ?>

          <div class="d-flex ai-center jc-between my-4">
            <h1 class="h3 mb-0 "><?= $title ?></h1>
            <button type="button" class="btn bg-primary" data-toggle="modal" data-target="#addMenuModal">Add
              New
              Sidemenu</button>
          </div>

          <div class="col-md-6">
            <div class="overflow-auto mb-5">
              <table class="table table-hover table-striped bg-card">
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
                      <th class="align-middle"><?= $key + 1 ?></th>
                      <td class="align-middle"><?= $menu['menu'] ?></td>
                      <td class="align-middle"><?= $menu['isActive'] == 1 ? 'true' : 'false' ?></td>
                      <td class="align-middle"><?= implode(",", json_decode($menu['other'], true)['access']) ?></td>
                      <td class="align-middle">
                        <nav class="navbar">
                          <div>
                            <button type="button" class="btn-flat btn-floating dropdown-trigger text-theme" data-target="sidemenu-<?= $key ?>" data-alignment="right">
                              <svg class="prefix" width="15" height="15" fill="currentColor">
                                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#three-dots-vertical" />
                              </svg>
                            </button>
                            <ul id="sidemenu-<?= $key ?>" class="dropdown-content list-unstyled bg-transparent">
                              <li><button class="btn bg-success w-100" onclick="setModalValue({menu:'<?= $menu['menu'] ?>',isSideMenuEditActive :'<?= $menu['isActive'] == 1 ? 'true' : 'false' ?>',role:'<?= implode(',', json_decode($menu['other'], true)['access']) ?>'},document.querySelector(`#updateSideMenuForm`));document.querySelector(`#updateSideMenuForm`).action = '<?= LINK ?><?= $collUrlMap[1] ?>?id=<?= $menu['id'] ?>&_csrf=<?= $csrfToken ?>'" data-toggle="modal" data-target="#editMenuModal">Edit</button>
                              </li>
                              <li>
                                <form action="<?= LINK ?><?= $collUrlMap[1] ?>?id=<?= $menu['id'] ?>&title=<?= $menu['menu'] ?>&_csrf=<?= $csrfToken ?>&_method=DELETE" method="post">
                                  <button class="btn bg-danger w-100" onclick="return confirm('Are you sure you want to Delete it ?')">Delete</button>
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