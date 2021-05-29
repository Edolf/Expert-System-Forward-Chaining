<div class="modal fade modal-static" id="addSymptomModal" tabindex="-1" aria-labelledby="addSymptomModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content shadow-lg bl-primary br-primary bg-card">
      <form method="POST" id="newSymptomForm" onsubmit="sulaiForm({this:this,event:event,link:this.action,method:'POST'})">
        <div class="modal-body px-5">
          <button type="button" class="btn-close  " data-dismiss="modal" aria-label="Close"></button>
          <div class="d-flex jc-center mt-3 m-5">
            <h5 class="text-center">Add New <strong>Symptoms</strong></h5>
          </div>

          <div class="row">
            <div class="col-md-3 d-none d-md-flex ai-center jc-center">
              <svg class="prefix" width="24" height="24" fill="currentColor">
                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#droplet-half" />
              </svg>
              <h6 class="m-0 ml-2" for="symptomname"><strong>Symptom</strong></h6>
            </div>
            <div class="col-md-9">
              <div class="input-field mt-4">
                <input id="symptomname" name="symptomname" type="text" class="text-success validate" data-length="50">
                <label for="symptomname">Symptom Name</label>
                <span class="helper-text" data-error="" data-success=""></span>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3 d-none d-md-flex ai-center jc-center">
              <svg class="prefix" width="24" height="24" fill="currentColor">
                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#journal-text" />
              </svg>
              <h6 class="m-0 ml-2" for="symptomdesc"><strong>Description</strong></h6>
            </div>
            <div class="col-md-9">
              <div class="input-field mt-4">
                <textarea id="symptomdesc" name="symptomdesc" type="text" class="text-success sulai-textarea validate" data-length="500"></textarea>
                <label for="symptomdesc">Description</label>
                <span class="helper-text" data-error="" data-success=""></span>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3 d-none d-md-flex ai-center jc-center">
              <svg class="prefix" width="24" height="24" fill="currentColor">
                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#patch-question-fll" />
              </svg>
              <h6 class="m-0 ml-2" for="question"><strong>Question</strong></h6>
            </div>
            <div class="col-md-9">
              <div class="input-field mt-4">
                <textarea id="question" name="question" type="text" class="text-success sulai-textarea validate" data-length="100"></textarea>
                <label for="question">Question</label>
                <span class="helper-text" data-error="" data-success=""></span>
              </div>
            </div>
          </div>

          <div class="row jc-center mt-4 mb-5">
            <div class="col-7 d-flex jc-around">
              <button type="button" class="btn btn-small" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-small bg-info d-flex ai-center jc-center">
                <span class="spinner-border mr-2 d-none" style="width: 1rem; height: 1rem;" role="status"></span>
                <span>Add Symptom</span>
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>