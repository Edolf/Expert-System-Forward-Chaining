<div class="<?= $i == 1 ? '_1-LYA' : '' ?> _1wlhj">
  <div class="_3Sail _3x-l5">
    <div class="_1XFt9">
      <h1 class="Whrre _2M3Kx gqtmr">
        <span><?= $symptom['question'] ?></span>
      </h1>
    </div>
  </div>
  <h4 class="gqtmr"><?= $symptom['desc'] ?></h4>
  <div class="_3Sail _3x-l5">
    <div class="_18Uqy Ww7sD">
      <div class="_3gfuQ">
        <label for="symptom1-<?= $symptom['id'] ?>" class="_1voHE VC-Ja">
          <input type="radio" name="<?= $symptom['id'] ?>" value="on" id="symptom1-<?= $symptom['id'] ?>" class="_14vxW" />
          <?php include VIEW_DIR . "/consultations/yes.php"; ?>
        </label>
      </div>
    </div>
    <div class="_18Uqy Ww7sD">
      <div class="_3gfuQ">
        <label for="symptom2-<?= $symptom['id'] ?>" class="_1voHE VC-Ja">
          <input type="radio" name="<?= $symptom['id'] ?>" value="off" id="symptom2-<?= $symptom['id'] ?>" class="_14vxW" />
          <?php include VIEW_DIR . "/consultations/no.php"; ?>
        </label>
      </div>
    </div>
  </div>
</div>