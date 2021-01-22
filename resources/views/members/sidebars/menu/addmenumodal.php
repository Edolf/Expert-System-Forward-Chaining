<div id="addMenuModal" tabindex="-1" aria-labelledby="addMenuModalLabel" aria-hidden="true" class="Judd_197 Avery_140 Garrison_477">
  <div class="Merry_453">
    <div class="Kayce_528 Dezmond_357 Aylan_418 Alexei_424 Brantly_247">
      <div class="Susana_446">
        <h5 id="addMenuModalLabel" class="Malayna_443">Add New Sidemenu</h5>
      </div>
      <form method="POST" id="newSideMenuform" onsubmit="sulaiForm({this:this,event:event,link:'<?= LINK ?>/members/sidemenu?_csrf=<?= $csrfToken ?>',method:'POST'})">
        <div class="Daiana_395">

          <div class="Mariano_448">
            <div class="Calen_148">
              <div class="Finlay_320">
                <div class="Mariano_448">
                  <input type="text" id="newMenu" name="newMenu" class="Amen_518 Simcha_314" />
                  <label for="newMenu">Menu Name</label>
                  <span data-error="" data-success="" class="Adeleine_465"></span>
                </div>
              </div>
              <div class="Finlay_320">
                <div class="Mariano_448">
                  <select multiple="" name="role[]">
                    <option value="admin">Admin</option>
                    <option value="doctor">Doctor</option>
                    <option value="member">Member</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="Mariano_448">
            <div class="Calen_148">
              <div class="Finlay_320">
                <label>
                  <input type="checkbox" checked="checked" name="isActive" id="isSideMenuActive" />
                  <span class="Ulisses_424 Virat_488"><b>Is Active ?</b></span>
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="Maizey_484">
          <button type="button" data-dismiss="modal" class="Zakai_128 Kepler_361">Close</button>
          <button type="submit" class="Zakai_128 Kepler_361 Pascual_265">
            <span style="width: 1rem; height: 1rem" role="status" class="Zayne_577 Annsley_184 Jana_232"></span>
            <span>Add</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>