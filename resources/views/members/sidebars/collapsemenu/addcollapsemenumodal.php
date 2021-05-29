<div class="modal fade modal-static" id="addCollapseMenuModal" tabindex="-1" aria-labelledby="addCollapseMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content shadow-lg bl-primary br-primary bg-card">
      <div class="modal-header">
        <h5 class="modal-title" id="addCollapseMenuModalLabel">Add New Sidemenu</h5>
      </div>
      <form method="POST" id="newSubMenuform" onsubmit="sulaiForm({this:this,event:event,link:'<?= LINK ?><?= $collUrlMap[3] ?>?_csrf=<?= $csrfToken ?>',method:'POST'})">
        <div class="modal-body">

          <div class="input-field">
            <input type="text" id="title" name="title" class="text-success validate">
            <label for="title">Title</label>
            <span class="helper-text" data-error="" data-success=""></span>
          </div>

          <div class="input-field">
            <div class="row">
              <div class="col-md-6">
                <div class="input-field">
                  <select name="subMenuId" id="subMenuId">
                    <?php foreach ($submenus as $key => $submenu) : ?>
                      <option value="<?= $submenu['id'] ?>"><?= $submenu['title'] ?></option>
                    <?php endforeach; ?>
                  </select>
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
            <span class="p-relative" style="bottom: 1rem;"><b><?= LINK ?></b></span>
            <div class="input-field inline w-50">
              <input type="text" class="text-success validate" name="url" id="url">
              <span class="helper-text" data-error="" data-success=""></span>
            </div>
          </div>

          <div class="modal-footer px-0">
            <div class="row w-100">
              <div class="col-5">
                <label>
                  <input type="checkbox" name="isActive" id="isSubMenuActive" checked />
                  <span class="text-theme text-nowrap"><b>Is Active ?</b></span>
                </label>
              </div>
              <div class="col-7 d-flex jc-end">
                <button type="button" class="btn btn-small" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-small bg-info ml-3">
                  <span class="spinner-border mr-2 d-none" style="width: 1rem; height: 1rem;" role="status"></span>
                  <span>Add</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>