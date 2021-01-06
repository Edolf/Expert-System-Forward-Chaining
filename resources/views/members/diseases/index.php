<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div class="_2pyK2">
  <?php include VIEW_DIR . "/layouts/sidebar.php"; ?>
  <div class="_3hy0- _1wHD0 _6Eppu _2fCJU">
    <div class="_24Rxj _1re0U">
      <?php include VIEW_DIR . "/layouts/topbar.php"; ?>
      <div class="_16ASu _1FnTW">
        <div class="SiBSM _34J9b">

          <?php $flashSelected = 'disease';
          include VIEW_DIR . "/layouts/flash.php"; ?>

          <?php foreach ($expertsystems::findAll() as $key => $ExpertSystem) : ?>
            <div class="_1wHD0 _1uVtA _20iUl _3H4vP">
              <h3 class="_25N9D _1aegJ"><?= $ExpertSystem['problem'] ?></h3>
              <button type="button" data-toggle="modal" data-target="#addDiseaseModal" onclick="document.querySelector('#newDiseaseForm').action = '<?= LINK ?>/members/disease?problemId=<?= $ExpertSystem['id'] ?>'" class="_2HPko vhjC9 lJhPB">Add
                Disease</button>
            </div>
            <div class="_3oEG9 _34J9b">
              <table class="_3bYJs _3Lvqy _1MfMA _2W81z">
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
                      <th class="_10754"><?= $key + 1 ?></th>
                      <td class="_10754"><?= $disease['name'] ?></td>
                      <td class="_10754"><?= $disease['desc'] ?></td>
                      <td class="_10754"><?= $disease['solution'] ?></td>
                      <td class="_10754">
                        <nav class="_3tbxM">
                          <div>
                            <button type="button" data-target="disease-<?= $disease['id'] ?>" data-alignment="right" class="USCBs _3JDZi _1VhGu _2XuUU">
                              <svg width="15" height="15" fill="currentColor" class="_2mXhC">
                                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#three-dots-vertical" />
                              </svg>
                            </button>
                            <ul id="disease-<?= $disease['id'] ?>" class="_3XUI2 _24ZeC _3YqDp">
                              <li>
                                <button onclick="setModalValue({editdiseasename:'<?= $disease['name'] ?>',editdiseasedesc:'<?= $disease['desc'] ?>',editdiseasesolution:'<?= $disease['solution'] ?>'},document.querySelector('#editDiseaseForm'));document.querySelector('#editDiseaseForm').action = '<?= LINK ?>/members/disease?id=<?= $disease['id'] ?>&problemId=<?= $ExpertSystem['id'] ?>&name=<?= $disease['name'] ?>';" data-toggle="modal" data-target="#editDiseaseModal" class="_2HPko _3-WY3 BoWE6">Edit</button>
                              </li>
                              <li>
                                <form method="post" action="<?= LINK ?>/members/disease?id=<?= $disease['id'] ?>&name=<?= $disease['name'] ?>&_csrf=<?= $csrfToken ?>&_method=DELETE">
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