<?php
include('../controlers/edit-item.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9a1e49c746.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <title>Coffee Store - Edit item</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../img/iconlogo.png" type="image/x-icon">
</head>

<body>
    <?php include('nav-bar.php'); ?>

    <div class="bg-light rounded mx-auto my-5 p-3" style="width: 400px;">
        <h2>Edit item</h2>
        <p>Please fill this form to edit an item.</p>
        <hr>
        <form method="POST" action="edit-item.php">
            <div class="my-3">
                <label for="ID">ID</label>
                <input type="text" class="form-control" name="ID" value="<?php echo $item[0]; ?>" readonly>
            </div>
            <div class="my-3">
                <label for="name-input">Name</label>
                <input type="text" class="form-control" name="name-input" placeholder="Enter name" minlength="3" maxlength="200" value="<?php echo $item[1]; ?>" required>
            </div>
            <label for="price-input">Price</label>
            <div class="input-group my-3">
                <input type="number" class="form-control" name="price-input" placeholder="Enter price" min="1000" max="99999999999999999999" step="1000" value="<?php echo $item[2]; ?>" required>
                <div class="input-group-append">
                    <span class="input-group-text">VND</span>
                </div>
            </div>

            <div class="d-grid gap-2 my-3">
                <div class="modal fade" id="confirmModalChange" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmModalLabel">Confirm Change</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Please click "Change" to change this item!!
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" name="Edit" value="Change"></input>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmModalChange">Change</button>
            </div>

            <div class="d-grid gap-2 my-3">
                <div class="modal fade" id="confirmModalRemove" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmModalLabel">Confirm Remove</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Please click "Remove" to remove this item!!
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" name="Del" value="Remove"></input>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmModalRemove">Remove</button>
            </div>

            <hr>
            <p>If you have a problem contact store manager.</p>
        </form>
    </div>

    <?php include("footer.php"); ?>
</body>

</html>