<?php include_once("../controlers/main.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9a1e49c746.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <title>Coffee Store - Home</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../img/iconlogo.png" type="image/x-icon">
</head>

<body>
    <?php include("nav-bar.php"); ?>
    <header>
        <div class="d-grid gap-2 col-6 col-md-3 col-xl-2 my-auto mx-auto">
            <?php if (isset($_SESSION["logined"])) {
                echo Ctrl_Main::getPermisson(); ?>
                <?php if (Ctrl_Main::getPermisson() == '1') { ?>
                <a class="h1 fw-bold btn btn-lg btn-success shadow my-3" href="/CoffeeStore/views/manage-sell.php" role="button">Manage Sell</a>
                <?php } else { ?>
                    <a class="h1 fw-bold btn btn-lg btn-primary shadow my-3" href="/CoffeeStore/views/statistical-report.php" role="button">Statistical Report</a>
                    <a class="h1 fw-bold btn btn-lg btn-danger shadow my-3" href="/CoffeeStore/views/manage-accounts.php" role="button">Manage Accounts</a>
                    <a class="h1 fw-bold btn btn-lg btn-warning shadow my-3" href="/CoffeeStore/views/manage-menu.php" role="button">Manage Menu</a>
                <?php }
            } else { ?>
                <a class="h1 fw-bold btn btn-lg btn-danger shadow my-3" href="/CoffeeStore/views/login.php" role="button">Login</a>
            <?php } ?>
        </div>
    </header>
    <?php include("footer.php"); ?>
</body>

</html>