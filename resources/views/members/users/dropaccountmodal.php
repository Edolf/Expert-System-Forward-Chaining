<div id="dropAccountModal" tabindex="-1" aria-labelledby="dropAccountModalLabel" aria-hidden="true" class="_2yvo3 _3F0Yh">
  <div class="EGnm1">
    <div class="xo4Q- _3Znxg _2W81z _3VdNp">
      <div class="_1dR9f _2rGfb">
        <h5 id="dropAccountModalLabel" class="_1XL6n lJhPB">Are you really sure?</h5>
        <button type="button" data-dismiss="modal" aria-label="Close" class="_2MKOU"></button>
      </div>
      <form method="POST" id="dropUserForm" onsubmit="sulaiForm({this:this,event:event,link:'<?= LINK ?>/members/account',method:'DELETE'});">
        <div class="_3BAVP _1kqFz">
          <div class="_3ZisC sHcZn RogPM">
            <strong class="RogPM">Unexpected bad things will happen if you don’t read this!</strong>
          </div>
          <div class="sHcZn _2N7Mo">
            Once you delete your user, there is no going back. This will permanently delete the
            <strong><?= $user->name ?></strong> user
            account
            <strong>This action cannot be undone!</strong>
          </div>
          <div class="sHcZn _2N7Mo">
            Please type <strong><?= $user->password != null ? 'your password account' : 'delete me' ?></strong> to
            confirm.
          </div>
          <div class="_2N7Mo DLDJz">
            <div class="_36R48">
              <input id="confirmation" name="confirmation" type="<?= $user->password != null ? 'password' : 'text' ?>" placeholder="Be Careful !!" required="" class="_21QBy _2fCo5" />
              <label for="confirmation">Your Password</label>
              <span data-error="" data-success="" class="_3jmDY"></span>
            </div>
          </div>
        </div>
        <div class="_3yp-0">
          <button type="submit" class="_2HPko _2rGfb BoWE6 _1wHD0 _1uVtA _3Yl2j">
            <span style="width: 1rem; height: 1rem" role="status" class="_2_2xs _2uMGw rCKpP"></span>
            <span>I Know What I Do</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>