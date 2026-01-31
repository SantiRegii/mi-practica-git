<?php
session_start(); // 1. Iniciar sesión para mensajes flash
require 'db.php';

// Verificar método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // 2. Limpieza básica: Eliminar espacios en blanco al inicio y final
    $title = isset($_POST['title']) ? trim($_POST['title']) : '';

    // 3. Validación: Asegurar que no esté vacío después de limpiar
    if (!empty($title)) {
        try {
            // Preparar e insertar
            $stmt = $db->prepare("INSERT INTO tasks (title) VALUES (?)");
            $stmt->execute([$title]);
            
            // 4. Feedback: Guardar mensaje de éxito
            $_SESSION['message'] = "Tarea guardada exitosamente.";
            $_SESSION['message_type'] = "success";

        } catch (PDOException $e) {
            // 5. Manejo de Errores: Si falla la BD, no romper la página
            error_log("Error al insertar tarea: " . $e->getMessage()); // Loguear error internamente
            $_SESSION['message'] = "Hubo un error al guardar la tarea.";
            $_SESSION['message_type'] = "error";
        }
    } else {
        // El usuario envió el formulario vacío o solo con espacios
        $_SESSION['message'] = "El título de la tarea no puede estar vacío.";
        $_SESSION['message_type'] = "warning";
    }
}

// Redirección
header('Location: index.php');
exit;