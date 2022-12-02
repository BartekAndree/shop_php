<?php
session_start();
if ((!isset($_SESSION['isadmin'])) || ($_SESSION['isadmin'] != 1)) {
    header('Location: login_page.php');
    exit();
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
</head>

<body>
    <?php
    require_once 'navbar.php';
    ?>
    <section>
        <div class="container py-5">
            <div class="mx-auto" style="max-width: 900px;">
                <div class="col-md-3 mb-4 mx-auto d-flex"><img class="rounded card-img-top mb-5 mb-md-0 " src="assets/img/products/default.png" alt="default image" /></div>
                <form method="post">
                    <div class="mb-3"><input class="form-control" type="text" name="name" placeholder="Nazwa"></div>
                    <div class="mb-3"><input class="form-control" type="number" name="price" placeholder="Cena"></div>
                    <textarea class="form-control" aria-label="With textarea" name="description" placeholder="Opis"></textarea>

                    <div class="m-3"><button class="btn btn-danger shadow d-block w-100" type="submit" name="confirm">Zatwierdź</button></div>
                </form>
            </div>
        </div>
    </section>
    }
    <?php
    require_once "database_connect.php";

    if (isset($_POST['confirm'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $sql = "INSERT INTO products (name, price, img, description) VALUES ('$name', '$price', 'default.png', '$description')";
        $result = $connection->query($sql);
        if ($result) {
            header('Location: admin_page.php');
        }
    }
    $connection->close();
    ?>



    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/bold-and-bright.js"></script>
</body>

</html>