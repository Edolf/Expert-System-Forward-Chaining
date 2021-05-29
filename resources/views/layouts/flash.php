<?php if ($flash->getFlash($flashSelected)) : ?>
  <?php foreach ($flash->getFlash($flashSelected) as $key => $value) : ?>
    <?php if (is_array($value)) : ?>
      <?php foreach ($value as $message) : ?>
        <div class="alert alert-dismissible fade show" class="<?= $flash->getFlash($flashSelected)['class'] ?>" role="alert">
          <?= $message['msg'] ?><button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  <?php endforeach; ?>
<?php endif; ?>