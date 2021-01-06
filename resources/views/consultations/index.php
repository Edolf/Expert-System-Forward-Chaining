<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div id="app" class="_2fCJU">
  <?php include VIEW_DIR . "/layouts/navbar.php"; ?>
  <div class="_3hy0- _1wHD0 _6Eppu">
    <div class="_24Rxj _3H4vP _2fCJU">
      <div class="_16ASu">
      </div>
    </div>

    <div class="_3hy0- _1wHD0 _6Eppu">

      <div class="_24Rxj KTZ2J _2W81z">
        <div class="_2wxL0">
          <div class="SiBSM _1FnTW">
            <div class="_3hIbh _34J9b">
              <div class="SiBSM">
                <?php foreach ($expertsystems::findAll() as $key => $ExpertSystem) : ?>
                  <div class="_1yUFw _34J9b">
                    <div style="width: 18rem" class="_3zcKU RogPM _2GE1p">
                      <div class="xilMu">
                        <h4 class="_15Jmj _3H4vP lJhPB"><b><?= $ExpertSystem['problem'] ?></b></h4>
                        <p class="zEqNx lJhPB"><?= $ExpertSystem['desc'] ?></p>
                        <a href="<?= LINK ?>/consultation/<?= $ExpertSystem['id'] ?>" class="_2HPko vhjC9 lJhPB">Try This One</a>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
            <div class="_2IUtP">
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