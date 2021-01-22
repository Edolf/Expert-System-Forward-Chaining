<div id="addDiseaseModal" tabindex="-1" aria-labelledby="addDiseaseModalLabel" aria-hidden="true" class="Judd_197 Avery_140 Garrison_477">
  <div class="Merry_453 Solange_304">
    <div class="Kayce_528 Dezmond_357 Aylan_418 Alexei_424 Brantly_247">
      <form method="POST" id="newDiseaseForm" onsubmit="sulaiForm({this:this,event:event,link:this.action,method:'POST'})">
        <div class="Daiana_395 Mattison_196">
          <button type="button" data-dismiss="modal" aria-label="Close" class="Zakai_358"></button>
          <div class="Zephyr_231 Safwan_346 Aurora_187 Cherish_137">
            <h5 class="Faizan_466">Add New <strong>Diseases</strong></h5>
          </div>

          <div class="Calen_148">
            <div class="Izzabella_317 Jana_232 Xavien_336 Preston_343 Safwan_346">
              <svg width="24" height="24" fill="currentColor" class="Atalia_258">
                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#patch-exclamation-fll" />
              </svg>
              <h6 for="diseasename" class="Raena_142 Gotham_178"><strong>Disease Name</strong></h6>
            </div>
            <div class="Mayer_323">
              <div class="Mariano_448 Mckenzie_188">
                <input id="diseasename" name="diseasename" type="text" data-length="50" class="Amen_518 Simcha_314" />
                <label for="diseasename">Disease</label>
                <span data-error="" data-success="" class="Adeleine_465"></span>
              </div>
            </div>
          </div>

          <div class="Calen_148">
            <div class="Izzabella_317 Jana_232 Xavien_336 Preston_343 Safwan_346">
              <svg width="24" height="24" fill="currentColor" class="Atalia_258">
                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#journal-text" />
              </svg>
              <h6 for="diseasedesc" class="Raena_142 Gotham_178"><strong>Description</strong></h6>
            </div>
            <div class="Mayer_323">
              <div class="Mariano_448 Mckenzie_188">
                <textarea id="diseasedesc" name="diseasedesc" type="text" data-length="500" class="Amen_518 Justus_576 Simcha_314"></textarea>
                <label for="diseasedesc">Description</label>
                <span data-error="" data-success="" class="Adeleine_465"></span>
              </div>
            </div>
          </div>

          <div class="Calen_148">
            <div class="Izzabella_317 Jana_232 Xavien_336 Preston_343 Safwan_346">
              <svg width="24" height="24" fill="currentColor" class="Atalia_258">
                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#clipboard-check" />
              </svg>
              <h6 for="diseasesolution" class="Raena_142 Gotham_178"><strong>Solution</strong></h6>
            </div>
            <div class="Mayer_323">
              <div class="Mariano_448 Mckenzie_188">
                <textarea id="diseasesolution" name="diseasesolution" type="text" data-length="500" class="Amen_518 Justus_576 Simcha_314"></textarea>
                <label for="diseasesolution">Solution</label>
                <span data-error="" data-success="" class="Adeleine_465"></span>
              </div>
            </div>
          </div>

          <div class="Calen_148 Safwan_346 Mckenzie_188 Jermani_171">
            <div class="Gaston_216 Ann_319 Zephyr_231 Talaya_354">
              <button type="button" data-dismiss="modal" class="Zakai_128 Kepler_361">Close</button>
              <button type="submit" class="Zakai_128 Pascual_265 Kepler_361 Isabella_429 Zephyr_231 Preston_343 Safwan_346">
                <span style="width: 1rem; height: 1rem" role="status" class="Zayne_577 Annsley_184 Jana_232"></span>
                <span>Add Disease</span>
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>