<?php

/**
* Auth
*/
class Auth 
{
    /**
     * List of excluded routes, public routes
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
        elseif(Auth::is_excluded_route(URI))
        {
            return true;
        }
        else
        {
            header('Location: /auth/login');
            die();
        }

        return false;
    }

    static function is_excluded_route($route)
    {
        return (in_array($route, Auth::$excluded_routes));
    }
}