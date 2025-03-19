<?php
$configFile = 'config.json';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data["site_title"], $data["site_description"], $data["maintenance_mode"])) {
        $settings = [
            "site_title" => htmlspecialchars($data["site_title"]),
            "site_description" => htmlspecialchars($data["site_description"]),
            "maintenance_mode" => $data["maintenance_mode"]
        ];

        file_put_contents($configFile, json_encode($settings, JSON_PRETTY_PRINT));
        echo json_encode(["success" => true, "message" => "Impostazioni aggiornate con successo!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Dati mancanti."]);
    }
} else {
    if (file_exists($configFile)) {
        echo file_get_contents($configFile);
    } else {
        echo json_encode([
            "site_title" => "Nome Sito",
            "site_description" => "Descrizione del sito...",
            "maintenance_mode" => "off"
        ]);
    }
}
?>
