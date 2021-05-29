<div class="modal fade modal-static" id="editSubMenuModal" tabindex="-1" aria-labelledby="editSubMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content shadow-lg bl-primary br-primary bg-card">
      <div class="modal-header">
        <h5 class="modal-title" id="editSubMenuModalLabel">Edit Menu</h5>
      </div>
      <form method="POST" id="updateMenuForm" onsubmit="sulaiForm({this:this,event:event,link:this.action,method:'PUT'})">
        <div class="modal-body">

          <div class="input-field">
            <div class="row">
              <div class="col-md-6">
                <div class="input-field">
                  <select name="editMenuId" id="editMenuId">
                    <?php foreach ($menus as $key => $menu) : ?>
                      <option value="<?= $menu['id'] ?>"><?= $menu['menu'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="input-field">
                  <svg class="prefix" width="32" height="32" fill="currentColor">
                    <use xlink:href="" />
                  </svg>
                  <input type="text" class="text-success validate" placeholder="Icons Name" id="editMenuIcon" name="editMenuIcon" onkeyup="this.parentNode.querySelector('use').setAttribute('xlink:href',`<?= ROOT ?>/assets/fonts/icons/all-icons.svg#${this.value}`);">
                  <label for="icon">Icons Name</label>
                  <span class="helper-text" data-error="" data-success=""></span>
                </div>
              </div>
            </div>
          </div>

          <div class="input-field">
            <div class="row">
              <div class="col-md-6">
                <div class="input-field">
                  <input type="text" id="editMenuTitle" name="editMenuTitle" class="text-success validate" placeholder="Title">
                  <label for="title">Title</label>
                  <span class="helper-text" data-error="" data-success=""></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="input-field">
                  <select multiple name="editRole[]" id="editRole">
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
              <input type="text" class="text-success validate" name="editMenuUrl" id="editMenuUrl">
              <span class="helper-text" data-error="" data-success=""></span>
            </div>
          </div>

          <div class="modal-footer px-0">
            <div class="row w-100">
              <div class="col-5">
                <label>
                  <input type="checkbox" name="isActive" id="isMenuActiveEdit" />
                  <span class="text-theme text-nowrap"><b>Is Active ?</b></span>
                </label>
              </div>
              <div class="col-7 d-flex jc-end">
                <button type="button" class="btn btn-small" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-small bg-info ml-3">
                  <span class="spinner-border mr-2 d-none" style="width: 1rem; height: 1rem;" role="status"></span>
                  <span>Edit</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>