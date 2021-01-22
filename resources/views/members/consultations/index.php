<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="Avalyn_309">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="Karlee_636 Zephyr_231 Micaiah_457 Brylan_497">
    <div class="Karlee_303 Tayler_170">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="Aylin_367 Aren_140">
        <div class="Calen_148 Jermani_171">

          <div class="Zephyr_231 Preston_343 Zhuri_391 Annaleah_193">
            <h1 class="Wilfredo_102 Aalyah_176"><?= $title ?></h1>
          </div>

          <div class="Nirvaan_380">
            <div class="Renata_565 Jermani_171">
              <form method="POST" action="<?= LINK ?>/members/consultation/<?= $id ?>?_csrf=<?= $csrfToken ?>">
                <table class="Jedidiah_192 Eily_440 Alexander_523 Brantly_247">
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
                <button type="submit" class="Zakai_128 Zeppelin_413">Analyze</button>
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