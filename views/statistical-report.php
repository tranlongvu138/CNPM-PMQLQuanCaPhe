<?php
//include('../controlers/statistical-report.php'); 
include_once("../controlers/main.php");

if (isset($_POST["Filter"])) {
    if (isset($_POST["filterby"])) {
        $filter = $_POST["filterby"];
        if ($filter == "month") {
            $sqlquery = "SELECT MONTH(time_create), YEAR(time_create), Count(bill_id), ROUND(AVG(total), -3), SUM(total) FROM `bills` GROUP BY MONTH(time_create);";
        } else if ($filter == "quarter") {
            $sqlquery = "SELECT QUARTER(time_create), YEAR(time_create), Count(bill_id), ROUND(AVG(total), -3), SUM(total) FROM `bills` GROUP BY QUARTER(time_create);";
        } else if ($filter == "year") {
            $sqlquery = "SELECT YEAR(time_create), Count(bill_id), ROUND(AVG(total), -3), SUM(total) FROM `bills` GROUP BY YEAR(time_create);";
        }
        $db = new Database();
        $query = mysqli_query($db->conn, $sqlquery);
        if ($query) {
            $reports = mysqli_fetch_all($query);
        } else {
            echo $db->conn->error . " $sqlquery";
            mysqli_close($db->conn);
        }
    }
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9a1e49c746.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <title>Coffee Store - Statistical Report</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../img/iconlogo.png" type="image/x-icon">
</head>

<body>
    <?php include("nav-bar.php"); ?>

    <div class="container my-3 bg-light rounded p-3">
        <p class="h2">Statistical Report</p>
        <hr>
        <form method="POST" action="statistical-report.php">
            <div class="input-group d-flex mx-auto" style="width:50%">
                <select class="form-select" name="filterby">
                    <option value="" disabled selected>Open this select filter</option>
                    <option value="month">Filter by Month</option>
                    <option value="quarter">Filter by Quarter</option>
                    <option value="year">Filter by Year</option>
                </select>
                <input type="submit" class="btn btn-primary" type="button" name="Filter" value="Filter"></input>
            </div>
        </form>
        <?php if (isset($filter)) { ?>
            <table class="table table-bordered table-hover my-3">
                <?php
                if ($filter == "month") { ?>
                    <thead class="table-dark">
                        <tr">
                            <th class="col">Month</th>
                            <th class="col">Year</th>
                            <th class="col">Count</th>
                            <th class="col">Average</th>
                            <th class="col">Total</th>
                            </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($reports as $report) { ?>
                            <tr>
                                <td><?php echo $report[0] ?></td>
                                <td><?php echo $report[1] ?></td>
                                <td><?php echo $report[2] ?></td>
                                <td><?php echo $report[3] ?></td>
                                <td><?php echo $report[4] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                <?php
                } else if ($filter == "quarter") { ?>
                    <thead class="table-dark">
                        <tr>
                            <th class="col">Quarter</th>
                            <th class="col">Year</th>
                            <th class="col">Count</th>
                            <th class="col">Average</th>
                            <th class="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($reports as $report) { ?>
                            <tr>
                                <td><?php echo $report[0] ?></td>
                                <td><?php echo $report[1] ?></td>
                                <td><?php echo $report[2] ?></td>
                                <td><?php echo $report[3] ?></td>
                                <td><?php echo $report[4] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                <?php
                } else if ($filter == "year") { ?>
                    <thead class="table-dark">
                        <tr>
                            <th class="col">Year</th>
                            <th class="col">Count</th>
                            <th class="col">Average</th>
                            <th class="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($reports as $report) { ?>
                            <tr>
                                <td><?php echo $report[0] ?></td>
                                <td><?php echo $report[1] ?></td>
                                <td><?php echo $report[2] ?></td>
                                <td><?php echo $report[3] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
            <?php } echo "</table>";
            } ?>
            
    </div>
    <?php include("footer.php"); ?>
</body>

</html>