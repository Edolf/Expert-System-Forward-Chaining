<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="_1FInK">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="_2h7iG _1dTWr _3oq1Z vSOIt">
    <div class="F2040 _1PITf">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="_22DlN _3PDUl">
        <div class="_3Sail gqtmr">

          <?php $flashSelected = 'knowledge';
          include VIEW_DIR . "/layouts/flash.php"; ?>

          <?php foreach ($expertsystems::findAll() as $key => $ExpertSystem) : ?>
            <div class="_1dTWr _2kea1 njVXK TidTZ">
              <h1 class="_3vE3C _2gyiY"><?= $ExpertSystem['problem'] ?></h1>
              <button type="button" data-toggle="modal" data-target="#addKnowledgeModal-<?= $ExpertSystem['id'] ?>" onclick="document.querySelector('#newKnowledgeForm-<?= $ExpertSystem['id'] ?>').action = '<?= LINK ?>/members/knowledge?problemId=<?= $ExpertSystem['id'] ?>&_csrf=<?= $csrfToken ?>'" class="_2niE6 Bdn6B">Add
                New Knowledge</button>
            </div>
            <div class="krQJT">
              <div class="_3JfU8 gqtmr">
                <table class="_12PUq -tn6h _6uPk6 s0VLt">
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
                        <th class="khrLL"><?= $key + 1 ?></th>
                        <td id="know-<?= $knowledgebase['id'] ?>" class="khrLL">
                          <?php foreach ($diseases::findAll(['id' => json_decode($knowledgebase['solvingId'], true)['diseaseId']]) as $key => $disease) : ?>
                            <?= $disease['name'] ?> <small>(Disease)</small>
                          <?php endforeach; ?>
                          <?php foreach ($symptoms::findAll(['id' => json_decode($knowledgebase['solvingId'], true)['symptomId']]) as $key => $symptom) : ?>
                            <?= $symptom['name'] ?> <small>(Symptom)</small>
                          <?php endforeach; ?>
                        </td>
                        <td class="khrLL">
                          <ul class="_10lSW">
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
                        <td class="khrLL">
                          <nav class="_4m9J6">
                            <div>
                              <button type="button" data-target="knowledge-<?= $knowledgebase['id'] ?>" data-alignment="right" class="_2zhDk _2QgNG _3VHKy _8y6Bn">
                                <svg width="15" height="15" fill="currentColor" class="_2i-WK">
                                  <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#three-dots-vertical" />
                                </svg>
                              </button>
                              <ul id="knowledge-<?= $knowledgebase['id'] ?>" class="EYW33 _2dgNq _5OpzR">
                                <li><button onclick="setModalValue({knowledge<?= $ExpertSystem['id'] ?>:`${document.querySelector(`#know-<?= $knowledgebase['id'] ?>`).innerText}`,symptoms<?= $ExpertSystem['id'] ?>:'<?= $knowledgebase['symptoms'] ?>'},document.querySelector('#editKnowledgeForm-<?= $ExpertSystem['id'] ?>'));document.querySelector('#editKnowledgeForm-<?= $ExpertSystem['id'] ?>').action = '<?= LINK ?>/members/knowledge?id=<?= $knowledgebase['id'] ?>&_csrf=<?= $csrfToken ?>&_method=PUT';" data-toggle="modal" data-target="#editKnowledgeModal-<?= $ExpertSystem['id'] ?>" class="_2niE6 _222Gi _2S6Up">Edit</button></li>
                                <li>
                                  <form method="post" action="<?= LINK ?>/members/knowledge?id=<?= $knowledgebase['id'] ?>&_csrf=<?= $csrfToken ?>&_method=DELETE">
                                    <button onclick="return confirm('Are you sure you want to Delete it ?')" class="_2niE6 cnWz7 _2S6Up">Delete</button>
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