<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="_1FInK">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="_2h7iG _1dTWr _3oq1Z vSOIt">
    <div class="F2040 _1PITf">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="_22DlN _3PDUl">
        <div class="_3Sail gqtmr">

          <?php $flashSelected = 'disease';
          include VIEW_DIR . "/layouts/flash.php"; ?>

          <?php foreach ($expertsystems::findAll() as $key => $ExpertSystem) : ?>
            <div class="_1dTWr _2kea1 njVXK TidTZ">
              <h3 class="_3vE3C _2gyiY"><?= $ExpertSystem['problem'] ?></h3>
              <button type="button" data-toggle="modal" data-target="#addDiseaseModal" onclick="document.querySelector('#newDiseaseForm').action = '<?= LINK ?>/members/disease?problemId=<?= $ExpertSystem['id'] ?>'" class="_2niE6 Bdn6B _1dYc3">Add
                Disease</button>
            </div>
            <div class="_3JfU8 gqtmr">
              <table class="_12PUq -tn6h _6uPk6 s0VLt">
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
                      <th class="khrLL"><?= $key + 1 ?></th>
                      <td class="khrLL"><?= $disease['name'] ?></td>
                      <td class="khrLL"><?= $disease['desc'] ?></td>
                      <td class="khrLL"><?= $disease['solution'] ?></td>
                      <td class="khrLL">
                        <nav class="_4m9J6">
                          <div>
                            <button type="button" data-target="disease-<?= $disease['id'] ?>" data-alignment="right" class="_2zhDk _2QgNG _3VHKy _8y6Bn">
                              <svg width="15" height="15" fill="currentColor" class="_2i-WK">
                                <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#three-dots-vertical" />
                              </svg>
                            </button>
                            <ul id="disease-<?= $disease['id'] ?>" class="EYW33 _2dgNq _5OpzR">
                              <li>
                                <button onclick="setModalValue({editdiseasename:'<?= $disease['name'] ?>',editdiseasedesc:'<?= $disease['desc'] ?>',editdiseasesolution:'<?= $disease['solution'] ?>'},document.querySelector('#editDiseaseForm'));document.querySelector('#editDiseaseForm').action = '<?= LINK ?>/members/disease?id=<?= $disease['id'] ?>&problemId=<?= $ExpertSystem['id'] ?>&name=<?= $disease['name'] ?>';" data-toggle="modal" data-target="#editDiseaseModal" class="_2niE6 _222Gi _2S6Up">Edit</button></li>
                              <li>
                                <form method="post" action="<?= LINK ?>/members/disease?id=<?= $disease['id'] ?>&name=<?= $disease['name'] ?>&_csrf=<?= $csrfToken ?>&_method=DELETE">
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