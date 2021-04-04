<?php
include_once('../controlers/main.php');
if (isset($_POST['Logout'])) {
    Ctrl_Main::logOut();
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/CoffeeStore/index.php"><img src="/CoffeeStore/img/iconlogo.png" width="30" height="30" alt=""> <strong>CoffeeStore</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ms-auto">
                <?php
                if (!isset($_SESSION['logined'])) { ?>
                    <li class='nav-item'>
                        <a class='nav-link' href="/CoffeeStore/views/login.php">Sign In</a>
                    </li>
                <?php } else {
                    $db = new Database();
                    $result = mysqli_query($db->conn, "SELECT `employees`.`fullname`, `accounts`.`permisson` FROM `accounts` INNER JOIN `employees` ON `accounts`.`user_id` = `employees`.`user_id` WHERE `accounts`.`user_id` = " . $_SESSION['logined']);
                    $logined = mysqli_fetch_row($result);
                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome <?php echo $logined[0]; ?> !!
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class='dropdown-item' href='/CoffeeStore/views/manage-sell.php'>Manage Sell</a></li>
                            <?php if ($logined[1] == 0) {
                                echo "<li><a class='dropdown-item' href='/CoffeeStore/views/statistical-report.php'>Statistical Report</a></li>";
                                echo "<li><a class='dropdown-item' href='/CoffeeStore/views/manage-accounts.php'>Manage Account</a></li>";
                                echo "<li><a class='dropdown-item' href='/CoffeeStore/views/manage-menu.php'>Manage Menu</a></li>";
                                echo "<hr class='dropdown-divider'>";
                            }
                            ?>
                            <form method="POST" action="../views/nav-bar.php">
                                <input class="btn btn-link dropdown-item" type="submit" name="Logout" value="Log Out" />
                            </form>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

<div id="notify" class="container position-absolute top-0 start-50 translate-middle mt-5"></div>