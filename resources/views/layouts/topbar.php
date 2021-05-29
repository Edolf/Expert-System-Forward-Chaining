<nav class="navbar navbar-expand-lg navbar-dark bg-navbar topbar shadow" style="align-content: center">
  <div class="container-xl">

    <div class="d-flex search-hide">
      <button class="btn btn-flat btn-floating sidebarToggle text-white d-flex ai-center jc-center">
        <svg class="prefix" width="24" height="24" fill="currentColor">
          <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#list" />
        </svg>
      </button>
    </div>

    <?php if ($expertsystems && ($title !== 'Tester Consultation') && ($title !== 'List Users')) {
      switch ($user->role) {
        case 'admin':
        case 'doctor': ?>
          <div class="m-auto navbar-nav d-flex search-hide">
            <ul class="tabs p-0 bg-navbar">
              <?php foreach ($expertsystems::findAll() as $key => $ExpertSystem) : ?>
                <li class="nav-item tab"><a class="nav-link" href="#<?= preg_replace('/\s+/', '_', $ExpertSystem['problem']) ?>"><?= $ExpertSystem['problem'] ?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php break;
        case 'member': ?>

    <?php break;
      }
    } ?>

    <form method="POST" action="" class="browser-default ml-auto right-stuck">
      <?php include ROOT_DIR . "/resources/views/layouts/search.php"; ?>
    </form>

    <div class="topbar-divider d-flex search-hide"></div>
    <div class="d-flex search-hide">
      <?php include ROOT_DIR . "/resources/views/members/users/usertoggle.php"; ?>
    </div>
  </div>
</nav>