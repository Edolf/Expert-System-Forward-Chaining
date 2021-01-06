<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="_2pyK2">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="_3hy0- _1wHD0 _6Eppu _2fCJU">
    <div class="_24Rxj _1re0U">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="_16ASu _1FnTW">
        <div class="SiBSM _34J9b">

          <?php $flashSelected = 'knowledge';
          include VIEW_DIR . "/layouts/flash.php"; ?>

          <?php foreach ($expertsystems::findAll() as $key => $ExpertSystem) : ?>
            <div class="_1wHD0 _1uVtA _20iUl _3H4vP">
              <h1 class="_25N9D _1aegJ"><?= $ExpertSystem['problem'] ?></h1>
              <button type="button" data-toggle="modal" data-target="#addKnowledgeModal-<?= $ExpertSystem['id'] ?>" onclick="document.querySelector('#newKnowledgeForm-<?= $ExpertSystem['id'] ?>').action = '<?= LINK ?>/members/knowledge?problemId=<?= $ExpertSystem['id'] ?>&_csrf=<?= $csrfToken ?>'" class="_2HPko vhjC9">Add
                New Knowledge</button>
            </div>
            <div class="yQrO-">
              <div class="_3oEG9 _34J9b">
                <table class="_3bYJs _3Lvqy _1MfMA _2W81z">
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
                        <th class="_10754"><?= $key + 1 ?></th>
                        <td id="know-<?= $knowledgebase['id'] ?>" class="_10754">
                          <?php foreach ($diseases::findAll(['id' => json_decode($knowledgebase['solvingId'], true)['diseaseId']]) as $key => $disease) : ?>
                            <?= $disease['name'] ?> <small>(Disease)</small>
                          <?php endforeach; ?>
                          <?php foreach ($symptoms::findAll(['id' => json_decode($knowledgebase['solvingId'], true)['symptomId']]) as $key => $symptom) : ?>
                            <?= $symptom['name'] ?> <small>(Symptom)</small>
                          <?php endforeach; ?>
                        </td>
                        <td class="_10754">
                          <ul class="_3MkHC">
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
                        <td class="_10754">
                          <nav class="_3tbxM">
                            <div>
                              <button type="button" data-target="knowledge-<?= $knowledgebase['id'] ?>" data-alignment="right" class="USCBs _3JDZi _1VhGu _2XuUU">
                                <svg width="15" height="15" fill="currentColor" class="_2mXhC">
                                  <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#three-dots-vertical" />
                                </svg>
                              </button>
                              <ul id="knowledge-<?= $knowledgebase['id'] ?>" class="_3XUI2 _24ZeC _3YqDp">
                                <li><button onclick="setModalValue({knowledge<?= $ExpertSystem['id'] ?>:`${document.querySelector(`#know-<?= $knowledgebase['id'] ?>`).innerText}`,symptoms<?= $ExpertSystem['id'] ?>:'<?= $knowledgebase['symptoms'] ?>'},document.querySelector('#editKnowledgeForm-<?= $ExpertSystem['id'] ?>'));document.querySelector('#editKnowledgeForm-<?= $ExpertSystem['id'] ?>').action = '<?= LINK ?>/members/knowledge?id=<?= $knowledgebase['id'] ?>&_csrf=<?= $csrfToken ?>&_method=PUT';" data-toggle="modal" data-target="#editKnowledgeModal-<?= $ExpertSystem['id'] ?>" class="_2HPko _3-WY3 BoWE6">Edit</button></li>
                                <li>
                                  <form method="post" action="<?= LINK ?>/members/knowledge?id=<?= $knowledgebase['id'] ?>&_csrf=<?= $csrfToken ?>&_method=DELETE">
                                    <button onclick="return confirm('Are you sure you want to Delete it ?')" class="_2HPko _2rGfb BoWE6">Delete</button>
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