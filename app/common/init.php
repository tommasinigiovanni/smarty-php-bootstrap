<?php
/**
 * App init
 */
error_reporting(E_ALL);
ini_set('display_errors', true);

// main paths
define('APP', '../app');
define('CLASSI', APP . '/classi');
define('INCLUDES', APP . '/includes');
define('COMMON', APP . '/common');
define('LIB', APP . '/lib');
define('TEMPLATES', APP . '/templates');
define('TEMPLATES_C', APP . '/templates_c');

// get route path into constant
define('URI', isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI']: '');

session_start();

require_once(LIB . '/smarty/libs/Smarty.class.php');
$smarty = new Smarty();
$smarty->setTemplateDir(TEMPLATES);
$smarty->setCompileDir(TEMPLATES_C);

$smarty->assign('content_file', 'not_found.html');;

spl_autoload_register(function($class){
    require_once CLASSI . "/{$class}.php";
});

require_once(COMMON . '/functions.php');
$config = require_once(COMMON . '/config.php');

$db = new PDO(
	$config['db']['driver'] . ':host=' . $config['db']['host'] . ';dbname=' . $config['db']['dbname'], 
	$config['db']['user'], $config['db']['password']
);

