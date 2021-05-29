<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="wrapper">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="content-wrapper d-flex flex-column bg-background">
    <div class="content mb-4">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="container p-5">
        <div class="row mb-5">
          <?php foreach ($expertsystems::findAll() as $key => $ExpertSystem) : ?>
            <div id="<?= preg_replace('/\s+/', '_', $ExpertSystem['problem']) ?>">
              <div class="row">
                <div class="d-flex ai-center jc-between my-4">
                  <h1 class="h3 mb-0 "><?= $ExpertSystem['problem'] ?></h1>
                </div>
                <div class="col-md-6">
                  <div class="d-flex ai-center jc-between my-4">
                    <h1 class="h3 mb-0 ">Rules</h1>
                  </div>
                  <div class="overflow-auto mb-5">
                    <?php foreach ($knowledgebases::findAll(['expertSystemId' => $ExpertSystem['id']]) as $key => $knowledgebase) : ?>
                      <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item bg-dark text-light"><i>IF</i></li>
                        <?php foreach (explode(",", $knowledgebase['symptoms']) as $key => $symptomId) : ?>
                          <li class="list-group-item bg-card">
                            <?php foreach ($symptoms::findAll(['id' => $symptomId]) as $s) : ?>
                              <i>AND</i> <strong><?= $s['name'] ?></strong>
                            <?php endforeach; ?>
                          </li>
                        <?php endforeach; ?>
                        <li class="list-group-item bg-dark text-light"><i>THEN</i>
                          <?php foreach ($diseases::findAll(['id' => json_decode($knowledgebase['solvingId'], true)['diseaseId']]) as $key => $disease) : ?>
                            <strong><?= $disease['name'] ?></strong> <small>(Disease)</small>
                          <?php endforeach; ?>
                          <?php foreach ($symptoms::findAll(['id' => json_decode($knowledgebase['solvingId'], true)['symptomId']]) as $key => $symptom) : ?>
                            <strong><?= $symptom['name'] ?></strong> <small>(Symptom)</small>
                          <?php endforeach; ?>
                        </li>
                      </ul>
                    <?php endforeach; ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="d-flex ai-center jc-between my-4">
                    <h1 class="h3 mb-0 ">Questions</h1>
                  </div>
                  <div class="overflow-auto mb-5">
                    <ul class="list-group list-group-flush mb-4">
                      <?php foreach ($symptoms::findAll(['expertSystemId' => $ExpertSystem['id']]) as $key => $symptom) : $isFound = false; ?>
                        <?php foreach ($knowledgebases::findAll() as $key => $knowledgebase) : ?>
                          <?php if ($symptom['id'] == json_decode($knowledgebase['solvingId'], true)['symptomId']) {
                            $isFound = true;
                          } ?>
                        <?php endforeach; ?>
                        <?php if ($isFound != true) : ?>
                          <li class="list-group-item bg-dark text-light"><strong><?= $symptom['question'] ?></strong></li>
                          <li class="list-group-item bg-card">
                            <div class="my-3">Descriptions : </div><i><?= $symptom['desc'] ?></i>
                          </li>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
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