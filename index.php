<?php
require "db.php";

// Pobierz dane z bazy
$stmt = $conn->query("SELECT * FROM Photos ORDER BY Id DESC");
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Galeria Zdjęć</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; padding: 20px; }
        h1 { text-align: center; }
        form { background: white; padding: 20px; max-width: 500px; margin: auto; border-radius: 10px; }
        input, textarea, button { width: 100%; margin-top: 10px; padding: 10px; }
        button { background: #0078ff; color: white; border: none; border-radius: 5px; }
        .gallery { display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 20px; margin-top: 30px; }
        .card { background: white; padding: 15px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .card img { width: 100%; border-radius: 10px; }
    </style>
</head>
<body>

<h1>Galeria zdjęć</h1>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <h3>Dodaj zdjęcie</h3>
    <input type="file" name="photo" required>
    <textarea name="description" placeholder="Opis zdjęcia..." required></textarea>
    <button type="submit">Dodaj</button>
</form>

<div class="gallery">
<?php foreach ($items as $item): ?>
    <div class="card">
        <img src="uploads/<?php echo htmlspecialchars($item['FileName']); ?>">
        <p><?php echo htmlspecialchars($item['Description']); ?></p>
    </div>
<?php endforeach; ?>
</div>

</body>
</html>
