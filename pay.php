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
    <link type="image/png" sizes="32x32" rel="icon" href=".../icons8-shopping-cart-32.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
</head>

<body>
    <?php require 'navbar.php'; ?>

    <header class="bg-primary-gradient">
        <div class="container pt-4 pt-xl-5">
            <div class="row pt-3">
                <div class="col-md-8 col-xl-6 text-center text-md-start mx-auto">
                    <div class="text-center">
                        <h1 class="fw-bold mb-5">Podaj dane do wysyłki</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="container py-5">
            <div class="mx-auto" style="max-width: 900px;">
                <form>
                    <div class="mb-3"><input class="form-control" type="text" name="imie" placeholder="imie"></div>
                    <div class="mb-3"><input class="form-control" type="text" name="nazwisko" placeholder="nazwisko"></div>
                    <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="email"></div>
                    <div class="mb-3"><input class="form-control" type="text" name="miasto" placeholder="miasto"></div>
                    <div class="mb-3"><input class="form-control" type="text" name="ulica" placeholder="ulica i numer budynku"></div>
                    <div class="mb-3"><input class="form-control" type="text" name="kodpocztowy" placeholder="kod pocztowy"></div>
                    <div class="mb-3"><button class="btn btn-primary shadow d-block w-100" type="submit">Kupuje i płace</button></div>
                </form>
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