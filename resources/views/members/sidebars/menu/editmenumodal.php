<div id="editMenuModal" tabindex="-1" aria-labelledby="editMenuModalLabel" aria-hidden="true" class="_2yvo3 _3F0Yh">
  <div class="EGnm1">
    <div class="xo4Q- _3Znxg _1Mqcp _3W_HJ _2W81z">
      <div class="_1dR9f">
        <h5 id="editMenuModalLabel" class="_1XL6n">Edit Sidemenu</h5>
      </div>
      <form method="POST" id="updateSideMenuForm" onsubmit="sulaiForm({this:this,event:event,link:this.action,method:'PUT'})">
        <div class="_3BAVP">

          <div class="_36R48">
            <div class="SiBSM">
              <div class="_1yUFw">
                <div class="_36R48">
                  <input type="text" id="menu" name="menu" class="_21QBy _2fCo5" />
                  <label for="menu">Menu Name</label>
                  <span data-error="" data-success="" class="_3jmDY"></span>
                </div>
              </div>
              <div class="_1yUFw">
                <div class="_36R48">
                  <select multiple="" name="role[]" id="role">
                    <option value="admin">Admin</option>
                    <option value="doctor">Doctor</option>
                    <option value="member">Member</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="_36R48">
            <div class="SiBSM">
              <div class="_1yUFw">
                <label>
                  <input type="checkbox" name="isActive" id="isSideMenuEditActive" />
                  <span class="_2XuUU _3_mW1"><b>Is Active ?</b></span>
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="_3yp-0">
          <button type="button" data-dismiss="modal" class="_2HPko _3XagE">Close</button>
          <button type="submit" class="_2HPko _3XagE _2Q1xM">
            <span style="width: 1rem; height: 1rem" role="status" class="_2_2xs _2uMGw rCKpP"></span>
            <span>Edit</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>