<?php
class Database
{
    public $conn;
    private $severname = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'coffeestore';

    function __construct()
    {
        $this->conn = mysqli_connect($this->severname, $this->username, $this->password, $this->database);
        if (!$this->conn) {
            die('Khong the ket noi. Kiem tra lai cac tham so');
            exit();
        }
    }
}
