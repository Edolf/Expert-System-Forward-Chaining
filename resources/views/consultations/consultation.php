<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div id="app" class="vSOIt">
  <?php include VIEW_DIR . "/layouts/navbar.php"; ?>
  <div class="_2h7iG _1dTWr _3oq1Z">
    <div class="F2040 TidTZ vSOIt">
      <div class="_22DlN">
      </div>
    </div>

    <div class="F2040 TidTZ vSOIt">
      <div class="_1PmQJ _3pDOt">
        <div class="_3Sail _27IzI _3ur6_">
          <div class="G6mn4 yqH95 _27IzI _3ur6_ _2DN6r _3znGg">
            <div id="carouselConsult" data-interval="false" data-wrap="false" class="_2qzlW kEW7A _2Xbyu">
              <div class="_29diV">
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
              <a role="button" style="bottom: auto; justify-content: start" class="_3QEPX _1mvwU _8y6Bn">
                <svg css-module="" width="24" height="24" fill="currentColor">
                  <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#chevron-double-left" />
                </svg>
                <span>Previous</span>
              </a>
              <a role="button" style="bottom: auto; justify-content: flex-end" onclick="document.querySelector('#getSymptoms').submit();" class="_1voHE _1mvwU _8y6Bn">
                <span>Analyze</span>
                <svg css-module="" width="24" height="24" fill="currentColor">
                  <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#thermometer-half" />
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