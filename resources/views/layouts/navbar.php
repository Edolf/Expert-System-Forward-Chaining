<nav class="_3tbxM _3e0u2 _2y2g9 _2GE1p _1NMT5 _2d_xR _2FxLQ _3DvjX _2gl4K">
  <div class="_2wxL0 S3V18">
    <button type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation" role="switch" class="USCBs _18QuS _33okT _1wHD0 _20kLk _3BcNc _2lx-7 _27HVy">
      <span></span>
      <span></span>
      <span></span>
    </button>

    <a href="<?= LINK ?>/" class="_38Rsr _3BjGC _32J_2 _1wHD0 _27HVy _16_PU"><?= APP_NAME ?></a>
    <div class="_26nl3 rCKpP _13CtA"></div>
    <div id="navbarContent" class="GxLGv _2wNZn _2GE1p _16_PU">
      <div class="SiBSM _2WrBi _2N7Mo sHcZn _20kLk">
        <div class="_27kcz _1wHD0 _1uVtA">
          <h5 class="_1kqFz _3MkHC _1kT0z _3BjGC"><?= APP_NAME ?></h5>
        </div>
        <div class="_27kcz _3OjFi">
          <div>
            <?php include ROOT_DIR . "/resources/views/members/users/usertoggle.php"; ?>
          </div>
        </div>
      </div>
      <ul class="_1DuA9 _33okT">
        <?php if (!empty($navbars)) : ?>
          <?php foreach ($navbars as $key => $value) : ?>
            <li class="_3vfit">
              <a href="<?= LINK ?><?= $value['url'] ?>" aria-current="page" class="_1qyzj _3Yl2j"><?= $value['name'] ?></a>
            </li>
          <?php endforeach; ?>
        <?php endif; ?>
      </ul>
      <div class="_1DuA9">
        <div class="_3vfit">
          <button type="button" data-target="categories" data-cover-trigger="false" class="_1qyzj _3Yl2j USCBs BoWE6 _1VhGu">
            Category
          </button>
          <ul id="categories" class="_3XUI2 _24ZeC">
            <?php if (!empty($categories)) : ?>
              <?php foreach ($categories as $key => $value) : ?>
                <li><a href="<?= LINK ?><?= $value['url'] ?>" class="_2h8rF"><small><b><?= $value['name'] ?></b></small></a></li>
              <?php endforeach; ?>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </div>
    <form method="POST" action="" class="_1kGsc _33ZcI _1AsDo">
      <?php include ROOT_DIR . "/resources/views/layouts/search.php"; ?>
    </form>
    <div class="_26nl3 rCKpP _13CtA"></div>
    <div class="rCKpP _13CtA">
      <?php include ROOT_DIR . "/resources/views/members/users/usertoggle.php"; ?>
    </div>
  </div>
</nav>