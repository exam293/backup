<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="webstyle.css">
    <link rel="stylesheet" href="Tdashboard.css">
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
        //echo($user->password);
        
    
    
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
           
        $sql = "SELECT tutor_id, first_name, last_name, email, password, status FROM tutor";
        $result = $conn->query($sql);
    
        while($row = $result->fetch_assoc()) {
            $line = "<br>". $row["tutor_id"]. " ". $row["first_name"]. " " . $row["last_name"] ." ". $row["email"] ." ". $row["password"] ." ". $row["status"] . "<br>";
            //echo" ";
            $verify = password_verify($user->password, $row['password']);
            //echo($row["password"]);
            if ($row["email"] == $user->email && $verify == true){
                $_SESSION['tutor_id'] = $row["tutor_id"];
                $_SESSION['first_name'] = $row["first_name"];
                $_SESSION['last_name'] = $row["last_name"];
                $_SESSION['email'] = $row["email"];
                $_SESSION['status'] = $row["status"];
                //echo($_SESSION['student_id']." ".$_SESSION['first_name']." ".$_SESSION['last_name']." ".$_SESSION['email']." ".$_SESSION['status']);
            }
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

        function Opisite_page(){
            $op_page = $_SESSION["page2S"];

            //if($op_page == "visable"){
               // $se
            //}
            
        }

        function Student_visibility($Student_page){
            if (array_key_exists('page1S',$_POST)){
                $Spage = "1";
                if($Student_page == $Spage){
                    $_SESSION["page1S"] = "visible";
                    $_SESSION["page2S"] = "hidden";
                    $_SESSION["page3S"] = "hidden";
                    echo "visible";
                    
                }
    
                else{
                    echo "hidden";
                }
            }

            elseif (array_key_exists('page2S',$_POST)){
                $Spage = "2";
                if($Student_page == $Spage){
                    $_SESSION["page1S"] = "hidden";
                    $_SESSION["page2S"] = "visible";
                    $_SESSION["page3S"] = "hidden";
                    echo "visible";
                }
    
                else{
                    echo "hidden";
                }
            }

            elseif (array_key_exists('page3S',$_POST)){
                $Spage = "3";
                if($Student_page == $Spage){
                    $_SESSION["page1S"] = "hidden";
                    $_SESSION["page2S"] = "hidden";
                    $_SESSION["page3S"] = "visible";
                    echo "visible";
                }
    
                else{
                    echo "hidden";
                }
            }

            elseif (array_key_exists('page4S',$_POST)){
                $Spage = "4";
                if($Student_page == $Spage){
                    echo "visible";
                }
    
                else{
                    echo "hidden";
                }
            }

            else{
                $Spage = "1";
                if($Student_page == $Spage){
                    echo "visible";
                }
    
                else{
                    echo "hidden";
                }
            }
        }

        function Course_visibility($course_page){
            if (array_key_exists('page1',$_POST)){
                $page = "1";
                if($course_page == $page){
                    echo "visible";
                }
    
                else{
                    echo "hidden";
                }
            }

            elseif (array_key_exists('page2',$_POST)){
                $page = "2";
                Opisite_page();
                if($course_page == $page){
                    echo "visible";
                }
    
                else{
                    echo "hidden";
                }
            }

            elseif (array_key_exists('page3',$_POST)){
                $page = "3";
                if($course_page == $page){
                    echo "visible";
                }
    
                else{
                    echo "hidden";
                }
            }

            else{
                $page = "1";
                if($course_page == $page){
                    echo "visible";
                }
    
                else{
                    echo "hidden";
                }
            }
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
                
                <p style="color: white;">
                    Hello, <?php echo $_SESSION['first_name'] ?> <input type="submit" class="btn btn-primary" name="Logout" id="Logout" value="Logout">
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

<!-- page 1 courses -->
<div class="container Contentbox ">
    <div class="c1 rounded tabs text-white <?php $tpage="1"; Course_visibility($tpage)?>">
        <h4 class="title">Science</h4> 
        <img src="science.jpg" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?science=true">
                View More
            </a>
        </div>
    </div>
    <div class="c2 rounded tabs text-white vis <?php $tpage="1"; Course_visibility($tpage)?>">
        <h4 class="title" >Maths</h4> 
        <img src="maths.jpg" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?maths=true">
                View More
            </a>
        </div>
    </div>
    <div class="c3 rounded tabs text-white <?php $tpage="1"; Course_visibility($tpage)?>">
        <h4 class="title" >English</h4> 
        <img src="english.jpg" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?english=true">
                View More
            </a>
        </div>
    </div>
    <div class="c4 rounded tabs text-white <?php $tpage="1"; Course_visibility($tpage) ?>">
        <h4 class="title" >History</h4> 
        <img src="history.jpg" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?history=true">
                View More
            </a>
        </div>
    </div>

    
    <form class="pc1 rounded" style="border: 0px solid rgb(0, 0, 0);" method="post">
        <input type="submit" class="btn btn-primary" name="page1" id="page1" value="1"/>
        <input type="submit" class="btn btn-primary" name="page2" id="page2" value="2"/>
        <input type="submit" class="btn btn-primary" name="page3" id="page3" value="3"/>
    </form>
    
    <form class="pc2 rounded" style="border: 0px solid rgb(0, 0, 0);" method="post">
        <input type="submit" class="btn btn-primary" name="page1S" id="page1S" value="1"/>
        <input type="submit" class="btn btn-primary" name="page2S" id="page2S" value="2"/>
        <input type="submit" class="btn btn-primary" name="page3S" id="page3S" value="3"/>
        <input type="submit" class="btn btn-primary" name="page4S" id="page4S" value="s"/>
    </form>

    <!-- page 1 students -->
    <div class="s1 rounded tabs text-white <?php $Spage="1"; Student_visibility($Spage)?>">1</div>
    <div class="s2 rounded tabs text-white <?php $Spage="1"; Student_visibility($Spage) ?>">2</div>
    <div class="s3 rounded tabs text-white <?php $Spage="1"; Student_visibility($Spage) ?>">3</div>
    <div class="s4 rounded tabs text-white <?php $Spage="1"; Student_visibility($Spage) ?>">4</div>
    <div class="s5 rounded tabs text-white <?php $Spage="1"; Student_visibility($Spage) ?>">5</div>
    <div class="s6 rounded tabs text-white <?php $Spage="1"; Student_visibility($Spage) ?>">6</div>

    <!-- page 2 courses -->
    <div class="c5 rounded tabs text-white <?php $tpage="2"; Course_visibility($tpage) ?>">
        <h4 class="title" >Geography</h4> 
        <img src="geography.jpg" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?geography=true">
                View More
            </a>
        </div>
    </div>
    <div class="c6 rounded tabs text-white <?php $tpage="2"; Course_visibility($tpage)?>">
        <h4 class="title" >Modern Foreign Languages</h4> 
        <img src="mfl.jpg" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?mfl=true">
                View More
            </a>
        </div>
    </div>
    <div class="c7 rounded tabs text-white <?php $tpage="2"; Course_visibility($tpage)?>">
        <h4 class="title" >Design and Technology</h4> 
        <img src="dt.jpg" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?dt=true">
                View More
            </a>
        </div>
    </div>
    <div class="c8 rounded tabs text-white <?php $tpage="2"; Course_visibility($tpage)?>">
        <h4 class="title" >Art and Design</h4> 
        <img src="ad.jpg" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?ad=true">
                View More
            </a>
        </div>
    </div>

    <!-- page 3 courses -->
    <div class="c9 rounded tabs text-white <?php $tpage="3"; Course_visibility($tpage) ?>">
        <h4 class="title" >Music</h4> 
        <img src="music.jpg" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?music=true">
                View More
            </a>
        </div>
    </div>
    <div class="c10 rounded tabs text-white <?php $tpage="3"; Course_visibility($tpage)?>">
        <h4 class="title" >Physical Education</h4> 
        <img src="pe.jpg" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?pe=true">
                View More
            </a>
        </div>
    </div>
    <div class="c11 rounded tabs text-white <?php $tpage="3"; Course_visibility($tpage)?>">
        <h4 class="title" >Citizenship</h4> 
        <img src="citizenship.png" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?citizenship=true">
                View More
            </a>
        </div>
    </div>
    <div class="c12 rounded tabs text-white <?php $tpage="3"; Course_visibility($tpage) ?>">
        <h4 class="title" >Computing</h4> 
        <img src="computing.jpg" class="subject_img">
        <div class="VM">
            <a class="vm" href="Student_dashboard.php?computing=true">
                View More
            </a>
        </div>
    </div>

    <!-- page2 students -->
    <div class="s7 rounded tabs text-white <?php $Spage="2"; Student_visibility($Spage)?>">7</div>
    <div class="s8 rounded tabs text-white <?php $Spage="2"; Student_visibility($Spage) ?>">8</div>
    <div class="s9 rounded tabs text-white <?php $Spage="2"; Student_visibility($Spage) ?>">9</div>
    <div class="s10 rounded tabs text-white <?php $Spage="2"; Student_visibility($Spage) ?>">10</div>
    <div class="s11 rounded tabs text-white <?php $Spage="2"; Student_visibility($Spage) ?>">11</div>
    <div class="s12 rounded tabs text-white <?php $Spage="2"; Student_visibility($Spage) ?>">12</div>

    <!-- page3 students -->
    <div class="s13 rounded tabs text-white <?php $Spage="3"; Student_visibility($Spage) ?>">13</div>
    <div class="s14 rounded tabs text-white <?php $Spage="3"; Student_visibility($Spage) ?>">14</div>
    <div class="s15 rounded tabs text-white <?php $Spage="3"; Student_visibility($Spage) ?>">15</div>
    <div class="s16 rounded tabs text-white <?php $Spage="3"; Student_visibility($Spage) ?>">16</div>
    <div class="s17 rounded tabs text-white <?php $Spage="3"; Student_visibility($Spage) ?>">17</div>
    <div class="s18 rounded tabs text-white <?php $Spage="3"; Student_visibility($Spage) ?>">18</div>

    <!-- page4 students -->
    <div class="s19 rounded tabs text-white <?php $Spage="4"; Student_visibility($Spage) ?>">19</div>
    <div class="s20 rounded tabs text-white <?php $Spage="4"; Student_visibility($Spage) ?>">20</div>
    <div class="s21 rounded tabs text-white <?php $Spage="4"; Student_visibility($Spage) ?>">21</div>
    <div class="s22 rounded tabs text-white <?php $Spage="4"; Student_visibility($Spage) ?>">22</div>
    <div class="s23 rounded tabs text-white <?php $Spage="4"; Student_visibility($Spage) ?>">23</div>
    <div class="s24 rounded tabs text-white <?php $Spage="4"; Student_visibility($Spage) ?>">24</div>

    
</div>

</body>
</html>