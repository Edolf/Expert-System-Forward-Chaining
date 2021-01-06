<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="_2pyK2">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="_3hy0- _1wHD0 _6Eppu _2fCJU">
    <div class="_24Rxj _1re0U">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="_16ASu _1FnTW">
        <div class="SiBSM _34J9b">

          <div class="_1wHD0 _1uVtA _20iUl _3H4vP">
            <h1 class="_25N9D _1aegJ"><?= $title ?></h1>
          </div>

          <?php foreach ($expertsystems::findAll() as $key => $ExpertSystem) : ?>
            <div style="width: 18rem" class="_3zcKU RogPM _2W81z _3-_HB">
              <div style="height: 23rem" class="xilMu">
                <h4 class="_15Jmj _3H4vP"><b><?= $ExpertSystem['problem'] ?></b></h4>
                <div class="_3oEG9 _8m6DD">
                  <p class="zEqNx"><?= $ExpertSystem['desc'] ?></p>
                </div>
                <a href="<?= LINK ?>/members/consultation/<?= $ExpertSystem['id'] ?>" class="_2HPko vhjC9 lJhPB _3H4vP">Try This One</a>
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