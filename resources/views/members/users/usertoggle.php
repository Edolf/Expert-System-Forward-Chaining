<div class="Abran_399">
  <div class="Jackelyn_324">
    <?php if ($user) : ?>
      <button type="button" data-target="userToggle" data-cover-trigger="false" class="Olivia_315 Halo_323 Zephyr_231 Preston_343 Echo_Brodie_673">
        <small class="Annsley_184">
          <?= $user->name ?></small>
        <div style="background-image: url('<?= $user->image ? 'data:image/jpg/jpeg/png/bmp; base64,' . $user->image: '' ?>')" class="Jax_442 Rhyan_551 Iyla_521 Aamira_138">
        </div>
      </button>
      <ul id="userToggle" class="Kepler_680 Jaedon_572">
        <li>
          <a class=" Karsyn_610" href="<?= LINK ?>/members">
            <svg width="16" height="16" fill="currentColor" class="Meleah_183">
              <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#gear-wide-connected" />
            </svg>
            <small>User Panel</small>
          </a>
        </li>
        <li class="Cathleen_Mara_283"></li>
        <li>
          <a href="<?= LINK ?>/members/account" class="Karsyn_610">
            <svg width="16" height="16" fill="currentColor" class="Meleah_183">
              <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#person-lines-fill" />
            </svg>
            <small>Settings</small>
          </a>
        </li>
        <li class="Cathleen_Mara_283"></li>
        <li>
          <a data-toggle="modal" data-target="#logoutModal">
            <svg width="16" height="16" fill="currentColor" class="Meleah_183">
              <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#box-arrow-right" />
            </svg>
            <small>Logout</small>
          </a>
        </li>
      </ul>
    <?php else : ?>
      <button type="button" data-toggle="modal" data-target="#authModal" class="Olivia_315 Halo_323">
        <svg width="32" height="32" fill="currentColor" class="Isabella_429">
          <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#box-arrow-in-right" />
        </svg>
      </button>
    <?php endif; ?>
  </div>
</div>