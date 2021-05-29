<div class="modal fade modal-static" id="forgotModal" tabindex="-1" aria-labelledby="forgotModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content shadow-lg bl-primary br-primary bg-card">
      <div class="modal-body p-5">
        <button type="button" class="btn-close  " data-dismiss="modal" aria-label="Close"></button>
        <div class="d-flex jc-center mb-5">
          <h5 class="modal-title text-center" id="forgotModalLabel">Please input your email address to send reset
            password request</h5>
        </div>
        <form method="POST" id="forgotForm" onsubmit="forgotForm({this:this,event:event,link:'<?= LINK ?>/auth/forgot',method:'POST'})">
          <div class="input-field text-center">
            <input id="address" name="address" type="email" class="text-success validate">
            <label for="address">E-mail Address</label>
            <span class="helper-text" data-error="" data-success=""></span>
          </div>
          <div class="d-flex mx-auto col-10 my-4">
            <button type="submit" class="btn mx-auto bg-primary d-flex ai-center jc-center">
              <span class="spinner-border mr-2 d-none" style="width: 1rem; height: 1rem;" role="status"></span>
              <span>Send Request</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>