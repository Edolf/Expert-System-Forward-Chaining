<div id="editKnowledgeModal-<?= $ExpertSystem['id'] ?>" tabindex="-1" aria-labelledby="editKnowledgeModal-<?= $ExpertSystem['id'] ?>Label" aria-hidden="true" class="Judd_197 Avery_140 Garrison_477">
  <div class="Merry_453 Solange_304">
    <div class="Kayce_528 Dezmond_357 Aylan_418 Alexei_424 Brantly_247">
      <form id="editKnowledgeForm-<?= $ExpertSystem['id'] ?>" method="post">
        <div class="Daiana_395 Mattison_196">
          <button type="button" data-dismiss="modal" aria-label="Close" class="Zakai_358"></button>
          <div class="Zephyr_231 Safwan_346 Aurora_187 Cherish_137">
            <h5 class="Faizan_466">Edit <strong>Knowledge Base</strong></h5>
          </div>

          <div class="Calen_148">
            <div class="Izzabella_317 Jana_232 Xavien_336 Preston_343 Safwan_346">
              <svg width="24" height="24" fill="currentColor" class="Atalia_258">
                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#patch-check-fll" />
              </svg>
              <h6 class="Raena_142 Gotham_178"><strong>Solving Path</strong></h6>
            </div>
            <div class="Mayer_323">
              <div class="Mariano_448 Mckenzie_188">
                <input disabled="" id="knowledge<?= $ExpertSystem['id'] ?>" name="knowledge" type="text" class="Amen_518" />
                <span data-error="" data-success="" class="Adeleine_465"></span>
              </div>
            </div>
          </div>

          <div class="Calen_148">
            <div class="Izzabella_317 Jana_232 Xavien_336 Preston_343 Safwan_346">
              <svg width="24" height="24" fill="currentColor" class="Atalia_258">
                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#card-checklist" />
              </svg>
              <h6 class="Raena_142 Gotham_178"><strong>Symptoms</strong></h6>
            </div>
            <div class="Mayer_323">
              <div class="Mariano_448 Mckenzie_188">
                <select multiple="" name="symptoms[]" id="symptoms<?= $ExpertSystem['id'] ?>">
                  <?php if ($symptoms::findAll(['expertSystemId' => $ExpertSystem['id']])) : ?>
                    <?php foreach ($symptoms::findAll(['expertSystemId' => $ExpertSystem['id']]) as $symptom) : ?>
                      <option value="<?= $symptom['id'] ?>"><?= $symptom['name'] ?></option>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </select>
                <label>Symptoms</label>
              </div>
            </div>
          </div>

          <div class="Calen_148 Safwan_346 Mckenzie_188 Jermani_171">
            <div class="Gaston_216 Ann_319 Zephyr_231 Talaya_354">
              <button type="button" data-dismiss="modal" class="Zakai_128 Kepler_361">Close</button>
              <button type="submit" class="Zakai_128 Kepler_361 Zeppelin_413 Zephyr_231 Preston_343 Safwan_346">
                <span style="width: 1rem; height: 1rem" role="status" class="Zayne_577 Annsley_184 Jana_232"></span>
                <span>Edit Knowledge Base</span>
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>