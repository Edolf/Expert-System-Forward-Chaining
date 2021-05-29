<div class="carousel-item" class="<?= $i == 1 ? 'Elyzabeth_240' : '' ?>">
  <div class="row jc-center">
    <div class="col-8">
      <h1 class="display-6 brand mb-5">
        <span><?= $symptom['question'] ?></span>
      </h1>
    </div>
  </div>
  <h4 class="mb-5"><?= $symptom['desc'] ?></h4>
  <div class="row jc-center">
    <div class="col-5 col-md-2">
      <div class="symp-select">
        <label for="symptom1-<?= $symptom['id'] ?>" class="carousel-control-next all-unset">
          <input class="d-none" type="radio" name="<?= $symptom['id'] ?>" value="on" id="symptom1-<?= $symptom['id'] ?>" />
          <?php include VIEW_DIR . "/consultations/yes.php"; ?>
        </label>
      </div>
    </div>
    <div class="col-5 col-md-2">
      <div class="symp-select">
        <label for="symptom2-<?= $symptom['id'] ?>" class="carousel-control-next all-unset">
          <input class="d-none" type="radio" name="<?= $symptom['id'] ?>" value="off" id="symptom2-<?= $symptom['id'] ?>">
          <?php include VIEW_DIR . "/consultations/no.php"; ?>
        </label>
      </div>
    </div>
  </div>
</div>