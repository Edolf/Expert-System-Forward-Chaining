<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div id="app" class="bg-background">
  <?php include VIEW_DIR . "/layouts/navbar.php"; ?>
  <div class="content-wrapper d-flex flex-column">
    <div class="content my-4 bg-background">
      <div class="container">
      </div>
    </div>

    <div class="content-wrapper d-flex flex-column">

      <div class="content my-5 bg-card">
        <div class="container-xxl">
          <div class="row p-5">
            <div class="col-md-7 mb-5">
              <div class="row">
                <?php foreach ($expertsystems::findAll() as $key => $ExpertSystem) : ?>
                  <div class="col-md-6 mb-5" id="<?= preg_replace('/\s+/', '_', $ExpertSystem['problem']) ?>">
                    <div class="card text-center bg-navbar" style="width: 18rem;">
                      <div class="card-body">
                        <h4 class="card-title my-4 text-light"><b><?= $ExpertSystem['problem'] ?></b></h4>
                        <p class="card-text text-light"><?= $ExpertSystem['desc'] ?></p>
                        <a href="<?= LINK ?>/consultation/<?= $ExpertSystem['id'] ?>" class="btn bg-primary text-light">Try This One</a>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
            <div class="col-md-5">
              <?php include VIEW_DIR . "/nurse.php"; ?>
            </div>
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