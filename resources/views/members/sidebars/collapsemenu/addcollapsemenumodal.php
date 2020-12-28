<div id="addCollapseMenuModal" tabindex="-1" aria-labelledby="addCollapseMenuModalLabel" aria-hidden="true" class="_31P-8 _3bCgx">
  <div class="_28U8K">
    <div class="_2M5QZ _1wCNj _3LA0v _1HTfk s0VLt">
      <div class="_2oYfP">
        <h5 id="addCollapseMenuModalLabel" class="_2NT6A">Edit Sidemenu</h5>
      </div>
      <form method="POST" id="newSubMenuform" onsubmit="sulaiForm({this:this,event:event,link:'<?= LINK ?>/members/sidemenu/submenu?_csrf=<?= $csrfToken ?>',method:'POST'})">
        <div class="_3tByX">

          <div class="_2E95Y">
            <input type="text" id="title" name="title" class="_1y8Oi _1GV_i" />
            <label for="title">Title</label>
            <span data-error="" data-success="" class="_25Y7w"></span>
          </div>

          <div class="_2E95Y">
            <div class="_3Sail">
              <div class="_1s9b_">
                <div class="_2E95Y">
                  <select name="subMenuId" id="subMenuId">
                    <?php foreach ($submenus as $key => $submenu) : ?>
                      <option value="<?= $submenu['id'] ?>"><?= $submenu['title'] ?></option>
                    <?php endforeach; ?>
                  </select>
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
            <span style="bottom: 1rem" class="_1jQhp"><b><?= LINK ?></b></span>
            <div class="_2E95Y RQCWS _2e44U">
              <input type="text" name="url" id="url" class="_1y8Oi _1GV_i" />
              <span data-error="" data-success="" class="_25Y7w"></span>
            </div>
          </div>

          <div class="_2WwSZ pFo5Z">
            <div class="_3Sail _2S6Up">
              <div class="_18Uqy">
                <label>
                  <input type="checkbox" name="isActive" id="isSubMenuActive" checked="" />
                  <span class="_8y6Bn _3H3LR"><b>Is Active ?</b></span>
                </label>
              </div>
              <div class="_-1QSV _1dTWr _3GBZZ">
                <button type="button" data-dismiss="modal" class="_2niE6 _2-EzS">Close</button>
                <button type="submit" class="_2niE6 _2-EzS _2SF1n _1MoWO">
                  <span style="width: 1rem; height: 1rem" role="status" class="_8sneY _2f2YP _14vxW"></span>
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