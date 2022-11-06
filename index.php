<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BestToysEver</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <header class="bg-primary-gradient">
        <div class="container pt-4 pt-xl-5">
            <div class="row pt-5">
                <div class="col-md-8 col-xl-6 text-center text-md-start mx-auto">
                    <div class="text-center">
                        <p class="fw-bold text-success mb-2">Voted #1 Worldwide</p>
                        <h1 class="fw-bold">The best solution for you and your customers</h1>
                    </div>
                </div>
                <div class="col-12 col-lg-10 mx-auto">
                    <div class="position-relative" style="display: flex;flex-wrap: wrap;justify-content: flex-end;">
                        <div style="position: relative;flex: 0 0 45%;transform: translate3d(-15%, 35%, 0);"><img class="img-fluid" data-bss-parallax="" data-bss-parallax-speed="0.8" src="assets/img/products/3.jpg"></div>
                        <div style="position: relative;flex: 0 0 45%;transform: translate3d(-5%, 20%, 0);"><img class="img-fluid" data-bss-parallax="" data-bss-parallax-speed="0.4" src="assets/img/products/2.jpg"></div>
                        <div style="position: relative;flex: 0 0 60%;transform: translate3d(0, 0%, 0);"><img class="img-fluid" data-bss-parallax="" data-bss-parallax-speed="0.25" src="assets/img/products/1.jpg"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="container py-5">
            <div class="mx-auto" style="max-width: 900px;">
                <div class="row row-cols-1 row-cols-md-2 d-flex justify-content-center">
                    <div class="col mb-4">
                        <div class="card bg-primary-light">
                            <div class="card-body text-center px-4 py-5 px-md-5">
                                <p class="fw-bold text-primary card-text mb-2">Najlepsze kaktusy</p>
                                <h5 class="fw-bold card-title mb-3">Lorem ipsum dolor sit&nbsp;nullam et quis ad cras porttitor</h5><button class="btn btn-primary btn-sm" type="button">Learn more</button>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card bg-secondary-light">
                            <div class="card-body text-center px-4 py-5 px-md-5">
                                <p class="fw-bold text-secondary card-text mb-2">Super wiśnie</p>
                                <h5 class="fw-bold card-title mb-3">Lorem ipsum dolor sit&nbsp;nullam et quis ad cras porttitor</h5><button class="btn btn-secondary btn-sm" type="button">Learn more</button>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card bg-info-light">
                            <div class="card-body text-center px-4 py-5 px-md-5">
                                <p class="fw-bold text-info card-text mb-2">Najlepsze w ananasy</p>
                                <h5 class="fw-bold card-title mb-3">Lorem ipsum dolor sit&nbsp;nullam et quis ad cras porttitor</h5><button class="btn btn-info btn-sm" type="button">Learn more</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'testimonials.php'; ?>
    <?php include 'contact.php'; ?>
    <?php include 'newsletter.php'; ?>
    <?php include 'footer.php'; ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/bold-and-bright.js"></script>
</body>
</html>