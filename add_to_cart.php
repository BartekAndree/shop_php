<?php
    session_start();

    if ((!isset($_SESSION['email']))) {
        header('Location: login_page.php');
        exit();
    }

    if (empty($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    array_push($_SESSION['cart'], $_GET['id']);

    header('Location: product_page.php?id=' . $_GET['id']);
?>