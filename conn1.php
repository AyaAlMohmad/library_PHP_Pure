<?php
class Database
{
    private static $instance;
    private $connection;
    public function __construct()
    {
        $local = "localhost";
        $username = "root";
        $password = "";
        $db = "books";
        $this->connection = mysqli_connect($local, $username, $password, $db);


        if (!$this->connection) {
            die("connection faild" . mysqli_connect_errno() . '<br>');
        }
        // }else{
        //     echo "success connection <br>";
        // }
    }
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
