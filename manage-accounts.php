<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9a1e49c746.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <title>Coffee Store - Manage Account</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/iconlogo.png" type="image/x-icon">
</head>

<body>
    <?php include('nav-bar.php'); ?>
    <?php
    include("connection.php");
    //TÌM TỔNG SỐ RECORDS
    $result = mysqli_query($conn, 'SELECT count(user_id) AS total FROM accounts');
    $row = mysqli_fetch_assoc($result);
    $total_records = $row['total'];
    //TÌM LIMIT VÀ CURRENT_PAGE
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 10;
    //TÍNH TOÁN TOTAL_PAGE
    $total_page = ceil($total_records / $limit);
    //Giới hạn current_page trong khoảng 1 đến total_page
    if ($current_page > $total_page) {
        $current_page = $total_page;
    } else if ($current_page < 1) {
        $current_page = 1;
    }
    // Tìm Start
    $start = ($current_page - 1) * $limit;
    // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
    // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
    $sql = "SELECT * FROM `accounts` LIMIT $start, $limit";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_all($result);
    ?>
    <div class="container bg-light p-3 my-3 rounded">
        <p class="h2">Manage Accouns</p>
        <a href="add-account.php"><i class="fas fa-plus-circle text-primary mb-3" data-bs-toggle="tooltip" data-bs-placement="right" title="Add a new account"></i> Add a new account</a>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr class="d-flex">
                    <th class="col-1">#ID</th>
                    <th class="col-2">Ussername</th>
                    <th class="col-3">Fullname</th>
                    <th class="col-1">Status</th>
                    <th class="col-1">Permission</th>
                    <th class="col-2">Create At</th>
                    <th class="col-2">Function</th>
                </tr>
            </thead>
            <?php
            foreach ($user as $user) {
                echo "<tbody>";
                echo "<tr class='d-flex'>";
                echo "<th class='col-1'>$user[0]</th>";
                echo "<td class='col-2'>$user[1]</td>";
                echo "<td class='col-3'>$user[3]</td>";
                if ($user[4] == 0) {
                    echo "<td class='col-1'>Removed</td>";
                } else if ($user[4] == 1) {
                    echo "<td class='col-1'>Ready</td>";
                }
                if ($user[5] == 0) {
                    echo "<td class='col-1'>Admin</td>";
                } else if ($user[5] == 1) {
                    echo "<td class='col-1'>Employee</td>";
                }
                echo "<td class='col-2'>$user[6]</td>";
                echo "<td class='col-1'><i class='far fa-edit'><a href='edit-account.php?ID=$user[0]'> Edit</a></i></td>";
                echo "<td class='col-1'><i class='far fa-trash-alt'><a href='remove-account.php?ID=$user[0]'> Remove</a></i></td>";
                echo "</tr>";
                echo "</tbody>";
            }
            mysqli_close($conn);
            ?>
        </table>

        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class=" page-item <?php if ($current_page == 1 || $total_page == 1) echo "disabled"; ?>">
                    <a class="page-link" href="index.php?page=<?php echo ($current_page - 1); ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                <?php
                for ($i = $current_page - 1; $i <= $current_page + 1; $i++) {
                    if ($i == $current_page) {
                        echo "<li class='page-item active' aria-current='page'>";
                        echo "<span class='page-link'>" . ($current_page) . "</span>";
                        echo "</li>";
                    } else if ($i >= 1 && $i <= $total_page) {
                        echo "<li class='page-item'><a class='page-link' href='index.php?page=" . ($i) . "'>" . ($i) . "</a></li>";
                    }
                }
                ?>
                <li class="page-item <?php if ($current_page == $total_page || $total_page == 1) echo "disabled"; ?>">
                    <a class="page-link" href="index.php?page=<?php echo ($current_page + 1); ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <?php include("footer.php"); ?>
</body>

</html>