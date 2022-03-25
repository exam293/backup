<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="webstyle.css">
    <link rel="stylesheet" href="LIP.css">
    <title>Document</title>
<?php
session_start();
if (array_key_exists('student',$_POST)){
    
    header("location: /Gibjohn/student_login.php");
}

else if (array_key_exists('tutor',$_POST)){
    
    header("location: /Gibjohn/Tutor_login.php");
}

?>
</head>
<body>
    
<nav class="navbar navbar-expand-sm grey">
    <div class="container-fluid">
        <a class="navbar-brand" href="Homepage.php">
            <img src="logo.png" alt="Company logo" style="width:99px; height:60px">
        </a> 
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="Contact.php">Contact Us</a>
                </li>
            </ul>
            <form class="d-flex" method="get" action="/Gibjohn/Tutor_student.php">
                <button class="btn btn-primary" type="submit">Login</button>
            </form>
       
        </div>
    </div>
</nav> 

<div class="container mt-3">
  <center>
    <h2>Hello, are you a student or tutor?</h2>
  </center>
  <form class="pc1 rounded" style="border: 0px solid rgb(0, 0, 0);" method="post">
        <input type="submit" class="btn btn-primary" name="student" id="student" value="Student"/>
        <input type="submit" class="btn btn-primary" name="tutor" id="tutor" value="Tutor"/>
    </form>
</div>

</body>
</html>