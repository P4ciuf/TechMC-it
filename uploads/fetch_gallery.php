<?php
$targetDir = "uploads/";
$images = [];

if (is_dir($targetDir)) {
    $files = scandir($targetDir);
    foreach ($files as $file) {
        if ($file !== "." && $file !== "..") {
            $images[] = $targetDir . $file;
        }
    }
}

echo json_encode($images);
?>
