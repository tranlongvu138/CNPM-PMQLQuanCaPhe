<?php
include_once('../controlers/main.php');
include_once('../controlers/account.php');
Ctrl_Main::checkPermisson();
if (isset($_POST['Create'])) {
    $username = trim($_POST['username-input']);
    $password = trim($_POST['password-input']);
    $permisson = $_POST['RadioPermisson'];
    $fullname = trim($_POST['fullname-input']);
    $gender = $_POST['RadioGender'];
    $phoneNumber = $_POST['phoneNumber-input'];
    $address = trim($_POST['address-input']);
    $wages = trim($_POST['wages-input']);

    $result = Ctrl_Account::Create( $username, $password, $permisson, $fullname, $gender, $phoneNumber, $address, $wages );
    if ($result == '0') header("location: ../views/manage-accounts.php");
    else echo $result;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9a1e49c746.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <title>Coffee Store - Add a new account</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../img/iconlogo.png" type="image/x-icon">
</head>

<body>
    <?php include('nav-bar.php'); ?>

    <div class="bg-light rounded mx-auto my-5 p-3" style="width: 400px;">
        <h2>Add a new account</h2>
        <p>Please fill this form to add a new account.</p>
        <hr>
        <form method="POST" action="add-account.php">
            <div class="my-3">
                <label for="username-input">Username</label>
                <input type="text" class="form-control" name="username-input" placeholder="Enter username" minlength="8" maxlength="30" required>
            </div>
            <div class="my-3">
                <label for="password-input">Password</label>
                <input type="password" class="form-control" name="password-input" placeholder="Type password" minlength="8" maxlength="16" required>
            </div>
            <div class="row">
                <label class="col">Permisson</label>
                <div class="form-check col">
                    <input class="form-check-input" type="radio" name="RadioPermisson" id="RadioAdmin" value="0">
                    <label class="form-check-label" for="RadioAdmin">Administrator</label>
                </div>
                <div class="form-check col">
                    <input class="form-check-input" type="radio" name="RadioPermisson" id="RadioEmployee" value="1" checked>
                    <label class="form-check-label" for="RadioEmployee">Employee</label>
                </div>
            </div>
            <hr>
            <div class="my-3">
                <label for="fullname-input">Fullname</label>
                <input type="text" class="form-control" name="fullname-input" placeholder="Enter fullname" minlength="8" maxlength="32" required>
            </div>
            <div class="row">
                <label class="col">Gender</label>
                <div class="form-check col">
                    <input class="form-check-input" type="radio" name="RadioGender" id="RadioMale" value="male" checked>
                    <label class="form-check-label" for="RadioMale">Male</label>
                </div>
                <div class="form-check col">
                    <input class="form-check-input" type="radio" name="RadioGender" id="RadioFemale" value="female">
                    <label class="form-check-label" for="RadioFemale">Female</label>
                </div>
            </div>
            <div class="my-3">
                <label for="phoneNumber-input">Phone Number</label>
                <input type="text" class="form-control" name="phoneNumber-input" placeholder="Enter phoneNumber" min="0" max="9999999999">
            </div>
            <div class="my-3">
                <label for="address-input">Address</label>
                <input type="text" class="form-control" name="address-input" placeholder="Enter address" maxlength="200">
            </div>
                <label for="wages-input">Wages</label>
            <div class="input-group my-3">
                <input type="number" class="form-control" name="wages-input" placeholder="Enter wages" min="0" max="99999999999999999999">
                <div class="input-group-append">
                    <span class="input-group-text">VND</span>
                </div>
            </div>
            <div class="d-grid gap-2 my-3">
                <input type="submit" class="btn btn-primary" name="Create" value="Create"></input>
            </div>

            <hr>
            <p>If you have a problem contact store manager.</p>
        </form>
    </div>

    <?php include("footer.php"); ?>
</body>

</html>