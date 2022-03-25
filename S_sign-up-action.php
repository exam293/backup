<?php 
include_once "db.php";
include_once "user.php";

if( ! isset($_POST["email"])){
    header("Location: home.php");
    exit;
}
var_dump($_POST);

$user = new User($connection, $_POST['first_name'], $_POST["email"], $_POST["password"]);
$user->insert();
header("Location: /Gibjohn/Student_login.php");