<div id="dropAccountModal" tabindex="-1" aria-labelledby="dropAccountModalLabel" aria-hidden="true" class="Judd_197 Avery_140 Garrison_477">
  <div class="Merry_453">
    <div class="Kayce_528 Dezmond_357 Brantly_247 Linkin_321">
      <div class="Susana_446 Hutton_326">
        <h5 id="dropAccountModalLabel" class="Malayna_443 Isabella_429">Are you really sure?</h5>
        <button type="button" data-dismiss="modal" aria-label="Close" class="Zakai_358"></button>
      </div>
      <form method="POST" id="dropUserForm" onsubmit="sulaiForm({this:this,event:event,link:'<?= LINK ?>/members/account',method:'DELETE'});">
        <div class="Daiana_395 William_145">
          <div class="Keyanna_399 Lebron_195 Faizan_466">
            <strong class="Faizan_466">Unexpected bad things will happen if you don’t read this!</strong>
          </div>
          <div class="Lebron_195 Anyiah_194">
            Once you delete your user, there is no going back. This will permanently delete the
            <strong><?= $user->name ?></strong> user
            account
            <strong>This action cannot be undone!</strong>
          </div>
          <div class="Lebron_195 Anyiah_194">
            Please type <strong><?= $user->password != null ? 'your password account' : 'delete me' ?></strong> to
            confirm.
          </div>
          <div class="Anyiah_194 Mckenzie_188">
            <div class="Mariano_448">
              <input id="confirmation" name="confirmation" type="<?= $user->password != null ? 'password' : 'text' ?>" placeholder="Be Careful !!" required="" class="Amen_518 Simcha_314" />
              <label for="confirmation">Your Password</label>
              <span data-error="" data-success="" class="Adeleine_465"></span>
            </div>
          </div>
        </div>
        <div class="Maizey_484">
          <button type="submit" class="Zakai_128 Hutton_326 Scottlyn_277 Zephyr_231 Preston_343 Safwan_346">
            <span style="width: 1rem; height: 1rem" role="status" class="Zayne_577 Annsley_184 Jana_232"></span>
            <span>I Know What I Do</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>