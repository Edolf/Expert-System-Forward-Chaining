<div class="modal fade modal-static" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content shadow-lg bl-primary br-primary bg-card">
      <form method="POST" id="changeForm">
        <div class="modal-body px-5">
          <button type="button" class="btn-close  " data-dismiss="modal" aria-label="Close"></button>
          <div class="d-flex jc-center mt-3 m-5">
            <h5 class="text-center">Please <strong>Confirmation</strong></h5>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="input-field ">
                <input id="yourpassword" name="yourpassword" type="password" class="text-success validate">
                <label for="yourpassword">Your Password</label>
                <span class="helper-text" data-error="" data-success=""></span>
              </div>
            </div>
            <div class="col-md-4 d-flex ai-center">
              Please confirm that it really is you and not someone else
            </div>
          </div>
          <div class="row d-flex jc-center mt-4 mb-5">
            <div class="col-7">
              <button type="submit" class="btn w-100 bg-primary d-flex ai-center jc-center">
                <span class="spinner-border mr-2 d-none" style="width: 1rem; height: 1rem;" role="status"></span>
                <span>Confirm</span>
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>