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
        <?php
        if (!isset($_SESSION['logined'])) {

            echo ' <div class="d-grid gap-2 col-6 col-md-3 col-xl-2 my-auto mx-auto" >';
            echo '       <a class="h1 fw-bold btn btn-lg btn-danger shadow my-5" href="/CoffeeStore/views/login.php" role="button">Login</a>';
            echo '     </div>';
        } else {
            if (isset($user) && $user[1] == 0) {
        ?>
                <div class="container ">
                    <div class="row row-cols-2  manager ">
                        <div class="col button "><a href="manage-accounts.php">Manage Account</a></div>
                        <div class="col button "><a class="left" href="manage-menu.php">Manage Menu</a></div>
                    </div>
                </div>;
            <?php } ?>
            <?php if (isset($user) && $user[1] == 1) {
            ?>
                <?php
                $db = new Database();
                $result = mysqli_query($db->conn, 'SELECT * FROM menu WHERE status="1"' );
                $menu = mysqli_fetch_all($result)

                ?>
                <div class="container bg-light rounded my-5 p-2">
                    <form action="abc.php">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">Stt</th>
                                    <th class="text-center" scope="col">Name</th>
                                    <th class="text-center" scope="col">Price</th>
                                    <th class="text-center" scope="col">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                foreach ($menu as $menu) {
                                    echo '<tr>';
                                    echo ' <th class="text-center" scope="row">' .$i. '</th>';
                                    echo '  <td class="text-center">  <input type="hidden" name="name'.$i.'" value=" ' . $menu[1] . '"/> 
                                    ' . $menu[1] . '</td>';
                                    echo '  <td class="text-center"><input type="hidden" name="price'.$i.'" value="' . $menu[2] . '"/> ' . $menu[2] . '</td>';
                                    echo '  <td class="text-center">';
                                    $i++;
                                    // echo '          <div class="buttons_added">';
                                    // echo '             <input class="minus is-form" type="button" value="-">';
                                    // echo '        <input aria-label="quantity" class="input-qty" max="100" min="" name="" type="number" value="">';
                                    // echo '        <input class="plus is-form" type="button" value="+">';
                                    // echo '    </div>';
                                    echo'   <input style="max-width:80px" type="number" class="text-center" name="price" min="0" max="100" value="0" required>';
                                    echo ' </td>';
                                    echo ' </tr>';
                                }
                                ?>
                            </tbody>

                        </table>
                        <input type="submit" class="btn btn-primary" name="add" value="Sign In"></input>
                    </form>
                </div>
        <?php }
        }
        ?>




    </header>
    <?php include("footer.php"); ?>

</body>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
    $('input.input-qty').each(function() {
        var $this = $(this),
            qty = $this.parent().find('.is-form'),
            min = Number($this.attr('min')),
            max = Number($this.attr('max'))
        if (min == 0) {
            var d = 0
        } else d = min
        $(qty).on('click', function() {
            if ($(this).hasClass('minus')) {
                if (d > min) d += -1
            } else if ($(this).hasClass('plus')) {
                var x = Number($this.val()) + 1
                if (x <= max) d += 1
            }
            $this.attr('value', d).val(d)
        })
    })
</script> -->

</html>