<?php
class Ctrl_Account{
    public static function Get( $userId )
    {
        $db = new Database();
        $sql = "SELECT * FROM `accounts` INNER JOIN `employees` ON `accounts`.`user_id` = `employees`.`user_id` WHERE `accounts`.`user_id` =  $userId";
        $query = mysqli_query($db->conn, $sql);
        if ($query) {
            $result = mysqli_fetch_row($query);
            return $result;
        } else {
            return $db->conn->error." $sql";
        }
    }
        
    public static function Create( $username, $password, $permisson, $fullname, $gender, $phoneNumber, $address, $wages )
    {
        $db = new Database();
        $sql = "START TRANSACTION;
            INSERT INTO `accounts` (`username`, `password`, `permisson`) VALUES ('$username', '$password', $permisson);
            SET @user_id = LAST_INSERT_ID();
            INSERT INTO `employees` (`fullname`, `gender`, `phoneNumber`, `address`, `wages`, `user_id`) VALUES ('$fullname', '$gender', $phoneNumber, '$address', '$wages', @user_id);
            COMMIT;";
        $query = mysqli_multi_query($db->conn, $sql);
        if ($query) {
            return 0;
        } else {
            return $db->conn->error." $sql";
        }
        mysqli_close($db->conn);
    }

    public static function Edit( $userId, $username, $password, $permisson, $fullname, $gender, $phoneNumber, $address, $wages )
    {
        $db = new Database();

        $sql = "START TRANSACTION;
                UPDATE `accounts` SET `username`='$username', `password`='$password', `permisson`=$permisson WHERE `user_id` = $userId;
                UPDATE `employees` SET `fullname`='$fullname', `gender`='$gender', `phoneNumber`=$phoneNumber, `address`='$address', `wages`='$wages' WHERE `user_id` = $userId;
                COMMIT;";
        $query = mysqli_multi_query($db->conn, $sql);
        if ($query) {
            return 0;
        } else {
            return $db->conn->error." $sql";
        }
        mysqli_close($db->conn);
    }

    public static function Remove( $userId )
    {
        $db = new Database();
        $sql = "START TRANSACTION;
                UPDATE `employees` SET `status` = '0' WHERE `employees`.`user_id` = $userId;
                UPDATE `accounts` SET `status` = '0' WHERE `accounts`.`user_id` = $userId;
                COMMIT;";
        $query = mysqli_multi_query($db->conn, $sql);
        if ($query) {
            return 0;
        } else {
            return $db->conn->error." $sql";
        }
        mysqli_close($db->conn);
    }
}
