<!DOCTYPE html>
<html lang="<?= APP_LOCALE; ?>">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="Tugas Akhir Expert System | Forward Chaning" />
  <meta name="author" content="Edo Sulaiman | 18101152630092" />
  <meta name="csrf-token" content="<?= $csrfToken ?>" />

  <link rel="stylesheet" href="<?= ROOT ?>/css/app.css" />

  <script>
    if (window.localStorage.getItem('theme')) {
      document.documentElement.setAttribute('data-theme', localStorage.getItem('theme'))
      window.addEventListener('DOMContentLoaded', function(e) {
        document.querySelector('#switchTheme').setAttribute(window.localStorage.getItem('theme') == 'dark' ? 'checked' : 'value', '');
      })
    }
  </script>

  <title><?= $title ?? APP_NAME; ?></title>
</head>

<body id="page-top"></body></html>