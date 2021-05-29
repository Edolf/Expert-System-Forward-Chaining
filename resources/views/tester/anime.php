<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div id="app" class="bg-background">
  <?php include VIEW_DIR . "/layouts/navbar.php"; ?>
  <div class="content-wrapper d-flex flex-column">
    <div class="content my-4 bg-background">
      <div class="container">
      </div>
    </div>

    <div class="container alert alert-heading alert-link alert-dismissible alert-primary alert-secondary alert-success alert-info alert-warning alert-danger alert-light alert-dark alert-black">
      <html>

      <head>
        <style>
          #ball {
            width: 50px;
            height: 50px;
            background: orange;
            position: absolute;
            left: 50%;
            border-radius: 50%;
          }
        </style>
      </head>

      <body>

        <div id="ball" onclick="testAnimate(this);"> </div>
      </body>

      </html>
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