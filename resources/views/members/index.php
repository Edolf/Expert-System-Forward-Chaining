<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="_1FInK">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="_2h7iG _1dTWr _3oq1Z vSOIt">
    <div class="F2040 _1PITf">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="_22DlN _3PDUl">

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