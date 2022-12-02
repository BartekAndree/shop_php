<?php

session_start();
require_once "database_connect.php";

if (!isset($_SESSION['logged_flag'])) {
    header('Location: index.php');
    exit();
}

$ordered = "";
foreach ($_SESSION['cart'] as $key => $value) {
    $ordered .= $value . ", ";
}

try {
    if ($connection->connect_errno != 0) {
        throw new Exception(mysqli_connect_errno());
    } else {
        if ($connection->query("INSERT INTO orders VALUES (NULL, '{$_SESSION['id']}','{$_SESSION['total']}', '$ordered')")) {
            $_SESSION['alert_msg'] = "Gratulacje! Twoje zamówienie zostało złożone!";
            $_SESSION['alert_type'] = "success";
            unset($_SESSION['cart']);
            header('Location: confirm_order_page.php');
        } else {
            throw new Exception($connection->error);
        }
        $connection->close();
    }
} catch (Exception $e) {
    echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
    echo '<br />Informacja developerska: ' . $e;
}
