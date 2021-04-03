<?php
include_once('../controlers/main.php');
Ctrl_Main::checkPermisson();

$db = new Database();
$result = mysqli_query($db->conn, 'SELECT count(user_id) AS total FROM accounts');
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 10;
$total_page = ceil($total_records / $limit);
if ($current_page > $total_page) {
    $current_page = $total_page;
} else if ($current_page < 1) {
    $current_page = 1;
}
$start = ($current_page - 1) * $limit;
$sql = "SELECT * FROM `accounts` INNER JOIN `employees` ON `accounts`.`user_id` = `employees`.`user_id` LIMIT $start, $limit";
$result = mysqli_query($db->conn, $sql);
$user = mysqli_fetch_all($result);
