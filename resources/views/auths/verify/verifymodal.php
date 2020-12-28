<div id="verifyModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="verifyModalLabel" aria-hidden="true" class="_31P-8 _3bCgx">
  <div class="_28U8K XdziU">
    <div class="_2M5QZ _1wCNj _3LA0v _1HTfk s0VLt">
      <div class="_3tByX _27IzI _2DN6r _3ur6_ _1jQhp">
        <button type="button" data-dismiss="modal" aria-label="Close" class="_2yuh-"></button>
        <div class="_1dTWr _3x-l5">
          <h5 id="authModalLabel" class="_2NT6A _3znGg">Please check the verification code in your email
            to continue
            the verification process</h5>
        </div>
        <form method="POST" id="verifyForm" onsubmit="verifyForm({this:this,event:event,link:'<?= LINK ?>/auth/join/verify',method:'POST'})">
          <input type="hidden" name="identify" value="" />
          <div class="_2E95Y _3pDOt _3znGg _23T99 _3yWBk krQJT">
            <div id="verify" class="_1dTWr _3suZp">
              <?php for ($i = 0; $i < 8; $i++) : ?>
                <input autocomplete="new-password" type="text" maxlength="1" onkeydown="verifyCode(this)" style="text-transform: uppercase" class="_1y8Oi _1GV_i _3znGg" />
              <?php endfor; ?>
            </div>
            <span data-error="" data-success="" class="_25Y7w"></span>
          </div>
          <div class="_1dTWr _23T99 EbIZP _1HqFl _1PITf">
            <button type="submit" class="_2niE6 _23T99 Bdn6B _1dTWr _2kea1 _3x-l5">
              <span style="width: 1rem; height: 1rem" role="status" class="_8sneY _2f2YP _14vxW"></span>
              <span>Verifying</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
