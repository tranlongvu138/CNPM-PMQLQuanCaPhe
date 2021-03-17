<?php
include "connection.php";
$ID = $_GET['ID'];
$sql = "UPDATE `accounts` SET `status` = '0' WHERE `accounts`.`user_id` = $ID;";
$query = mysqli_query($conn, $sql);
if ($query) {
    header("location:index.php");
} else {
    echo "$sql $conn->error";
}
mysqli_close($conn);
?>