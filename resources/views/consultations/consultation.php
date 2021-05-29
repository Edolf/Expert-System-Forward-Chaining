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
          <div class="bg-panel rounded-lg p-3 p-md-5 py-5 text-center">
            <div id="carouselConsult" class="carousel slide carousel-dark" data-interval="false" data-wrap="false">
              <div class="carousel-inner">
                <form method="POST" id="getSymptoms" action="<?= LINK ?>/consultation/<?= $id ?>?_csrf=<?= $csrfToken ?>" method="post">
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
              <a class="carousel-control-prev text-decor-none text-theme" role="button" style="bottom: auto; justify-content: start;">
                <svg width="24" height="24" fill="currentColor">
                  <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#chevron-double-left" />
                </svg>
                <span>Previous</span>
              </a>
              <a class="carousel-control-next text-decor-none text-theme" role="button" style="bottom: auto; justify-content: flex-end;" onclick="document.querySelector('#getSymptoms').submit();">
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