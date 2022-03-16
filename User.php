<?php

class user {
    public $email = "";
    public $password = "";
    public $password_hash = "";
    public $authenticated = false;
    private $connection;

    function __construct($connection, $email, $password) {
        $this->email = mysqli_real_escape_string($connection, $email);
        $this->password = mysqli_real_escape_string($connection, $password);

        $this->password_hash = password_hash($password, PASSWORD_BCRYPT);

        $this->connection = $connection;

    }

    
    function insert() {
        $sql = "
        Insert INTO student(
            First_name,
            Last_name,
            email,
            password,
            Status
        )
        VALUES (
            '{$this->email}',
            '{$this->password_hash}',
            '{$this->f_name}'
            '{$this->l_name}'
            'active'
        )    
        ";
        
        $sqlQuery = mysqli_query($this->connection, $sql);

        if(!$sqlQuery){

            die("MySQL query failed!" . mysqli_error($this->connection));
        }

    }

   function authenticate() {
       $sql = "
          SELECT Student_Id, First_name, Last_name, Email, Password, DOB, Start_date, Status
            FROM student
            WHERE Email=\"{$this->email}\";
            ";
        
            $result = $this->connection->query($sql);
            if ($row = $result->fetch_assoc()) {

                if(password_verify($this->password, $row['Password'])) {
                    $this->authenticated = true;
                }
            }
    }

    function is_logged_in(){
        return $this->authenticated;
    }
}