<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="_2pyK2">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="_3hy0- _1wHD0 _6Eppu _2fCJU">
    <div class="_24Rxj _1re0U">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="_16ASu _1FnTW">
        <div class="SiBSM _34J9b">

          <?php $flashSelected = 'symptom';
          include VIEW_DIR . "/layouts/flash.php"; ?>

          <?php foreach ($expertsystems::findAll() as $key => $ExpertSystem) : ?>
            <div class="_1wHD0 _1uVtA _20iUl _3H4vP">
              <h1 class="_25N9D _1aegJ"><?= $ExpertSystem['problem'] ?></h1>
              <button type="button" data-toggle="modal" data-target="#addSymptomModal" onclick="document.querySelector('#newSymptomForm').action = '<?= LINK ?>/members/symptom?problemId=<?= $ExpertSystem['id'] ?>'" class="_2HPko vhjC9 lJhPB">Add
                New Symptoms</button>
            </div>
            <div class="_3oEG9 _34J9b">
              <table class="_3bYJs _3Lvqy _1MfMA _2W81z">
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
                      <th class="_10754"><?= $key + 1 ?></th>
                      <td class="_10754"><?= $symptom['name'] ?></td>
                      <td class="_10754"><?= $symptom['desc'] ?></td>
                      <td class="_10754"><?= $symptom['question'] ?></td>
                      <td class="_10754">
                        <nav class="_3tbxM">
                          <div>
                            <button type="button" data-target="symptom-<?= $symptom['id'] ?>" data-alignment="right" class="USCBs _3JDZi _1VhGu _2XuUU">
                              <svg width="15" height="15" fill="currentColor" class="_2mXhC">
                                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#three-dots-vertical" />
                              </svg>
                            </button>
                            <ul id="symptom-<?= $symptom['id'] ?>" class="_3XUI2 _24ZeC _3YqDp">
                              <li><button onclick="setModalValue({editsymptomname:'<?= $symptom['name'] ?>',editsymptomdesc:'<?= $symptom['desc'] ?>',editquestion:'<?= $symptom['question'] ?>'},document.querySelector('#editSymptomForm'));document.querySelector('#editSymptomForm').action = '<?= LINK ?>/members/symptom?id=<?= $symptom['id'] ?>&problemId=<?= $ExpertSystem['id'] ?>&name=<?= $symptom['name'] ?>';" data-toggle="modal" data-target="#editSymptomModal" class="_2HPko _3-WY3 BoWE6">Edit</button></li>
                              <li>
                                <form method="post" action="<?= LINK ?>/members/symptom?id=<?= $symptom['id'] ?>&name=<?= $symptom['name'] ?>&_csrf=<?= $csrfToken ?>&_method=DELETE">
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