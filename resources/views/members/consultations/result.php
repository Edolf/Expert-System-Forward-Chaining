<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="_2pyK2">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="_3hy0- _1wHD0 _6Eppu _2fCJU">
    <div class="_24Rxj _1re0U">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="_16ASu _1FnTW">
        <div class="SiBSM _34J9b">

          <div class="_1wHD0 _1uVtA _20iUl _3H4vP">
            <h1 class="_25N9D _1aegJ">Diagnosis Based on The Selected Symptoms</h1>
          </div>

          <div class="_1yUFw _34J9b">
            <h6 class="_1re0U">Users Information</h6>
            <table class="_3bYJs _3Lvqy">
              <tr>
                <td scope="col" class="sHcZn">Full Name</td>
                <td scope="col" class="sHcZn">
                  <strong><?= $user->name ?></strong>
                </td>
              </tr>
              <tr>
                <td scope="col" class="sHcZn">Username</td>
                <td scope="col" class="sHcZn">
                  <strong><?= $user->username != null ? $user->username : 'NULL' ?></strong>
                </td>
              </tr>
              <tr>
                <td scope="col" class="sHcZn">E-mail</td>
                <td scope="col" class="sHcZn">
                  <strong>
                    <?= $user->email != null ? $user->email : 'NULL' ?><small class="<?= $user->role == 'unverified' ? 'UG45_' : '_21QBy' ?> _282Xl"><?= $user->role == 'unverified' ? '(unverified)' : '(verified)' ?></small>
                  </strong>
                </td>
              </tr>
            </table>
          </div>
          <div class="_1yUFw _11x2F">
            <h3 class="zCP3X _1re0U">Results</h3>
            <?php if ($results['id'] == 0) : ?>
              <h6><?= $results['desc'] ?> </h6>
              <ul>
                <?php foreach ($sympTemps as $symp) : ?>
                  <li><?= $symp['question'] ?></li>
                <?php endforeach; ?>
              </ul>
              <h6><?= $results['solution'] ?> </h6>
            <?php else : ?>
              <h6>From the several statements selected,</h6>
              <ul>
                <?php foreach ($sympTemps as $symp) : ?>
                  <li><?= $symp['question'] ?></li>
                <?php endforeach; ?>
              </ul>
              <h6>it can be concluded that the disease is
                <span><strong><?= $results['name'] ?></strong></span>
              </h6>
            <?php endif; ?>
          </div>
        </div>
        <?php if ($results['id'] != 0) : ?>
          <div class="SiBSM _34J9b">
            <h3 class="zCP3X _1re0U">What Is <strong><?= $results['name'] ?></strong> ?</h3>
            <h6><strong><?= $results['name'] ?></strong> is <?= $results['desc'] ?></h6>
          </div>
          <div class="SiBSM">
            <h3 class="zCP3X _1re0U">Solution for this Disease</h3>
            <h6><?= $results['solution'] ?></h6>
          </div>
        <?php endif; ?>
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