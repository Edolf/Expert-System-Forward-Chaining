<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="_1FInK">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="_2h7iG _1dTWr _3oq1Z vSOIt">
    <div class="F2040 _1PITf">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="_22DlN _3PDUl">
        <div class="_3Sail gqtmr">

          <?php $flashSelected = 'symptom';
          include VIEW_DIR . "/layouts/flash.php"; ?>

          <?php foreach ($expertsystems::findAll() as $key => $ExpertSystem) : ?>
            <div class="_1dTWr _2kea1 njVXK TidTZ">
              <h1 class="_3vE3C _2gyiY"><?= $ExpertSystem['problem'] ?></h1>
              <button type="button" data-toggle="modal" data-target="#addSymptomModal" onclick="document.querySelector('#newSymptomForm').action = '<?= LINK ?>/members/symptom?problemId=<?= $ExpertSystem['id'] ?>'" class="_2niE6 Bdn6B _1dYc3">Add
                New Symptoms</button>
            </div>
            <div class="_3JfU8 gqtmr">
              <table class="_12PUq -tn6h _6uPk6 s0VLt">
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
                      <th class="khrLL"><?= $key + 1 ?></th>
                      <td class="khrLL"><?= $symptom['name'] ?></td>
                      <td class="khrLL"><?= $symptom['desc'] ?></td>
                      <td class="khrLL"><?= $symptom['question'] ?></td>
                      <td class="khrLL">
                        <nav class="_4m9J6">
                          <div>
                            <button type="button" data-target="symptom-<?= $symptom['id'] ?>" data-alignment="right" class="_2zhDk _2QgNG _3VHKy _8y6Bn">
                              <svg width="15" height="15" fill="currentColor" class="_2i-WK">
                                <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#three-dots-vertical" />
                              </svg>
                            </button>
                            <ul id="symptom-<?= $symptom['id'] ?>" class="EYW33 _2dgNq _5OpzR">
                              <li><button onclick="setModalValue({editsymptomname:'<?= $symptom['name'] ?>',editsymptomdesc:'<?= $symptom['desc'] ?>',editquestion:'<?= $symptom['question'] ?>'},document.querySelector('#editSymptomForm'));document.querySelector('#editSymptomForm').action = '<?= LINK ?>/members/symptom?id=<?= $symptom['id'] ?>&problemId=<?= $ExpertSystem['id'] ?>&name=<?= $symptom['name'] ?>';" data-toggle="modal" data-target="#editSymptomModal" class="_2niE6 _222Gi _2S6Up">Edit</button></li>
                              <li>
                                <form method="post" action="<?= LINK ?>/members/symptom?id=<?= $symptom['id'] ?>&name=<?= $symptom['name'] ?>&_csrf=<?= $csrfToken ?>&_method=DELETE">
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