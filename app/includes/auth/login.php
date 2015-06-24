<?php
if(isset($_POST['email']) && isset($_POST['password']))
{
    if(Auth::authenticate($_POST['email'], $_POST['password'])) {
        header("Location: /");
        die;
    } else {
        Auth::redirect_to_auth();
        die;
    }
}
