<?php
include_once("../controlers/main.php");
$report;
if (isset($_POST["Filter"])) {
    $db = new Database();
    $filter = $_POST['filterby'];
    if ($filter = "month") {
        $sqlquery = "SELECT MONTH(time_create), YEAR(time_create), SUM(total) FROM `bills` GROUP BY MONTH(time_create);";
    } else if ($filter = "quarter") {
        $sqlquery = "SELECT QUARTER(time_create), YEAR(time_create), SUM(total) FROM `bills` GROUP BY QUARTER(time_create);";
    } else if ($filter = "year") {
        $sqlquery = "SELECT YEAR(time_create), SUM(total) FROM `bills` GROUP BY YEAR(time_create);";
    }
    $query = mysqli_query($db->conn, $sqlquery);
    if ($query) {
        $reports = mysqli_fetch_all($query);
    } else {
        echo $db->conn->error . " $sqlquery";
    }
    mysqli_close($db->conn);
}
