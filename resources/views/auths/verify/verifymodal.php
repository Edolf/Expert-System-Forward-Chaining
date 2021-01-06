<div id="verifyModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="verifyModalLabel" aria-hidden="true" class="_2yvo3 _3F0Yh">
  <div class="EGnm1 _4GJxo">
    <div class="xo4Q- _3Znxg _1Mqcp _3W_HJ _2W81z">
      <div class="_3BAVP _30EOh _32W6N _9z3Wc _3OjFi">
        <button type="button" data-dismiss="modal" aria-label="Close" class="_2MKOU"></button>
        <div class="_1wHD0 _3Yl2j">
          <h5 id="authModalLabel" class="_1XL6n RogPM">Please check the verification code in your email
            to continue
            the verification process</h5>
        </div>
        <form method="POST" id="verifyForm" onsubmit="verifyForm({this:this,event:event,link:'<?= LINK ?>/auth/join/verify',method:'POST'})">
          <input type="hidden" name="identify" value="" />
          <div class="_36R48 KTZ2J RogPM _32J_2 _2LJqW yQrO-">
            <div id="verify" class="_1wHD0 rtVns">
              <?php for ($i = 0; $i < 8; $i++) : ?>
                <input autocomplete="new-password" type="text" maxlength="1" onkeydown="verifyCode(this)" style="text-transform: uppercase" class="_21QBy _2fCo5 RogPM" />
              <?php endfor; ?>
            </div>
            <span data-error="" data-success="" class="_3jmDY"></span>
          </div>
          <div class="_1wHD0 _32J_2 SSDpf _2WrBi _1re0U">
            <button type="submit" class="_2HPko _32J_2 vhjC9 _1wHD0 _1uVtA _3Yl2j">
              <span style="width: 1rem; height: 1rem" role="status" class="_2_2xs _2uMGw rCKpP"></span>
              <span>Verifying</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
