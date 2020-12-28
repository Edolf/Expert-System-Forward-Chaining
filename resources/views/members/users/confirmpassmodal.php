<div id="confirmPassModal" tabindex="-1" aria-labelledby="confirmPassModalLabel" aria-hidden="true" class="_31P-8 _3bCgx">
  <div class="_28U8K">
    <div class="_2M5QZ _1wCNj _3LA0v _1HTfk s0VLt">
      <form method="POST" id="changePassForm" onsubmit="sulaiForm({this:this,event:event,link:'<?= LINK ?>/members/account/password',method:'PUT'});">
        <div class="_3tByX _1jkJg">
          <button type="button" data-dismiss="modal" aria-label="Close" class="_2yuh-"></button>
          <div class="_1dTWr _3x-l5 _1HqFl _3mxtc">
            <h5 class="_3znGg">Renew Your <strong>Password</strong></h5>
          </div>
          <div class="_3Sail">
            <div class="_3Gtdt">
              <?php if ($user->password != null) { ?>
                <div class="_2E95Y">
                  <input id="oldpassword" name="oldpassword" type="password" class="_1y8Oi _1GV_i" />
                  <label for="oldpassword">Old Password</label>
                  <span data-error="" data-success="" class="_25Y7w"></span>
                </div>
              <?php } ?>
              <div class="_2rHMq X1s1M">
                Use at least 6 characters. Don't use passwords from other references or something easy to guess like
                your pet's name.
              </div>
              <div class="_2E95Y _1vA3K">
                <input id="newpassword" name="newpassword" type="password" class="_1y8Oi _1GV_i" />
                <label for="newpassword">New Password</label>
                <span data-error="" data-success="" class="_25Y7w"></span>
              </div>
              <div class="_2E95Y riVBJ">
                <input id="confirmpassword" name="confirmpassword" type="password" class="_1y8Oi _1GV_i" />
                <label for="confirmpassword">Confirm New Password</label>
                <span data-error="" data-success="" class="_25Y7w"></span>
              </div>
            </div>
            <div class="_3qPKF _14vxW _3e0Cs _2kea1">
              Use at least 6 characters. Don't use passwords from other references or something easy to guess like your
              pet's name.
            </div>
          </div>
          <div class="_3Sail _3x-l5 riVBJ gqtmr">
            <div class="_-1QSV">
              <button type="submit" class="_2niE6 Bdn6B _2S6Up _1dTWr _2kea1 _3x-l5">
                <span style="width: 1rem; height: 1rem" role="status" class="_8sneY _2f2YP _14vxW"></span>
                <span>Change Password</span>
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>