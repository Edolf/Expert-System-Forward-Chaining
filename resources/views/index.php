<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div id="app" class="bg-background">
  <?php include VIEW_DIR . "/layouts/navbar.php"; ?>
  <div class="content-wrapper d-flex flex-column">
    <div class="content my-4 bg-background">
      <div class="container">
      </div>
    </div>

    <div class="content-wrapper d-flex flex-column">
      <div class="content mb-4 mt-5 bg-card">
        <div class="container-xxl">
          <div class="row p-5">
            <div class="col-md-7 mb-5">
              <h1 class="display-2 brand">Lorem Ipsum</h1>
              <h4 class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil totam repudiandae sunt. Quo unde
                iste
                voluptates vero earum nesciunt autem laboriosam voluptatem a voluptatibus? Nobis fuga quia quidem. Ea, autem.
              </h4>
              <?php if ($user) : ?>
                <a href="<?= LINK ?>/consultation" class="d-flex ai-center btn-large bg-primary rounded-pill text-light" style="max-width: fit-content;">
                  <h4 class="p-0 m-0"><strong class="text-warning">Start Consultation</strong></h4>
                </a>
              <?php else : ?>
                <button type="button" class="btn-large bg-primary rounded-pill text-light" data-toggle="modal" data-target="#authModal">
                  <h4 class="p-0 m-0"><strong class="text-warning">Get Started</strong></h4>
                </button>
              <?php endif; ?>
            </div>
            <div class="col-md-5">
              <?php include VIEW_DIR . "/nurse.php"; ?>
            </div>
          </div>
        </div>
      </div>

      <div class="content my-4 bg-background">
        <div class="container-xxl">
          <div class="row p-5">
            <div class="bg-panel rounded-lg p-5 text-center">
              <h1 class="display-6 brand">About Us</h1>
              <h4 class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil totam repudiandae sunt. Quo unde
                iste
                voluptates vero earum nesciunt autem laboriosam voluptatem a voluptatibus? Nobis fuga quia quidem. Ea, autem.
              </h4>
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