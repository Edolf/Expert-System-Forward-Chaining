<?php if ($flash->getFlash($flashSelected)) : ?>
  <?php foreach ($flash->getFlash($flashSelected) as $key => $value) : ?>
    <?php if (is_array($value)) : ?>
      <?php foreach ($value as $message) : ?>
        <div class="<?= $flash->getFlash($flashSelected)['class'] ?> vRF3K qEbXj _3F0Yh _1QhYL" role="alert">
          <?= $message['msg'] ?><button type="button" data-dismiss="alert" aria-label="Close" class="_2MKOU"></button>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  <?php endforeach; ?>
<?php endif; ?>