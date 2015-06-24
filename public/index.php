<?php
/*
 * Main index
 */

require_once('../app/common/init.php');

// URI route
$smarty->assign('URI', $URI);
$smarty->assign('CATEGORY', $CATEGORY);
$smarty->assign('ACTION', $ACTION);
$smarty->assign('ID', $ID);

// register static class in smarty
$smarty->registerClass("Auth", "Auth");

if(Auth::is_logged() || Auth::is_public_route($URI)) {
    if(is_file(INCLUDES . "/$CATEGORY/$ACTION.php")) {
        include INCLUDES . "/$CATEGORY/$ACTION.php";
    }
} else {
    Auth::redirect_to_auth();
}

if(!is_ajax()) {
    if(is_file(TEMPLATES . "/$CATEGORY/$ACTION.html")) {
        $smarty->display(TEMPLATES . "/$CATEGORY/$ACTION.html");
    } else {
        $smarty->display(TEMPLATES . '/not_found.html');
    }
}


