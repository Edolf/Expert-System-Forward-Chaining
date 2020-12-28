<div id="editSubMenuModal" tabindex="-1" aria-labelledby="editSubMenuModalLabel" aria-hidden="true" class="_31P-8 _3bCgx">
  <div class="_28U8K">
    <div class="_2M5QZ _1wCNj _3LA0v _1HTfk s0VLt">
      <div class="_2oYfP">
        <h5 id="editSubMenuModalLabel" class="_2NT6A">Edit Menu</h5>
      </div>
      <form method="POST" id="updateMenuForm" onsubmit="sulaiForm({this:this,event:event,link:this.action,method:'PUT'})">
        <div class="_3tByX">

          <div class="_2E95Y">
            <div class="_3Sail">
              <div class="_1s9b_">
                <div class="_2E95Y">
                  <select name="editMenuId" id="editMenuId">
                    <?php foreach ($menus as $key => $menu) : ?>
                      <option value="<?= $menu['id'] ?>"><?= $menu['menu'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="_1s9b_">
                <div class="_2E95Y">
                  <svg width="32" height="32" fill="currentColor" class="_2i-WK">
                    <use xlink:href="" />
                  </svg>
                  <input type="text" placeholder="Icons Name" id="editMenuIcon" name="editMenuIcon" onkeyup="this.parentNode.querySelector('use').setAttribute('xlink:href',`<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#${this.value}`);" class="_1y8Oi _1GV_i" />
                  <label for="icon">Icons Name</label>
                  <span data-error="" data-success="" class="_25Y7w"></span>
                </div>
              </div>
            </div>
          </div>

          <div class="_2E95Y">
            <div class="_3Sail">
              <div class="_1s9b_">
                <div class="_2E95Y">
                  <input type="text" id="editMenuTitle" name="editMenuTitle" placeholder="Title" class="_1y8Oi _1GV_i" />
                  <label for="title">Title</label>
                  <span data-error="" data-success="" class="_25Y7w"></span>
                </div>
              </div>
              <div class="_1s9b_">
                <div class="_2E95Y">
                  <select multiple="" name="editRole[]" id="editRole">
                    <option value="admin">Admin</option>
                    <option value="doctor">Doctor</option>
                    <option value="member">Member</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="_2E95Y">
            <span style="bottom: 1rem" class="_1jQhp"><b><?= LINK ?></b></span>
            <div class="_2E95Y RQCWS _2e44U">
              <input type="text" name="editMenuUrl" id="editMenuUrl" class="_1y8Oi _1GV_i" />
              <span data-error="" data-success="" class="_25Y7w"></span>
            </div>
          </div>

          <div class="_2WwSZ pFo5Z">
            <div class="_3Sail _2S6Up">
              <div class="_18Uqy">
                <label>
                  <input type="checkbox" name="isActive" id="isMenuActiveEdit" />
                  <span class="_8y6Bn _3H3LR"><b>Is Active ?</b></span>
                </label>
              </div>
              <div class="_-1QSV _1dTWr _3GBZZ">
                <button type="button" data-dismiss="modal" class="_2niE6 _2-EzS">Close</button>
                <button type="submit" class="_2niE6 _2-EzS _2SF1n _1MoWO">
                  <span style="width: 1rem; height: 1rem" role="status" class="_8sneY _2f2YP _14vxW"></span>
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