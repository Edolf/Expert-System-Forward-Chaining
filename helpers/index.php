<?php

namespace helpers;

use app\models\CollapseMenu;
use app\models\SubMenu;

$subUrlMap = [];

foreach (SubMenu::findAll() as $key => $value) {
  $subUrlMap[$value['id']] = $value['url'];
}

$collUrlMap = [];

foreach (CollapseMenu::findAll() as $key => $value) {
  $collUrlMap[$value['id']] = $value['url'];
}
