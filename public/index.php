<?php
/*
 * Main index
 */
require_once('../app/lib/smarty/libs/Smarty.class.php');

$config = require_once('../app/common/config.php');

$smarty = new Smarty();
$smarty->setTemplateDir('../app/templates');
$smarty->setCompileDir('../app/templates_c');

$smarty->display('index.html');

