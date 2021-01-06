<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="_2pyK2">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="_3hy0- _1wHD0 _6Eppu _2fCJU">
    <div class="_24Rxj _1re0U">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="_16ASu _1FnTW">
        <div class="SiBSM _34J9b">

          <div class="_1wHD0 _1uVtA _20iUl _3H4vP">
            <h1 class="_25N9D _1aegJ"><?= $title ?></h1>
          </div>

          <div class="_3oEG9 _34J9b">
            <table class="_3bYJs _3Lvqy _1MfMA _2W81z">
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
                    <th class="_10754"><?= $key ?></th>
                    <td class="_10754"><?= $member['id'] ?></td>
                    <td class="_10754"><?= json_decode($member['other'], true)['googleId'] ?></td>
                    <td class="_10754"><?= $member['name'] ?></td>
                    <td class="_10754"><?= $member['username'] ?></td>
                    <td class="_10754"><?= $member['email'] ?></td>
                    <td class="_10754 RogPM">
                      <div style="background-image: url('<?= $member['image'] ? 'data:image/jpg/jpeg/png/bmp; base64,' . $member['image'] : '' ?>')" class="_1DUEa eK4KG _3-lYj _30EOh _32J_2">
                      </div>
                    </td>
                    <td class="_10754"><?= $member['role'] ?></td>
                    <td class="_10754">
                      <nav class="_3tbxM">
                        <div>
                          <button type="button" data-target="list-user-<?= $member['id'] ?>" data-alignment="right" class="USCBs _3JDZi _1VhGu _2XuUU">
                            <svg width="15" height="15" fill="currentColor" class="_2mXhC">
                              <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#three-dots-vertical" />
                            </svg>
                          </button>
                          <ul id="list-user-<?= $member['id'] ?>" class="_3XUI2 _24ZeC _3YqDp">
                            <li><button onclick="setModalValue({editFullName:'<?= $member['name'] ?>',editUserName:'<?= $member['username'] ?>',roleUser:'<?= $member['role'] ?>'},document.querySelector('#editUserForm'));document.querySelector('#editUserForm').action = '<?= LINK ?>/members/list-user?id=<?= $member['id'] ?>';" data-toggle="modal" data-target="#editUser" class="_2HPko _3-WY3 BoWE6">Edit</button></li>
                            <li>
                              <form method="post" action="<?= LINK ?>/members/list-user?id=<?= $member['id'] ?>&_csrf=<?= $csrfToken ?>&_method=DELETE">
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

    <div id="editUser" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true" class="_2yvo3 _3F0Yh">
      <div class="EGnm1">
        <div class="xo4Q- _3Znxg _1Mqcp _3W_HJ _2W81z">
          <form method="POST" id="editUserForm" onsubmit="sulaiForm({this:this,event:event,link:this.action,method:'PUT'})">
            <div class="_3BAVP _3TCQr">
              <button type="button" data-dismiss="modal" aria-label="Close" class="_2MKOU"></button>
              <div class="_1wHD0 _3Yl2j _2WrBi XgJiO">
                <h5 class="RogPM">Edit <strong>User</strong></h5>
              </div>

              <div class="_36R48">
                <input type="text" id="editFullName" name="editFullName" class="_21QBy _2fCo5" />
                <label for="editFullName">User Full Name</label>
                <span data-error="" data-success="" class="_3jmDY"></span>
              </div>

              <div class="_36R48">
                <input type="text" id="editUserName" name="editUserName" class="_21QBy _2fCo5" />
                <label for="editUserName">Username</label>
                <span data-error="" data-success="" class="_3jmDY"></span>
              </div>

              <div class="_36R48">
                <select name="roleUser" id="roleUser">
                  <option value="admin">Admin</option>
                  <option value="doctor">Doctor</option>
                  <option value="member">Member</option>
                  <option value="unverified">Unverified</option>
                </select>
              </div>

              <div class="SiBSM _3Yl2j DLDJz _34J9b">
                <div class="SSDpf _3hIbh _1wHD0 _1qW0Z">
                  <button type="button" data-dismiss="modal" class="_2HPko _3XagE">Close</button>
                  <button type="submit" class="_2HPko _2Q1xM _3XagE lJhPB _1wHD0 _1uVtA _3Yl2j">
                    <span style="width: 1rem; height: 1rem" role="status" class="_2_2xs _2uMGw rCKpP"></span>
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