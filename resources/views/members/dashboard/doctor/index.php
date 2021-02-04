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
          <h3 class="Zianna_371"><?= $ExpertSystem['problem'] ?></h3>
          <h6 class="Tayler_170">
            <b><?= $ExpertSystem['problem'] ?></b> is <?= $ExpertSystem['desc'] ?>
          </h6>
        </div>
        <div class="Rumi_316 Zephyr_231 Preston_343 Safwan_346">

          <div>
            <button type="button" data-target="problem-<?= $ExpertSystem['id'] ?>" data-alignment="right" class="Olivia_315 Kepler_480 Echo_Brodie_673 Ulisses_424">
              <svg width="15" height="15" fill="currentColor" class="Atalia_258">
                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#three-dots-vertical" />
              </svg>
            </button>
            <ul id="problem-<?= $ExpertSystem['id'] ?>" class="Kepler_680 Jaedon_572 Melody_575">
              <li><button onclick="setModalValue({editproblemname:`<?= $ExpertSystem['problem'] ?>`,editproblemdesc:'<?= $ExpertSystem['desc'] ?>'},document.querySelector('#editProblemForm'));document.querySelector('#editProblemForm').action = '<?= LINK ?>/members/updateproblem?id=<?= $ExpertSystem['id'] ?>&_csrf=<?= $csrfToken ?>&_method=PUT';" data-toggle="modal" data-target="#editProblemModal" class="Zakai_128 Paris_402 Scottlyn_277">Edit</button></li>
              <li>
                <form method="post" action="<?= LINK ?>/members/dropproblem?id=<?= $ExpertSystem['id'] ?>&_csrf=<?= $csrfToken ?>&_method=DELETE">
                  <button onclick="return confirm('After you remove this problem everything related to this problem including the diseases and symptoms associated with this problem will be deleted')" class="Zakai_128 Hutton_326 Scottlyn_277">Delete</button>
                </form>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="Calen_148 Jermani_171">
        <div class="Finlay_320">
          <h3 class="Zianna_371 Tayler_170">Diseases</h3>
          <?php foreach ($diseases::findAll(['expertSystemId' => $ExpertSystem['id']]) as $key => $disease) : ?>
            <div class="Calen_148">
              <div class="Ann_319 Coltan_353">
                <h5 class="Zianna_371"><?= $disease['name'] ?></h5>
              </div>
              <div class="Finlay_320">
                <ul style="height: auto; width: fit-content" class="Amirah_Nanette_166 William_145 Brylan_497">
                  <li style="height: auto" class="Jedidiah_115"><a href="#description-<?= $disease['id'] ?>" class="Halo_323 Ulisses_424">Description</a></li>
                  <li style="height: auto" class="Jedidiah_115"><a href="#solution-<?= $disease['id'] ?>" class="Halo_323 Ulisses_424">Solution</a></li>
                </ul>
              </div>
            </div>

            <div id="description-<?= $disease['id'] ?>">
              <h6>Description</h6>
              <p class="Tayler_170"><?= $disease['desc'] ?></p>
            </div>
            <div id="solution-<?= $disease['id'] ?>">
              <h6>Solution</h6>
              <p class="Tayler_170"><?= $disease['solution'] ?></p>
            </div>
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
  <?php include VIEW_DIR . "/members/dashboard/doctor/editproblemmodal.php"; ?>
</div>