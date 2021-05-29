<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div id="app" class="bg-background">
  <?php include VIEW_DIR . "/layouts/navbar.php"; ?>
  <div class="content-wrapper d-flex flex-column">
    <div class="content my-4 bg-background">
      <div class="container">
      </div>
    </div>

    <div class="content my-4 bg-background">
      <div class="container-xxl my-5">
        <div class="row p-3 p-md-5">
          <div class="bg-panel rounded-lg p-3 p-md-5 py-5">
            <div class="row mb-5">
              <div class="d-flex ai-center jc-between my-4">
                <h1 class="h3 mb-0 ">Diagnosis Based on The Selected Symptoms</h1>
              </div>

              <div class="col-md-6 mb-5">
                <h6 class="mb-4">Users Information</h6>
                <table class="table table-hover">
                  <tr>
                    <td class="py-3" scope="col">Full Name</td>
                    <td class="py-3" scope="col">
                      <strong><?= $user->name ?></strong>
                    </td>
                  </tr>
                  <tr>
                    <td class="py-3" scope="col">Username</td>
                    <td class="py-3" scope="col">
                      <strong><?= $user->username != null ? $user->username : 'NULL' ?></strong>
                    </td>
                  </tr>
                  <tr>
                    <td class="py-3" scope="col">E-mail</td>
                    <td class="py-3" scope="col">
                      <strong>
                        <?= $user->email != null ? $user->email : 'NULL' ?><small class="ml-3" class="<?= $user->role == 'unverified' ? 'Dariah_515' : 'Amen_518' ?>"><?= $user->role == 'unverified' ? '(unverified)' : '(verified)' ?></small>
                      </strong>
                    </td>
                  </tr>
                </table>
              </div>
              <div class="col-md-6 pl-md-5">
                <h3 class="text-dark mb-4">Results</h3>
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
              <div class="row mb-5">
                <h3 class="text-dark mb-4">What Is <strong><?= $results['name'] ?></strong> ?</h3>
                <h6><strong><?= $results['name'] ?></strong> is <?= $results['desc'] ?></h6>
              </div>
              <div class="row">
                <h3 class="text-dark mb-4">Solution for this Disease</h3>
                <h6><?= $results['solution'] ?></h6>
              </div>
            <?php endif; ?>
            <a href="<?= LINK ?>/" class="btn bg-primary text-light mt-5">&larr; Back to Home</a>
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