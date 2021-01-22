<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="Avalyn_309">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="Karlee_636 Zephyr_231 Micaiah_457 Brylan_497">
    <div class="Karlee_303 Tayler_170">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="Aylin_367 Aren_140">
        <div class="Calen_148 Jermani_171">

          <div class="Zephyr_231 Preston_343 Zhuri_391 Annaleah_193">
            <h1 class="Wilfredo_102 Aalyah_176"><?= $title ?></h1>
          </div>

          <div class="Renata_565 Jermani_171">
            <table class="Jedidiah_192 Eily_440 Alexander_523 Brantly_247">
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
                    <th class="Beauregard_450"><?= $key ?></th>
                    <td class="Beauregard_450"><?= $member['id'] ?></td>
                    <td class="Beauregard_450"><?= json_decode($member['other'], true)['googleId'] ?></td>
                    <td class="Beauregard_450"><?= $member['name'] ?></td>
                    <td class="Beauregard_450"><?= $member['username'] ?></td>
                    <td class="Beauregard_450"><?= $member['email'] ?></td>
                    <td class="Beauregard_450 Faizan_466">
                      <div style="background-image: url('<?= $member['image'] ? 'data:image/jpg/jpeg/png/bmp; base64,' . $member['image']: '' ?>')" class="Jax_442 Montana_404 Iyla_521 Aamira_138 Aylee_306">
                      </div>
                    </td>
                    <td class="Beauregard_450"><?= $member['role'] ?></td>
                    <td class="Beauregard_450">
                      <nav class="Lucero_238">
                        <div>
                          <button type="button" data-target="list-user-<?= $member['id'] ?>" data-alignment="right" class="Olivia_315 Kepler_480 Echo_Brodie_673 Ulisses_424">
                            <svg width="15" height="15" fill="currentColor" class="Atalia_258">
                              <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#three-dots-vertical" />
                            </svg>
                          </button>
                          <ul id="list-user-<?= $member['id'] ?>" class="Kepler_680 Jaedon_572 Melody_575">
                            <li><button onclick="setModalValue({editFullName:'<?= $member['name'] ?>',editUserName:'<?= $member['username'] ?>',roleUser:'<?= $member['role'] ?>'},document.querySelector('#editUserForm'));document.querySelector('#editUserForm').action = '<?= LINK ?>/members/list-user?id=<?= $member['id'] ?>';" data-toggle="modal" data-target="#editUser" class="Zakai_128 Paris_402 Scottlyn_277">Edit</button></li>
                            <li>
                              <form method="post" action="<?= LINK ?>/members/list-user?id=<?= $member['id'] ?>&_csrf=<?= $csrfToken ?>&_method=DELETE">
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

    <div id="editUser" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true" class="Judd_197 Avery_140 Garrison_477">
      <div class="Merry_453">
        <div class="Kayce_528 Dezmond_357 Aylan_418 Alexei_424 Brantly_247">
          <form method="POST" id="editUserForm" onsubmit="sulaiForm({this:this,event:event,link:this.action,method:'PUT'})">
            <div class="Daiana_395 Mattison_196">
              <button type="button" data-dismiss="modal" aria-label="Close" class="Zakai_358"></button>
              <div class="Zephyr_231 Safwan_346 Aurora_187 Cherish_137">
                <h5 class="Faizan_466">Edit <strong>User</strong></h5>
              </div>

              <div class="Mariano_448">
                <input type="text" id="editFullName" name="editFullName" class="Amen_518 Simcha_314" />
                <label for="editFullName">User Full Name</label>
                <span data-error="" data-success="" class="Adeleine_465"></span>
              </div>

              <div class="Mariano_448">
                <input type="text" id="editUserName" name="editUserName" class="Amen_518 Simcha_314" />
                <label for="editUserName">Username</label>
                <span data-error="" data-success="" class="Adeleine_465"></span>
              </div>

              <div class="Mariano_448">
                <select name="roleUser" id="roleUser">
                  <option value="admin">Admin</option>
                  <option value="doctor">Doctor</option>
                  <option value="member">Member</option>
                  <option value="unverified">Unverified</option>
                </select>
              </div>

              <div class="Calen_148 Safwan_346 Mckenzie_188 Jermani_171">
                <div class="Raegyn_275 Alisa_321 Zephyr_231 Talaya_354">
                  <button type="button" data-dismiss="modal" class="Zakai_128 Kepler_361">Close</button>
                  <button type="submit" class="Zakai_128 Pascual_265 Kepler_361 Isabella_429 Zephyr_231 Preston_343 Safwan_346">
                    <span style="width: 1rem; height: 1rem" role="status" class="Zayne_577 Annsley_184 Jana_232"></span>
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