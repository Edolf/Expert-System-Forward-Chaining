<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="_1FInK">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="_2h7iG _1dTWr _3oq1Z vSOIt">
    <div class="F2040 _1PITf">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="_22DlN _3PDUl">
        <div class="_3Sail gqtmr">

          <div class="_1dTWr _2kea1 njVXK TidTZ">
            <h1 class="_3vE3C _2gyiY">Diagnosis Based on The Selected Symptoms</h1>
          </div>

          <div class="_1s9b_ gqtmr">
            <h6 class="_1PITf">Users Information</h6>
            <table class="_12PUq -tn6h">
              <tr>
                <td scope="col" class="_3GpXu">Full Name</td>
                <td scope="col" class="_3GpXu">
                  <strong css-module=""><?= $user->name ?></strong>
                </td>
              </tr>
              <tr>
                <td scope="col" class="_3GpXu">Username</td>
                <td scope="col" class="_3GpXu">
                  <strong><?= $user->username != null ? $user->username : 'NULL' ?></strong>
                </td>
              </tr>
              <tr>
                <td scope="col" class="_3GpXu">E-mail</td>
                <td scope="col" class="_3GpXu">
                  <strong>
                    <?= $user->email != null ? $user->email : 'NULL' ?><small class="<?= $user->role == 'unverified' ? '_2ivdp' : '_1y8Oi' ?> _1MoWO"><?= $user->role == 'unverified' ? '(unverified)' : '(verified)' ?></small>
                  </strong>
                </td>
              </tr>
            </table>
          </div>
          <div class="_1s9b_ _3L-oI">
            <h3 class="_1m-Fh _1PITf">Results</h3>
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
                <span><strong><?= $results['name'] ?></strong></span></h6>
            <?php endif; ?>
          </div>
        </div>
        <?php if ($results['id'] != 0) : ?>
          <div class="_3Sail gqtmr">
            <h3 class="_1m-Fh _1PITf">What Is <strong><?= $results['name'] ?></strong> ?</h3>
            <h6><strong><?= $results['name'] ?></strong> is <?= $results['desc'] ?></h6>
          </div>
          <div class="_3Sail">
            <h3 class="_1m-Fh _1PITf">Solution for this Disease</h3>
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