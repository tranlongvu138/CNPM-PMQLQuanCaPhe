<?php
include_once('../controlers/main.php');
include_once('../controlers/item.php');
Ctrl_Main::checkPermisson();
if (isset($_POST['Create'])) {
    $name = trim($_POST['name-input']);
    $price = $_POST['price-input'];

    $result = Ctrl_Item::Create( $name, $price );
    if ($result == '0') header("location: ../views/manage-menu.php");
    else echo $result;
}
