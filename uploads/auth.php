<?php
session_start();

// Credenziali corrette
$correct_username = "P4ciuf";
$correct_password = "0987654123";

// Ottieni dati dal form
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($username === $correct_username && $password === $correct_password) {
    // Login riuscito
    $_SESSION['loggedin'] = true;
    header("Location: dashboard.html");
    exit();
} else {
    // Login fallito
    echo "<script>
        alert('Errore: Username o password errati! Tornerai alla pagina di login.');
        setTimeout(() => {
            window.location.href = 'index.html';
        }, 5000);
    </script>";
    exit();
}
?>
