<?php include_once('../controlers/manage-sell.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9a1e49c746.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../controlers/sell.js"></script>

    <title>Coffee Store - Home</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../img/iconlogo.png" type="image/x-icon">
</head>

<body>
    <?php include("nav-bar.php"); ?>

    <form method="POST" action="manage-sell.php">
        <div class="container my-3 bg-light rounded p-3">
            <p class="h2">Manage Sell</p>
            <hr>

            <div class="d-flex flex-row justify-content-around">
                <div style="width:50%">
                    <input type="text" class="form-control" id="keyword-input" placeholder="Search..." onkeyup="search()">
                </div>
                <div class="input-group" style="width:150px">
                    <span class="input-group-text">Table</span>
                    <input type="number" class="form-control" name="table" id="table" min=1 max=10 value="1" require>
                </div>
            </div>

            <table class="table table-hover">
                <thead>
                    <caption>Menu of Coffee Store | The seller marks the buy checkbox and enters the quantity</caption>
                    <tr>
                        <th class="col-1">#ID</th>
                        <th class="col-7">Name</th>
                        <th class="col-2">Unit Price</th>
                        <th class="col-1">Quantity</th>
                        </th>
                        <th class="col-1">Buy</th>
                    </tr>
                </thead>
                <tbody id="menu">
                    <?php $tagid = 0;
                        foreach ($menu as $item) {
                        $tagid++; ?>
                        <tr>
                            <th>
                                <input type="number" readonly class="form-control-plaintext" name="id<?php echo $tagid; ?>" id="id<?php echo $tagid; ?>" value="<?php echo $item[0]; ?>">
                            </th>
                            <td>
                                <input type="text" readonly class="form-control-plaintext" name="name<?php echo $tagid; ?>" id="name<?php echo $tagid; ?>" value="<?php echo $item[1]; ?>">
                            </td>
                            <td>
                                <input type="number" readonly class="form-control-plaintext" name="uprice<?php echo $tagid; ?>" id="uprice<?php echo $tagid; ?>" value="<?php echo $item[2]; ?>">
                            </td>
                            <td>
                                <input type="number" class="form-control" name="quantity<?php echo $tagid; ?>" id="quantity<?php echo $tagid; ?>" min=0 value=0 require onchange="calprice();">
                            </td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" name="check<?php echo $tagid; ?>" id="check<?php echo $tagid; ?>" onclick="calprice();">
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="container my-3 bg-light rounded p-3">
            <p class="h2">Bill</p>
            <hr>
            <table class="table table-hover" id="tbbill">
                <thead>
                    <tr>
                        <th class="col-1">#ID</th>
                        <th class="col-7">Name</th>
                        <th class="col-1">Unit Price</th>
                        <th class="col-1">Quantity</th>
                        <th class="col-2">Price</th>
                    </tr>
                </thead>
                <tbody id="bill">
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" class="text-end">Total:</th>
                        <td class="col-2"><input type="number" readonly class="form-control-plaintext fw-bold" name="total" id="total" value="0"></td>
                    </tr>
                </tfoot>
            </table>
            <div class="d-flex justify-content-end">
                <input type="submit" class="btn btn-primary" name="Purchase" value="Purchase"></input>
            </div>
        </div>
    </form>
    <?php include("footer.php"); ?>
</body>

</html>