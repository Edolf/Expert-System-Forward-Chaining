<?php

// Senin 21 Dec 2020
// Assalamu'alaikum wr.wb Saya Edo Sulaiman yang membuat semua Framework ini sendirian sambil mencari referensi di google, github, dan stackoverflow,,
// Framework ini terinspirasi dari system Framework di Nodejs Express dan Laravel yang sudah di gabungkan sebagian dari fungsi yang dasarnya saja,,
// Bagi yang sudah Familiar dengan Framework Express Framework ini seperti duplikat dari dari Framework tersebut tetapi rasa PHP, dan tambahan sedikit Fitur mirip Laravel,,
// Framework ini saya membuatnya sambil belajar bahasa PHP dan pasti masih terdapat banyak bug di dalamnya,,

require_once dirname(__DIR__) . '/config/config.php';

spl_autoload_register(function ($className) {
  $file = dirname(__DIR__) . DS . str_replace('\\', DS, $className) . '.php';
  if (file_exists($file) && is_readable($file)) {
    require_once $file;
  }
});

$app = new app\core\Application();

require_once dirname(__DIR__) . '/resources/routers/routers.php';

$app->run();
