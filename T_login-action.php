<?php

include_once 'db.php';
include_once 'Tuser.php';

$u = new user ($connection, $_POST['first_name'], $_POST['email'], $_POST['password']);

$u->authenticate();

if ($u->is_logged_in()){
    session_start();
    $_SESSION['user'] = serialize($u);

    header("location: Tutor_dashboard.php");
} else{
    echo 'Could not log in with these credentials';
}