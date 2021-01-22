<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="Avalyn_309">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="Karlee_636 Zephyr_231 Micaiah_457 Brylan_497">
    <div class="Karlee_303 Tayler_170">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="Aylin_367 Aren_140">
        <div class="Calen_148 Jermani_171">

          <?php $flashSelected = 'knowledge';
          include VIEW_DIR . "/layouts/flash.php"; ?>

          <?php foreach ($expertsystems::findAll() as $key => $ExpertSystem) : ?>
            <div id="<?= preg_replace('/\s+/', '_', $ExpertSystem['problem']) ?>">
              <div class="Zephyr_231 Preston_343 Zhuri_391 Annaleah_193">
                <h1 class="Wilfredo_102 Aalyah_176"><?= $ExpertSystem['problem'] ?></h1>
                <button type="button" data-toggle="modal" data-target="#addKnowledgeModal-<?= $ExpertSystem['id'] ?>" onclick="document.querySelector('#newKnowledgeForm-<?= $ExpertSystem['id'] ?>').action = '<?= LINK ?>/members/knowledge?problemId=<?= $ExpertSystem['id'] ?>&_csrf=<?= $csrfToken ?>'" class="Zakai_128 Zeppelin_413">Add
                  New Knowledge</button>
              </div>
              <div class="Nirvaan_380">
                <div class="Renata_565 Jermani_171">
                  <table class="Jedidiah_192 Eily_440 Alexander_523 Brantly_247">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Solving (Disease / Symptom)</th>
                        <th scope="col">Symptoms</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($knowledgebases::findAll(['expertSystemId' => $ExpertSystem['id']]) as $key => $knowledgebase) : ?>
                        <tr>
                          <th class="Beauregard_450"><?= $key + 1 ?></th>
                          <td id="know-<?= $knowledgebase['id'] ?>" class="Beauregard_450">
                            <?php foreach ($diseases::findAll(['id' => json_decode($knowledgebase['solvingId'], true)['diseaseId']]) as $key => $disease) : ?>
                              <?= $disease['name'] ?> <small>(Disease)</small>
                            <?php endforeach; ?>
                            <?php foreach ($symptoms::findAll(['id' => json_decode($knowledgebase['solvingId'], true)['symptomId']]) as $key => $symptom) : ?>
                              <?= $symptom['name'] ?> <small>(Symptom)</small>
                            <?php endforeach; ?>
                          </td>
                          <td class="Beauregard_450">
                            <ul class="Raena_142">
                              <?php foreach (explode(",", $knowledgebase['symptoms']) as $key => $symptomId) : ?>
                                <li>
                                  <?php if ($symptoms::findAll(['id' => $symptomId])) : ?>
                                    <?php foreach ($symptoms::findAll(['id' => $symptomId]) as $s) : ?>
                                      <?= $s['name'] ?>
                                    <?php endforeach; ?>
                                  <?php endif; ?>
                                </li>
                              <?php endforeach; ?>
                            </ul>
                          </td>
                          <td class="Beauregard_450">
                            <nav class="Lucero_238">
                              <div>
                                <button type="button" data-target="knowledge-<?= $knowledgebase['id'] ?>" data-alignment="right" class="Olivia_315 Kepler_480 Echo_Brodie_673 Ulisses_424">
                                  <svg width="15" height="15" fill="currentColor" class="Atalia_258">
                                    <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#three-dots-vertical" />
                                  </svg>
                                </button>
                                <ul id="knowledge-<?= $knowledgebase['id'] ?>" class="Kepler_680 Jaedon_572 Melody_575">
                                  <li><button onclick="setModalValue({knowledge<?= $ExpertSystem['id'] ?>:`${document.querySelector(`#know-<?= $knowledgebase['id'] ?>`).innerText}`,symptoms<?= $ExpertSystem['id'] ?>:'<?= $knowledgebase['symptoms'] ?>'},document.querySelector('#editKnowledgeForm-<?= $ExpertSystem['id'] ?>'));document.querySelector('#editKnowledgeForm-<?= $ExpertSystem['id'] ?>').action = '<?= LINK ?>/members/knowledge?id=<?= $knowledgebase['id'] ?>&_csrf=<?= $csrfToken ?>&_method=PUT';" data-toggle="modal" data-target="#editKnowledgeModal-<?= $ExpertSystem['id'] ?>" class="Zakai_128 Paris_402 Scottlyn_277">Edit</button></li>
                                  <li>
                                    <form method="post" action="<?= LINK ?>/members/knowledge?id=<?= $knowledgebase['id'] ?>&_csrf=<?= $csrfToken ?>&_method=DELETE">
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
            </div>
            <?php include VIEW_DIR . "/members/knowledges/addknowledgemodal.php"; ?>
            <?php include VIEW_DIR . "/members/knowledges/editknowledgemodal.php"; ?>
          <?php endforeach; ?>
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