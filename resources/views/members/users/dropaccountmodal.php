<div class="modal fade modal-static" id="dropAccountModal" tabindex="-1" aria-labelledby="dropAccountModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content shadow-lg bg-card bb-danger">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-light" id="dropAccountModalLabel">Are you really sure?</h5>
        <button type="button" class="btn-close  " data-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" id="dropUserForm" onsubmit="sulaiForm({this:this,event:event,link:'<?= LINK ?>/members/account',method:'DELETE'});">
        <div class="modal-body p-0">
          <div class=" bg-warning py-3 text-center">
            <strong class="text-center">Unexpected bad things will happen if you don’t read this!</strong>
          </div>
          <div class="py-3 px-3">
            Once you delete your user, there is no going back. This will permanently delete the
            <strong><?= $user->name ?></strong> user
            account
            <strong>This action cannot be undone!</strong>
          </div>
          <div class="py-3 px-3">
            Please type <strong><?= $user->password != null ? 'your password account' : 'delete me' ?></strong> to
            confirm.
          </div>
          <div class="px-3 mt-4">
            <div class="input-field ">
              <input id="confirmation" name="confirmation" type="<?= $user->password != null ? 'password' : 'text' ?>" placeholder="Be Careful !!" class="text-success validate" required>
              <label for="confirmation">Your Password</label>
              <span class="helper-text" data-error="" data-success=""></span>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn bg-danger w-100 d-flex ai-center jc-center">
            <span class="spinner-border mr-2 d-none" style="width: 1rem; height: 1rem;" role="status"></span>
            <span>I Know What I Do</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>