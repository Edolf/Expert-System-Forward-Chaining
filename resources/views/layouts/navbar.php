<nav class="_4m9J6 _2KNck _1dCwc _2vYBG _2B87V _3PquE _3Wpcx _1Uwqx _3Q2fo">
  <div class="_1PmQJ pFo5Z">
    <button type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation" role="switch" class="_2zhDk _31E9F _1zOoc _1dTWr X1s1M _3vvZ0 _2uJhx _2Un_V">
      <span></span>
      <span></span>
      <span></span>
    </button>

    <a href="<?= LINK ?>/" class="kBo2_ _2M3Kx _23T99 _1dTWr _2Un_V KWoxx"><?= APP_NAME ?></a>
    <div class="_3_QRE _14vxW _2GwUX"></div>
    <div id="navbarContent" class="_20Ibn _3VwWP _2vYBG KWoxx">
      <div class="_3Sail _1HqFl _3c1f_ _3GpXu X1s1M">
        <div class="_1Xyv- _1dTWr _2kea1">
          <h5 class="_27Ucp _10lSW _1kTcN _2M3Kx"><?= APP_NAME ?></h5>
        </div>
        <div class="_1Xyv- _1jQhp">
          <div>
            <?php include ROOT_DIR . "/resources/views/members/users/usertoggle.php"; ?>
          </div>
        </div>
      </div>
      <ul class="ZaWkV _1zOoc">
        <?php if (!empty($navbars)) : ?>
          <?php foreach ($navbars as $key => $value) : ?>
            <li class="_3TL4E">
              <a href="<?= LINK ?><?= $value['url'] ?>" aria-current="page" class="_39_OB _3x-l5"><?= $value['name'] ?></a>
            </li>
          <?php endforeach; ?>
        <?php endif; ?>
      </ul>
      <div class="ZaWkV">
        <div class="_3TL4E">
          <button type="button" data-target="categories" data-cover-trigger="false" class="_39_OB _3x-l5 _2zhDk _2S6Up _3VHKy">
            Category
          </button>
          <ul id="categories" class="EYW33 _2dgNq">
            <?php if (!empty($categories)) : ?>
              <?php foreach ($categories as $key => $value) : ?>
                <li><a href="<?= LINK ?><?= $value['url'] ?>" class="_1mvwU"><small><b><?= $value['name'] ?></b></small></a></li>
              <?php endforeach; ?>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </div>
    <form method="POST" action="" class="_2Wi8m _2cBZX _1WjWF">
      <?php include ROOT_DIR . "/resources/views/layouts/search.php"; ?>
    </form>
    <div class="_3_QRE _14vxW _2GwUX"></div>
    <div class="_14vxW _2GwUX">
      <?php include ROOT_DIR . "/resources/views/members/users/usertoggle.php"; ?>
    </div>
  </div>
</nav>