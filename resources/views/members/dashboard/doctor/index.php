<?php $flashSelected = 'doctor';
include VIEW_DIR . "/layouts/flash.php"; ?>

<div class="_3xzGw _2kea1 njVXK gqtmr">
  <h1 class="_3vE3C _2gyiY"><?= strtoupper($user->role) ?> Dashboard</h1>
  <button type="button" data-toggle="modal" data-target="#addProblemModal" class="_2niE6 Bdn6B">Add
    New Problem</button>
</div>

<div class="_22DlN _3PDUl">
  <?php foreach ($expertsystems::findAll() as $key => $ExpertSystem) : ?>
    <div class="_3Sail gqtmr">
      <div class="krQJT">
        <h3 class="_1m-Fh">
          <span class="_2eRp4">
            <?= $ExpertSystem['problem'] ?>
            <button type="button" class="_2niE6 _2-EzS _2zhDk _27Ucp _14vxW">
              <svg width="24" height="24" fill="currentColor">
                <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#check" />
              </svg>
            </button>
            <button type="button" class="_2niE6 _2-EzS _2zhDk _27Ucp _2eRp4">
              <svg width="24" height="24" fill="currentColor">
                <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#link-45deg" />
              </svg>
            </button>
          </span>
          <span class="_14vxW">
            <!-- <form>
              <div css-module="row input-field text-center m-0">
                <div css-module="input-field p-0 m-0">
                  <input id="newfullname" name="newfullname" value="<?= $ExpertSystem['problem'] ?>" type="text" css-module="p-0 m-0 text-success" data-length="25">
                </div>
              </div>
            </form> -->
          </span>
        </h3>
        <h6 class="_1PITf">
          <span class="_2eRp4"><b><?= $ExpertSystem['problem'] ?></b> is <?= $ExpertSystem['desc'] ?>
            <button type="button" class="_2niE6 _2-EzS _2zhDk _27Ucp _14vxW _27Ucp _2eRp4">
              <svg width="24" height="24" fill="currentColor">
                <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#link-45deg" />
              </svg>
            </button>
            <button type="button" class="_2niE6 _2-EzS _2zhDk _27Ucp _14vxW _27Ucp _14vxW">
              <svg width="24" height="24" fill="currentColor">
                <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#check" />
              </svg>
            </button>
          </span>
          <span class="_14vxW">
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
      <div class="Ww7sD _1dTWr _2kea1 _3x-l5">
        <form method="post" action="<?= LINK ?>/members/dropproblem?id=<?= $ExpertSystem['id'] ?>&_csrf=<?= $csrfToken ?>&_method=DELETE">
          <button onclick="return confirm('After you remove this problem everything related to this problem including the diseases and symptoms associated with this problem will be deleted')" class="_2niE6 cnWz7">Delete
            <?= $ExpertSystem['problem'] ?></button>
        </form>
      </div>
    </div>

    <div class="_3Sail gqtmr">
      <div class="_1s9b_">
        <h3 class="_1m-Fh _1PITf">Diseases</h3>
        <?php foreach ($diseases::findAll(['expertSystemId' => $ExpertSystem['id']]) as $key => $disease) : ?>
          <h5 class="_1m-Fh"><?= $disease['name'] ?></h5>
          <h6 class="_1PITf"><?= $disease['desc'] ?></h6>
          <!-- <h6 css-module="mb-4"><?= $disease['solution'] ?></h6> -->
        <?php endforeach; ?>
      </div>
      <div class="_1s9b_">
        <h3 class="_1m-Fh _1PITf">Symptoms</h3>
        <table class="_12PUq -tn6h">
          <?php foreach ($symptoms::findAll(['expertSystemId' => $ExpertSystem['id']]) as $key => $symptom) : ?>
            <tr>
              <td scope="col" class="_3GpXu"><?= $symptom['name'] ?></td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>

  <?php endforeach; ?>
</div>