<?php
require 'db.php';

// Obtener todas las tareas
$stmt = $db->query("SELECT * FROM tasks ORDER BY id DESC");
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Tareas - Proyecto Colaborativo</title>
    <style>
        :root {
            --primary: #0079;
            --bg: #f8fafc;
            --card: #ffffff;
            --text: #1e293b;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg);
            color: var(--text);
            display: flex;
            justify-content: center;
            padding: 40px;
        }

        .container {
            width: 100%;
            max-width: 500px;
            background: var(--card);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: var(--primary);
        }

        form {
            display: flex;
            gap: 10px;
            margin-bottom: 2rem;
        }

        input[type="text"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
        }

        button {
            padding: 10px 20px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        button:hover {
            opacity: 0.9;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px;
            border-bottom: 1px solid #f1f5f9;
        }

        .actions a {
            text-decoration: none;
            margin-left: 10px;
            font-size: 0.9rem;
        }

        .delete {
            color: #ef4444;
        }

        .edit {
            color: #6366f1;
        }

        .completed {
            text-decoration: line-through;
            color: #94a3b8;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Mi Lista de Tareas</h1>

        <form action="create.php" method="POST">
            <input type="text" name="title" placeholder="Nueva tarea..." required>
            <button type="submit">Añadir</button>
        </form>

        <ul>
            <?php foreach ($tasks as $task): ?>
                <li>
                    <span class="<?= $task['completed'] ? 'completed' : '' ?>">
                        <?= htmlspecialchars($task['title']) ?>
                    </span>
                    <div class="actions">
                        <a href="update.php?id=<?= $task['id'] ?>" class="edit">
                            <?= $task['completed'] ? 'Desmarcar' : 'Completar' ?>
                        </a>
                        <a href="delete.php?id=<?= $task['id'] ?>" class="delete"
                            onclick="return confirm('¿Seguro?')">Eliminar</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>

</html>