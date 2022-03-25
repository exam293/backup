<?php

class user {
    public $email = "";
    public $password = "";
    public $password_hash = "";
    public $authenticated = false;
    private $connection;

    function __construct($connection, $first_name, $email, $password) {
        $this->first_name = mysqli_real_escape_string($connection, $first_name);
        $this->email = mysqli_real_escape_string($connection, $email);
        $this->password = mysqli_real_escape_string($connection, $password);

        $this->password_hash = password_hash($password, PASSWORD_BCRYPT);

        $this->connection = $connection;

    }

    function insert() {
        $sql = "
        Insert INTO tutor(
            first_name,
            email,
            password,
            status
        )
        VALUES (
            '{$this->first_name}',
            '{$this->email}',
            '{$this->password_hash}',
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
            SELECT tutor_id, first_name, email, password, status
            FROM tutor
            WHERE email=\"{$this->email}\";
            ";
        
            $result = $this->connection->query($sql);
            if ($row = $result->fetch_assoc()) {

                if(password_verify($this->password, $row['password'])) {
                    $this->authenticated = true;
                }
            }
    }

    function is_logged_in(){
        return $this->authenticated;
    }
}