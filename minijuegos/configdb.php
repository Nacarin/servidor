<?php
    
    define("HOST", "127.0.0.1");
    define("DATABASE", "minijuegos");
    define("USER", "root");
    define("PASSWORD", "");

    // Crear la conexión
    $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);

    // Verificar la conexión
    if ($mysqli->connect_error) {
        die("Error en la conexión a la base de datos: " . $mysqli->connect_error);
    }
?>
