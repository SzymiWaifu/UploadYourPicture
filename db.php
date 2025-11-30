<?php
$server = getenv("uploadyourpicture");
$database = getenv("AZURE_MYSQL_DBNAME");
$username = getenv("AZURE_MYSQL_USERNAME");
$password = getenv("AZURE_MYSQL_PASSWORD");

try {
    $conn = new PDO(
        "sqlsrv:server=$server;database=$database",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    );
} catch (PDOException $e) {
    die("Błąd połączenia z bazą: " . $e->getMessage());
}
?>
