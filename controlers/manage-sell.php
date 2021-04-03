<?php
include_once('../controlers/main.php');
include_once('../controlers/item.php');
Ctrl_Main::checkLogined();
$menu = Ctrl_Item::GetList();
if (isset($_POST['Purchase'])) {
    $sqlquery = "START TRANSACTION; SET @empl_id = (SELECT `empl_id` from `employees` WHERE `user_id` = " . $_SESSION['logined'] . "); ";
    $sqlBillDetail = "";
    foreach ($menu as $item) {
        $itemid = $item[0];
        if (isset($_POST["check$itemid"])) {
            $quantity = $_POST["quantity$itemid"];
            if ($quantity != 0) {
                $sqlBillDetail = $sqlBillDetail . "INSERT INTO `bill_detail` (`bill_id`, `item_id`, `quantity`) VALUES (@bill_id, $itemid, $quantity); ";
            }
        }
    }
    $total = $_POST['total'];
    $table = $_POST['table'];
    $sqlquery = $sqlquery . "INSERT INTO `bills` (`total`, `table_id`, `empl_id`) VALUES ($total, $table, @empl_id); SET @bill_id = LAST_INSERT_ID(); " . $sqlBillDetail . "COMMIT;";

    $db = new Database();
    $query = mysqli_multi_query($db->conn, $sqlquery);
    if ($query) {
        return 0;
    } else {
        return $db->conn->error . " $sqlquery";
    }
    mysqli_close($db->conn);
}
?>
