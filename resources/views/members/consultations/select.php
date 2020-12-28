<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="_1FInK">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="_2h7iG _1dTWr _3oq1Z vSOIt">
    <div class="F2040 _1PITf">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="_22DlN _3PDUl">
        <div class="_3Sail gqtmr">

          <div class="_1dTWr _2kea1 njVXK TidTZ">
            <h1 class="_3vE3C _2gyiY"><?= $title ?></h1>
          </div>

          <?php foreach ($expertsystems::findAll() as $key => $ExpertSystem) : ?>
            <div style="width: 18rem" class="_1aMCn _3znGg s0VLt _1T_p3">
              <div style="height: 23rem" class="_199pu">
                <h4 class="_3oNh9 TidTZ"><b><?= $ExpertSystem['problem'] ?></b></h4>
                <div class="_3JfU8 _2k0sQ">
                  <p class="e2Sjh"><?= $ExpertSystem['desc'] ?></p>
                </div>
                <a href="<?= LINK ?>/members/consultation/<?= $ExpertSystem['id'] ?>" class="_2niE6 Bdn6B _1dYc3 TidTZ">Try This One</a>
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