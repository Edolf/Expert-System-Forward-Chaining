<div class="navbar-nav">
  <div class="nav-item">
    <?php if ($user) : ?>
      <button type="button" class="btn-flat nav-link d-flex ai-center dropdown-trigger" data-target="userToggle" data-cover-trigger="false">
        <small class="mr-2">
          <?= $user->name ?></small>
        <div class="img-profile rounded-circle img-thumbnail p-3" style="background-image: url('<?= $user->image ? 'data:image/jpg/jpeg/png/bmp;base64,' . $user->image : '' ?>');">
        </div>
      </button>
      <ul id="userToggle" class="dropdown-content list-unstyled ">
        <li>
          <a class="text-decor-none" class href="<?= LINK ?>/members">
            <svg class="mr-1" width="16" height="16" fill="currentColor">
              <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#gear-wide-connected" />
            </svg>
            <small>User Panel</small>
          </a>
        </li>
        <li class="divider"></li>
        <li>
          <a class="text-decor-none" href="<?= LINK ?>/members/account">
            <svg class="mr-1" width="16" height="16" fill="currentColor">
              <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#person-lines-fill" />
            </svg>
            <small>Settings</small>
          </a>
        </li>
        <li class="divider"></li>
        <li>
          <a data-toggle="modal" data-target="#logoutModal">
            <svg class="mr-1" width="16" height="16" fill="currentColor">
              <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#box-arrow-right" />
            </svg>
            <small>Logout</small>
          </a>
        </li>
      </ul>
    <?php else : ?>
      <button type="button" class="btn-flat nav-link" data-toggle="modal" data-target="#authModal">
        <svg class="text-light" width="32" height="32" fill="currentColor">
          <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#box-arrow-in-right" />
        </svg>
      </button>
    <?php endif; ?>
  </div>
</div>