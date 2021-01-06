<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="_2pyK2">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="_3hy0- _1wHD0 _6Eppu _2fCJU">
    <div class="_24Rxj _1re0U">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="_16ASu _1FnTW">
        <div class="SiBSM _34J9b">

          <?php $flashSelected = 'submenu';
          include VIEW_DIR . "/layouts/flash.php"; ?>

          <div class="_1wHD0 _1uVtA _20iUl _3H4vP">
            <h1 class="_25N9D _1aegJ"><?= $title ?></h1>
            <button type="button" data-toggle="modal" data-target="#addSubMenuModal" class="_2HPko vhjC9 lJhPB">Add
              New Menu</button>
          </div>

          <div class="yQrO-">
            <div class="_3oEG9 _34J9b">
              <table class="_3bYJs _3Lvqy _1MfMA _2W81z">
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
                      <th class="_10754"><?= $key + 1 ?></th>
                      <td class="_10754"><?= $submenu['menuId'] ?></td>
                      <td class="_10754"><?= $submenu['title'] ?></td>
                      <td class="_10754"><?= $submenu['url'] ?></td>
                      <td class="_10754">
                        <svg width="15" height="15" fill="currentColor" class="_2mXhC _3WCQi">
                          <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#<?= $submenu['icon'] ?>" />
                        </svg>
                        <?= $submenu['icon'] ?>
                      </td>
                      <td class="_10754"><?= $submenu['isActive'] == 1 ? 'true' : 'false' ?></td>
                      <td class="_10754"><?= implode(',', json_decode($submenu['other'], true)['access']) ?></td>
                      <td class="_10754">
                        <nav class="_3tbxM">
                          <div>
                            <button type="button" data-target="menu-<?= $key ?>" data-alignment="right" class="USCBs _3JDZi _1VhGu _2XuUU">
                              <svg width="15" height="15" fill="currentColor" class="_2mXhC">
                                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#three-dots-vertical" />
                              </svg>
                            </button>
                            <ul id="menu-<?= $key ?>" class="_3XUI2 _24ZeC _3YqDp">
                              <li>
                                <button onclick="setModalValue({editMenuId:'<?= $submenu['menuId'] ?>',editMenuIcon:'<?= $submenu['icon'] ?>',editMenuTitle:'<?= $submenu['title'] ?>',editMenuUrl:'<?= $submenu['url'] ?>',isMenuActiveEdit :'<?= $submenu['isActive'] == 1 ? 'true' : 'false' ?>',editRole:'<?= implode(',', json_decode($submenu['other'], true)['access']) ?>'},document.querySelector(`#updateMenuForm`));document.querySelector(`#updateMenuForm`).action = '<?= LINK ?>/members/sidemenu/menu?id=<?= $submenu['id'] ?>&_csrf=<?= $csrfToken ?>'" data-toggle="modal" data-target="#editSubMenuModal" class="_2HPko _3-WY3 BoWE6">Edit</button>
                              </li>
                              <li>
                                <form method="post" action="<?= LINK ?>/members/sidemenu/menu?id=<?= $submenu['id'] ?>&title=<?= $submenu['title'] ?>&_csrf=<?= $csrfToken ?>&_method=DELETE">
                                  <button onclick="return confirm('Are you sure you want to Delete it ?')" class="_2HPko _2rGfb BoWE6">Delete</button>
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