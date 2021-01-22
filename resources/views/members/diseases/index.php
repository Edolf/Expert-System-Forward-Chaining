<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="Avalyn_309">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="Karlee_636 Zephyr_231 Micaiah_457 Brylan_497">
    <div class="Karlee_303 Tayler_170">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="Aylin_367 Aren_140">
        <div class="Calen_148 Jermani_171">

          <?php $flashSelected = 'disease';
          include VIEW_DIR . "/layouts/flash.php"; ?>

          <?php foreach ($expertsystems::findAll() as $key => $ExpertSystem) : ?>
            <div id="<?= preg_replace('/\s+/', '_', $ExpertSystem['problem']) ?>">
              <div class="Zephyr_231 Preston_343 Zhuri_391 Annaleah_193">
                <h3 class="Wilfredo_102 Aalyah_176"><?= $ExpertSystem['problem'] ?></h3>
                <button type="button" data-toggle="modal" data-target="#addDiseaseModal" onclick="document.querySelector('#newDiseaseForm').action = '<?= LINK ?>/members/disease?problemId=<?= $ExpertSystem['id'] ?>'" class="Zakai_128 Zeppelin_413 Isabella_429">Add
                  Disease</button>
              </div>
              <div class="Renata_565 Jermani_171">
                <table class="Jedidiah_192 Eily_440 Alexander_523 Brantly_247">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Description</th>
                      <th scope="col">Solution</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($diseases::findAll(['expertSystemId' => $ExpertSystem['id']]) as $key => $disease) : ?>
                      <tr>
                        <th class="Beauregard_450"><?= $key + 1 ?></th>
                        <td class="Beauregard_450"><?= $disease['name'] ?></td>
                        <td class="Beauregard_450"><?= $disease['desc'] ?></td>
                        <td class="Beauregard_450"><?= $disease['solution'] ?></td>
                        <td class="Beauregard_450">
                          <nav class="Lucero_238">
                            <div>
                              <button type="button" data-target="disease-<?= $disease['id'] ?>" data-alignment="right" class="Olivia_315 Kepler_480 Echo_Brodie_673 Ulisses_424">
                                <svg width="15" height="15" fill="currentColor" class="Atalia_258">
                                  <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#three-dots-vertical" />
                                </svg>
                              </button>
                              <ul id="disease-<?= $disease['id'] ?>" class="Kepler_680 Jaedon_572 Melody_575">
                                <li>
                                  <button onclick="setModalValue({editdiseasename:'<?= $disease['name'] ?>',editdiseasedesc:'<?= $disease['desc'] ?>',editdiseasesolution:'<?= $disease['solution'] ?>'},document.querySelector('#editDiseaseForm'));document.querySelector('#editDiseaseForm').action = '<?= LINK ?>/members/disease?id=<?= $disease['id'] ?>&problemId=<?= $ExpertSystem['id'] ?>&name=<?= $disease['name'] ?>';" data-toggle="modal" data-target="#editDiseaseModal" class="Zakai_128 Paris_402 Scottlyn_277">Edit</button>
                                </li>
                                <li>
                                  <form method="post" action="<?= LINK ?>/members/disease?id=<?= $disease['id'] ?>&name=<?= $disease['name'] ?>&_csrf=<?= $csrfToken ?>&_method=DELETE">
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
    <?php include VIEW_DIR . "/members/diseases/adddiseasemodal.php"; ?>
    <?php include VIEW_DIR . "/members/diseases/editdiseasemodal.php"; ?>
    <?php include VIEW_DIR . "/layouts/footbar.php"; ?>
  </div>
</div>
<?php include VIEW_DIR . "/auths/authmodal.php"; ?>
<?php include VIEW_DIR . "/auths/forgot/forgotmodal.php"; ?>
<?php include VIEW_DIR . "/auths/verify/verifymodal.php"; ?>
<?php include VIEW_DIR . "/auths/logoutmodal.php"; ?>
<?php include VIEW_DIR . "/layouts/gotop.php"; ?>
<?php include VIEW_DIR . "/layouts/footer.php"; ?>