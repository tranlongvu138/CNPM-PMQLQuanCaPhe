<?php include("logined.php"); ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php"><img src="img/iconlogo.png" width="30" height="30" alt=""> <strong>CoffeeStore</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ms-auto">
                <?php
                if (!isset($_SESSION['logined'])) { ?>
                    <li class='nav-item'>
                        <a class='nav-link' href="login.php">Sign In</a>
                    </li>
                <?php } else {
                    include("connection.php");
                    $result = mysqli_query($conn, "SELECT `employee`.`fullname`, `accounts`.`permisson` FROM `accounts` INNER JOIN `employee` ON `accounts`.`user_id` = `employee`.`user_id` WHERE `accounts`.`user_id` = " . $_SESSION['logined']);
                    $user = mysqli_fetch_row($result);
                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome <?php echo $user[0]; ?> !!
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <?php if($user[1]==0) {
                                echo "<li><a class='dropdown-item' href='manage-accounts.php'>Manage Account</a></li><li>";
                                echo "<li><a class='dropdown-item' href='manage-menu.php'>Manage Menu</a></li><li>";
                                echo "<hr class='dropdown-divider'>";
                            }
                            ?>
                            </li>
                            <li><a class='dropdown-item' href='logout.php'>Log Out</a></li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

<div id="notify" class="container position-absolute top-0 start-50 translate-middle mt-5"></div>