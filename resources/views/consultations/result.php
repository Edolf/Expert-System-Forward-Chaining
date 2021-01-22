<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div id="app" class="Brylan_497">
  <?php include VIEW_DIR . "/layouts/navbar.php"; ?>
  <div class="Karlee_636 Zephyr_231 Micaiah_457">
    <div class="Karlee_303 Annaleah_193 Brylan_497">
      <div class="Aylin_367">
      </div>
    </div>

    <div class="Karlee_303 Annaleah_193 Brylan_497">
      <div class="Yovani_551 Emmarose_194">
        <div class="Calen_148 Aamira_138 Brooke_245">
          <div class="Sufyan_297 Montana_404 Aamira_138 Brooke_245 Xochitl_197">
            <div class="Calen_148 Jermani_171">
              <div class="Zephyr_231 Preston_343 Zhuri_391 Annaleah_193">
                <h1 class="Wilfredo_102 Aalyah_176">Diagnosis Based on The Selected Symptoms</h1>
              </div>

              <div class="Finlay_320 Jermani_171">
                <h6 class="Tayler_170">Users Information</h6>
                <table class="Jedidiah_192 Eily_440">
                  <tr>
                    <td scope="col" class="Lebron_195">Full Name</td>
                    <td scope="col" class="Lebron_195">
                      <strong><?= $user->name ?></strong>
                    </td>
                  </tr>
                  <tr>
                    <td scope="col" class="Lebron_195">Username</td>
                    <td scope="col" class="Lebron_195">
                      <strong><?= $user->username != null ? $user->username : 'NULL' ?></strong>
                    </td>
                  </tr>
                  <tr>
                    <td scope="col" class="Lebron_195">E-mail</td>
                    <td scope="col" class="Lebron_195">
                      <strong>
                        <?= $user->email != null ? $user->email : 'NULL' ?><small class="<?= $user->role == 'unverified' ? 'Dariah_515' : 'Amen_518' ?> Aleyda_179"><?= $user->role == 'unverified' ? '(unverified)' : '(verified)' ?></small>
                      </strong>
                    </td>
                  </tr>
                </table>
              </div>
              <div class="Finlay_320 Eston_289">
                <h3 class="Zianna_371 Tayler_170">Results</h3>
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
              <div class="Calen_148 Jermani_171">
                <h3 class="Zianna_371 Tayler_170">What Is <strong><?= $results['name'] ?></strong> ?</h3>
                <h6><strong><?= $results['name'] ?></strong> is <?= $results['desc'] ?></h6>
              </div>
              <div class="Calen_148">
                <h3 class="Zianna_371 Tayler_170">Solution for this Disease</h3>
                <h6><?= $results['solution'] ?></h6>
              </div>
            <?php endif; ?>
            <a href="<?= LINK ?>/" class="Zakai_128 Zeppelin_413 Isabella_429 Jewels_189">&larr; Back to Home</a>
          </div>
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