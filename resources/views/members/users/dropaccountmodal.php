<div id="dropAccountModal" tabindex="-1" aria-labelledby="dropAccountModalLabel" aria-hidden="true" class="_31P-8 _3bCgx">
  <div class="_28U8K">
    <div class="_2M5QZ _1wCNj s0VLt _3YofF">
      <div class="_2oYfP cnWz7">
        <h5 id="dropAccountModalLabel" class="_2NT6A _1dYc3">Are you really sure?</h5>
        <button type="button" data-dismiss="modal" aria-label="Close" class="_2yuh-"></button>
      </div>
      <form method="POST" id="dropUserForm" onsubmit="sulaiForm({this:this,event:event,link:'<?= LINK ?>/members/account',method:'DELETE'});">
        <div class="_3tByX _27Ucp">
          <div class="_1yZhQ _3GpXu _3znGg">
            <strong class="_3znGg">Unexpected bad things will happen if you don’t read this!</strong>
          </div>
          <div class="_3GpXu _3c1f_">
            Once you delete your user, there is no going back. This will permanently delete the
            <strong><?= $user->name ?></strong> user
            account
            <strong>This action cannot be undone!</strong>
          </div>
          <div class="_3GpXu _3c1f_">
            Please type <strong><?= $user->password != null ? 'your password account' : 'delete me' ?></strong> to
            confirm.
          </div>
          <div class="_3c1f_ riVBJ">
            <div class="_2E95Y">
              <input id="confirmation" name="confirmation" type="<?= $user->password != null ? 'password' : 'text' ?>" placeholder="Be Careful !!" required="" class="_1y8Oi _1GV_i" />
              <label for="confirmation">Your Password</label>
              <span data-error="" data-success="" class="_25Y7w"></span>
            </div>
          </div>
        </div>
        <div class="_2WwSZ">
          <button type="submit" class="_2niE6 cnWz7 _2S6Up _1dTWr _2kea1 _3x-l5">
            <span style="width: 1rem; height: 1rem" role="status" class="_8sneY _2f2YP _14vxW"></span>
            <span>I Know What I Do</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>