<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="wrapper">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="content-wrapper d-flex flex-column bg-background">
    <div class="content mb-4">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="container p-5">

        <?php switch ($user->role) {
          case 'admin':
          case 'doctor':
            include VIEW_DIR . "/members/dashboard/doctor/index.php";
            include VIEW_DIR . "/members/dashboard/doctor/addproblemmodal.php";
            break;
          case 'member':
            include VIEW_DIR . "/members/dashboard/member.php";
            break;
        } ?>

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