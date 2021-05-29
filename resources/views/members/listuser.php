<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="wrapper">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="content-wrapper d-flex flex-column bg-background">
    <div class="content mb-4">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="container p-5">
        <div class="row mb-5">

          <div class="d-flex ai-center jc-between my-4">
            <h1 class="h3 mb-0 "><?= $title ?></h1>
          </div>

          <div class="overflow-auto mb-5">
            <table class="table table-hover table-striped bg-card">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">ID</th>
                  <th scope="col">Google ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Username</th>
                  <th scope="col">Email</th>
                  <th scope="col">BLOB Image</th>
                  <th scope="col">Role</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($members as $key => $member) : ?>
                  <tr>
                    <th class="align-middle"><?= $key ?></th>
                    <td class="align-middle"><?= $member['id'] ?></td>
                    <td class="align-middle"><?= json_decode($member['other'], true)['googleId'] ?></td>
                    <td class="align-middle"><?= $member['name'] ?></td>
                    <td class="align-middle"><?= $member['username'] ?></td>
                    <td class="align-middle"><?= $member['email'] ?></td>
                    <td class="align-middle text-center">
                      <div class="img-profile rounded-lg img-thumbnail p-3 mx-auto" style="background-image: url('<?= $member['image'] ? 'data:image/jpg/jpeg/png/bmp;base64,' . $member['image'] : '' ?>');">
                      </div>
                    </td>
                    <td class="align-middle"><?= $member['role'] ?></td>
                    <td class="align-middle">
                      <nav class="navbar">
                        <div>
                          <button type="button" class="btn-flat btn-floating dropdown-trigger text-theme" data-target="list-user-<?= $member['id'] ?>" data-alignment="right">
                            <svg class="prefix" width="15" height="15" fill="currentColor">
                              <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#three-dots-vertical" />
                            </svg>
                          </button>
                          <ul id="list-user-<?= $member['id'] ?>" class="dropdown-content list-unstyled bg-transparent">
                            <li><button class="btn bg-success w-100" onclick="setModalValue({editFullName:'<?= $member['name'] ?>',editUserName:'<?= $member['username'] ?>',roleUser:'<?= $member['role'] ?>'},document.querySelector('#editUserForm'));document.querySelector('#editUserForm').action = '<?= LINK ?><?= $subUrlMap[3] ?>?id=<?= $member['id'] ?>';" data-toggle="modal" data-target="#editUser">Edit</button></li>
                            <li>
                              <form method="post" action="<?= LINK ?><?= $subUrlMap[3] ?>?id=<?= $member['id'] ?>&_csrf=<?= $csrfToken ?>&_method=DELETE">
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

    <div class="modal fade modal-static" id="editUser" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content shadow-lg bl-primary br-primary bg-card">
          <form method="POST" id="editUserForm" onsubmit="sulaiForm({this:this,event:event,link:this.action,method:'PUT'})">
            <div class="modal-body px-5">
              <button type="button" class="btn-close  " data-dismiss="modal" aria-label="Close"></button>
              <div class="d-flex jc-center mt-3 m-5">
                <h5 class="text-center">Edit <strong>User</strong></h5>
              </div>

              <div class="input-field">
                <input type="text" id="editFullName" name="editFullName" class="text-success validate">
                <label for="editFullName">User Full Name</label>
                <span class="helper-text" data-error="" data-success=""></span>
              </div>

              <div class="input-field">
                <input type="text" id="editUserName" name="editUserName" class="text-success validate">
                <label for="editUserName">Username</label>
                <span class="helper-text" data-error="" data-success=""></span>
              </div>

              <div class="input-field">
                <select name="roleUser" id="roleUser">
                  <option value="admin">Admin</option>
                  <option value="doctor">Doctor</option>
                  <option value="member">Member</option>
                  <option value="unverified">Unverified</option>
                </select>
              </div>

              <div class="row jc-center mt-4 mb-5">
                <div class="col-10 col-md-7 d-flex jc-around">
                  <button type="button" class="btn btn-small" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn bg-info btn-small text-light d-flex ai-center jc-center">
                    <span class="spinner-border mr-2 d-none" style="width: 1rem; height: 1rem;" role="status"></span>
                    <span>Edit User</span>
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php include VIEW_DIR . "/layouts/footbar.php"; ?>
  </div>
</div>
<?php include VIEW_DIR . "/auths/authmodal.php"; ?>
<?php include VIEW_DIR . "/auths/forgot/forgotmodal.php"; ?>
<?php include VIEW_DIR . "/auths/verify/verifymodal.php"; ?>
<?php include VIEW_DIR . "/auths/logoutmodal.php"; ?>
<?php include VIEW_DIR . "/layouts/gotop.php"; ?>
<?php include VIEW_DIR . "/layouts/footer.php"; ?>