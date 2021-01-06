<div id="addSubMenuModal" tabindex="-1" aria-labelledby="addSubMenuModalLabel" aria-hidden="true" class="_2yvo3 _3F0Yh">
  <div class="EGnm1">
    <div class="xo4Q- _3Znxg _1Mqcp _3W_HJ _2W81z">
      <div class="_1dR9f">
        <h5 id="addSubMenuModalLabel" class="_1XL6n">Add New Menu</h5>
      </div>
      <form method="POST" id="newMenuform" onsubmit="sulaiForm({this:this,event:event,link:'<?= LINK ?>/members/sidemenu/menu?_csrf=<?= $csrfToken ?>',method:'POST'})">
        <div class="_3BAVP">

          <div class="_36R48">
            <div class="SiBSM">
              <div class="_1yUFw">
                <div class="_36R48">
                  <select name="menuId" id="menuId">
                    <?php foreach ($menus as $key => $menu) : ?>
                      <option value="<?= $menu['id'] ?>"><?= $menu['menu'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="_1yUFw">
                <div class="_36R48">
                  <svg width="32" height="32" fill="currentColor" class="_2mXhC">
                    <use xlink:href="" />
                  </svg>
                  <input type="text" placeholder="Icons Name" id="icon" name="icon" onkeyup="this.parentNode.querySelector('use').setAttribute('xlink:href',`<?= ROOT ?>/assets/fonts/icons/all-icons.svg#${this.value}`);" class="_21QBy _2fCo5" />
                  <label for="icon">Icons Name</label>
                  <span data-error="" data-success="" class="_3jmDY"></span>
                </div>
              </div>
            </div>
          </div>

          <div class="_36R48">
            <div class="SiBSM">
              <div class="_1yUFw">
                <div class="_36R48">
                  <input type="text" id="title" name="title" placeholder="Title" class="_21QBy _2fCo5" />
                  <label for="title">Title</label>
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
            <span style="bottom: 1rem" class="_3OjFi"><b><?= LINK ?></b></span>
            <div class="_36R48 _1z9pr EzIGs">
              <input type="text" name="url" id="url" class="_21QBy _2fCo5" />
              <span data-error="" data-success="" class="_3jmDY"></span>
            </div>
          </div>

          <div class="_3yp-0 S3V18">
            <div class="SiBSM BoWE6">
              <div class="_1WD9g">
                <label>
                  <input type="checkbox" name="isActive" id="isMenuActive" />
                  <span class="_2XuUU _3_mW1"><b>Is Active ?</b></span>
                </label>
              </div>
              <div class="_1SQGt _1wHD0 _3Xdaf">
                <button type="button" data-dismiss="modal" class="_2HPko _3XagE">Close</button>
                <button type="submit" class="_2HPko _3XagE _2Q1xM _282Xl">
                  <span style="width: 1rem; height: 1rem" role="status" class="_2_2xs _2uMGw rCKpP"></span>
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