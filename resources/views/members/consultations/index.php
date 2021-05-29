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

          <div class="col-md-10">
            <div class="overflow-auto mb-5">
              <form method="POST" action="<?= LINK ?><?= $subUrlMap[2] ?>/<?= $id ?>?_csrf=<?= $csrfToken ?>" method="post">
                <table class="table table-hover table-striped bg-card">
                  <thead>
                    <tr>
                      <th scope="col">Questions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($symptoms::findAll(['expertSystemId' => $id]) as $key => $symptom) : $isFound = false; ?>
                      <?php foreach ($knowledgebases::findAll(['expertSystemId' => $id]) as $key => $knowledgebase) : ?>
                        <?php if ($symptom['id'] == json_decode($knowledgebase['solvingId'], true)['symptomId']) {
                          $isFound = true;
                        } ?>
                      <?php endforeach; ?>
                      <?php if ($isFound != true) include VIEW_DIR . "/members/consultations/checkbox.php"; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <button type="submit" class="btn bg-primary">Analyze</button>
              </form>
            </div>
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