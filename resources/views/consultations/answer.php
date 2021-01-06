<div class="<?= $i == 1 ? '_1ptY3' : '' ?> K7T-G">
  <div class="SiBSM _3Yl2j">
    <div class="_3zrDI">
      <h1 class="_3xxdb _3BjGC _34J9b">
        <span><?= $symptom['question'] ?></span>
      </h1>
    </div>
  </div>
  <h4 class="_34J9b"><?= $symptom['desc'] ?></h4>
  <div class="SiBSM _3Yl2j">
    <div class="_1WD9g _1BnRQ">
      <div class="_1_uzi">
        <label for="symptom1-<?= $symptom['id'] ?>" class="_3dwPx _3XYCq">
          <input type="radio" name="<?= $symptom['id'] ?>" value="on" id="symptom1-<?= $symptom['id'] ?>" class="rCKpP" />
          <?php include VIEW_DIR . "/consultations/yes.php"; ?>
        </label>
      </div>
    </div>
    <div class="_1WD9g _1BnRQ">
      <div class="_1_uzi">
        <label for="symptom2-<?= $symptom['id'] ?>" class="_3dwPx _3XYCq">
          <input type="radio" name="<?= $symptom['id'] ?>" value="off" id="symptom2-<?= $symptom['id'] ?>" class="rCKpP" />
          <?php include VIEW_DIR . "/consultations/no.php"; ?>
        </label>
      </div>
    </div>
  </div>
</div>