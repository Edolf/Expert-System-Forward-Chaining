<div class="modal fade modal-static" id="editDiseaseModal" tabindex="-1" aria-labelledby="editDiseaseModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content shadow-lg bl-primary br-primary bg-card">
      <form method="POST" id="editDiseaseForm" onsubmit="sulaiForm({this:this,event:event,link:this.action,method:'PUT'})">
        <div class="modal-body px-5">
          <button type="button" class="btn-close  " data-dismiss="modal" aria-label="Close"></button>
          <div class="d-flex jc-center mt-3 m-5">
            <h5 class="text-center">Edit <strong>Diseases</strong></h5>
          </div>

          <div class="row">
            <div class="col-md-3 d-none d-md-flex ai-center jc-center">
              <div class="col-md-3 d-none d-md-flex ai-center jc-center">
                <h6 class="m-0 ml-2" for="editdiseasename"><strong>Disease Name</strong></h6>
              </div>
            </div>

            <div class="col-md-5">
              <div class="input-field mt-4">
                <input id="editdiseasename" name="editdiseasename" type="text" class="text-success validate" data-length="50">
                <label for="editdiseasename">Disease</label>
                <span class="helper-text" data-error="" data-success=""></span>
              </div>
            </div>

            <div class="col-md-2 d-none d-md-flex ai-center jc-center">
              <div class="col-md-3 d-none d-md-flex ai-center jc-center">
                <h6 class="m-0 ml-2" for="edittotalcases"><strong>Total Cases</strong></h6>
              </div>
            </div>

            <div class="col-md-2">
              <div class="input-field mt-4">
                <input id="edittotalcases" name="edittotalcases" type="number" class="text-success validate">
                <label for="edittotalcases">Total</label>
                <span class="helper-text" data-error="" data-success=""></span>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3 d-none d-md-flex ai-center jc-center">
              <svg class="prefix" width="24" height="24" fill="currentColor">
                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#journal-text" />
              </svg>
              <h6 class="m-0 ml-2" for="editdiseasedesc"><strong>Description</strong></h6>
            </div>
            <div class="col-md-9">
              <div class="input-field mt-4">
                <textarea id="editdiseasedesc" name="editdiseasedesc" type="text" class="text-success sulai-textarea validate" data-length="500"></textarea>
                <label for="editdiseasedesc">Description</label>
                <span class="helper-text" data-error="" data-success=""></span>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3 d-none d-md-flex ai-center jc-center">
              <svg class="prefix" width="24" height="24" fill="currentColor">
                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#clipboard-check" />
              </svg>
              <h6 class="m-0 ml-2" for="editdiseasesolution"><strong>Solution</strong></h6>
            </div>
            <div class="col-md-9">
              <div class="input-field mt-4">
                <textarea id="editdiseasesolution" name="editdiseasesolution" type="text" class="text-success sulai-textarea validate" data-length="500"></textarea>
                <label for="editdiseasesolution">Solution</label>
                <span class="helper-text" data-error="" data-success=""></span>
              </div>
            </div>
          </div>

          <div class="row jc-center mt-4 mb-5">
            <div class="col-7 col-md-5 d-flex jc-around">
              <button type="button" class="btn btn-small" data-dismiss="modal">Close</button>
              <button type="submit" class="btn bg-info btn-small text-light d-flex ai-center jc-center">
                <span class="spinner-border mr-2 d-none" style="width: 1rem; height: 1rem;" role="status"></span>
                <span>Edit Data</span>
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>