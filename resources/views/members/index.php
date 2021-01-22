<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="Avalyn_309">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="Karlee_636 Zephyr_231 Micaiah_457 Brylan_497">
    <div class="Karlee_303 Tayler_170">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="Aylin_367 Aren_140">

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