<?php
/*
 * Main index
 */

require_once('../app/common/init.php');

// register static class in smarty
$smarty->registerClass("Auth", "Auth");

if(Auth::is_logged() || Auth::is_public_route($URI))
{
    if(is_file(INCLUDES . $URI . '.php')) {
        include INCLUDES . $URI . '.php';
    }
}
else
{
    Auth::redirect_to_auth();
}

if(is_file(TEMPLATES . $URI . '.html')) {
    $smarty->assign('content_file', realpath(TEMPLATES . $URI . '.html'));    
}

if(!is_ajax())
    $smarty->display('index.html');

