<div id="logoutModal" class="_31P-8 _3bCgx">
  <div class="_28U8K">
    <div class="_2M5QZ _1wCNj _3LA0v _1HTfk s0VLt">
      <div class="_3tByX">
        <div class="_1dTWr _3x-l5 _1HqFl _3mxtc">
          <h5>Ready to <strong>Leave?</strong></h5>
        </div>
        <div class="_1dTWr _3x-l5 HCwLM _3mxtc">
          <h6>Select "<strong>Logout</strong>" below if you are ready to end your current session.</h6>
        </div>
        <div class="_1dTWr _3x-l5 HCwLM _3mxtc">
          <div class="_36eYI _1dTWr _1JVHC">
            <button aria-label="Close" type="button" data-dismiss="modal" class="_2niE6 _1dYc3 F570B">Cancel</button>
            <form id="logoutForm" action="<?= LINK ?>/auth/out?_csrf=<?= $csrfToken ?>" method="POST">
              <button type="submit" class="_2niE6 _1dYc3 Bdn6B">Logout</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>