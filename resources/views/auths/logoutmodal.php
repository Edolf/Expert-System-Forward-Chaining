<div id="logoutModal" class="_2yvo3 _3F0Yh">
  <div class="EGnm1">
    <div class="xo4Q- _3Znxg _1Mqcp _3W_HJ _2W81z">
      <div class="_3BAVP">
        <div class="_1wHD0 _3Yl2j _2WrBi XgJiO">
          <h5>Ready to <strong>Leave?</strong></h5>
        </div>
        <div class="_1wHD0 _3Yl2j _3elW- XgJiO">
          <h6>Select "<strong>Logout</strong>" below if you are ready to end your current session.</h6>
        </div>
        <div class="_1wHD0 _3Yl2j _3elW- XgJiO">
          <div class="_1SzXv _1wHD0 _1qW0Z">
            <button aria-label="Close" type="button" data-dismiss="modal" class="_2HPko lJhPB _3zXm1">Cancel</button>
            <form id="logoutForm" action="<?= LINK ?>/auth/out?_csrf=<?= $csrfToken ?>" method="POST">
              <button type="submit" class="_2HPko lJhPB vhjC9">Logout</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>