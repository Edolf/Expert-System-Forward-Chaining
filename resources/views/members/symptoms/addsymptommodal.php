<div id="addSymptomModal" tabindex="-1" aria-labelledby="addSymptomModalLabel" aria-hidden="true" class="_2yvo3 _3F0Yh">
  <div class="EGnm1 JTLvt">
    <div class="xo4Q- _3Znxg _1Mqcp _3W_HJ _2W81z">
      <form method="POST" id="newSymptomForm" onsubmit="sulaiForm({this:this,event:event,link:this.action,method:'POST'})">
        <div class="_3BAVP _3TCQr">
          <button type="button" data-dismiss="modal" aria-label="Close" class="_2MKOU"></button>
          <div class="_1wHD0 _3Yl2j _2WrBi XgJiO">
            <h5 class="RogPM">Add New <strong>Symptoms</strong></h5>
          </div>

          <div class="SiBSM">
            <div class="_1Nnzl rCKpP _3eiVE _1uVtA _3Yl2j">
              <svg width="24" height="24" fill="currentColor" class="_2mXhC">
                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#droplet-half" />
              </svg>
              <h6 for="symptomname" class="_3MkHC _23PWi"><strong>Symptom</strong></h6>
            </div>
            <div class="_20qFt">
              <div class="_36R48 DLDJz">
                <input id="symptomname" name="symptomname" type="text" data-length="50" class="_21QBy _2fCo5" />
                <label for="symptomname">Symptom Name</label>
                <span data-error="" data-success="" class="_3jmDY"></span>
              </div>
            </div>
          </div>

          <div class="SiBSM">
            <div class="_1Nnzl rCKpP _3eiVE _1uVtA _3Yl2j">
              <svg width="24" height="24" fill="currentColor" class="_2mXhC">
                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#journal-text" />
              </svg>
              <h6 for="symptomdesc" class="_3MkHC _23PWi"><strong>Description</strong></h6>
            </div>
            <div class="_20qFt">
              <div class="_36R48 DLDJz">
                <textarea id="symptomdesc" name="symptomdesc" type="text" data-length="500" class="_21QBy _2wuGa _2fCo5"></textarea>
                <label for="symptomdesc">Description</label>
                <span data-error="" data-success="" class="_3jmDY"></span>
              </div>
            </div>
          </div>

          <div class="SiBSM">
            <div class="_1Nnzl rCKpP _3eiVE _1uVtA _3Yl2j">
              <svg width="24" height="24" fill="currentColor" class="_2mXhC">
                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#patch-question-fll" />
              </svg>
              <h6 for="question" class="_3MkHC _23PWi"><strong>Question</strong></h6>
            </div>
            <div class="_20qFt">
              <div class="_36R48 DLDJz">
                <textarea id="question" name="question" type="text" data-length="100" class="_21QBy _2wuGa _2fCo5"></textarea>
                <label for="question">Question</label>
                <span data-error="" data-success="" class="_3jmDY"></span>
              </div>
            </div>
          </div>

          <div class="SiBSM _3Yl2j DLDJz _34J9b">
            <div class="_1SQGt _1wHD0 _1qW0Z">
              <button type="button" data-dismiss="modal" class="_2HPko _3XagE">Close</button>
              <button type="submit" class="_2HPko _3XagE _2Q1xM _1wHD0 _1uVtA _3Yl2j">
                <span style="width: 1rem; height: 1rem" role="status" class="_2_2xs _2uMGw rCKpP"></span>
                <span>Add Symptom</span>
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>