<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9a1e49c746.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <script src="js/notify.js"></script>
    <title>Coffee Store - Log In</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/iconlogo.png" type="image/x-icon">
</head>

<body>
    <?php include('nav-bar.php'); ?>

    <?php if (isset($_SESSION["logined"])) {header("location: index.php");} ?>

    <?php
    if (isset($_POST['SignIn'])) {
        include('connection.php');
        $username = trim($_POST['username-input']);
        $password  = trim($_POST['pass-input']);
        $sql = "SELECT `user_id`, `password`, `status` FROM `accounts` WHERE `username` = '$username'";
        $resultSql = mysqli_query($conn, $sql);
        $result = mysqli_fetch_array($resultSql);
        $count = mysqli_num_rows($resultSql);

        if ($count == 1) {
            if ($password == $result[1]) {
                if ($result[2] == 1) {
                    $user = $result[0];
                    include("logined.php");
                    mysqli_close($conn);
                    header("location: index.php");
                } else {
                    echo "Tài khoản không còn quyền truy cập!!";
                }
            } else {
                echo "Thông tin đăng nhập không chính xác!!";
            }
        } else {
            echo "Tài khoản không tồn tại!!";
        }
    } ?>

    <div class="bg-light rounded mx-auto my-5 p-3" style="width: 400px;">
        <h2>Sign In</h2>
        <p>Please fill this form to sign in.</p>
        <hr>
        <form method="POST" action="login.php">
            <div class="my-3">
                <label for="username-input">Username</label>
                <input type="text" class="form-control" name="username-input" placeholder="Enter username" required>
            </div>
            <div class="my-3">
                <label for="pass-input">Password</label>
                <input type="password" class="form-control" name="pass-input" placeholder="Type password" required>
            </div>
            <div class="d-grid gap-2 my-3">
                <input type="submit" class="btn btn-primary" name="SignIn" value="Sign In"></input>
            </div>
            <hr>
            <p>If you have a problem contact store manager.</p>
        </form>
    </div>

    <?php include("footer.php"); ?>
</body>

</html>