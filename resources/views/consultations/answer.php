<div class="<?= $i == 1 ? 'Elyzabeth_240' : '' ?> Glendon_533">
  <div class="Calen_148 Safwan_346">
    <div class="Zarya_217">
      <h1 class="Jenelle_387 Ariana_Dora_191 Jermani_171">
        <span><?= $symptom['question'] ?></span>
      </h1>
    </div>
  </div>
  <h4 class="Jermani_171"><?= $symptom['desc'] ?></h4>
  <div class="Calen_148 Safwan_346">
    <div class="Ximena_214 Rumi_316">
      <div class="Marlee_Angelia_469">
        <label for="symptom1-<?= $symptom['id'] ?>" class="Ysabella_882 Yessica_Rhoda_372">
          <input type="radio" name="<?= $symptom['id'] ?>" value="on" id="symptom1-<?= $symptom['id'] ?>" class="Jana_232" />
          <?php include VIEW_DIR . "/consultations/yes.php"; ?>
        </label>
      </div>
    </div>
    <div class="Ximena_214 Rumi_316">
      <div class="Marlee_Angelia_469">
        <label for="symptom2-<?= $symptom['id'] ?>" class="Ysabella_882 Yessica_Rhoda_372">
          <input type="radio" name="<?= $symptom['id'] ?>" value="off" id="symptom2-<?= $symptom['id'] ?>" class="Jana_232" />
          <?php include VIEW_DIR . "/consultations/no.php"; ?>
        </label>
      </div>
    </div>
  </div>
</div>