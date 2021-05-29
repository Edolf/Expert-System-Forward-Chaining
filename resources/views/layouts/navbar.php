<nav class="navbar navbar-expand-lg navbar-dark bg-navbar opacity-90 bf-blur-10 topbar fixed-top shadow">
  <div class="container-xxl px-0">
    <button class="btn-flat navbar-toggler mr-auto d-flex d-md-none b-0 shadow-none search-hide" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation" role="switch">
      <span></span>
      <span></span>
      <span></span>
    </button>

    <a class="navbar-brand brand mx-auto d-flex search-hide mx-md-4" href="<?= LINK ?>/"><?= APP_NAME ?></a>
    <div class="topbar-divider d-none d-md-block"></div>
    <div class="collapse navbar-collapse bg-navbar mx-md-4" id="navbarContent">
      <div class="row mt-3 px-3 py-3 d-md-none">
        <div class="col-6 d-flex ai-center">
          <h5 class="p-0 m-0 text-white brand"><?= APP_NAME ?></h5>
        </div>
        <div class="col-6 p-relative">
          <div>
            <?php include ROOT_DIR . "/resources/views/members/users/usertoggle.php"; ?>
          </div>
        </div>
      </div>
      <ul class="navbar-nav mr-auto">
        <?php if (!empty($navbars)) : ?>
          <?php foreach ($navbars as $key => $value) : ?>
            <li class="nav-item">
              <a class="nav-link jc-center" href="<?= LINK ?><?= $value['url'] ?>" aria-current="page"><?= $value['name'] ?></a>
            </li>
          <?php endforeach; ?>
        <?php endif; ?>
      </ul>
      <div class="navbar-nav">
        <div class="nav-item">
          <button class="nav-link jc-center btn-flat w-100 dropdown-trigger" type="button" data-target="categories" data-cover-trigger="false">
            Category
          </button>
          <ul id="categories" class="dropdown-content list-unstyled">
            <?php if (!empty($categories)) : ?>
              <?php foreach ($categories as $key => $value) : ?>
                <li><a href="<?= LINK ?><?= $value['url'] ?>" class="text-decor-none"><small><b><?= $value['name'] ?></b></small></a></li>
              <?php endforeach; ?>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </div>
    <form method="POST" action="" class="browser-default ml-auto right-stuck">
      <?php include ROOT_DIR . "/resources/views/layouts/search.php"; ?>
    </form>
    <div class="topbar-divider d-none d-md-block"></div>
    <div class="d-none d-md-block">
      <?php include ROOT_DIR . "/resources/views/members/users/usertoggle.php"; ?>
    </div>
  </div>
</nav>