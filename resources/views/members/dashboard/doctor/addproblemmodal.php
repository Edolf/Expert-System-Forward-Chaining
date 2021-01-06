<div id="addProblemModal" tabindex="-1" aria-labelledby="addProblemModalLabel" aria-hidden="true" class="_2yvo3 _3F0Yh">
  <div class="EGnm1 JTLvt">
    <div class="xo4Q- _3Znxg _1Mqcp _3W_HJ _2W81z">
      <form method="POST" id="newProblemform" onsubmit="sulaiForm({this:this,event:event,link:'<?= LINK ?>/members/getproblem',method:'POST'})">
        <div class="_3BAVP _3TCQr">
          <button type="button" data-dismiss="modal" aria-label="Close" class="_2MKOU"></button>
          <div class="_1wHD0 _3Yl2j _2WrBi XgJiO">
            <h5 class="RogPM">Add New <strong>Problems</strong></h5>
          </div>

          <div class="SiBSM">
            <div class="_1Nnzl rCKpP _3eiVE _1uVtA _3Yl2j">
              <svg width="24" height="24" fill="currentColor" class="_2mXhC">
                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#book-half" />
              </svg>
              <h6 for="problemname" class="_3MkHC _23PWi"><strong>Problem</strong></h6>
            </div>
            <div class="_20qFt">
              <div class="_36R48 DLDJz">
                <input id="problemname" name="problemname" type="text" data-length="25" class="_21QBy _2fCo5" />
                <label for="problemname">Problem Name</label>
                <span data-error="" data-success="" class="_3jmDY"></span>
              </div>
            </div>
          </div>

          <div class="SiBSM">
            <div class="_1Nnzl rCKpP _3eiVE _1uVtA _3Yl2j">
              <svg width="24" height="24" fill="currentColor" class="_2mXhC">
                <use xlink:href="<?= ROOT ?>/assets/fonts/icons/all-icons.svg#file-text-fill" />
              </svg>
              <h6 for="problemdesc" class="_3MkHC _23PWi"><strong>Descriptions</strong></h6>
            </div>
            <div class="_20qFt">
              <div class="_36R48 DLDJz">
                <textarea id="problemdesc" name="problemdesc" type="text" data-length="500" class="_21QBy _2wuGa _2fCo5"></textarea>
                <label for="problemdesc">Descriptions</label>
                <span data-error="" data-success="" class="_3jmDY"></span>
              </div>
            </div>
          </div>

          <div class="SiBSM _3Yl2j DLDJz _34J9b">
            <div class="_1SQGt _1wHD0 _1qW0Z">
              <button type="button" data-dismiss="modal" class="_2HPko _3XagE">Close</button>
              <button type="submit" class="_2HPko _3XagE _2Q1xM _1wHD0 _1uVtA _3Yl2j">
                <span style="width: 1rem; height: 1rem" role="status" class="_2_2xs _2uMGw rCKpP"></span>
                <span>Add Problem</span>
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>