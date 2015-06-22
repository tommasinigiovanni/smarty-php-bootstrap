<?php

/**
* Auth
*/
class Auth 
{
    
    function __construct()
    {
    }

    static function is_logged()
    {
        if(isset($_SESSION['user_id']) && $_SESSION['user_id']>0)
        {
            return true;
        } 
        elseif(URI !== '/auth/login')
        {
            header('Location: /auth/login');
        }

        return false;
    }
}