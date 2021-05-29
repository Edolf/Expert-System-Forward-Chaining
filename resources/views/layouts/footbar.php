<footer class="navbar-dark bg-navbar sticky-footer">
  <div class="container my-auto">
    <div class="row g-3">
      <div class="col-md-1 d-flex ai-center jc-center">
        <div class="switch">
          <input id="switchTheme" type="checkbox">
          <label for="switchTheme" class="d-flex jc-center">
            <div class="switcher" data-checked="Dark" data-unchecked="Light"></div>
            <!-- <div class="switchLabel"></div> -->
          </label>
        </div>
      </div>
      <div class="col-md-11 d-flex ai-center jc-center">
        <div class="navbar-nav">
          <div class="nav-item">
            <div class="copyright nav-link text-center my-auto navbar-brand">
              Copyright &copy;
              <a href="https://github.com/Edolf" target="_blank" class="navbar-brand brand m-0 p-0"><?= APP_NAME ?></a>
              <?= date("Y"); ?>. All
              rights
              reserved.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>