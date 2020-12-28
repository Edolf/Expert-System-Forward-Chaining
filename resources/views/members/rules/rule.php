<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="_1FInK">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="_2h7iG _1dTWr _3oq1Z vSOIt">
    <div class="F2040 _1PITf">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="_22DlN _3PDUl">
        <div class="_3Sail gqtmr">
          <?php foreach ($expertsystems::findAll() as $key => $ExpertSystem) : ?>
            <div class="_1dTWr _2kea1 njVXK TidTZ">
              <h1 class="_3vE3C _2gyiY"><?= $ExpertSystem['problem'] ?></h1>
            </div>
            <div class="_1s9b_">
              <div class="_1dTWr _2kea1 njVXK TidTZ">
                <h1 class="_3vE3C _2gyiY">Rules</h1>
              </div>
              <div class="_3JfU8 gqtmr">
                <?php foreach ($knowledgebases::findAll(['expertSystemId' => $ExpertSystem['id']]) as $key => $knowledgebase) : ?>
                  <ul class="_3URnS _71IJb _1PITf">
                    <li class="_1Db0X F570B _1dYc3"><i>IF</i></li>
                    <?php foreach (explode(",", $knowledgebase['symptoms']) as $key => $symptomId) : ?>
                      <li class="_1Db0X s0VLt">
                        <?php foreach ($symptoms::findAll(['id' => $symptomId]) as $s) : ?>
                          <i>AND</i> <strong><?= $s['name'] ?></strong>
                        <?php endforeach; ?>
                      </li>
                    <?php endforeach; ?>
                    <li class="_1Db0X F570B _1dYc3"><i>THEN</i>
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
            <div class="_1s9b_">
              <div class="_1dTWr _2kea1 njVXK TidTZ">
                <h1 class="_3vE3C _2gyiY">Questions</h1>
              </div>
              <div class="_3JfU8 gqtmr">
                <ul class="_3URnS _71IJb _1PITf">
                  <?php foreach ($symptoms::findAll(['expertSystemId' => $ExpertSystem['id']]) as $key => $symptom) : $isFound = false; ?>
                    <?php foreach ($knowledgebases::findAll() as $key => $knowledgebase) : ?>
                      <?php if ($symptom['id'] == json_decode($knowledgebase['solvingId'], true)['symptomId']) {
                        $isFound = true;
                      } ?>
                    <?php endforeach; ?>
                    <?php if ($isFound != true) include VIEW_DIR . "/members/rules/listrule.php"; ?>
                  <?php endforeach; ?>
                </ul>
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