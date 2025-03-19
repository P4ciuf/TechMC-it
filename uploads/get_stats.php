<?php
header('Content-Type: application/json');

// Simulazione statistiche
$stats = [
    "visits" => 12345,
    "images" => 250
];

echo json_encode($stats);
?>
