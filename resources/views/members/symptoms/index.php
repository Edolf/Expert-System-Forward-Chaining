<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="Avalyn_309">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="Karlee_636 Zephyr_231 Micaiah_457 Brylan_497">
    <div class="Karlee_303 Tayler_170">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="Aylin_367 Aren_140">
        <div class="Calen_148 Jermani_171">

          <?php $flashSelected = 'symptom';
          include VIEW_DIR . "/layouts/flash.php"; ?>

          <?php foreach ($expertsystems::findAll() as $key => $ExpertSystem) : ?>
            <div id="<?= preg_replace('/\s+/', '_', $ExpertSystem['problem']) ?>">
              <div class="Zephyr_231 Preston_343 Zhuri_391 Annaleah_193">
                <h1 class="Wilfredo_102 Aalyah_176"><?= $ExpertSystem['problem'] ?></h1>
                <button type="button" data-toggle="modal" data-target="#addSymptomModal" onclick="document.querySelector('#newSymptomForm').action = '<?= LINK ?>/members/symptom?problemId=<?= $ExpertSystem['id'] ?>'" class="Zakai_128 Zeppelin_413 Isabella_429">Add
                  New Symptoms</button>
              </div>
              <div class="Renata_565 Jermani_171">
                <table class="Jedidiah_192 Eily_440 Alexander_523 Brantly_247">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Description</th>
                      <th scope="col">Question</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($symptoms::findAll(['expertSystemId' => $ExpertSystem['id']]) as $key => $symptom) : ?>
                      <tr>
                        <th class="Beauregard_450"><?= $key + 1 ?></th>
                        <td class="Beauregard_450"><?= $symptom['name'] ?></td>
                        <td class="Beauregard_450"><?= $symptom['desc'] ?></td>
                        <td class="Beauregard_450"><?= $symptom['question'] ?></td>
                        <td class="Beauregard_450">
                          <nav class="Lucero_238">
                            <div>
                              <button type="button" data-target="symptom-<?= $symptom['id'] ?>" data-alignment="right" class="Olivia_315 Kepler_480 Echo_Brodie_673 Ulisses_424">
                                <svg width="15" height="15" fill="currentColor" class="Atalia_258">
                                  <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#three-dots-vertical" />
                                </svg>
                              </button>
                              <ul id="symptom-<?= $symptom['id'] ?>" class="Kepler_680 Jaedon_572 Melody_575">
                                <li><button onclick="setModalValue({editsymptomname:'<?= $symptom['name'] ?>',editsymptomdesc:'<?= $symptom['desc'] ?>',editquestion:'<?= $symptom['question'] ?>'},document.querySelector('#editSymptomForm'));document.querySelector('#editSymptomForm').action = '<?= LINK ?>/members/symptom?id=<?= $symptom['id'] ?>&problemId=<?= $ExpertSystem['id'] ?>&name=<?= $symptom['name'] ?>';" data-toggle="modal" data-target="#editSymptomModal" class="Zakai_128 Paris_402 Scottlyn_277">Edit</button></li>
                                <li>
                                  <form method="post" action="<?= LINK ?>/members/symptom?id=<?= $symptom['id'] ?>&name=<?= $symptom['name'] ?>&_csrf=<?= $csrfToken ?>&_method=DELETE">
                                    <button onclick="return confirm('Are you sure you want to Delete it ?')" class="Zakai_128 Hutton_326 Scottlyn_277">Delete</button>
                                  </form>
                                </li>
                              </ul>
                            </div>
                          </nav>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <?php include VIEW_DIR . "/members/symptoms/addsymptommodal.php"; ?>
    <?php include VIEW_DIR . "/members/symptoms/editsymptommodal.php"; ?>
    <?php include VIEW_DIR . "/layouts/footbar.php"; ?>
  </div>
</div>
<?php include VIEW_DIR . "/auths/authmodal.php"; ?>
<?php include VIEW_DIR . "/auths/forgot/forgotmodal.php"; ?>
<?php include VIEW_DIR . "/auths/verify/verifymodal.php"; ?>
<?php include VIEW_DIR . "/auths/logoutmodal.php"; ?>
<?php include VIEW_DIR . "/layouts/gotop.php"; ?>
<?php include VIEW_DIR . "/layouts/footer.php"; ?>