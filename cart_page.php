<?php
session_start();
$_SESSION['total'] = 0;

if (!isset($_SESSION['logged_flag'])) {
    header('Location: index.php');
    exit();
}
if (isset($_SESSION['alert_msg'])) {
    echo
    '<div class="alert alert-' . $_SESSION['alert_type'] . '" role="alert">' . $_SESSION['alert_msg'] . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Najlepszy sklep</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
</head>

<body>
    <?php require 'navbar.php'; ?>

    <section class="vh-auto" style="background-color: #fdccbc;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <p><span class="h2 m-3">Koszyk </span>
                        <?php
                        require_once "database_connect.php";

                        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
                            echo '<span class="h4">(Twój koszyk jest pusty)</span></p>';
                        } else {
                            echo '<span class="h4">(' . count($_SESSION['cart']) . ' pozycje w koszyku)</span></p>';

                            foreach ($_SESSION['cart'] as $product_id) {
                                $sql = "SELECT * FROM products WHERE id = $product_id";
                                $result = $connection->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $_SESSION['total'] += $row['price'];
                                        echo
                                        '<div class="card mb-4">
                                        <div class="card-body p-4">
                
                                            <div class="row align-items-center">
                                                <div class="col-md-2">
                                                    <img src="assets/img/products/' . $row['img'] . '" class="img-fluid rounded" alt="">
                                                </div>
                                                <div class="col-md-3 d-flex justify-content-center">
                                                    <div>
                                                        <p class="small text-muted mb-2 pb-3">Nazwa</p>
                                                        <p class="lead fw-normal mb-2">' . $row['name'] . '</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-flex justify-content-center">
                                                </div>
                                                <div class="col-md-2 d-flex justify-content-center">
                                                    <div>
                                                        <p class="small text-muted mb-2 pb-3">Ilość</p>
                                                        <p class="lead fw-normal mb-0">1</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 d-flex justify-content-center">
                                                    <div>
                                                        <p class="small text-muted mb-2 pb-3">Cena</p>
                                                        <p class="lead fw-normal mb-0">' . $row['price'] . ' zł</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-1 d-flex justify-content-center">
                                                    <div>
                                                        <a type="button" class="btn btn-danger btn-sm disabled" href="">
                                                            <i class="fas fa-trash"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                                </svg></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>';
                                    }
                                }
                            }
                            echo
                            '<div class="card mb-5">
                                <div class="card-body p-4">

                                <div class="float-end">
                                    <p class="mb-0 me-5 d-flex align-items-center">
                                        <span class="small text-muted me-2">Razem:</span> <span class="lead fw-normal">' . $_SESSION['total'] . ' zł</span>
                                    </p>
                                </div>

                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-primary btn-sm" href="order_script.php" type="button">Zapłać</a>
                                    <div>
                                                <a type="button" class="btn btn-danger btn-lg" href="unset_cart.php">
                                                    <i class="fas fa-trash"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                        </svg>Usuń kosz</i>
                                                </a>
                                    </div>
                            </div>';
                        }

                        ?>

                </div>
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