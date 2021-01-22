<?php $flashSelected = 'doctor';
include VIEW_DIR . "/layouts/flash.php"; ?>

<div class="Briseyda_351 Preston_343 Zhuri_391 Jermani_171">
  <h1 class="Wilfredo_102 Aalyah_176"><?= strtoupper($user->role) ?> Dashboard</h1>
  <button type="button" data-toggle="modal" data-target="#addProblemModal" class="Zakai_128 Zeppelin_413">Add
    New Problem</button>
</div>

<div class="Aylin_367 Aren_140">
  <?php foreach ($expertsystems::findAll() as $key => $ExpertSystem) : ?>
    <div id="<?= preg_replace('/\s+/', '_', $ExpertSystem['problem']) ?>">
      <div class="Calen_148 Jermani_171">
        <div class="Nirvaan_380">
          <h3 class="Zianna_371">
            <span class="Melissa_530">
              <?= $ExpertSystem['problem'] ?>
              <button type="button" class="Zakai_128 Kepler_361 Olivia_315 William_145 Jana_232">
                <svg width="24" height="24" fill="currentColor">
                  <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#check" />
                </svg>
              </button>
              <button type="button" class="Zakai_128 Kepler_361 Olivia_315 William_145 Melissa_530">
                <svg width="24" height="24" fill="currentColor">
                  <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#link-45deg" />
                </svg>
              </button>
            </span>
            <span class="Jana_232">
              <!-- <form>
              <div css-module="row input-field text-center m-0">
                <div css-module="input-field p-0 m-0">
                  <input id="newfullname" name="newfullname" value="<?= preg_replace('/\s+/', '_', $ExpertSystem['problem']) ?>" type="text" css-module="p-0 m-0 text-success" data-length="25">
                </div>
              </div>
            </form> -->
            </span>
          </h3>
          <h6 class="Tayler_170">
            <span class="Melissa_530"><b><?= $ExpertSystem['problem'] ?></b> is <?= $ExpertSystem['desc'] ?>
              <button type="button" class="Zakai_128 Kepler_361 Olivia_315 William_145 Jana_232 William_145 Melissa_530">
                <svg width="24" height="24" fill="currentColor">
                  <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#link-45deg" />
                </svg>
              </button>
              <button type="button" class="Zakai_128 Kepler_361 Olivia_315 William_145 Jana_232 William_145 Jana_232">
                <svg width="24" height="24" fill="currentColor">
                  <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#check" />
                </svg>
              </button>
            </span>
            <span class="Jana_232">
              <!-- <form>
              <div css-module="row input-field text-center m-0">
                <div css-module="input-field p-0 m-0">
                  <input id="newfullname" name="newfullname" value="<?= $ExpertSystem['desc'] ?>" type="text" css-module="p-0 m-0 text-success" data-length="25">
                </div>
              </div>
            </form> -->
            </span>
          </h6>
        </div>
        <div class="Rumi_316 Zephyr_231 Preston_343 Safwan_346">
          <form method="post" action="<?= LINK ?>/members/dropproblem?id=<?= $ExpertSystem['id'] ?>&_csrf=<?= $csrfToken ?>&_method=DELETE">
            <button onclick="return confirm('After you remove this problem everything related to this problem including the diseases and symptoms associated with this problem will be deleted')" class="Zakai_128 Hutton_326">Delete
              <?= $ExpertSystem['problem'] ?></button>
          </form>
        </div>
      </div>

      <div class="Calen_148 Jermani_171">
        <div class="Finlay_320">
          <h3 class="Zianna_371 Tayler_170">Diseases</h3>
          <?php foreach ($diseases::findAll(['expertSystemId' => $ExpertSystem['id']]) as $key => $disease) : ?>
            <h5 class="Zianna_371"><?= $disease['name'] ?></h5>
            <h6 class="Tayler_170"><?= $disease['desc'] ?></h6>
            <!-- <h6 css-module="mb-4"><?= $disease['solution'] ?></h6> -->
          <?php endforeach; ?>
        </div>
        <div class="Finlay_320">
          <h3 class="Zianna_371 Tayler_170">Symptoms</h3>
          <table class="Jedidiah_192 Eily_440">
            <?php foreach ($symptoms::findAll(['expertSystemId' => $ExpertSystem['id']]) as $key => $symptom) : ?>
              <tr>
                <td scope="col" class="Lebron_195"><?= $symptom['name'] ?></td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
      </div>
    </div>

  <?php endforeach; ?>
</div>