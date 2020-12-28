<div class="ZaWkV">
  <div class="_3TL4E">
    <?php if ($user) : ?>
      <button type="button" data-target="userToggle" data-cover-trigger="false" class="_2zhDk _39_OB _1dTWr _2kea1 _3VHKy">
        <small class="_2f2YP">
          <?= $user->name ?></small>
        <div style="background-image: url('<?= $user->image ? 'data:image/jpg/jpeg/png/bmp; base64,' . $user->image: '' ?>')" class="_2TnLg _1viVF Z2yax _27IzI">
        </div>
      </button>
      <ul id="userToggle" class="EYW33 _2dgNq">
        <li>
          <a class=" _1mvwU" href="<?= LINK ?>/members">
            <svg width="16" height="16" fill="currentColor" class="xGKyI">
              <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#gear-wide-connected" />
            </svg>
            <small>User Panel</small>
          </a>
        </li>
        <li class="_2U4PS"></li>
        <li>
          <a href="<?= LINK ?>/members/account" class="_1mvwU">
            <svg width="16" height="16" fill="currentColor" class="xGKyI">
              <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#person-lines-fill" />
            </svg>
            <small>Settings</small>
          </a>
        </li>
        <li class="_2U4PS"></li>
        <li>
          <a data-toggle="modal" data-target="#logoutModal">
            <svg width="16" height="16" fill="currentColor" class="xGKyI">
              <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#box-arrow-right" />
            </svg>
            <small>Logout</small>
          </a>
        </li>
      </ul>
    <?php else : ?>
      <button type="button" data-toggle="modal" data-target="#authModal" class="_2zhDk _39_OB">
        <svg width="32" height="32" fill="currentColor" class="_1dYc3">
          <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#box-arrow-in-right" />
        </svg>
      </button>
    <?php endif; ?>
  </div>
</div>