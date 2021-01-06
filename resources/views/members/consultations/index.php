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

          <div class="yQrO-">
            <div class="_3oEG9 _34J9b">
              <form method="POST" action="<?= LINK ?>/members/consultation/<?= $id ?>?_csrf=<?= $csrfToken ?>">
                <table class="_3bYJs _3Lvqy _1MfMA _2W81z">
                  <thead>
                    <tr>
                      <th scope="col">Questions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($symptoms::findAll(['expertSystemId' => $id]) as $key => $symptom) : $isFound = false; ?>
                      <?php foreach ($knowledgebases::findAll(['expertSystemId' => $id]) as $key => $knowledgebase) : ?>
                        <?php if ($symptom['id'] == json_decode($knowledgebase['solvingId'], true)['symptomId']) {
                          $isFound = true;
                        } ?>
                      <?php endforeach; ?>
                      <?php if ($isFound != true) include VIEW_DIR . "/members/consultations/checkbox.php"; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <button type="submit" class="_2HPko vhjC9">Analyze</button>
              </form>
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