<?php

session_start();

if ((isset($_POST['email'])) || (isset($_POST['password1'])) || (isset($_POST['password2']))) {

	$succes_flag = true;

	$email = $_POST['email'];
	$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

	if ((filter_var($emailB, FILTER_VALIDATE_EMAIL) == false) || ($emailB != $email)) {
		$succes_flag = false;
		$_SESSION['alert_msg'] = "Podaj poprawny adres e-mail!";
		$_SESSION['alert_type'] = "danger";
		header('Location: login_page.php');
	}

	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];

	if ((strlen($password1) < 5) || (strlen($password1) > 20)) {
		$succes_flag = false;
		$_SESSION['alert_msg'] = "Hasło musi posiadać od 5 do 20 znaków!";
		$_SESSION['alert_type'] = "danger";
		header('Location: login_page.php');
	}

	if ($password1 != $password2) {
		$succes_flag = false;
		$_SESSION['alert_msg'] = "Podane hasła nie są identyczne!";
		$_SESSION['alert_type'] = "danger";
		header('Location: login_page.php');
	}

	$password_hash = password_hash($password1, PASSWORD_DEFAULT);

	require_once "database_connect.php";
	mysqli_report(MYSQLI_REPORT_STRICT);

	try {
		if ($connection->connect_errno != 0) {
			throw new Exception(mysqli_connect_errno());
		} else {
			//Czy email już istnieje?
			$result = $connection->query("SELECT id FROM users WHERE email='$email'");

			if (!$result) throw new Exception($connection->error);

			$found_mails = $result->num_rows;
			if ($found_mails > 0) {
				$succes_flag = false;
				$_SESSION['alert_msg'] = "Istnieje już konto przypisane do tego adresu e-mail!";
				$_SESSION['alert_type'] = "danger";
				header('Location: login_page.php');
			}


			if ($succes_flag == true) {
				//dodajemy użytkownika do bazy

				if ($connection->query("INSERT INTO users VALUES (NULL, '$email', '$password_hash', '0')")) {
					$_SESSION['alert_msg'] = "Gratulacje! Zostałeś zarejestrowany!";
					$_SESSION['alert_type'] = "success";
					header('Location: login_page.php');
				} else {
					throw new Exception($connection->error);
				}
			}

			$connection->close();
		}
	} catch (Exception $e) {
		echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
		echo '<br />Informacja developerska: ' . $e;
	}
}
