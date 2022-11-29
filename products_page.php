<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

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



    <section class="py-5">
        <div class="container py-5">
            <div class="row mb-4 mb-lg-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 class="fw-bold">Produkty</h2>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-3 mx-auto" style="max-width: 900px;">

                <?php
                require_once "database_connect.php";

                function getProducts($connection)
                {
                    $products = array();
                    $sql = "SELECT * FROM products";
                    $result = $connection->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $products[] = $row;
                        }
                    }
                    return $products;
                }


                foreach (getProducts($connection) as $product) {
                    echo
                    '<div class="col mb-4">
                                <div class="text-center">
                                    <img class="rounded mb-3 fit-cover" width="200" height="200" src="assets/img/products/' . $product['img'] . '">
                                    <h5 class="fw-bold mb-0"><strong>' . $product['name'] . '</strong></h5>
                                    <p class="text-muted mb-3">' . $product['description'] . '</p>
                                    <a class="btn btn-primary shadow" role="button" 
                                        href="product_page.php?id=' . $product['id'] . '">
                                        ' . $product['price'] . ' zł 
                                    </a>
                                </div>
                            </div>';
                }

                $connection->close();
                ?>

            </div>

        </div>
    </section>



    <?php include 'footer.php'; ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/bold-and-bright.js"></script>
</body>

</html>