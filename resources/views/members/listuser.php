<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="_1FInK">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="_2h7iG _1dTWr _3oq1Z vSOIt">
    <div class="F2040 _1PITf">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="_22DlN _3PDUl">
        <div class="_3Sail gqtmr">

          <div class="_1dTWr _2kea1 njVXK TidTZ">
            <h1 class="_3vE3C _2gyiY"><?= $title ?></h1>
          </div>

          <div class="_3JfU8 gqtmr">
            <table class="_12PUq -tn6h _6uPk6 s0VLt">
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
                    <th class="khrLL"><?= $key ?></th>
                    <td class="khrLL"><?= $member['id'] ?></td>
                    <td class="khrLL"><?= json_decode($member['other'], true)['googleId'] ?></td>
                    <td class="khrLL"><?= $member['name'] ?></td>
                    <td class="khrLL"><?= $member['username'] ?></td>
                    <td class="khrLL"><?= $member['email'] ?></td>
                    <td class="khrLL _3znGg">
                      <div style="background-image: url('<?= $member['image'] ? 'data:image/jpg/jpeg/png/bmp; base64,' . $member['image']: '' ?>')" class="_2TnLg yqH95 Z2yax _27IzI _23T99">
                      </div>
                    </td>
                    <td class="khrLL"><?= $member['role'] ?></td>
                    <td class="khrLL">
                      <nav class="_4m9J6">
                        <div>
                          <button type="button" data-target="list-user-<?= $member['id'] ?>" data-alignment="right" class="_2zhDk _2QgNG _3VHKy _8y6Bn">
                            <svg width="15" height="15" fill="currentColor" class="_2i-WK">
                              <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#three-dots-vertical" />
                            </svg>
                          </button>
                          <ul id="list-user-<?= $member['id'] ?>" class="EYW33 _2dgNq _5OpzR">
                            <li><button onclick="setModalValue({editFullName:'<?= $member['name'] ?>',editUserName:'<?= $member['username'] ?>',roleUser:'<?= $member['role'] ?>'},document.querySelector('#editUserForm'));document.querySelector('#editUserForm').action = '<?= LINK ?>/members/list-user?id=<?= $member['id'] ?>';" data-toggle="modal" data-target="#editUser" class="_2niE6 _222Gi _2S6Up">Edit</button></li>
                            <li>
                              <form method="post" action="<?= LINK ?>/members/list-user?id=<?= $member['id'] ?>&_csrf=<?= $csrfToken ?>&_method=DELETE">
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

    <div id="editUser" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true" class="_31P-8 _3bCgx">
      <div class="_28U8K">
        <div class="_2M5QZ _1wCNj _3LA0v _1HTfk s0VLt">
          <form method="POST" id="editUserForm" onsubmit="sulaiForm({this:this,event:event,link:this.action,method:'PUT'})">
            <div class="_3tByX _1jkJg">
              <button type="button" data-dismiss="modal" aria-label="Close" class="_2yuh-"></button>
              <div class="_1dTWr _3x-l5 _1HqFl _3mxtc">
                <h5 class="_3znGg">Edit <strong>User</strong></h5>
              </div>

              <div class="_2E95Y">
                <input type="text" id="editFullName" name="editFullName" class="_1y8Oi _1GV_i" />
                <label for="editFullName">User Full Name</label>
                <span data-error="" data-success="" class="_25Y7w"></span>
              </div>

              <div class="_2E95Y">
                <input type="text" id="editUserName" name="editUserName" class="_1y8Oi _1GV_i" />
                <label for="editUserName">Username</label>
                <span data-error="" data-success="" class="_25Y7w"></span>
              </div>

              <div class="_2E95Y">
                <select name="roleUser" id="roleUser">
                  <option value="admin">Admin</option>
                  <option value="doctor">Doctor</option>
                  <option value="member">Member</option>
                  <option value="unverified">Unverified</option>
                </select>
              </div>

              <div class="_3Sail _3x-l5 riVBJ gqtmr">
                <div class="EbIZP _2wnub _1dTWr _1JVHC">
                  <button type="button" data-dismiss="modal" class="_2niE6 _2-EzS">Close</button>
                  <button type="submit" class="_2niE6 _2SF1n _2-EzS _1dYc3 _1dTWr _2kea1 _3x-l5">
                    <span style="width: 1rem; height: 1rem" role="status" class="_8sneY _2f2YP _14vxW"></span>
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