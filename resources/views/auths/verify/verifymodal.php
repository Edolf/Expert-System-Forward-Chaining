<div class="modal fade modal-static" id="verifyModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="verifyModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content shadow-lg bl-primary br-primary bg-card">
      <div class="modal-body p-3 py-5 p-md-5 p-relative">
        <button type="button" class="btn-close  " data-dismiss="modal" aria-label="Close"></button>
        <div class="d-flex jc-center">
          <h5 class="modal-title text-center" id="authModalLabel">Please check the verification code in your email
            to continue
            the verification process</h5>
        </div>
        <form method="POST" id="verifyForm" onsubmit="verifyForm({this:this,event:event,link:'<?= LINK ?>/auth/join/verify',method:'POST'})">
          <input type="hidden" name="identify" value="">
          <div class="input-field my-5 text-center mx-auto col-12 col-md-10">
            <div id="verify" class="d-flex verify-input">
              <?php for ($i = 0; $i < 8; $i++) : ?>
                <input autocomplete="new-password" type="text" class="text-success validate text-center" maxlength="1" onkeydown="verifyCode(this)" style="text-transform:uppercase;">
              <?php endfor; ?>
            </div>
            <span class="helper-text" data-error="" data-success=""></span>
          </div>
          <div class="d-flex mx-auto col-10 mt-3 mb-4">
            <button type="submit" class="btn mx-auto bg-primary d-flex ai-center jc-center">
              <span class="spinner-border mr-2 d-none" style="width: 1rem; height: 1rem;" role="status"></span>
              <span>Verifying</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>