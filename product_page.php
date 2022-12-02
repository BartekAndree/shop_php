<?php
session_start();

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Najlepszy sklep</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.reflowhq.com/v2/toolkit.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
</head>

<body>
    <?php include 'navbar.php'; ?>

    <?php

    require_once "database_connect.php";

    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $product[] = $row;
        }
        echo
        '<section class="py-5">
                    <div class="container px-4 px-lg-5 my-5">
                        <div class="row gx-4 gx-lg-5 align-items-center">
                            <div class="col-md-6"><img class="rounded card-img-top mb-5 mb-md-0" src="assets/img/products/' . $product[0]['img'] . '" alt="' . $product[0]['name'] . '" /></div>
                            <div class="col-md-6">
                                <div class="small mb-1">ID: ' . $product[0]['id'] . '</div>
                                <h1 class="display-5 fw-bolder">' . $product[0]['name'] . '</h1>
                                <div class="fs-5 mb-5">
                                    <span> ' . $product[0]['price'] . ' zł</span>
                                </div>
                                <p class="lead">' . $product[0]['description'] . '</p>
                                <div class="d-flex">
                                
                                    <fieldset disabled>
                                        <input class="form-control text-center me-3 disabled" id="inputQuantity" type="number" value="1" max="10" min="1" style="max-width: 5rem" />
                                    </fieldset>
                                    <a href="add_to_cart.php?id=' . $product[0]['id'] . '" class="btn btn-outline-dark flex-shrink-0" type="button">
                                        <i class="bi-cart-fill me-1"></i>
                                        Dodaj do koszyka
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>';
    }
    $connection->close();

    ?>



    <?php include 'footer.php'; ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/bold-and-bright.js"></script>
</body>

</html>