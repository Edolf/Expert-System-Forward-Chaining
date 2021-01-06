<?php $flashSelected = 'doctor';
include VIEW_DIR . "/layouts/flash.php"; ?>

<div class="F5PZw _1uVtA _20iUl _34J9b">
  <h1 class="_25N9D _1aegJ"><?= strtoupper($user->role) ?> Dashboard</h1>
  <button type="button" data-toggle="modal" data-target="#addProblemModal" class="_2HPko vhjC9">Add
    New Problem</button>
</div>

<div class="_16ASu _1FnTW">
  <?php foreach ($expertsystems::findAll() as $key => $ExpertSystem) : ?>
    <div class="SiBSM _34J9b">
      <div class="yQrO-">
        <h3 class="zCP3X">
          <span class="_3bcME">
            <?= $ExpertSystem['problem'] ?>
            <button type="button" class="_2HPko _3XagE USCBs _1kqFz rCKpP">
              <svg width="24" height="24" fill="currentColor">
                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#check" />
              </svg>
            </button>
            <button type="button" class="_2HPko _3XagE USCBs _1kqFz _3bcME">
              <svg width="24" height="24" fill="currentColor">
                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#link-45deg" />
              </svg>
            </button>
          </span>
          <span class="rCKpP">
            <!-- <form>
              <div css-module="row input-field text-center m-0">
                <div css-module="input-field p-0 m-0">
                  <input id="newfullname" name="newfullname" value="<?= $ExpertSystem['problem'] ?>" type="text" css-module="p-0 m-0 text-success" data-length="25">
                </div>
              </div>
            </form> -->
          </span>
        </h3>
        <h6 class="_1re0U">
          <span class="_3bcME"><b><?= $ExpertSystem['problem'] ?></b> is <?= $ExpertSystem['desc'] ?>
            <button type="button" class="_2HPko _3XagE USCBs _1kqFz rCKpP _1kqFz _3bcME">
              <svg width="24" height="24" fill="currentColor">
                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#link-45deg" />
              </svg>
            </button>
            <button type="button" class="_2HPko _3XagE USCBs _1kqFz rCKpP _1kqFz rCKpP">
              <svg width="24" height="24" fill="currentColor">
                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#check" />
              </svg>
            </button>
          </span>
          <span class="rCKpP">
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
      <div class="_1BnRQ _1wHD0 _1uVtA _3Yl2j">
        <form method="post" action="<?= LINK ?>/members/dropproblem?id=<?= $ExpertSystem['id'] ?>&_csrf=<?= $csrfToken ?>&_method=DELETE">
          <button onclick="return confirm('After you remove this problem everything related to this problem including the diseases and symptoms associated with this problem will be deleted')" class="_2HPko _2rGfb">Delete
            <?= $ExpertSystem['problem'] ?></button>
        </form>
      </div>
    </div>

    <div class="SiBSM _34J9b">
      <div class="_1yUFw">
        <h3 class="zCP3X _1re0U">Diseases</h3>
        <?php foreach ($diseases::findAll(['expertSystemId' => $ExpertSystem['id']]) as $key => $disease) : ?>
          <h5 class="zCP3X"><?= $disease['name'] ?></h5>
          <h6 class="_1re0U"><?= $disease['desc'] ?></h6>
          <!-- <h6 css-module="mb-4"><?= $disease['solution'] ?></h6> -->
        <?php endforeach; ?>
      </div>
      <div class="_1yUFw">
        <h3 class="zCP3X _1re0U">Symptoms</h3>
        <table class="_3bYJs _3Lvqy">
          <?php foreach ($symptoms::findAll(['expertSystemId' => $ExpertSystem['id']]) as $key => $symptom) : ?>
            <tr>
              <td scope="col" class="sHcZn"><?= $symptom['name'] ?></td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>

  <?php endforeach; ?>
</div>