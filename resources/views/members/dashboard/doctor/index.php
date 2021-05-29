<?php $flashSelected = 'doctor';
include VIEW_DIR . "/layouts/flash.php"; ?>

<div class="d-sm-flex ai-center jc-between mb-5">
  <h1 class="h3 mb-0 "><?= strtoupper($user->role) ?> Dashboard</h1>
  <button type="button" class="btn bg-primary" data-toggle="modal" data-target="#addProblemModal">Add
    New Problem</button>
</div>

<div class="container p-5">
  <?php foreach ($expertsystems::findAll() as $key => $ExpertSystem) : ?>
    <div id="<?= preg_replace('/\s+/', '_', $ExpertSystem['problem']) ?>">
      <div class="row mb-5">
        <div class="col-md-10">
          <h3 class="text-dark"><?= $ExpertSystem['problem'] ?></h3>
          <h6 class="mb-4">
            <b><?= $ExpertSystem['problem'] ?></b> is <?= $ExpertSystem['desc'] ?>
          </h6>
        </div>
        <div class="col-md-2 d-flex ai-center jc-center">

          <div>
            <button type="button" class="btn-flat btn-floating dropdown-trigger text-theme" data-target="problem-<?= $ExpertSystem['id'] ?>" data-alignment="right">
              <svg class="prefix" width="15" height="15" fill="currentColor">
                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#three-dots-vertical" />
              </svg>
            </button>
            <ul id="problem-<?= $ExpertSystem['id'] ?>" class="dropdown-content list-unstyled bg-transparent">
              <li><button class="btn bg-success w-100" onclick="setModalValue({editproblemname:`<?= $ExpertSystem['problem'] ?>`,editproblemdesc:'<?= $ExpertSystem['desc'] ?>'},document.querySelector('#editProblemForm'));document.querySelector('#editProblemForm').action = '<?= LINK ?>/members/updateproblem?id=<?= $ExpertSystem['id'] ?>&_csrf=<?= $csrfToken ?>&_method=PUT';" data-toggle="modal" data-target="#editProblemModal">Edit</button></li>
              <li>
                <form method="post" action="<?= LINK ?>/members/dropproblem?id=<?= $ExpertSystem['id'] ?>&_csrf=<?= $csrfToken ?>&_method=DELETE">
                  <button class="btn bg-danger w-100" onclick="return confirm('After you remove this problem everything related to this problem including the diseases and symptoms associated with this problem will be deleted')">Delete</button>
                </form>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="row mb-5">
        <div class="col-md-6">
          <h3 class="text-dark mb-4">Diseases</h3>
          <?php foreach ($diseases::findAll(['expertSystemId' => $ExpertSystem['id']]) as $key => $disease) : ?>
            <div class="row">
              <div class="col-md-5 as-center">
                <h5 class="text-dark"><?= $disease['name'] ?></h5>
              </div>
              <div class="col-md-6">
                <ul class="tabs p-0 bg-background" style="height: auto; width: fit-content;">
                  <li class="tab" style="height: auto;"><a class="nav-link text-theme" href="#description-<?= $disease['id'] ?>">Description</a></li>
                  <li class="tab" style="height: auto;"><a class="nav-link text-theme" href="#solution-<?= $disease['id'] ?>">Solution</a></li>
                </ul>
              </div>
            </div>

            <div id="description-<?= $disease['id'] ?>">
              <h6>Description</h6>
              <p class="mb-4"><?= $disease['desc'] ?></p>
            </div>
            <div id="solution-<?= $disease['id'] ?>">
              <h6>Solution</h6>
              <p class="mb-4"><?= $disease['solution'] ?></p>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="col-md-6">
          <h3 class="text-dark mb-4">Symptoms</h3>
          <table class="table table-hover">
            <?php foreach ($symptoms::findAll(['expertSystemId' => $ExpertSystem['id']]) as $key => $symptom) : ?>
              <tr>
                <td class="py-3" scope="col"><?= $symptom['name'] ?></td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
      </div>
    </div>

  <?php endforeach; ?>
  <?php include VIEW_DIR . "/members/dashboard/doctor/editproblemmodal.php"; ?>
</div>