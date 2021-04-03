<?php
include_once('../controlers/main.php');
include_once('../controlers/account.php');
Ctrl_Main::checkPermisson();
if (isset($_POST['Edit'])) {
    $userId = $_POST['ID'];
    $username = trim($_POST['username-input']);
    $password = trim($_POST['password-input']);
    $permisson = $_POST['RadioPermisson'];
    $fullname = trim($_POST['fullname-input']);
    $gender = $_POST['RadioGender'];
    $phoneNumber = $_POST['phoneNumber-input'];
    $address = trim($_POST['address-input']);
    $wages = trim($_POST['wages-input']);

    $result = Ctrl_Account::Edit($userId, $username, $password, $permisson, $fullname, $gender, $phoneNumber, $address, $wages);
    if ($result == '0') header("location: ../views/manage-accounts.php");
    else echo $result;
} else if (isset($_POST['Del'])) {
    $userId = $_POST['ID'];
    Ctrl_Account::Remove($userId);
    header("location: ../views/manage-accounts.php");
} else if (isset($_GET['ID'])) {
    $acc = Ctrl_Account::Get($_GET['ID']);
} else {
    header("location: ../views/manage-accounts.php");
}
