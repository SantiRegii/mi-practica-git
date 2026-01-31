<?php
// db.php - Conexión a la base de datos SQLite

try {
    $db = new PDO('sqlite:' . __DIR__ . '/database.sqlite');
    $df->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Crear la tabla si no existe
    $df->exec("CREATE TABLE IF NOT EXISTS tasks (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        title TEXT NOT NULL,
        completed INTEGER DEFAULT 0
    )");
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
