<div class="modal fade modal-static" id="confirmPassModal" tabindex="-1" aria-labelledby="confirmPassModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content shadow-lg bl-primary br-primary bg-card">
      <form method="POST" id="changePassForm" onsubmit="sulaiForm({this:this,event:event,link:'<?= LINK ?>/members/account/password',method:'PUT'});">
        <div class="modal-body px-5">
          <button type="button" class="btn-close " data-dismiss="modal" aria-label="Close"></button>
          <div class="d-flex jc-center mt-3 m-5">
            <h5 class="text-center">Renew Your <strong>Password</strong></h5>
          </div>
          <div class="row">
            <div class="col-md-8">
              <?php if ($user->password != null) { ?>
                <div class="input-field ">
                  <input id="oldpassword" name="oldpassword" type="password" class="text-success validate">
                  <label for="oldpassword">Old Password</label>
                  <span class="helper-text" data-error="" data-success=""></span>
                </div>
              <?php } ?>
              <div class="d-block d-md-none">
                Use at least 6 characters. Don't use passwords from other references or something easy to guess like
                your pet's name.
              </div>
              <div class="input-field mt-5">
                <input id="newpassword" name="newpassword" type="password" class="text-success validate">
                <label for="newpassword">New Password</label>
                <span class="helper-text" data-error="" data-success=""></span>
              </div>
              <div class="input-field mt-4">
                <input id="confirmpassword" name="confirmpassword" type="password" class="text-success validate">
                <label for="confirmpassword">Confirm New Password</label>
                <span class="helper-text" data-error="" data-success=""></span>
              </div>
            </div>
            <div class="col-md-4 d-none d-md-flex ai-center">
              Use at least 6 characters. Don't use passwords from other references or something easy to guess like your
              pet's name.
            </div>
          </div>
          <div class="row jc-center mt-4 mb-5">
            <div class="col-7">
              <button type="submit" class="btn bg-primary w-100 d-flex ai-center jc-center">
                <span class="spinner-border mr-2 d-none" style="width: 1rem; height: 1rem;" role="status"></span>
                <span>Change Password</span>
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>