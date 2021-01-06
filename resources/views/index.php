<?php include VIEW_DIR . "/layouts/header.php"; ?>
<div id="app" class="_2fCJU">
  <?php include VIEW_DIR . "/layouts/navbar.php"; ?>
  <div class="_3hy0- _1wHD0 _6Eppu">
    <div class="_24Rxj _3H4vP _2fCJU">
      <div class="_16ASu">
      </div>
    </div>

    <div class="_3hy0- _1wHD0 _6Eppu">
      <div class="_24Rxj _1re0U _1sNoa _2W81z">
        <div class="_2wxL0">
          <div class="SiBSM _1FnTW">
            <div class="_3hIbh _34J9b">
              <h1 class="_1mXp4 _3BjGC">Lorem Ipsum</h1>
              <h4 class="_1re0U">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil totam repudiandae sunt. Quo unde
                iste
                voluptates vero earum nesciunt autem laboriosam voluptatem a voluptatibus? Nobis fuga quia quidem. Ea, autem.
              </h4>
              <?php if ($user) : ?>
                <a href="<?= LINK ?>/consultation" style="max-width: fit-content" class="_1wHD0 _1uVtA IBCQz vhjC9 _1ALMo lJhPB">
                  <h4 class="_1kqFz _3MkHC"><strong class="UG45_">Start Consultation</strong></h4>
                </a>
              <?php else : ?>
                <button type="button" data-toggle="modal" data-target="#authModal" class="IBCQz vhjC9 _1ALMo lJhPB">
                  <h4 class="_1kqFz _3MkHC"><strong class="UG45_">Get Started</strong></h4>
                </button>
              <?php endif; ?>
            </div>
            <div class="_2IUtP">
              <?php include VIEW_DIR . "/nurse.php"; ?>
            </div>
          </div>
        </div>
      </div>

      <div class="_24Rxj _3H4vP _2fCJU">
        <div class="_2wxL0">
          <div class="SiBSM _1FnTW">
            <div class="_2rSiM eK4KG _1FnTW RogPM">
              <h1 class="_3xxdb _3BjGC">About Us</h1>
              <h4 class="_1re0U">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil totam repudiandae sunt. Quo unde
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