<div class="_1DuA9">
  <div class="_3vfit">
    <?php if ($user) : ?>
      <button type="button" data-target="userToggle" data-cover-trigger="false" class="USCBs _1qyzj _1wHD0 _1uVtA _1VhGu">
        <small class="_2uMGw">
          <?= $user->name ?></small>
        <div style="background-image: url('<?= $user->image ? 'data:image/jpg/jpeg/png/bmp; base64,' . $user->image : '' ?>')" class="_1DUEa _2LjpH _3-lYj _30EOh">
        </div>
      </button>
      <ul id="userToggle" class="_3XUI2 _24ZeC">
        <li>
          <a class=" _2h8rF" href="<?= LINK ?>/members">
            <svg width="16" height="16" fill="currentColor" class="_3s7ns">
              <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#gear-wide-connected" />
            </svg>
            <small>User Panel</small>
          </a>
        </li>
        <li class="_3usHL"></li>
        <li>
          <a href="<?= LINK ?>/members/account" class="_2h8rF">
            <svg width="16" height="16" fill="currentColor" class="_3s7ns">
              <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#person-lines-fill" />
            </svg>
            <small>Settings</small>
          </a>
        </li>
        <li class="_3usHL"></li>
        <li>
          <a data-toggle="modal" data-target="#logoutModal">
            <svg width="16" height="16" fill="currentColor" class="_3s7ns">
              <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#box-arrow-right" />
            </svg>
            <small>Logout</small>
          </a>
        </li>
      </ul>
    <?php else : ?>
      <button type="button" data-toggle="modal" data-target="#authModal" class="USCBs _1qyzj">
        <svg width="32" height="32" fill="currentColor" class="lJhPB">
          <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#box-arrow-in-right" />
        </svg>
      </button>
    <?php endif; ?>
  </div>
</div>