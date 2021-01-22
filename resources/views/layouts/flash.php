<?php if ($flash->getFlash($flashSelected)) : ?>
  <?php foreach ($flash->getFlash($flashSelected) as $key => $value) : ?>
    <?php if (is_array($value)) : ?>
      <?php foreach ($value as $message) : ?>
        <div class="<?= $flash->getFlash($flashSelected)['class'] ?> Azura_208 Jakobe_684 Avery_140 Tillman_189" role="alert">
          <?= $message['msg'] ?><button type="button" data-dismiss="alert" aria-label="Close" class="Zakai_358"></button>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  <?php endforeach; ?>
<?php endif; ?>