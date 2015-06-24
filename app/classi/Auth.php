<?php
/**
* Auth class
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

    /**
     * Redirect to auth
     */ 
    static function redirect_to_auth()
    {
        header('Location: /auth/login');
        die();
    }

    /**
     * Check if route is public
     */ 
    static function is_public_route($route)
    {
        return (in_array($route, Auth::$excluded_routes));
    }

    /**
     * Check if route is public
     */ 
    static function authenticate($email, $password)
    {
        $userRes = DB::execute(
           'SELECT 
                id, name, email, password
            FROM users
            WHERE email = :email',
            array(':email' => $_POST['email'])
        );

        if($userRes)
        {
            $user = $userRes->fetchAll();

            if(count($user) === 1 && $user[0]['password'] === $_POST['password'])
            {
                // init session
                $_SESSION['user_id'] = $user[0]['id'];
                $_SESSION['name'] = $user[0]['name'];
                $_SESSION['email'] = $user[0]['email'];

                return true;
            }
        }

        return false;
    }
}