<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="wrapper">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="content-wrapper d-flex flex-column bg-background">
    <div class="content mb-4">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="container p-5">
        <div class="row mb-5">

          <?php $flashSelected = 'knowledge';
          include VIEW_DIR . "/layouts/flash.php"; ?>

          <?php foreach ($expertsystems::findAll() as $key => $ExpertSystem) : ?>
            <div id="<?= preg_replace('/\s+/', '_', $ExpertSystem['problem']) ?>">
              <div class="d-flex ai-center jc-between my-4">
                <h1 class="h3 mb-0 "><?= $ExpertSystem['problem'] ?></h1>
                <button type="button" class="btn bg-primary" data-toggle="modal" data-target="#addKnowledgeModal-<?= $ExpertSystem['id'] ?>" onclick="document.querySelector('#newKnowledgeForm-<?= $ExpertSystem['id'] ?>').action = '<?= LINK ?><?= $collUrlMap[4] ?>?problemId=<?= $ExpertSystem['id'] ?>&_csrf=<?= $csrfToken ?>'">Add
                  New Knowledge</button>
              </div>
              <div class="col-md-10">
                <div class="overflow-auto mb-5">
                  <table class="table table-hover table-striped bg-card">
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
                          <th class="align-middle"><?= $key + 1 ?></th>
                          <td id="know-<?= $knowledgebase['id'] ?>" class="align-middle">
                            <?php foreach ($diseases::findAll(['id' => json_decode($knowledgebase['solvingId'], true)['diseaseId']]) as $key => $disease) : ?>
                              <?= $disease['name'] ?> <small>(Disease)</small>
                            <?php endforeach; ?>
                            <?php foreach ($symptoms::findAll(['id' => json_decode($knowledgebase['solvingId'], true)['symptomId']]) as $key => $symptom) : ?>
                              <?= $symptom['name'] ?> <small>(Symptom)</small>
                            <?php endforeach; ?>
                          </td>
                          <td class="align-middle">
                            <ul class="m-0">
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
                          <td class="align-middle">
                            <nav class="navbar">
                              <div>
                                <button type="button" class="btn-flat btn-floating dropdown-trigger text-theme" data-target="knowledge-<?= $knowledgebase['id'] ?>" data-alignment="right">
                                  <svg class="prefix" width="15" height="15" fill="currentColor">
                                    <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#three-dots-vertical" />
                                  </svg>
                                </button>
                                <ul id="knowledge-<?= $knowledgebase['id'] ?>" class="dropdown-content list-unstyled bg-transparent">
                                  <li><button class="btn bg-success w-100" onclick="setModalValue({knowledge<?= $ExpertSystem['id'] ?>:`${document.querySelector(`#know-<?= $knowledgebase['id'] ?>`).innerText}`,symptoms<?= $ExpertSystem['id'] ?>:'<?= $knowledgebase['symptoms'] ?>'},document.querySelector('#editKnowledgeForm-<?= $ExpertSystem['id'] ?>'));document.querySelector('#editKnowledgeForm-<?= $ExpertSystem['id'] ?>').action = '<?= LINK ?><?= $collUrlMap[4] ?>?id=<?= $knowledgebase['id'] ?>&_csrf=<?= $csrfToken ?>&_method=PUT';" data-toggle="modal" data-target="#editKnowledgeModal-<?= $ExpertSystem['id'] ?>">Edit</button></li>
                                  <li>
                                    <form method="post" action="<?= LINK ?><?= $collUrlMap[4] ?>?id=<?= $knowledgebase['id'] ?>&_csrf=<?= $csrfToken ?>&_method=DELETE">
                                      <button class="btn bg-danger w-100" onclick="return confirm('Are you sure you want to Delete it ?')">Delete</button>
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