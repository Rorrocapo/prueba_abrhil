<?php
// Encabezados para permitir solicitudes desde cualquier origen (CORS)
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

/* Valores de conexión a la base de datos */
define("DB_HOST", "localhost"); // Host de la base de datos
define("DB", "test_abrhil"); // Nombre de la base de datos
define("DB_USER", "DbUser"); // Usuario de la base de datos
define("DB_PASS", '340$Uuxwp7Mcxo7Khy'); // Contraseña de la base de datos

/* Opciones predeterminadas */
define("DEFAULT_CONTROLLER", "employees"); // Controlador predeterminado
define("DEFAULT_ACTION", "list"); // Acción predeterminada
?>
    