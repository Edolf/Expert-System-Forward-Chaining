<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="wrapper">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="content-wrapper d-flex flex-column bg-background">
    <div class="content mb-4">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="container p-5">
        <div class="row mb-5">

          <?php $flashSelected = 'disease';
          include VIEW_DIR . "/layouts/flash.php"; ?>

          <?php foreach ($expertsystems::findAll() as $key => $ExpertSystem) : ?>
            <div id="<?= preg_replace('/\s+/', '_', $ExpertSystem['problem']) ?>">
              <div class="d-flex ai-center jc-between my-4">
                <h3 class="h3 mb-0 "><?= $ExpertSystem['problem'] ?></h3>
                <button type="button" class="btn bg-primary text-light" data-toggle="modal" data-target="#addDiseaseModal" onclick="document.querySelector('#newDiseaseForm').action = '<?= LINK ?><?= $subUrlMap[8] ?>?problemId=<?= $ExpertSystem['id'] ?>'">Add
                  Disease</button>
              </div>
              <div class="overflow-auto mb-5">
                <table class="table table-hover table-striped bg-card">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Total Cases</th>
                      <th scope="col">Description</th>
                      <th scope="col">Solution</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($diseases::findAll(['expertSystemId' => $ExpertSystem['id']]) as $key => $disease) : ?>
                      <tr>
                        <th class="align-middle"><?= $key + 1 ?></th>
                        <td class="align-middle"><?= $disease['name'] ?></td>
                        <td class="align-middle"><?= $disease['solved'] ?></td>
                        <td class="align-middle"><?= $disease['desc'] ?></td>
                        <td class="align-middle"><?= $disease['solution'] ?></td>
                        <td class="align-middle">
                          <nav class="navbar">
                            <div>
                              <button type="button" class="btn-flat btn-floating dropdown-trigger text-theme" data-target="disease-<?= $disease['id'] ?>" data-alignment="right">
                                <svg class="prefix" width="15" height="15" fill="currentColor">
                                  <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#three-dots-vertical" />
                                </svg>
                              </button>
                              <ul id="disease-<?= $disease['id'] ?>" class="dropdown-content list-unstyled bg-transparent">
                                <li>
                                  <button class="btn bg-success w-100" onclick="setModalValue({editdiseasename:'<?= $disease['name'] ?>',editdiseasedesc:'<?= $disease['desc'] ?>',editdiseasesolution:'<?= $disease['solution'] ?>',edittotalcases:'<?= $disease['solved'] ?>'},document.querySelector('#editDiseaseForm'));document.querySelector('#editDiseaseForm').action = '<?= LINK ?><?= $subUrlMap[8] ?>?id=<?= $disease['id'] ?>&problemId=<?= $ExpertSystem['id'] ?>&name=<?= $disease['name'] ?>';" data-toggle="modal" data-target="#editDiseaseModal">Edit</button>
                                </li>
                                <li>
                                  <form method="post" action="<?= LINK ?><?= $subUrlMap[8] ?>?id=<?= $disease['id'] ?>&name=<?= $disease['name'] ?>&_csrf=<?= $csrfToken ?>&_method=DELETE">
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