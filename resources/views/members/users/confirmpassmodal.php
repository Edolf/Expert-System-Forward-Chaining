<div id="confirmPassModal" tabindex="-1" aria-labelledby="confirmPassModalLabel" aria-hidden="true" class="_2yvo3 _3F0Yh">
  <div class="EGnm1">
    <div class="xo4Q- _3Znxg _1Mqcp _3W_HJ _2W81z">
      <form method="POST" id="changePassForm" onsubmit="sulaiForm({this:this,event:event,link:'<?= LINK ?>/members/account/password',method:'PUT'});">
        <div class="_3BAVP _3TCQr">
          <button type="button" data-dismiss="modal" aria-label="Close" class="_2MKOU"></button>
          <div class="_1wHD0 _3Yl2j _2WrBi XgJiO">
            <h5 class="RogPM">Renew Your <strong>Password</strong></h5>
          </div>
          <div class="SiBSM">
            <div class="_2Ag0P">
              <?php if ($user->password != null) { ?>
                <div class="_36R48">
                  <input id="oldpassword" name="oldpassword" type="password" class="_21QBy _2fCo5" />
                  <label for="oldpassword">Old Password</label>
                  <span data-error="" data-success="" class="_3jmDY"></span>
                </div>
              <?php } ?>
              <div class="_3r8oh _20kLk">
                Use at least 6 characters. Don't use passwords from other references or something easy to guess like
                your pet's name.
              </div>
              <div class="_36R48 _1sNoa">
                <input id="newpassword" name="newpassword" type="password" class="_21QBy _2fCo5" />
                <label for="newpassword">New Password</label>
                <span data-error="" data-success="" class="_3jmDY"></span>
              </div>
              <div class="_36R48 DLDJz">
                <input id="confirmpassword" name="confirmpassword" type="password" class="_21QBy _2fCo5" />
                <label for="confirmpassword">Confirm New Password</label>
                <span data-error="" data-success="" class="_3jmDY"></span>
              </div>
            </div>
            <div class="_3g8ld rCKpP _3eiVE _1uVtA">
              Use at least 6 characters. Don't use passwords from other references or something easy to guess like your
              pet's name.
            </div>
          </div>
          <div class="SiBSM _3Yl2j DLDJz _34J9b">
            <div class="_1SQGt">
              <button type="submit" class="_2HPko vhjC9 BoWE6 _1wHD0 _1uVtA _3Yl2j">
                <span style="width: 1rem; height: 1rem" role="status" class="_2_2xs _2uMGw rCKpP"></span>
                <span>Change Password</span>
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>