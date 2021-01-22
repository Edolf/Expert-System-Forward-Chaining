<div id="verifyModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="verifyModalLabel" aria-hidden="true" class="Judd_197 Avery_140 Garrison_477">
  <div class="Merry_453 Caylin_795">
    <div class="Kayce_528 Dezmond_357 Aylan_418 Alexei_424 Brantly_247">
      <div class="Daiana_395 Aamira_138 Xochitl_197 Brooke_245 Harriet_412">
        <button type="button" data-dismiss="modal" aria-label="Close" class="Zakai_358"></button>
        <div class="Zephyr_231 Safwan_346">
          <h5 id="authModalLabel" class="Malayna_443 Faizan_466">Please check the verification code in your email
            to continue
            the verification process</h5>
        </div>
        <form method="POST" id="verifyForm" onsubmit="verifyForm({this:this,event:event,link:'<?= LINK ?>/auth/join/verify',method:'POST'})">
          <input type="hidden" name="identify" value="" />
          <div class="Mariano_448 Emmarose_194 Faizan_466 Aylee_306 Renner_267 Nirvaan_380">
            <div id="verify" class="Zephyr_231 Olive_Constance_525">
              <?php for ($i = 0; $i < 8; $i++) : ?>
                <input autocomplete="new-password" type="text" maxlength="1" onkeydown="verifyCode(this)" style="text-transform: uppercase" class="Amen_518 Simcha_314 Faizan_466" />
              <?php endfor; ?>
            </div>
            <span data-error="" data-success="" class="Adeleine_465"></span>
          </div>
          <div class="Zephyr_231 Aylee_306 Raegyn_275 Aurora_187 Tayler_170">
            <button type="submit" class="Zakai_128 Aylee_306 Zeppelin_413 Zephyr_231 Preston_343 Safwan_346">
              <span style="width: 1rem; height: 1rem" role="status" class="Zayne_577 Annsley_184 Jana_232"></span>
              <span>Verifying</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
