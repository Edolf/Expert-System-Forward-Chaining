<div id="addKnowledgeModal-<?= $ExpertSystem['id'] ?>" tabindex="-1" aria-labelledby="addKnowledgeModal-<?= $ExpertSystem['id'] ?>Label" aria-hidden="true" class="_2yvo3 _3F0Yh">
  <div class="EGnm1 JTLvt">
    <div class="xo4Q- _3Znxg _1Mqcp _3W_HJ _2W81z">
      <form id="newKnowledgeForm-<?= $ExpertSystem['id'] ?>" method="post">
        <div class="_3BAVP _3TCQr">
          <button type="button" data-dismiss="modal" aria-label="Close" class="_2MKOU"></button>
          <div class="_1wHD0 _3Yl2j _2WrBi XgJiO">
            <h5 class="RogPM">Add New <strong>Knowledge Base</strong></h5>
          </div>

          <div class="SiBSM">
            <div class="_1Nnzl rCKpP _3eiVE _1uVtA _3Yl2j">
              <svg width="24" height="24" fill="currentColor" class="_2mXhC">
                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#patch-check-fll" />
              </svg>
              <h6 class="_3MkHC _23PWi"><strong>Solving Path</strong></h6>
            </div>
            <div class="_20qFt">
              <div class="_36R48 DLDJz">
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

          <div class="SiBSM">
            <div class="_1Nnzl rCKpP _3eiVE _1uVtA _3Yl2j">
              <svg width="24" height="24" fill="currentColor" class="_2mXhC">
                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#card-checklist" />
              </svg>
              <h6 class="_3MkHC _23PWi"><strong>Symptoms</strong></h6>
            </div>
            <div class="_20qFt">
              <div class="_36R48 DLDJz">
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

          <div class="SiBSM _3Yl2j DLDJz _34J9b">
            <div class="_1SQGt _2IUtP _1wHD0 _1qW0Z">
              <button type="button" data-dismiss="modal" class="_2HPko _3XagE">Close</button>
              <button type="submit" class="_2HPko _3XagE vhjC9 _1wHD0 _1uVtA _3Yl2j">
                <span style="width: 1rem; height: 1rem" role="status" class="_2_2xs _2uMGw rCKpP"></span>
                <span>Add Knowledge Base</span>
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>