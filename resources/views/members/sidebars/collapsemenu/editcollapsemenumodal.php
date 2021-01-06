<div id="editCollapseMenuModal" tabindex="-1" aria-labelledby="editCollapseMenuModalLabel" aria-hidden="true" class="_2yvo3 _3F0Yh">
  <div class="EGnm1">
    <div class="xo4Q- _3Znxg _1Mqcp _3W_HJ _2W81z">
      <div class="_1dR9f">
        <h5 id="editCollapseMenuModalLabel" class="_1XL6n">Edit Sidemenu</h5>
      </div>
      <form method="POST" id="updateSubMenuForm" onsubmit="sulaiForm({this:this,event:event,link:this.action,method:'PUT'})">
        <div class="_3BAVP">

          <div class="_36R48">
            <input type="text" id="editSubMenuTitle" name="editSubMenuTitle" class="_21QBy _2fCo5" />
            <label for="title">Title</label>
            <span data-error="" data-success="" class="_3jmDY"></span>
          </div>

          <div class="_36R48">
            <div class="SiBSM">
              <div class="_1yUFw">
                <div class="_36R48">
                  <select name="editSubMenuId" id="editSubMenuId">
                    <?php foreach ($submenus as $key => $submenu) : ?>
                      <option value="<?= $submenu['id'] ?>"><?= $submenu['title'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="_1yUFw">
                <div class="_36R48">
                  <select multiple="" name="editRole[]" id="editRole">
                    <option value="admin">Admin</option>
                    <option value="doctor">Doctor</option>
                    <option value="member">Member</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="_36R48">
            <span style="bottom: 1rem" class="_3OjFi"><b><?= LINK ?></b></span>
            <div class="_36R48 _1z9pr EzIGs">
              <input type="text" name="editSubMenuUrl" id="editSubMenuUrl" class="_21QBy _2fCo5" />
              <span data-error="" data-success="" class="_3jmDY"></span>
            </div>
          </div>

          <div class="_3yp-0 S3V18">
            <div class="SiBSM BoWE6">
              <div class="_1WD9g">
                <label>
                  <input type="checkbox" name="isActive" id="isSubMenuActiveEdit" />
                  <span class="_2XuUU _3_mW1"><b>Is Active ?</b></span>
                </label>
              </div>
              <div class="_1SQGt _1wHD0 _3Xdaf">
                <button type="button" data-dismiss="modal" class="_2HPko _3XagE">Close</button>
                <button type="submit" class="_2HPko _3XagE _2Q1xM _282Xl">
                  <span style="width: 1rem; height: 1rem" role="status" class="_2_2xs _2uMGw rCKpP"></span>
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