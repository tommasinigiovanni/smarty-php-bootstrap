<?php

/**
* Auth
*/
class Auth 
{
    /**
     * List of public routes
     */ 
    static public $excluded_routes = array(
        '/auth/login'
    );

    static function is_logged()
    {
        if(isset($_SESSION['user_id']) && $_SESSION['user_id']>0)
        {
            return true;
        } 

        return false;
    }

    static function redirect_to_auth()
    {
        header('Location: /auth/login');
        die();
    }

    static function is_public_route($route)
    {
        return (in_array($route, Auth::$excluded_routes));
    }
}