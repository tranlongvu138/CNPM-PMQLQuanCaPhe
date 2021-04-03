<?php
include_once('../controlers/main.php');
include_once('../controlers/item.php');
Ctrl_Main::checkPermisson();
if (isset($_POST['Edit'])) {
    $itemid = $_POST['ID'];
    $name = trim($_POST['name-input']);
    $price = $_POST['price-input'];

    $result = Ctrl_Item::Edit($itemid, $name, $price);
    if ($result == '0') header("location: ../views/manage-menu.php");
    else echo $result;
} else if (isset($_POST['Del'])) {
    $id = $_POST['id-input'];
    Ctrl_Item::Remove($id);
    header("location: ../views/manage-menu.php");
} else if (isset($_GET['ID'])) {
    $item = Ctrl_Item::Get($_GET['ID']);
} else {
    header("location: ../views/manage-menu.php");
}
?>