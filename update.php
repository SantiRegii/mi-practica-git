<?php
require 'db.php';

if (isset($_GET['id'])) {
    // Alternar el estado de completado
    $stmt = $db->prepare("UPDATE tasks SET completed = 1 - completed WHERE id = ?");
    $stmt->execute([$_GET['id']]);
}

header('Location: index.php');
exit;
