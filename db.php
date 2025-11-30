<?php
$server = getenv("DB_SERVER");
$database = getenv("DB_NAME");
$username = getenv("DB_USER");
$password = getenv("DB_PASS");

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
