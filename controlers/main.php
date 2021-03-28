<?php
include_once('../controlers/database.php');
session_start();
class Ctrl_Main{
    public static function logIn($username, $password)
    {
        $db = new Database();
        $sql = "SELECT `user_id`, `password`, `status` FROM `accounts` WHERE `username` = '$username'";
        $resultSql = mysqli_query($db->conn, $sql);
        $result = mysqli_fetch_array($resultSql);
        $count = mysqli_num_rows($resultSql);

        if ($count == 1) {
            if ($password == $result[1]) {
                if ($result[2] == 1) {
                    if (!isset($_SESSION['logined'])){
                        $_SESSION['logined'] = $result[0];
                    }
                    mysqli_close($db->conn);
                    header("location: ../views/homepage.php");
                } else {
                    echo "Tài khoản không còn quyền truy cập!!";
                }
            } else {
                echo "Thông tin đăng nhập không chính xác!!";
            }
        } else {
            echo "Tài khoản không tồn tại!!";
        }
    }
    public static function logOut()
    {
        unset($_SESSION['logined']);
        header("location: ../views/homepage.php");
    }
    public static function checkPermisson()
    {
        if (isset($_SESSION['logined']))
        {
            $db = new Database();
            $sql = "SELECT `permisson` FROM `accounts` WHERE `user_id` = ".$_SESSION['logined'].";";
            $query = mysqli_query($db->conn, $sql);
            $result = mysqli_fetch_row($query);
            if ($result  == 1) header("location: ../views/homepage.php");
        }
    }
}
?>