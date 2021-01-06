<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="_2pyK2">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="_3hy0- _1wHD0 _6Eppu _2fCJU">
    <div class="_24Rxj _1re0U">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="_16ASu _1FnTW">

        <?php switch ($user->role) {
          case 'admin': ?>
            <?php include VIEW_DIR . "/members/dashboard/admin.php"; ?>
          <?php break;
          case 'doctor': ?>
            <?php include VIEW_DIR . "/members/dashboard/doctor/index.php"; ?>
            <?php include VIEW_DIR . "/members/dashboard/doctor/addproblemmodal.php"; ?>
          <?php break;
          case 'member': ?>
            <?php include VIEW_DIR . "/members/dashboard/member.php"; ?>
            <?php break; ?>
        <?php } ?>

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