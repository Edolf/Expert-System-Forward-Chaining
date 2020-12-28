<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="_1FInK">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="_2h7iG _1dTWr _3oq1Z vSOIt">
    <div class="F2040 _1PITf">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="_22DlN _3PDUl">
        <div class="_3Sail gqtmr">

          <div class="_1dTWr _2kea1 njVXK TidTZ">
            <h1 class="_3vE3C _2gyiY"><?= $title ?></h1>
          </div>

          <div class="krQJT">
            <div class="_3JfU8 gqtmr">
              <form method="POST" action="<?= LINK ?>/members/consultation/<?= $id ?>?_csrf=<?= $csrfToken ?>">
                <table class="_12PUq -tn6h _6uPk6 s0VLt">
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
                <button type="submit" class="_2niE6 Bdn6B">Analyze</button>
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