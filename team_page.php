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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <section class="py-5">
    <div class="container py-5">
        <div class="row mb-4 mb-lg-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <p class="fw-bold text-success mb-2"></p>
                <h2 class="fw-bold">Nasz zespół</h2>
                <p class="text-muted w-lg-50">Nie ważne jak trudne jest zadanie nasz zespół sobie z tym poradzi.&nbsp;</p>
            </div>
        </div>
        <div class="row row-cols-2 row-cols-md-4 mx-auto" style="max-width: 900px;">
            <div class="col mb-4">
                <div class="text-center"><img class="rounded mb-3 fit-cover" width="150" height="150" src="assets/img/avatars/team1.jpg">
                    <h5 class="fw-bold mb-0"><strong>Bartek</strong></h5>
                    <p class="text-muted mb-2">Administrator</p>
                </div>
            </div>
            <div class="col mb-4">
                <div class="text-center"><img class="rounded mb-3 fit-cover" width="150" height="150" src="assets/img/avatars/team2.jpg">
                    <h5 class="fw-bold mb-0"><strong>Wojtek</strong></h5>
                    <p class="text-muted mb-2">Dyrektor marketingu</p>
                </div>
            </div>
            <div class="col mb-4">
                <div class="text-center"><img class="rounded mb-3 fit-cover" width="150" height="150" src="assets/img/avatars/team3.jpg">
                    <h5 class="fw-bold mb-0"><strong>Marcin</strong></h5>
                    <p class="text-muted mb-2">Wsparcie IT</p>
                </div>
            </div>
            <div class="col mb-4">
                <div class="text-center"><img class="rounded mb-3 fit-cover" width="150" height="150" src="assets/img/avatars/avatar3.jpg">
                    <h5 class="fw-bold mb-0"><strong>Mateusz</strong></h5>
                    <p class="text-muted mb-2">Doradca</p>
                </div>
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