<?php
require "db.php";

// Sprawdzenie pliku
if (!isset($_FILES["photo"]) || $_FILES["photo"]["error"] !== UPLOAD_ERR_OK) {
    die("Błąd przesyłania pliku");
}

$ext = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
$filename = uniqid() . "." . $ext;

$uploadPath = __DIR__ . "/uploads/" . $filename;

if (!move_uploaded_file($_FILES["photo"]["tmp_name"], $uploadPath)) {
    die("Nie mogę zapisać pliku (sprawdź uprawnienia uploads/)");
}

$description = $_POST["description"];

// Zapis rekordu do bazy
$stmt = $conn->prepare("INSERT INTO Photos (FileName, Description) VALUES (?, ?)");
$stmt->execute([$filename, $description]);

header("Location: index.php");
exit;
