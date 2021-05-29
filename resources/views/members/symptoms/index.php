<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="wrapper">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="content-wrapper d-flex flex-column bg-background">
    <div class="content mb-4">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="container p-5">
        <div class="row mb-5">

          <?php $flashSelected = 'symptom';
          include VIEW_DIR . "/layouts/flash.php"; ?>

          <?php foreach ($expertsystems::findAll() as $key => $ExpertSystem) : ?>
            <div id="<?= preg_replace('/\s+/', '_', $ExpertSystem['problem']) ?>">
              <div class="d-flex ai-center jc-between my-4">
                <h1 class="h3 mb-0 "><?= $ExpertSystem['problem'] ?></h1>
                <button type="button" class="btn bg-primary text-light" data-toggle="modal" data-target="#addSymptomModal" onclick="document.querySelector('#newSymptomForm').action = '<?= LINK ?><?= $subUrlMap[9] ?>?problemId=<?= $ExpertSystem['id'] ?>'">Add
                  New Symptoms</button>
              </div>
              <div class="overflow-auto mb-5">
                <table class="table table-hover table-striped bg-card">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Description</th>
                      <th scope="col">CF</th>
                      <th scope="col">Question</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($symptoms::findAll(['expertSystemId' => $ExpertSystem['id']]) as $key => $symptom) : ?>
                      <tr>
                        <th class="align-middle"><?= $key + 1 ?></th>
                        <td class="align-middle"><?= $symptom['name'] ?></td>
                        <td class="align-middle"><?= $symptom['desc'] ?></td>
                        <td class="align-middle"><?= $symptom['cf'] ?></td>
                        <td class="align-middle"><?= $symptom['question'] ?></td>
                        <td class="align-middle">
                          <nav class="navbar">
                            <div>
                              <button type="button" class="btn-flat btn-floating dropdown-trigger text-theme" data-target="symptom-<?= $symptom['id'] ?>" data-alignment="right">
                                <svg class="prefix" width="15" height="15" fill="currentColor">
                                  <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#three-dots-vertical" />
                                </svg>
                              </button>
                              <ul id="symptom-<?= $symptom['id'] ?>" class="dropdown-content list-unstyled bg-transparent">
                                <li><button class="btn bg-success w-100" onclick="setModalValue({editsymptomname:'<?= $symptom['name'] ?>',editsymptomdesc:'<?= $symptom['desc'] ?>',editquestion:'<?= $symptom['question'] ?>'},document.querySelector('#editSymptomForm'));document.querySelector('#editSymptomForm').action = '<?= LINK ?><?= $subUrlMap[9] ?>?id=<?= $symptom['id'] ?>&problemId=<?= $ExpertSystem['id'] ?>&name=<?= $symptom['name'] ?>';" data-toggle="modal" data-target="#editSymptomModal">Edit</button></li>
                                <li>
                                  <form method="post" action="<?= LINK ?><?= $subUrlMap[9] ?>?id=<?= $symptom['id'] ?>&name=<?= $symptom['name'] ?>&_csrf=<?= $csrfToken ?>&_method=DELETE">
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