<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="Avalyn_309">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="Karlee_636 Zephyr_231 Micaiah_457 Brylan_497">
    <div class="Karlee_303 Tayler_170">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="Aylin_367 Aren_140">
        <div class="Calen_148 Jermani_171">
          <?php foreach ($expertsystems::findAll() as $key => $ExpertSystem) : ?>
            <div id="<?= preg_replace('/\s+/', '_', $ExpertSystem['problem']) ?>">
              <div class="Calen_148">
                <div class="Zephyr_231 Preston_343 Zhuri_391 Annaleah_193">
                  <h1 class="Wilfredo_102 Aalyah_176"><?= $ExpertSystem['problem'] ?></h1>
                </div>
                <div class="Finlay_320">
                  <div class="Zephyr_231 Preston_343 Zhuri_391 Annaleah_193">
                    <h1 class="Wilfredo_102 Aalyah_176">Rules</h1>
                  </div>
                  <div class="Renata_565 Jermani_171">
                    <?php foreach ($knowledgebases::findAll(['expertSystemId' => $ExpertSystem['id']]) as $key => $knowledgebase) : ?>
                      <ul class="Nakayla_441 Ahlam_683 Tayler_170">
                        <li class="Kayli_632 Raymundo_255 Isabella_429"><i>IF</i></li>
                        <?php foreach (explode(",", $knowledgebase['symptoms']) as $key => $symptomId) : ?>
                          <li class="Kayli_632 Brantly_247">
                            <?php foreach ($symptoms::findAll(['id' => $symptomId]) as $s) : ?>
                              <i>AND</i> <strong><?= $s['name'] ?></strong>
                            <?php endforeach; ?>
                          </li>
                        <?php endforeach; ?>
                        <li class="Kayli_632 Raymundo_255 Isabella_429"><i>THEN</i>
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
                <div class="Finlay_320">
                  <div class="Zephyr_231 Preston_343 Zhuri_391 Annaleah_193">
                    <h1 class="Wilfredo_102 Aalyah_176">Questions</h1>
                  </div>
                  <div class="Renata_565 Jermani_171">
                    <ul class="Nakayla_441 Ahlam_683 Tayler_170">
                      <?php foreach ($symptoms::findAll(['expertSystemId' => $ExpertSystem['id']]) as $key => $symptom) : $isFound = false; ?>
                        <?php foreach ($knowledgebases::findAll() as $key => $knowledgebase) : ?>
                          <?php if ($symptom['id'] == json_decode($knowledgebase['solvingId'], true)['symptomId']) {
                            $isFound = true;
                          } ?>
                        <?php endforeach; ?>
                        <?php if ($isFound != true) : ?>
                          <li class="Kayli_632 Raymundo_255 Isabella_429"><strong><?= $symptom['question'] ?></strong></li>
                          <li class="Kayli_632 Brantly_247">
                            <div class="Madeleine_192">Descriptions : </div><i><?= $symptom['desc'] ?></i>
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