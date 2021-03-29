<?php
class Ctrl_Item{
    public static function Get( $itemId )
    {
        $db = new Database();
        $sql = "SELECT * FROM `menu` WHERE `item_id` = $itemId;";
        $query = mysqli_query($db->conn, $sql);
        if ($query) {
            $result = mysqli_fetch_row($query);
            return $result;
        } else {
            return $db->conn->error." $sql";
        }
        mysqli_close($db->conn);
    }

    public static function Create( $name, $price )
    {
        $db = new Database();
        $sql = "INSERT INTO `menu` (`name`, `price`) VALUES ('$name', $price);";
        $query = mysqli_query($db->conn, $sql);
        if ($query) {
            return 0;
        } else {
            return $db->conn->error." $sql";
        }
        mysqli_close($db->conn);
    }

    public static function Edit( $itemId, $name, $price )
    {
        $db = new Database();
        $sql = "UPDATE `menu` SET `name`='$name', `price`= $price WHERE `item_id` = $itemId;";
        $query = mysqli_query($db->conn, $sql);
        if ($query) {
            return 0;
        } else {
            return $db->conn->error." $sql";
        }
        mysqli_close($db->conn);
    }

    public static function Remove( $itemId )
    {
        $db = new Database();
        $sql = "UPDATE `menu` SET `status` = '0' WHERE `menu`.`item_id` = $itemId;";
        $query = mysqli_query($db->conn, $sql);
        if ($query) {
            return 0;
        } else {
            return $db->conn->error." $sql";
        }
        mysqli_close($db->conn);
    }
}
