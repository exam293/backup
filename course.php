<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="webstyle.css">
    <link rel="stylesheet" href="course.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital@1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <title>View More</title>
    
    <?php
        include_once 'db.php';
        include_once 'user.php';
        
        session_start();
        
        $logged_in = false;
        if (isset($_SESSION['user'])) {
            $logged_in = true;
            $user = unserialize($_SESSION['user']);
        }
        
        function title(){ 
            if ($_SESSION['subject'] == "maths"){
                echo("Mathmatics");
            }

            else if ($_SESSION['subject'] == "science"){
                echo("Science");
            }

            else if ($_SESSION['subject'] == "english"){
                echo("English");
            }

            else if ($_SESSION['subject'] == "history"){
                echo("History");
            }

            else if ($_SESSION['subject'] == "geography"){
                echo("Geography");
            }

            else if ($_SESSION['subject'] == "mfl"){
                echo("Modern Foreign Languages");
            }

            else if ($_SESSION['subject'] == "dt"){
                echo("Design and Technology");
            }

            else if ($_SESSION['subject'] == "ad"){
                echo("Art and Design");
            }

            else if ($_SESSION['subject'] == "music"){
                echo("Music");
            }

            else if ($_SESSION['subject'] == "pe"){
                echo("Physical Education");
            }

            else if ($_SESSION['subject'] == "citizenship"){
                echo("Citizenship");
            }

            else if ($_SESSION['subject'] == "computing"){
                echo("Computing");
            }
        }
        function content_height(){
            if ($_SESSION['subject'] == "maths"){
                echo("Mathmatics");
            }

            else if ($_SESSION['subject'] == "science"){
                echo("Science");
            }

            else if ($_SESSION['subject'] == "english"){
                echo("English");
            }

            else if ($_SESSION['subject'] == "history"){
                echo("History");
            }

            else if ($_SESSION['subject'] == "geography"){
                echo(strval(31*24)."px");
            }

            else if ($_SESSION['subject'] == "mfl"){
                echo("Modern Foreign Languages");
            }

            else if ($_SESSION['subject'] == "dt"){
                echo("Design and Technology");
            }

            else if ($_SESSION['subject'] == "ad"){
                echo("Art and Design");
            }

            else if ($_SESSION['subject'] == "music"){
                echo("Music");
            }

            else if ($_SESSION['subject'] == "pe"){
                echo("Physical Education");
            }

            else if ($_SESSION['subject'] == "citizenship"){
                echo("Citizenship");
            }

            else if ($_SESSION['subject'] == "computing"){
                echo("Computing");
            }
        }

        function content(){ 
            $line_number = 0;
            $file_name = $_SESSION['subject'].".txt";
            $myfile = fopen($file_name, "r") or die("Unable to open file!");
            while(!feof($myfile)) {
                echo fgets($myfile) . "<br>";
                $line_number = $line_number+1;

            }
            $_SESSION['content_height'] = strval($line_number*24)."px";
            //echo $_SESSION['content_height'];

            fclose($myfile);

            
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
        //echo("25% - , 50% - , 75% - , 100% - ");
        function popover(){
            if ($_SESSION['subject'] == "maths"){
                echo("16% - Numbers, 32% - Algebra, 48% - Ratio, proportion and rates of change, 64% - Geometry and measures, 80% - Probability, 100% - Statistics");
            }

            else if ($_SESSION['subject'] == "science"){
                echo("25% - Structure and function of living organisms, 50% - Material cycles and energy, 75% - Interactions and interdependencies, 100% - Genetics and evolution");
            }

            else if ($_SESSION['subject'] == "english"){
                echo("25% - Reading, 50% - Writing, 75% - Grammar and vocabulary, 100% - Spoken English");
            }

            else if ($_SESSION['subject'] == "history"){
                echo("14% - The development of Church, state and society in Medieval Britain 1066-1509, 28% - the development of Church, state and society in Britain 1509-1745, 42% - ideas, political power, industry and empire: Britain, 1745-1901, 56% - challenges for Britain, Europe and the wider world 1901 to the present day In addition to studying the Holocaust, 70% - a local history study, 84% - the study of an aspect or theme in British history that consolidates and extends pupils’ chronological knowledge from before 1066, 100% - significant society or issue in world history and itsinterconnections with other world developments");
            }

            else if ($_SESSION['subject'] == "geography"){
                echo("25% - Locational knowledge, 50% - Place Knowledge, 75% - Human and physical geography, 100% - Geographical skills and fieldwork.");
            }

            else if ($_SESSION['subject'] == "mfl"){ //Chemistry
                echo("12.5% - The particulate nature of matter, 25% - Atoms, elements and compounds, 37.5% - Pure and impure substances, 50% - Chemical reactions, 62.5% - Energetics, 75% - The Periodic Table, 87.5% - Materials, 100% - Earth and atmosphere");
            }

            else if ($_SESSION['subject'] == "dt"){
                echo("20% - Design, 40% - Make, 60% - Evaluate, 80% - Technical knowledge, 100% - Cooking and nutrition");
            }

            else if ($_SESSION['subject'] == "ad"){
                echo("20% - To use a range of techniques to record their observations in sketchbooks, journals andother media as a basis for exploring their ideas, 40% - To use a range of techniques and media, including painting, 60% - to increase their proficiency in the handling of different materials, 80% - To analyse and evaluate their own work, and that of others, in order to strengthen the visual impact or applications of their work, 100% - About the history of art, craft, design and architecture, including periods, styles and major movements from ancient times up to the present day");
            }

            else if ($_SESSION['subject'] == "music"){
                echo("16% - Play and perform confidently in a range of solo and ensemble contexts using their voice, playing instruments musically, fluently and with accuracy and expression, 32% - Improvise and compose; and extend and develop musical ideas by drawing on a range of musical structures, styles, genres and traditions, 48% - Use staff and other relevant notations appropriately and accurately in a range of musical styles, genres and traditions, 64% - Identify and use the inter-related dimensions of music expressively and with increasing sophistication, including use of tonalities, different types of scales and other musical devices, 80% - Listen with increasing discrimination to a wide range of music from great composers and musicians, 100% - Develop a deepening understanding of the music that they perform and to which the listen, and its history");
            }

            else if ($_SESSION['subject'] == "pe"){
                echo("16% - Use a range of tactics and strategies to overcome opponents in direct competition through team and individual games [for example, badminton, basketball, cricket, football, hockey, netball, rounders, rugby and tennis], 32% - Develop their technique and improve their performance in other competitive sports [for example, athletics and gymnastics] , 48% - Perform dances using advanced dance techniques within a range of dance styles and forms, 64% - Take part in outdoor and adventurous activities which present intellectual and physical challenges and be encouraged to work in a team, building on trust and developing skills to solve problems, either individually or as a group, 80% - Analyse their performances compared to previous ones and demonstrate improvementto achieve their personal best, 100% - Take part in competitive sports and activities outside school through community links or sports clubs.");
            }

            else if ($_SESSION['subject'] == "citizenship"){
                echo("16% - Energy, 32% - Motion and forces, 48% - Waves, 64% - Electricity and electromagnetism, 80% - Matter, 100% - Space physics");
            }

            else if ($_SESSION['subject'] == "computing"){
                echo("11% - Design, use and evaluate computational abstractions that model the state and behaviour of real-world problems and physical systems, 22% - Understand several key algorithms that reflect computational thinking [for example, ones for sorting and searching]; use logical reasoning to compare the utility of alternative algorithms for the same problem, 33% - Use two or more programming languages, at least one of which is textual, to solve a variety of computational problems; make appropriate use of data structures [for example, lists, tables or arrays]; design and develop modular programs that use procedures or functions, 44% - Understand simple Boolean logic [for example, AND, OR and NOT] and some of its uses in circuits and programming; understand how numbers can be represented in binary, and be able to carry out simple operations on binary numbers [for example, binary addition, and conversion between binary and decimal] , 55% - Understand the hardware and software components that make up computer systems, and how they communicate with one another and with other systems, 66% - Understand how instructions are stored and executed within a computer system; understand how data of various types (including text, sounds and pictures) can berepresented and manipulated digitally, in the form of binary digits, 77% - Undertake creative projects that involve selecting, using, and combining multiple applications, preferably across a range of devices, to achieve challenging goals, including collecting and analysing data and meeting the needs of known users, 88% - Create, re-use, revise and re-purpose digital artefacts for a given audience, with attention to trustworthiness, design and usability, 100% - Understand a range of ways to use technology safely, respectfully, responsibly and securely, including protecting their online identity and privacy; recognise inappropriate content, contact and conduct and know how to report concerns.");
            }
        }

    function links($link_number){
        if ($_SESSION['subject'] == "maths"){
            echo("");
        }

        else if ($_SESSION['subject'] == "science"){
            echo("Science");
        }

        else if ($_SESSION['subject'] == "english"){
            echo("English");
        }

        else if ($_SESSION['subject'] == "history"){
            echo("");
        }

        else if ($_SESSION['subject'] == "geography"){
            if($link_number == "1"){
                header('location: https://www.bbc.co.uk/bitesize/subjects/zrw76sg');
            }

            elseif($link_number == "2"){
                header('location: https://www.educationquizzes.com/ks3/geography/');
            }

            elseif($link_number == "3"){
                header('location: https://www.teachit.co.uk/geography/ks3');
            }
        }

        else if ($_SESSION['subject'] == "mfl"){
            echo("Modern Foreign Languages");
        }

        else if ($_SESSION['subject'] == "dt"){
            echo("Design and Technology");
        }

        else if ($_SESSION['subject'] == "ad"){
            echo("Art and Design");
        }

        else if ($_SESSION['subject'] == "music"){
            echo("Music");
        }

        else if ($_SESSION['subject'] == "pe"){
            echo("Physical Education");
        }

        else if ($_SESSION['subject'] == "citizenship"){
            echo("Citizenship");
        }

        else if ($_SESSION['subject'] == "computing"){
            echo("Computing");
        }
        }
           
    if (array_key_exists('btn1',$_POST)) {
        $ln = "1";
        links($ln);
        }

    elseif (array_key_exists('btn2',$_POST)){
        $ln = "2";
        links($ln);
    }

    elseif (array_key_exists('btn3',$_POST)){
        $ln = "3";
        links($ln);
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
                <?php 
                    if ($logged_in):
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo($_SESSION['member_type']."_dashboard.php") ?>"><?php echo($_SESSION['member_type']." Dashboard") ?></a>
                </li>
                <?php endif ?>
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

<div class="container">

  <div class="title">
      <h2 class="text-white">
            <?php title() ?>
      </h2>
    </div>

  <div class="Content" style="height:<?php content_height() ?>" ><?php Content() ?></div>

  <div class="progres">
    <div class="progress">
        <div class="progress-bar" style="width:<?php $course = $_SESSION['subject'];progress($course)?>">
            <?php 
               $course = $_SESSION['subject'];
               progress($course) 
            ?>
        </div>
    </div>
  </div>

  <div class="c1">
    <button type="button" class="btn btn-primary" data-bs-toggle="popover" title="Steps" data-bs-content="<?php popover(); ?>">
        Steps
    </button>
    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>
  </div>

    <form class="links rounded" style="text-align: center;" method="post">
        <input type="submit" class="btn btn-primary" name="btn1" id="btn1" value="BBC Bitesize">
        <input type="submit" class="btn btn-primary" name="btn2" id="btn2" value="Educationquizzes">
        <input type="submit" class="btn btn-primary" name="btn3" id="btn3" value="Teachit">
    </form>
</div>


</body>
</html>