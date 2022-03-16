<?php

include_once 'db.php';
include_once 'User.php';

$u = new user ($connection, $_POST['email'], $_POST['password']);

$u->authenticate();

if ($u->is_logged_in()){
    session_start();
    $_SESSION['User'] = serialize($u);

    header("location: Homepage.php");
} else{
    echo 'Could not log in with these credentials';
}