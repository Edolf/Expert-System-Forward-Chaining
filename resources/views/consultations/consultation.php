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
          <div class="Sufyan_297 Montana_404 Aamira_138 Brooke_245 Xochitl_197 Faizan_466">
            <div id="carouselConsult" data-interval="false" data-wrap="false" class="Luz_334 Blessing_Camryn_201 Nicolas_520">
              <div class="Huxton_574">
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
              <a role="button" style="bottom: auto; justify-content: start" class="Draya_880 Karsyn_610 Ulisses_424">
                <svg width="24" height="24" fill="currentColor">
                  <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#chevron-double-left" />
                </svg>
                <span>Previous</span>
              </a>
              <a role="button" style="bottom: auto; justify-content: flex-end" onclick="document.querySelector('#getSymptoms').submit();" class="Ysabella_882 Karsyn_610 Ulisses_424">
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