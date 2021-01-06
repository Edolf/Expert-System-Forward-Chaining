<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="_2pyK2">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="_3hy0- _1wHD0 _6Eppu _2fCJU">
    <div class="_24Rxj _1re0U">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="_16ASu _1FnTW">
        <div class="SiBSM _34J9b">
          <?php foreach ($expertsystems::findAll() as $key => $ExpertSystem) : ?>
            <div class="_1wHD0 _1uVtA _20iUl _3H4vP">
              <h1 class="_25N9D _1aegJ"><?= $ExpertSystem['problem'] ?></h1>
            </div>
            <div class="_1yUFw">
              <div class="_1wHD0 _1uVtA _20iUl _3H4vP">
                <h1 class="_25N9D _1aegJ">Rules</h1>
              </div>
              <div class="_3oEG9 _34J9b">
                <?php foreach ($knowledgebases::findAll(['expertSystemId' => $ExpertSystem['id']]) as $key => $knowledgebase) : ?>
                  <ul class="_3SL0A _1TQUr _1re0U">
                    <li class="_3-Y05 _3zXm1 lJhPB"><i>IF</i></li>
                    <?php foreach (explode(",", $knowledgebase['symptoms']) as $key => $symptomId) : ?>
                      <li class="_3-Y05 _2W81z">
                        <?php foreach ($symptoms::findAll(['id' => $symptomId]) as $s) : ?>
                          <i>AND</i> <strong><?= $s['name'] ?></strong>
                        <?php endforeach; ?>
                      </li>
                    <?php endforeach; ?>
                    <li class="_3-Y05 _3zXm1 lJhPB"><i>THEN</i>
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
            <div class="_1yUFw">
              <div class="_1wHD0 _1uVtA _20iUl _3H4vP">
                <h1 class="_25N9D _1aegJ">Questions</h1>
              </div>
              <div class="_3oEG9 _34J9b">
                <ul class="_3SL0A _1TQUr _1re0U">
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