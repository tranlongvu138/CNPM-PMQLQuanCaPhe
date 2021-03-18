<?php
include "connection.php";
$ID = $_GET['ID'];
$sql = "UPDATE `menu` SET `status` = '0' WHERE `menu`.`item_id` = $ID;";
$query = mysqli_query($conn, $sql);
if ($query) {
    header("location:manage-menu.php");
} else {
    echo "$sql $conn->error";
}
mysqli_close($conn);
?>