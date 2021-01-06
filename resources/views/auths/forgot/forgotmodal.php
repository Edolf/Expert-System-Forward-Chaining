<div id="forgotModal" tabindex="-1" aria-labelledby="forgotModalLabel" aria-hidden="true" class="_2yvo3 _3F0Yh">
  <div class="EGnm1 _3P7Av _4GJxo">
    <div class="xo4Q- _3Znxg _1Mqcp _3W_HJ _2W81z">
      <div class="_3BAVP _1FnTW">
        <button type="button" data-dismiss="modal" aria-label="Close" class="_2MKOU"></button>
        <div class="_1wHD0 _3Yl2j _34J9b">
          <h5 id="forgotModalLabel" class="_1XL6n RogPM">Please input your email address to send reset
            password request</h5>
        </div>
        <form method="POST" id="forgotForm" onsubmit="forgotForm({this:this,event:event,link:'<?= LINK ?>/auth/forgot',method:'POST'})">
          <div class="_36R48 RogPM">
            <input id="address" name="address" type="email" class="_21QBy _2fCo5" />
            <label for="address">E-mail Address</label>
            <span data-error="" data-success="" class="_3jmDY"></span>
          </div>
          <div class="_1wHD0 _32J_2 SSDpf _3H4vP">
            <button type="submit" class="_2HPko _32J_2 vhjC9 _1wHD0 _1uVtA _3Yl2j">
              <span style="width: 1rem; height: 1rem" role="status" class="_2_2xs _2uMGw rCKpP"></span>
              <span>Send Request</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
