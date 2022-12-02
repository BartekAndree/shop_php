<section class="py-5">
    <div class="container">
        <div class="border rounded border-white d-flex flex-column justify-content-between align-items-center flex-lg-row bg-primary-gradient p-4 p-lg-5">
            <div class="text-center text-lg-start py-3 py-lg-1">
                <h2 class="fw-bold mb-2">Zapisz się do naszego newsletter</h2>
                <p class="mb-0">10% zniżki na pierwsze zakupy</p>
            </div>
            <form class="d-flex justify-content-center flex-wrap flex-lg-nowrap" method="post">
                <div class="my-2"><input class="border rounded-pill shadow-sm form-control" type="email" name="email" placeholder="Twój email"></div>
                <div class="my-2"><button class="btn btn-primary shadow ms-2" name="confirmemail" type="submit">Zapisz się</button></div>
            </form>
        </div>
    </div>
</section>
<?php
require_once 'database_connect.php';

if (isset($_POST['confirmemail'])) {
    try {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

        $sql = "INSERT INTO newsletter (email) VALUES ('$email')";
        $connection->query($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
$connection->close();
?>