<div id="forgotModal" tabindex="-1" aria-labelledby="forgotModalLabel" aria-hidden="true" class="_31P-8 _3bCgx">
  <div class="_28U8K _1gyB8 XdziU">
    <div class="_2M5QZ _1wCNj _3LA0v _1HTfk s0VLt">
      <div class="_3tByX _3PDUl">
        <button type="button" data-dismiss="modal" aria-label="Close" class="_2yuh-"></button>
        <div class="_1dTWr _3x-l5 gqtmr">
          <h5 id="forgotModalLabel" class="_2NT6A _3znGg">Please input your email address to send reset
            password request</h5>
        </div>
        <form method="POST" id="forgotForm" onsubmit="forgotForm({this:this,event:event,link:'<?= LINK ?>/auth/forgot',method:'POST'})">
          <div class="_2E95Y _3znGg">
            <input id="address" name="address" type="email" class="_1y8Oi _1GV_i" />
            <label for="address">E-mail Address</label>
            <span data-error="" data-success="" class="_25Y7w"></span>
          </div>
          <div class="_1dTWr _23T99 EbIZP TidTZ">
            <button type="submit" class="_2niE6 _23T99 Bdn6B _1dTWr _2kea1 _3x-l5">
              <span style="width: 1rem; height: 1rem" role="status" class="_8sneY _2f2YP _14vxW"></span>
              <span>Send Request</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
