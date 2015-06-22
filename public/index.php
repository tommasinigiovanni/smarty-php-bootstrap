<?php
/*
 * Main index
 */

require_once('../app/common/init.php');

if(!Auth::is_logged())
{
    if(is_file(INCLUDES . URI . '.php')) {
        include INCLUDES . URI . '.php';
    }

    if(is_file(TEMPLATES . URI . '.html')) {
        $content_file = realpath(TEMPLATES . URI . '.html');
        $smarty->assign('content_file', $content_file);    
    }
}

if(!is_ajax())
    $smarty->display('index.html');

