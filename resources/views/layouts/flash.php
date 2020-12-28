<?php if ($flash->getFlash($flashSelected)) : ?>
  <?php foreach ($flash->getFlash($flashSelected) as $key => $value) : ?>
    <?php if (is_array($value)) : ?>
      <?php foreach ($value as $message) : ?>
        <div class="<?= $flash->getFlash($flashSelected)['class'] ?> _2TZV4 _3ReZ9 _3bCgx hCvB_" role="alert">
          <?= $message['msg'] ?><button type="button" data-dismiss="alert" aria-label="Close" class="_2yuh-"></button>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  <?php endforeach; ?>
<?php endif; ?>