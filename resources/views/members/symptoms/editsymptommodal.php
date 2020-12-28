<div id="editSymptomModal" tabindex="-1" aria-labelledby="editSymptomModalLabel" aria-hidden="true" class="_31P-8 _3bCgx">
  <div class="_28U8K _2h0Jb">
    <div class="_2M5QZ _1wCNj _3LA0v _1HTfk s0VLt">
      <form method="POST" id="editSymptomForm" onsubmit="sulaiForm({this:this,event:event,link:this.action,method:'PUT'})">
        <div class="_3tByX _1jkJg">
          <button type="button" data-dismiss="modal" aria-label="Close" class="_2yuh-"></button>
          <div class="_1dTWr _3x-l5 _1HqFl _3mxtc">
            <h5 class="_3znGg">Edit <strong>Symptoms</strong></h5>
          </div>

          <div class="_3Sail">
            <div class="_18uPx _14vxW _3e0Cs _2kea1 _3x-l5">
              <svg width="24" height="24" fill="currentColor" class="_2i-WK">
                <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#droplet-half" />
              </svg>
              <h6 for="editsymptomname" class="_10lSW _1x6Xu"><strong>Symptom</strong></h6>
            </div>
            <div class="_3BRUK">
              <div class="_2E95Y riVBJ">
                <input id="editsymptomname" name="editsymptomname" type="text" data-length="50" class="_1y8Oi _1GV_i" />
                <label for="editsymptomname">Symptom Name</label>
                <span data-error="" data-success="" class="_25Y7w"></span>
              </div>
            </div>
          </div>

          <div class="_3Sail">
            <div class="_18uPx _14vxW _3e0Cs _2kea1 _3x-l5">
              <svg width="24" height="24" fill="currentColor" class="_2i-WK">
                <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#journal-text" />
              </svg>
              <h6 for="editsymptomdesc" class="_10lSW _1x6Xu"><strong>Description</strong></h6>
            </div>
            <div class="_3BRUK">
              <div class="_2E95Y riVBJ">
                <textarea id="editsymptomdesc" name="editsymptomdesc" type="text" data-length="500" class="_1y8Oi _142t1 _1GV_i"></textarea>
                <label for="editsymptomdesc">Description</label>
                <span data-error="" data-success="" class="_25Y7w"></span>
              </div>
            </div>
          </div>

          <div class="_3Sail">
            <div class="_18uPx _14vxW _3e0Cs _2kea1 _3x-l5">
              <svg width="24" height="24" fill="currentColor" class="_2i-WK">
                <use xlink:href="<?= ROOT ?>/assets/bootstrap-icons/bootstrap-icons.svg#patch-question-fll" />
              </svg>
              <h6 for="editquestion" class="_10lSW _1x6Xu"><strong>Question</strong></h6>
            </div>
            <div class="_3BRUK">
              <div class="_2E95Y riVBJ">
                <textarea id="editquestion" name="editquestion" type="text" data-length="100" class="_1y8Oi _142t1 _1GV_i"></textarea>
                <label for="editquestion">Question</label>
                <span data-error="" data-success="" class="_25Y7w"></span>
              </div>
            </div>
          </div>

          <div class="_3Sail _3x-l5 riVBJ gqtmr">
            <div class="_-1QSV _1dTWr _1JVHC">
              <button type="button" data-dismiss="modal" class="_2niE6 _2-EzS">Close</button>
              <button type="submit" class="_2niE6 _2-EzS _2SF1n _1dTWr _2kea1 _3x-l5">
                <span style="width: 1rem; height: 1rem" role="status" class="_8sneY _2f2YP _14vxW"></span>
                <span>Edit Symptom</span>
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>