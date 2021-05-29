<div class="modal fade modal-static" id="editKnowledgeModal-<?= $ExpertSystem['id'] ?>" tabindex="-1" aria-labelledby="editKnowledgeModal-<?= $ExpertSystem['id'] ?>Label" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content shadow-lg bl-primary br-primary bg-card">
      <form id="editKnowledgeForm-<?= $ExpertSystem['id'] ?>" method="post">
        <div class="modal-body px-5">
          <button type="button" class="btn-close  " data-dismiss="modal" aria-label="Close"></button>
          <div class="d-flex jc-center mt-3 m-5">
            <h5 class="text-center">Edit <strong>Knowledge Base</strong></h5>
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
                <input disabled id="knowledge<?= $ExpertSystem['id'] ?>" name="knowledge" type="text" class="text-success">
                <span class="helper-text" data-error="" data-success=""></span>
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
                <select multiple name="symptoms[]" id="symptoms<?= $ExpertSystem['id'] ?>">
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

          <div class="row jc-center mt-4 mb-5">
            <div class="col-7 col-md-5 d-flex jc-around">
              <button type="button" class="btn btn-small" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-small bg-primary d-flex ai-center jc-center">
                <span class="spinner-border mr-2 d-none" style="width: 1rem; height: 1rem;" role="status"></span>
                <span>Edit Knowledge Base</span>
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>