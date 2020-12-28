<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div id="app" class="vSOIt">
  <?php include VIEW_DIR . "/layouts/navbar.php"; ?>
  <div class="_2h7iG _1dTWr _3oq1Z">
    <div class="F2040 TidTZ vSOIt">
      <div class="_22DlN">
      </div>
    </div>

    <div class="_2h7iG _1dTWr _3oq1Z">

      <div class="F2040 _3pDOt s0VLt">
        <div class="_1PmQJ">
          <div class="_3Sail _3PDUl">
            <div class="_2wnub gqtmr">
              <div class="_3Sail">
                <?php foreach ($expertsystems::findAll() as $key => $ExpertSystem) : ?>
                  <div class="_1s9b_ gqtmr">
                    <div style="width: 18rem" class="_1aMCn _3znGg _2vYBG">
                      <div class="_199pu">
                        <h4 class="_3oNh9 TidTZ _1dYc3"><b><?= $ExpertSystem['problem'] ?></b></h4>
                        <p class="e2Sjh _1dYc3"><?= $ExpertSystem['desc'] ?></p>
                        <a href="<?= LINK ?>/consultation/<?= $ExpertSystem['id'] ?>" class="_2niE6 Bdn6B _1dYc3">Try This One</a>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
            <div class="_3HVzZ">
              <?php include VIEW_DIR . "/nurse.php"; ?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <?php include VIEW_DIR . "/layouts/footbar.php"; ?>
</div>

<?php include VIEW_DIR . "/auths/authmodal.php"; ?>
<?php include VIEW_DIR . "/auths/forgot/forgotmodal.php"; ?>
<?php include VIEW_DIR . "/auths/verify/verifymodal.php"; ?>
<?php include VIEW_DIR . "/auths/logoutmodal.php"; ?>
<?php include VIEW_DIR . "/layouts/gotop.php"; ?>
<?php include VIEW_DIR . "/layouts/footer.php"; ?>