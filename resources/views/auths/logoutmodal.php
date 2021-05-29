<div class="modal fade modal-static" id="logoutModal">
  <div class="modal-dialog">
    <div class="modal-content shadow-lg bl-primary br-primary bg-card">
      <div class="modal-body">
        <div class="d-flex jc-center mt-3 m-5">
          <h5>Ready to <strong>Leave?</strong></h5>
        </div>
        <div class="d-flex jc-center my-3 m-5">
          <h6>Select "<strong>Logout</strong>" below if you are ready to end your current session.</h6>
        </div>
        <div class="d-flex jc-center my-3 m-5">
          <div class="col-9 d-flex jc-around">
            <button class="btn text-light bg-dark" aria-label="Close" type="button" data-dismiss="modal">Cancel</button>
            <form id="logoutForm" action="<?= LINK ?>/auth/out?_csrf=<?= $csrfToken ?>" method="POST">
              <button class="btn text-light bg-primary" type="submit">Logout</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>