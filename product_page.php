<?php
    session_start();
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BestToysEver</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.reflowhq.com/v2/toolkit.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
</head>

<body>
    <?php include 'navbar.php'; ?>



        <section class="py-5">
            <div class="container py-5">
                <div class="row row-cols-2 row-cols-md-3 mx-auto" style="max-width: 900px;">

                    <?php
                            require_once "database_connect.php";
                            $connection = @new mysqli($host, $db_user, $db_password, $db_name);
                            
                            function getProduct($connection)
                            {
                                $product_id = $_GET['id'];
                                $sql = "SELECT * FROM products WHERE id='$product_id'";
                                $result = $connection->query($sql);
                                if ($result->num_rows > 0 && $result->num_rows < 2) {
                                    while ($row = $result->fetch_assoc()) {
                                        $products[] = $row;
                                    }
                                }
                                return $products;
                            }
                            
                            echo
                            '<div class="col mb-4">
                                <div class="text-center">
                                    <img class="rounded mb-3 fit-cover" width="200" height="200" src="assets/img/products/'.$product['img'].'">
                                    <h5 class="fw-bold mb-0"><strong>'.$product['name'].'</strong></h5>
                                    <p class="text-muted mb-3">'.$product['description'].'</p>
                                    <a class="btn btn-primary shadow" role="button" href="">'.$product['price'].' $</a>
                                </div>
                            </div>';
                            
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