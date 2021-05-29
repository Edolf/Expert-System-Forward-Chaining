<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="wrapper">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="content-wrapper d-flex flex-column bg-background">
    <div class="content mb-4">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="container p-5">
        <div class="row mb-5">

          <?php $flashSelected = 'collapsemenu';
          include VIEW_DIR . "/layouts/flash.php"; ?>

          <div class="d-flex ai-center jc-between my-4">
            <h1 class="h3 mb-0 "><?= $title ?></h1>
            <button type="button" class="btn bg-primary text-light" data-toggle="modal" data-target="#addCollapseMenuModal">Add
              New
              Submenu</button>
          </div>

          <div class="col-md-10">

            <div class="overflow-auto mb-5">
              <table class="table table-hover table-striped bg-card">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Submenu ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Url</th>
                    <th scope="col">Is Active</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($collapsemenus as $key => $collapsemenu) : ?>
                    <tr>
                      <th class="align-middle"><?= $key + 1 ?></th>
                      <td class="align-middle"><?= $collapsemenu['subMenuId'] ?></td>
                      <td class="align-middle"><?= $collapsemenu['title'] ?></td>
                      <td class="align-middle"><?= $collapsemenu['url'] ?></td>
                      <td class="align-middle"><?= $collapsemenu['isActive'] == 1 ? 'true' : 'false' ?></td>
                      <td class="align-middle"><?= implode(',', json_decode($collapsemenu['other'], true)['access']) ?></td>
                      <td class="align-middle">
                        <nav class="navbar">
                          <div>
                            <button type="button" class="btn-flat btn-floating dropdown-trigger text-theme" data-target="submenu-<?= $key ?>" data-alignment="right">
                              <svg class="prefix" width="15" height="15" fill="currentColor">
                                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#three-dots-vertical" />
                              </svg>
                            </button>
                            <ul id="submenu-<?= $key ?>" class="dropdown-content list-unstyled bg-transparent">
                              <li>
                                <button class="btn bg-success w-100" onclick="setModalValue({editSubMenuId:'<?= $collapsemenu['subMenuId'] ?>',editSubMenuTitle:'<?= $collapsemenu['title'] ?>',editSubMenuUrl:'<?= $collapsemenu['url'] ?>',isSubMenuActiveEdit :'<?= $collapsemenu['isActive'] == 1 ? 'true' : 'false' ?>',editRole:'<?= implode(',', json_decode($collapsemenu['other'], true)['access']) ?>'},document.querySelector(`#updateSubMenuForm`));document.querySelector(`#updateSubMenuForm`).action = '<?= LINK ?><?= $collUrlMap[3] ?>?id=<?= $collapsemenu['id'] ?>&_csrf=<?= $csrfToken ?>'" data-toggle="modal" data-target="#editCollapseMenuModal">Edit</button>
                              </li>
                              <li>
                                <form method="post" action="<?= LINK ?><?= $collUrlMap[3] ?>?id=<?= $collapsemenu['id'] ?>&title=<?= $collapsemenu['title'] ?>&_csrf=<?= $csrfToken ?>&_method=DELETE">
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
    <?php include VIEW_DIR . "/members/sidebars/collapsemenu/addcollapsemenumodal.php"; ?>
    <?php include VIEW_DIR . "/members/sidebars/collapsemenu/editcollapsemenumodal.php"; ?>
    <?php include VIEW_DIR . "/layouts/footbar.php"; ?>
  </div>
</div>
<?php include VIEW_DIR . "/auths/authmodal.php"; ?>
<?php include VIEW_DIR . "/auths/forgot/forgotmodal.php"; ?>
<?php include VIEW_DIR . "/auths/verify/verifymodal.php"; ?>
<?php include VIEW_DIR . "/auths/logoutmodal.php"; ?>
<?php include VIEW_DIR . "/layouts/gotop.php"; ?>
<?php include VIEW_DIR . "/layouts/footer.php"; ?>