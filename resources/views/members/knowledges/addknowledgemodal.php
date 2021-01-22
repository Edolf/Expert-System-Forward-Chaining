<div id="addKnowledgeModal-<?= $ExpertSystem['id'] ?>" tabindex="-1" aria-labelledby="addKnowledgeModal-<?= $ExpertSystem['id'] ?>Label" aria-hidden="true" class="Judd_197 Avery_140 Garrison_477">
  <div class="Merry_453 Solange_304">
    <div class="Kayce_528 Dezmond_357 Aylan_418 Alexei_424 Brantly_247">
      <form id="newKnowledgeForm-<?= $ExpertSystem['id'] ?>" method="post">
        <div class="Daiana_395 Mattison_196">
          <button type="button" data-dismiss="modal" aria-label="Close" class="Zakai_358"></button>
          <div class="Zephyr_231 Safwan_346 Aurora_187 Cherish_137">
            <h5 class="Faizan_466">Add New <strong>Knowledge Base</strong></h5>
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
                <select name="solving">
                  <optgroup label="Diseases">
                    <?php if ($diseases::findAll(['expertSystemId' => $ExpertSystem['id']])) : ?>
                      <?php foreach ($diseases::findAll(['expertSystemId' => $ExpertSystem['id']]) as $key => $disease) : $isFound = false; ?>
                        <?php foreach ($knowledgebases::findAll(['expertSystemId' => $ExpertSystem['id']]) as $key => $knowledgebase) : ?>
                          <?php if ($disease['id'] == json_decode($knowledgebase['solvingId'], true)['diseaseId']) {
                            $isFound = true;
                          } ?>
                        <?php endforeach; ?>
                        <?= $isFound == true ? '' : '<option value="disease-' . $disease['id'] . '">' . $disease['name'] . '' ?>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </optgroup>
                  <optgroup label="Symptoms">
                    <?php if ($diseases::findAll(['expertSystemId' => $ExpertSystem['id']])) : ?>
                      <?php foreach ($symptoms::findAll(['expertSystemId' => $ExpertSystem['id']]) as $key => $symptom) : $isFound = false; ?>
                        <?php foreach ($knowledgebases::findAll(['expertSystemId' => $ExpertSystem['id']]) as $key => $knowledgebase) : ?>
                          <?php if ($symptom['id'] == json_decode($knowledgebase['solvingId'], true)['symptomId']) {
                            $isFound = true;
                          } ?>
                        <?php endforeach; ?>
                        <?= $isFound == true ? '' : '<option value="symptom-' . $symptom['id'] . '">' . $symptom['name'] . '' ?>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </optgroup>
                </select>
                <label>Solving Path</label>
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
                <select multiple="" name="symptoms[]">
                  <?php if ($diseases::findAll(['expertSystemId' => $ExpertSystem['id']])) : ?>
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
                <span>Add Knowledge Base</span>
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>