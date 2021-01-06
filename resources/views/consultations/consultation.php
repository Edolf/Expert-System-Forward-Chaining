<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div id="app" class="_2fCJU">
  <?php include VIEW_DIR . "/layouts/navbar.php"; ?>
  <div class="_3hy0- _1wHD0 _6Eppu">
    <div class="_24Rxj _3H4vP _2fCJU">
      <div class="_16ASu">
      </div>
    </div>

    <div class="_24Rxj _3H4vP _2fCJU">
      <div class="_2wxL0 KTZ2J">
        <div class="SiBSM _30EOh _9z3Wc">
          <div class="_2rSiM eK4KG _30EOh _9z3Wc _32W6N RogPM">
            <div id="carouselConsult" data-interval="false" data-wrap="false" class="_1TXlW ZXtfC _2wjzR">
              <div class="_1YLKn">
                <form method="POST" id="getSymptoms" action="<?= LINK ?>/consultation/<?= $id ?>?_csrf=<?= $csrfToken ?>">
                  <?php foreach ($symptoms::findAll(['expertSystemId' => $id]) as $key => $symptom) {
                    $isFound = false;
                    foreach ($knowledgebases::findAll(['expertSystemId' => $id]) as $key => $knowledgebase) {
                      if ($symptom['id'] == (json_decode($knowledgebase['solvingId'], true)['symptomId'] ?? false)) {
                        $isFound = true;
                      }
                    }
                    if ($isFound != true) {
                      $i++;
                      include VIEW_DIR . "/consultations/answer.php";
                    }
                  } ?>
                </form>
              </div>
              <a role="button" style="bottom: auto; justify-content: start" class="_3MY7v _2h8rF _2XuUU">
                <svg width="24" height="24" fill="currentColor">
                  <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#chevron-double-left" />
                </svg>
                <span>Previous</span>
              </a>
              <a role="button" style="bottom: auto; justify-content: flex-end" onclick="document.querySelector('#getSymptoms').submit();" class="_3dwPx _2h8rF _2XuUU">
                <span>Analyze</span>
                <svg width="24" height="24" fill="currentColor">
                  <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#thermometer-half" />
                </svg>
              </a>
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