<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Controllo credenziali fisse
    if ($username === 'admin' && $password === '1234') {
        $_SESSION['user_id'] = 'admin';
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Credenziali errate!";
        header("refresh:2;url=login.html"); // Torna al login dopo 2 secondi
    }
}
?>
