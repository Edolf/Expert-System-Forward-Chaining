<div class="modal fade modal-static" id="addKnowledgeModal-<?= $ExpertSystem['id'] ?>" tabindex="-1" aria-labelledby="addKnowledgeModal-<?= $ExpertSystem['id'] ?>Label" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content shadow-lg bl-primary br-primary bg-card">
      <form id="newKnowledgeForm-<?= $ExpertSystem['id'] ?>" method="post">
        <div class="modal-body px-5">
          <button type="button" class="btn-close  " data-dismiss="modal" aria-label="Close"></button>
          <div class="d-flex jc-center mt-3 m-5">
            <h5 class="text-center">Add New <strong>Knowledge Base</strong></h5>
          </div>

          <div class="row">
            <div class="col-md-3 d-none d-md-flex ai-center jc-center">
              <svg class="prefix" width="24" height="24" fill="currentColor">
                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#patch-check-fll" />
              </svg>
              <h6 class="m-0 ml-2"><strong>Solving Path</strong></h6>
            </div>
            <div class="col-md-9">
              <div class="input-field mt-4">
                <select name="solving">
                  <optgroup label="Diseases">
                    <?php if ($diseases::findAll(['expertSystemId' => $ExpertSystem['id']])) : ?>
                      <?php foreach ($diseases::findAll(['expertSystemId' => $ExpertSystem['id']]) as $key => $disease) : $isFound = false; ?>
                        <?php foreach ($knowledgebases::findAll(['expertSystemId' => $ExpertSystem['id']]) as $key => $knowledgebase) : ?>
                          <?php if ($disease['id'] == json_decode($knowledgebase['solvingId'], true)['diseaseId']) {
                            $isFound = true;
                          } ?>
                        <?php endforeach; ?>
                        <?= $isFound == true ? '' : '<option value="disease-' . $disease['id'] . '">' . $disease['name'] . '</option>' ?>
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
                        <?= $isFound == true ? '' : '<option value="symptom-' . $symptom['id'] . '">' . $symptom['name'] . '</option>' ?>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </optgroup>
                </select>
                <label>Solving Path</label>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3 d-none d-md-flex ai-center jc-center">
              <svg class="prefix" width="24" height="24" fill="currentColor">
                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#card-checklist" />
              </svg>
              <h6 class="m-0 ml-2"><strong>Symptoms</strong></h6>
            </div>
            <div class="col-md-9">
              <div class="input-field mt-4">
                <select multiple name="symptoms[]">
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

          <div class="row jc-center mt-4 mb-5">
            <div class="col-7 col-md-5 d-flex jc-around">
              <button type="button" class="btn btn-small" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-small bg-primary d-flex ai-center jc-center">
                <span class="spinner-border mr-2 d-none" style="width: 1rem; height: 1rem;" role="status"></span>
                <span>Add Knowledge Base</span>
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>