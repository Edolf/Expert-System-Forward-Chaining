<div id="confirmPassModal" tabindex="-1" aria-labelledby="confirmPassModalLabel" aria-hidden="true" class="Judd_197 Avery_140 Garrison_477">
  <div class="Merry_453">
    <div class="Kayce_528 Dezmond_357 Aylan_418 Alexei_424 Brantly_247">
      <form method="POST" id="changePassForm" onsubmit="sulaiForm({this:this,event:event,link:'<?= LINK ?>/members/account/password',method:'PUT'});">
        <div class="Daiana_395 Mattison_196">
          <button type="button" data-dismiss="modal" aria-label="Close" class="Zakai_358"></button>
          <div class="Zephyr_231 Safwan_346 Aurora_187 Cherish_137">
            <h5 class="Faizan_466">Renew Your <strong>Password</strong></h5>
          </div>
          <div class="Calen_148">
            <div class="Shanelle_322">
              <?php if ($user->password != null) { ?>
                <div class="Mariano_448">
                  <input id="oldpassword" name="oldpassword" type="password" class="Amen_518 Simcha_314" />
                  <label for="oldpassword">Old Password</label>
                  <span data-error="" data-success="" class="Adeleine_465"></span>
                </div>
              <?php } ?>
              <div class="Monty_259 Channing_337">
                Use at least 6 characters. Don't use passwords from other references or something easy to guess like
                your pet's name.
              </div>
              <div class="Mariano_448 Jewels_189">
                <input id="newpassword" name="newpassword" type="password" class="Amen_518 Simcha_314" />
                <label for="newpassword">New Password</label>
                <span data-error="" data-success="" class="Adeleine_465"></span>
              </div>
              <div class="Mariano_448 Mckenzie_188">
                <input id="confirmpassword" name="confirmpassword" type="password" class="Amen_518 Simcha_314" />
                <label for="confirmpassword">Confirm New Password</label>
                <span data-error="" data-success="" class="Adeleine_465"></span>
              </div>
            </div>
            <div class="Ekaterina_318 Jana_232 Xavien_336 Preston_343">
              Use at least 6 characters. Don't use passwords from other references or something easy to guess like your
              pet's name.
            </div>
          </div>
          <div class="Calen_148 Safwan_346 Mckenzie_188 Jermani_171">
            <div class="Gaston_216">
              <button type="submit" class="Zakai_128 Zeppelin_413 Scottlyn_277 Zephyr_231 Preston_343 Safwan_346">
                <span style="width: 1rem; height: 1rem" role="status" class="Zayne_577 Annsley_184 Jana_232"></span>
                <span>Change Password</span>
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>