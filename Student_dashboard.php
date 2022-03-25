<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="webstyle.css">
    <link rel="stylesheet" href="Sdashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <title>Document</title>
    <?php 
    include_once 'db.php';
    include_once 'user.php';

    session_start();
    $logged_in = false;
    if (isset($_SESSION['user'])) {
        $logged_in = true;
        $user = unserialize($_SESSION['user']);
    }

    else{
        header("Location: /Gibjohn/Student_login.php");
    }

    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gibjohn";
    $Login_student_id = "1";
    $progress = "";

    //echo($user->email);
    //echo($user->password)
    


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
       
    $sql = "SELECT student_id, first_name, last_name, email, password, status FROM student";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
        $line = "<br>". $row["student_id"]. " ". $row["first_name"]. " " . $row["last_name"] ." ". $row["email"] ." ". $row["password"] ." ". $row["status"] . "<br>";
        //echo" ";
        $verify = password_verify($user->password, $row['password']);
        //echo($row["password"]);
        if ($row["email"] == $user->email && $verify == true){
            $_SESSION['student_id'] = $row["student_id"];
            $_SESSION['first_name'] = $row["first_name"];
            $_SESSION['last_name'] = $row["last_name"];
            $_SESSION['email'] = $row["email"];
            $_SESSION['status'] = $row["status"];
            //echo($_SESSION['student_id']." ".$_SESSION['first_name']." ".$_SESSION['last_name']." ".$_SESSION['email']." ".$_SESSION['status']);
        }
    }
    

    function progress($course_name){
        
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gibjohn";
        $Login_student_id = $_SESSION['student_id'];
        $progress = "";
            
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
            
        $sql = "SELECT course_id, student_id, tutor_id, course_name, progress, starting_date, starting_date status FROM course";
        $result = $conn->query($sql);
                
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $line = "<br>". $row["course_id"]. " ". $row["student_id"]. " " . $row["tutor_id"] ." ". $row["course_name"] ." ". $row["progress"] ." ". $row["starting_date"] ." ". $row["status"] . "<br>";
                //echo $line;
                if ($row["student_id"] == $Login_student_id && $row["course_name"] == $course_name){
                    $progress = $row["progress"]."%";
                    echo $progress;
                }
            }
        } else {
            echo "0%";
        }    
        $conn->close();
    }

    function course($subject) {
        $_SESSION['subject'] = $subject;
        echo $_SESSION['subject'];
        header("Location: /Gibjohn/course.php");
      }
    
      if (isset($_GET['maths'])) {
        $sub = "maths";
        course($sub);
      }

      elseif (isset($_GET['science'])) {
        $sub = "science";
        course($sub);
      }

      elseif (isset($_GET['english'])) {
        $sub = "english";
        course($sub);
      }

      elseif (isset($_GET['history'])) {
        $sub = "history";
        course($sub);
      }

      elseif (isset($_GET['geography'])) {
        $sub = "geography";
        course($sub);
      }

      elseif (isset($_GET['mfl'])) {
        $sub = "mfl";
        course($sub);
      }

      elseif (isset($_GET['dt'])) {
        $sub = "dt";
        course($sub);
      }

      elseif (isset($_GET['ad'])) {
        $sub = "ad";
        course($sub);
      }

      elseif (isset($_GET['music'])) {
        $sub = "music";
        course($sub);
      }

      elseif (isset($_GET['pe'])) {
        $sub = "pe";
        course($sub);
      }

      elseif (isset($_GET['citizenship'])) {
        $sub = "citizenship";
        course($sub);
      }

      elseif (isset($_GET['computing'])) {
        $sub = "computing";
        course($sub);
      }
    ?>
    <?php 
    if (array_key_exists('Logout',$_POST)) {
        header("Location: /Gibjohn/logout.php");
    }

    else if (array_key_exists('Login',$_POST)) {
        header("Location: /Gibjohn/Tutor_student.php");
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
            <form class="d-flex" method="post">
                <?php 
                    if ($logged_in):
                ?>
                
                <p>
                    Hello, (name) <input type="submit" class="btn btn-primary" name="Logout" id="Logout" value="Logout">
                </p>
                
                <?php
                    else: 
                ?>
                <p>
                    <input type="submit" class="btn btn-primary" name="Login" id="Login" value="Login">
                </p>
                
                <?php endif ?>
            </form>
        </div>
    </div>
</nav> 

<div class="container">
    <div class="c1 rounded tabs text-white col-md">
        <h4 class="title" >Science</h4> 
        <img src="science.jpg" class="subject_img img-fluid">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?science=true">
                View More
            </a>
        </div>
        <div class="progress">
            <div class="progress-bar" style="width:<?php 
                    $course = "science";
                    progress($course) 
                ?>">
                <?php 
                    $course = "science";
                    progress($course) 
                ?>
            </div>
        </div>
    </div>
    <div class="c2 rounded tabs text-white">
        <h4 class="title" >Mathematics</h4> 
        <img src="maths.jpg" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?maths=true">
                View More
            </a>
        </div>
        <div class="progress">
            <div class="progress-bar" style="width:<?php 
                    $course = "mathematics";
                    progress($course) 
                ?>">
                <?php 
                    $course = "mathematics";
                    progress($course) 
                ?>
            </div>
        </div>
    </div>
    <div class="c3 rounded tabs text-white">
        <h4 class="title" >English</h4> 
        <img src="english.jpg" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?english=true">
                View More
            </a>
        </div>
        <div class="progress">
            <div class="progress-bar" style="width:<?php 
                    $course = "english";
                    progress($course) 
                ?>">
                <?php 
                    $course = "english";
                    progress($course) 
                ?>
            </div>
        </div>
    </div>
    <div class="c4 rounded tabs text-white">
        <h4 class="title" >History</h4> 
        <img src="history.jpg" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?history=true">
                View More
            </a>
        </div>
        <div class="progress">
            <div class="progress-bar" style="width:<?php 
                    $course = "history";
                    progress($course) 
                ?>">
                <?php 
                    $course = "history";
                    progress($course) 
                ?>
            </div>
        </div>
    </div>
    <div class="c5 rounded tabs text-white">
        <h4 class="title" >Geography</h4> 
        <img src="geography.jpg" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?geography=true">
                View More
            </a>
        </div>
        <div class="progress">
            <div class="progress-bar" style="width:<?php 
                    $course = "geography";
                    progress($course) 
                ?>">
                <?php 
                    $course = "geography";
                    progress($course) 
                ?>
            </div>
        </div>
    </div>
    <div class="c6 rounded tabs text-white">
        <h4 class="title" >Modern Foreign Languages</h4> <!-- s3 -->
        <img src="mfl.jpg" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?mfl=true">
                View More
            </a>
        </div>
        <div class="progress">
            <div class="progress-bar" style="width:<?php 
                    $course = "mfl";
                    progress($course) 
                ?>">
                <?php 
                    $course = "mfl";
                    progress($course) 
                ?>
            </div>
        </div>
    </div>
    <div class="c7 rounded tabs text-white">
        <h4 class="title" >Design and Technology</h4>
        <img src="dt.jpg" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?dt=true">
                View More
            </a>
        </div>
        <div class="progress">
            <div class="progress-bar" style="width:<?php 
                    $course = "design_technology";
                    progress($course) 
                ?>">
                <?php 
                    $course = "design_technology";
                    progress($course) 
                ?>
            </div>
        </div>
    </div>
    <div class="c8 rounded tabs text-white">
        <h4 class="title" >Art and Design</h4> 
        <img src="ad.jpg" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?ad=true">
                View More
            </a>
        </div>
        <div class="progress">
            <div class="progress-bar" style="width:<?php 
                    $course = "art_design";
                    progress($course) 
                ?>">
                <?php 
                    $course = "art_design";
                    progress($course) 
                ?>
            </div>
        </div>
    </div>
    <div class="c9 rounded tabs text-white">
        <h4 class="title" >Music</h4> 
        <img src="music.jpg" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?music=true">
                View More
            </a>
        </div>
        <div class="progress">
            <div class="progress-bar" style="width:<?php 
                    $course = "music";
                    progress($course) 
                ?>">
                <?php 
                    $course = "music";
                    progress($course) 
                ?>
            </div>
        </div>
    </div>
    <div class="c10 rounded tabs text-white">
        <h4 class="title" >Physical Education</h4>
        <img src="pe.jpg" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?pe=true">
                View More
            </a>
        </div>
        <div class="progress">
            <div class="progress-bar" style="width:<?php 
                    $course = "pe";
                    progress($course) 
                ?>">
                <?php 
                    $course = "pe";
                    progress($course) 
                ?>
            </div>
        </div>
    </div>
    <div class="c11 rounded tabs text-white"> <!-- s2 -->
        <h4 class="title" >Citizenship</h4> 
        <img src="citizenship.png" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?citizenship=true">
                View More
            </a>
        </div>
        <div class="progress">
            <div class="progress-bar" style="width:<?php 
                    $course = "citizenship";
                    progress($course) 
                ?>">
                <?php 
                    $course = "citizenship";
                    progress($course) 
                ?>
            </div>
        </div>
    </div>
    <div class="c12 rounded tabs text-white">
        <h4 class="title" >Computing</h4> 
        <img src="computing.jpg" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?computing=true">
                View More
            </a>
        </div>
        <div class="progress">
            <div class="progress-bar" style="width:<?php 
                    $course = "computing";
                    progress($course) 
                ?>">
                <?php 
                    $course = "computing";
                    progress($course) 
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>