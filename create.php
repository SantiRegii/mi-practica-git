<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['title'])) {
    $stmt = $db->prepare("INSERT INTO tasks (title) VALUES (?)");
    $stmt->execute([$_POST['title']]);
}

header('Location: index.php');
exit;
