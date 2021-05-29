<div class="modal fade modal-static" id="editMenuModal" tabindex="-1" aria-labelledby="editMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content shadow-lg bl-primary br-primary bg-card">
      <div class="modal-header">
        <h5 class="modal-title" id="editMenuModalLabel">Edit Sidemenu</h5>
      </div>
      <form method="POST" id="updateSideMenuForm" onsubmit="sulaiForm({this:this,event:event,link:this.action,method:'PUT'})">
        <div class="modal-body">

          <div class="input-field">
            <div class="row">
              <div class="col-md-6">
                <div class="input-field">
                  <input type="text" id="menu" name="menu" class="text-success validate">
                  <label for="menu">Menu Name</label>
                  <span class="helper-text" data-error="" data-success=""></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="input-field">
                  <select multiple name="role[]" id="role">
                    <option value="admin">Admin</option>
                    <option value="doctor">Doctor</option>
                    <option value="member">Member</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="input-field">
            <div class="row">
              <div class="col-md-6">
                <label>
                  <input type="checkbox" name="isActive" id="isSideMenuEditActive" />
                  <span class="text-theme text-nowrap"><b>Is Active ?</b></span>
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-small" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-small bg-info">
            <span class="spinner-border mr-2 d-none" style="width: 1rem; height: 1rem;" role="status"></span>
            <span>Edit</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>