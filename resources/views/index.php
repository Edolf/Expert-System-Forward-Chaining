<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div id="app" class="vSOIt">
  <?php include VIEW_DIR . "/layouts/navbar.php"; ?>
  <div class="_2h7iG _1dTWr _3oq1Z">
    <div class="F2040 TidTZ vSOIt">
      <div class="_22DlN">
      </div>
    </div>

    <div class="_2h7iG _1dTWr _3oq1Z">
      <div class="F2040 _1PITf _1vA3K s0VLt">
        <div class="_1PmQJ">
          <div class="_3Sail _3PDUl">
            <div class="_2wnub gqtmr">
              <h1 class="_3BvH7 _2M3Kx">Lorem Ipsum</h1>
              <h4 class="_1PITf">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil totam repudiandae sunt. Quo unde
                iste
                voluptates vero earum nesciunt autem laboriosam voluptatem a voluptatibus? Nobis fuga quia quidem. Ea, autem.
              </h4>
              <?php if ($user) : ?>
                <a href="<?= LINK ?>/consultation" style="max-width: fit-content" class="_1dTWr _2kea1 _1JD_t Bdn6B _1YEbm _1dYc3">
                  <h4 class="_27Ucp _10lSW"><strong class="_2ivdp">Start Consultation</strong></h4>
                </a>
              <?php else : ?>
                <button type="button" data-toggle="modal" data-target="#authModal" class="_1JD_t Bdn6B _1YEbm _1dYc3">
                  <h4 class="_27Ucp _10lSW"><strong class="_2ivdp">Get Started</strong></h4>
                </button>
              <?php endif; ?>
            </div>
            <div class="_3HVzZ">
              <?php include VIEW_DIR . "/nurse.php"; ?>
            </div>
          </div>
        </div>
      </div>

      <div class="F2040 TidTZ vSOIt">
        <div class="_1PmQJ">
          <div class="_3Sail _3PDUl">
            <div class="G6mn4 yqH95 _3PDUl _3znGg">
              <h1 class="Whrre _2M3Kx">About Us</h1>
              <h4 class="_1PITf">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil totam repudiandae sunt. Quo unde
                iste
                voluptates vero earum nesciunt autem laboriosam voluptatem a voluptatibus? Nobis fuga quia quidem. Ea, autem.
              </h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include VIEW_DIR . "/layouts/footbar.php"; ?>
</div>

<?php include VIEW_DIR . "/auths/authmodal.php"; ?>
<?php include VIEW_DIR . "/auths/forgot/forgotmodal.php"; ?>
<?php include VIEW_DIR . "/auths/verify/verifymodal.php"; ?>
<?php include VIEW_DIR . "/auths/logoutmodal.php"; ?>
<?php include VIEW_DIR . "/layouts/gotop.php"; ?>
<?php include VIEW_DIR . "/layouts/footer.php"; ?>