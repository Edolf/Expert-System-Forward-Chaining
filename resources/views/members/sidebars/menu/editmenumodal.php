<div id="editMenuModal" tabindex="-1" aria-labelledby="editMenuModalLabel" aria-hidden="true" class="_31P-8 _3bCgx">
  <div class="_28U8K">
    <div class="_2M5QZ _1wCNj _3LA0v _1HTfk s0VLt">
      <div class="_2oYfP">
        <h5 id="editMenuModalLabel" class="_2NT6A">Edit Sidemenu</h5>
      </div>
      <form method="POST" id="updateSideMenuForm" onsubmit="sulaiForm({this:this,event:event,link:this.action,method:'PUT'})">
        <div class="_3tByX">

          <div class="_2E95Y">
            <div class="_3Sail">
              <div class="_1s9b_">
                <div class="_2E95Y">
                  <input type="text" id="menu" name="menu" class="_1y8Oi _1GV_i" />
                  <label for="menu">Menu Name</label>
                  <span data-error="" data-success="" class="_25Y7w"></span>
                </div>
              </div>
              <div class="_1s9b_">
                <div class="_2E95Y">
                  <select multiple="" name="role[]" id="role">
                    <option value="admin">Admin</option>
                    <option value="doctor">Doctor</option>
                    <option value="member">Member</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="_2E95Y">
            <div class="_3Sail">
              <div class="_1s9b_">
                <label>
                  <input type="checkbox" name="isActive" id="isSideMenuEditActive" />
                  <span class="_8y6Bn _3H3LR"><b>Is Active ?</b></span>
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="_2WwSZ">
          <button type="button" data-dismiss="modal" class="_2niE6 _2-EzS">Close</button>
          <button type="submit" class="_2niE6 _2-EzS _2SF1n">
            <span style="width: 1rem; height: 1rem" role="status" class="_8sneY _2f2YP _14vxW"></span>
            <span>Edit</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>