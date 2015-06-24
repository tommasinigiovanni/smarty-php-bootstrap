<?php
/**
 * App init
 */
error_reporting(E_ALL);
ini_set('display_errors', true);

// main paths
define('APP', 				  realpath('../app'));
define('CLASSI', 		APP . '/classi');
define('INCLUDES', 		APP . '/includes');
define('COMMON', 		APP . '/common');
define('LIB', 			APP . '/lib');
define('TEMPLATES', 	APP . '/templates');
define('TEMPLATES_C', 	APP . '/templates_c');

// get route path into constant
$URI = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
if($URI === '/')
	$URI = '/home';

// parse URI into the triple
list(, $CATEGORY, $ACTION, $ID) = array_pad(explode('/', $URI), 4, null);
if(is_null($ACTION))
	$ACTION = 'index';

session_start();

require_once(LIB . '/smarty/libs/Smarty.class.php');
$smarty = new Smarty();
$smarty->setTemplateDir(TEMPLATES);
$smarty->setCompileDir(TEMPLATES_C);

spl_autoload_register(function($class){
    require_once CLASSI . "/{$class}.php";
});

require_once(COMMON . '/functions.php');
$config = require_once(COMMON . '/config.php');

DB::init($config);
