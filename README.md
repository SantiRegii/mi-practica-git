# Proyecto de Gestión de Tareas (CRUD)

Este es un proyecto simple (de santi) en PHP para gestionar una lista de tareas, diseñado para la práctica de Git y GitHub.

## Requisitos
- PHP 7.4 o superior
- Extensión SQLite3 habilitada en PHP

## Inicio Rápido
1. Clona este repositorio y copialo al htdocs de xampp para que pueda ejecutarse correctamente.
2. Asegúrate de que el servidor tenga permisos de escritura en la carpeta del proyecto (para crear la base de datos `database.sqlite`).
3. Ejecuta el servidor integrado de PHP:
   ```bash
   php -S localhost:8000
   ```
4. Abre `http://localhost:8000` en tu navegador.

## Funcionalidades
- **C**reate: Añadir nuevas tareas.
- **R**ead: Listar las tareas existentes.
- **U**pdate: Editar el título o estado de una tarea.
- **D**elete: Eliminar tareas.
