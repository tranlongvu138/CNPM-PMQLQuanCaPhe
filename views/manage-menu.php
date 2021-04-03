<?php
include('../controlers/manage-menu.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9a1e49c746.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <title>Coffee Store - Manage Menu</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../img/iconlogo.png" type="image/x-icon">
</head>

<body>
    <?php include('nav-bar.php'); ?>
    <div class="container bg-light p-3 my-3 rounded">
        <p class="h2">Manage Menu</p>
        <a href="add-item.php"><i class="fas fa-plus-circle text-primary mb-3" data-bs-toggle="tooltip" data-bs-placement="right" title="Add a new item"></i> Add a new item</a>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr class="d-flex">
                    <th class="col-1">#ID</th>
                    <th class="col-6">Name</th>
                    <th class="col-3">Price</th>
                    <th class="col-2">Function</th>
                </tr>
            </thead>
            <?php
            foreach ($menu as $item) {
                echo "<tbody>";
                echo "<tr class='d-flex'>";
                echo "<th class='col-1'>$item[0]</th>";
                echo "<td class='col-6'>$item[1]</td>";
                echo "<td class='col-3'>$item[2] VND</td>";
                echo "<td class='col-2'><i class='far fa-edit'><a href='edit-item.php?ID=$item[0]'> Edit</a></i></td>";
                echo "</tr>";
                echo "</tbody>";
            }
            mysqli_close($db->conn);
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