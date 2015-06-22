<?php
if(isset($_POST['email']) && isset($_POST['password']))
{
    $userRes = 
        $db->prepare(
           'SELECT 
                id, name, email, password
            FROM users
            WHERE email = :email');
    $userRes->execute(array(':email' => $_POST['email']));

    if($userRes)
    {
        $user = $userRes->fetchAll();

        if(count($user) === 1 && $user[0]['password'] === $_POST['password'])
        {
            // init session
            $_SESSION['user_id'] = $user[0]['id'];
            $_SESSION['name'] = $user[0]['name'];
            $_SESSION['email'] = $user[0]['email'];

            header("Location: /");
        }
    }
}