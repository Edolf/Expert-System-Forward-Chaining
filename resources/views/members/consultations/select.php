<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="wrapper">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="content-wrapper d-flex flex-column bg-background">
    <div class="content mb-4">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="container p-5">
        <div class="row mb-5">

          <div class="d-flex ai-center jc-between my-4">
            <h1 class="h3 mb-0 "><?= $title ?></h1>
          </div>

          <?php foreach ($expertsystems::findAll() as $key => $ExpertSystem) : ?>
            <div class="card text-center bg-card m-4" style="width: 18rem;">
              <div class="card-body" style="height: 23rem;">
                <h4 class="card-title my-4"><b><?= $ExpertSystem['problem'] ?></b></h4>
                <div class="overflow-auto h-50">
                  <p class="card-text"><?= $ExpertSystem['desc'] ?></p>
                </div>
                <a href="<?= LINK ?><?= $subUrlMap[2] ?>/<?= $ExpertSystem['id'] ?>" class="btn bg-primary text-light my-4">Try This One</a>
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