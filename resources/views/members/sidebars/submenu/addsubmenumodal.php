<div id="addSubMenuModal" tabindex="-1" aria-labelledby="addSubMenuModalLabel" aria-hidden="true" class="Judd_197 Avery_140 Garrison_477">
  <div class="Merry_453">
    <div class="Kayce_528 Dezmond_357 Aylan_418 Alexei_424 Brantly_247">
      <div class="Susana_446">
        <h5 id="addSubMenuModalLabel" class="Malayna_443">Add New Menu</h5>
      </div>
      <form method="POST" id="newMenuform" onsubmit="sulaiForm({this:this,event:event,link:'<?= LINK ?>/members/sidemenu/menu?_csrf=<?= $csrfToken ?>',method:'POST'})">
        <div class="Daiana_395">

          <div class="Mariano_448">
            <div class="Calen_148">
              <div class="Finlay_320">
                <div class="Mariano_448">
                  <select name="menuId" id="menuId">
                    <?php foreach ($menus as $key => $menu) : ?>
                      <option value="<?= $menu['id'] ?>"><?= $menu['menu'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="Finlay_320">
                <div class="Mariano_448">
                  <svg width="32" height="32" fill="currentColor" class="Atalia_258">
                    <use xlink:href="" />
                  </svg>
                  <input type="text" placeholder="Icons Name" id="icon" name="icon" onkeyup="this.parentNode.querySelector('use').setAttribute('xlink:href',`<?= ROOT ?>/assets/fonts/icons/all-icons.svg#${this.value}`);" class="Amen_518 Simcha_314" />
                  <label for="icon">Icons Name</label>
                  <span data-error="" data-success="" class="Adeleine_465"></span>
                </div>
              </div>
            </div>
          </div>

          <div class="Mariano_448">
            <div class="Calen_148">
              <div class="Finlay_320">
                <div class="Mariano_448">
                  <input type="text" id="title" name="title" placeholder="Title" class="Amen_518 Simcha_314" />
                  <label for="title">Title</label>
                  <span data-error="" data-success="" class="Adeleine_465"></span>
                </div>
              </div>
              <div class="Finlay_320">
                <div class="Mariano_448">
                  <select multiple="" name="role[]" id="role">
                    <option value="admin">Admin</option>
                    <option value="doctor">Doctor</option>
                    <option value="member">Member</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="Mariano_448">
            <span style="bottom: 1rem" class="Harriet_412"><b><?= LINK ?></b></span>
            <div class="Mariano_448 Miri_243 Aliza_216">
              <input type="text" name="url" id="url" class="Amen_518 Simcha_314" />
              <span data-error="" data-success="" class="Adeleine_465"></span>
            </div>
          </div>

          <div class="Maizey_484 Zelie_201">
            <div class="Calen_148 Scottlyn_277">
              <div class="Ximena_214">
                <label>
                  <input type="checkbox" name="isActive" id="isMenuActive" />
                  <span class="Ulisses_424 Virat_488"><b>Is Active ?</b></span>
                </label>
              </div>
              <div class="Gaston_216 Zephyr_231 Ruslan_216">
                <button type="button" data-dismiss="modal" class="Zakai_128 Kepler_361">Close</button>
                <button type="submit" class="Zakai_128 Kepler_361 Pascual_265 Aleyda_179">
                  <span style="width: 1rem; height: 1rem" role="status" class="Zayne_577 Annsley_184 Jana_232"></span>
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