<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newText = $_POST["text"];
    file_put_contents("data/text.txt", $newText);
    echo "Testo salvato con successo!";
} else {
    echo file_exists("data/text.txt") ? file_get_contents("data/text.txt") : "Nessun testo salvato.";
}
?>
