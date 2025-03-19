<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    // Estensioni permesse
    $allowedTypes = ["jpg", "jpeg", "png", "gif"];

    if (in_array($fileType, $allowedTypes)) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            echo json_encode(["success" => true, "message" => "Immagine caricata con successo!", "imagePath" => $targetFilePath]);
        } else {
            echo json_encode(["success" => false, "message" => "Errore nel caricamento dell'immagine."]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Formato file non supportato."]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Nessun file inviato."]);
}
?>
